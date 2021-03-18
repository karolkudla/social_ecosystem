<?php

	include $_SERVER['DOCUMENT_ROOT'].'/config.php';
	include $_SERVER['DOCUMENT_ROOT'].'/functions/scale_and_compress.php';
	session_start();
	$token = $_SESSION['token'];
	
	$col_users = $db->selectCollection('users');	
	$user_query = array('token' => $token);
	$user = $col_users->findOne($user_query);
	
	$uid = substr($user['_id'],0,24);
	
if ($user['_id'] !== null) {
	
	$before_pos = $user['shoper']['gallery'];
	
	if (empty($before_pos) || $before_pos == '') {
		$before_pos = [];
	}
	
	$upload_dir = $user_upload . $uid . $user_shoper_gallery;

	if (file_exists($upload_dir) == FALSE) {
		mkdir($upload_dir,0777,true);
	}
	
		foreach($_FILES['wiz_images']['name'] as $key=>$val) {        
		
			$file_name = $_FILES['wiz_images']['name'][$key];
		
				$value = preg_replace('/(0)\.(\d+) (\d+)/', '$3$1$2', microtime());
				$remdots = preg_replace('/\./', ',', $file_name, (substr_count($file_name, '.') - 1));
				$exp = explode(".",$remdots);
				$new_name = $value.".".$exp[1];
		
				$upload_image = $upload_dir.$new_name;
			
				move_uploaded_file($_FILES['wiz_images']['tmp_name'][$key],$upload_image);	
				scale_and_compress($upload_dir.$new_name,$upload_dir.'big-'.$new_name,1366,80);
				scale_and_compress($upload_dir.$new_name,$upload_dir.'mini-'.$new_name,300,80);
				
				$before_pos[] = $new_name;
				
				unlink($upload_dir.$new_name);
	};

	$insertOneResult = $col_users->updateOne(

	[ 'token' => $token ],
		[ '$set' => [ 
						'shoper.gallery' => $before_pos
		]]
	);
		
	$return = [$uid,$before_pos];
	echo json_encode($return);

}
	
?>