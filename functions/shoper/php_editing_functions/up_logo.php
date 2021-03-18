<?php

	include $_SERVER['DOCUMENT_ROOT'].'/config.php';
	include $_SERVER['DOCUMENT_ROOT'].'/functions/scale_and_compress.php';
	$col_users = $db->selectCollection('users');
	
	session_start();
	$token = $_SESSION['token'];
	$user_query = array('token' => $token);
	$user = $col_users->findOne($user_query);

	$uid = substr($user['_id'],0,24);

if ($user['_id'] !== null) {
	
	$upload_dir = $user_upload . $uid . $user_shoper_avatar;
	
	if (is_dir($upload_dir) === FALSE) {
		mkdir($upload_dir,0777,true);
	}

	$todel = scandir($upload_dir);
	if ($todel[2]) {unlink($upload_dir.$todel[2]);}
 
	foreach($_FILES['logo']['name'] as $key=>$val) {        
		
	$file_name = $_FILES['logo']['name'][$key];
		
		$value = preg_replace('/(0)\.(\d+) (\d+)/', '$3$1$2', microtime());
		$remdots = preg_replace('/\./', ',', $file_name, (substr_count($file_name, '.') - 1));
		$exp = explode(".",$remdots);
		$new_name = $value.".".$exp[1];
		
	$upload_image = $upload_dir.$new_name;
	
		move_uploaded_file($_FILES['logo']['tmp_name'][$key],$upload_image);	
		scale_and_compress($upload_dir.$new_name,$upload_dir.'mini-'.$new_name,350,80);
		unlink($upload_dir.$new_name);
		
	}

	$insertOneResult = $col_users->updateOne(

	[ '_id' => new MongoDB\BSON\ObjectID( $uid ) ],
		[ '$set' => [ 
						'shoper.logo' => $new_name
		]]
		
	);
	
	echo $user_download.$uid.$user_shoper_avatar.'mini-'.$new_name;
	
}
	
;?>