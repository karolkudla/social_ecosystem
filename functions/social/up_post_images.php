<?php
include $_SERVER['DOCUMENT_ROOT'].'/config.php';
include $_SERVER['DOCUMENT_ROOT'].'/functions/scale_and_compress.php';
session_start();

$col_users= $db->selectCollection('users');

$generated_id = $_POST['folder'];
$user = $col_users->findOne(['token' => $_SESSION['token']]);

if ($user['_id'] !== null && count($_FILES['post_images']) > 0) {

$upload_dir = $user_upload . substr($user['_id'],0,24) . $user_social_post_gallery . $generated_id . "/";

	if (file_exists($upload_dir) == FALSE) {
		mkdir($upload_dir,0777,true);
	}
	   
	foreach($_FILES['post_images']['name'] as $key=>$val) {        
		
	$file_name = $_FILES['post_images']['name'][$key];

		$value = preg_replace('/(0)\.(\d+) (\d+)/', '$3$1$2', microtime());		
		$remdots = preg_replace('/\./', ',', $file_name, (substr_count($file_name, '.') - 1));

		$exp = explode(".",$remdots);
		$new_name = $value.".webp";
		
		$upload_image = $upload_dir.$new_name;
	
		move_uploaded_file($_FILES['post_images']['tmp_name'][$key],$upload_image);	
		scale_and_compress($upload_dir.$new_name,$upload_dir.'big-'.$new_name,1366,80);
		scale_and_compress($upload_dir.$new_name,$upload_dir.'mini-'.$new_name,200,80);
		
		$imgs[] = $new_name;
		
		unlink($upload_dir.$new_name);

	}

$return = [substr($user['_id'],0,24),$imgs];	
echo json_encode($return);

} else {
	
	echo 'nofile';
	
}

;?>
