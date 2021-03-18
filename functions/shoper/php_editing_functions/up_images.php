<?php

	include $_SERVER['DOCUMENT_ROOT'].'/config.php';
	include $_SERVER['DOCUMENT_ROOT'].'/functions/scale_and_compress.php';
	
	$col = $db->selectCollection('prod');
	$col_users= $db->selectCollection('users');
	
	session_start();
	$user = $col_users->findOne(['token' => $_SESSION['token']]);
	
	if ($user['_id'] !== null) {
	
		$id = substr($_POST['id'],0,24);
		$item = $col->findOne(['_id' => new MongoDB\BSON\ObjectID($id)]);
		
		if ($item['images']) {
			$before_pos = $item['images'];
		} else {$before_pos = [];}
		
		if ($item['offer_type'] == 'shoper_offer') {
			$save_path = $user_shoper_offers_gallery;
		}
		
		$upload_dir = $user_upload . substr($user['_id'],0,24) .  $save_path  . $id . "/";

		if (file_exists($upload_dir) == FALSE) {
			mkdir($upload_dir,0777,true);
		}
		   
		foreach($_FILES['images']['name'] as $key=>$val) {        
			
		$file_name = $_FILES['images']['name'][$key];
			
			$value = preg_replace('/(0)\.(\d+) (\d+)/', '$3$1$2', microtime());
			$remdots = preg_replace('/\./', ',', $file_name, (substr_count($file_name, '.') - 1));
			$exp = explode(".",$remdots);
			$new_name = $value.".".$exp[1];
			
			$upload_image = $upload_dir.$new_name;
		
			move_uploaded_file($_FILES['images']['tmp_name'][$key],$upload_image);	
			scale_and_compress($upload_dir.$new_name,$upload_dir.'big-'.$new_name,1366,80);
			scale_and_compress($upload_dir.$new_name,$upload_dir.'mini-'.$new_name,200,80);
			
			$before_pos[] = $new_name;
			
			unlink($upload_dir.$new_name);
		}
			
		$insertOneResult = $col->updateOne(

		[ '_id' => new MongoDB\BSON\ObjectID( $id ) ],
			[ '$set' => [ 
							'images' => $before_pos
			]]
		);
		
		
		$return = [substr($user['_id'],0,24),$before_pos];
		echo json_encode($return);
		
	}
		
?>