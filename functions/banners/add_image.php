<?php
include $_SERVER['DOCUMENT_ROOT'].'/config.php';
include $_SERVER['DOCUMENT_ROOT'].'/functions/scale_and_compress.php';
session_start();

$s_token = $_SESSION['token'];

	$collection = $db->selectCollection('users');
	$sQuery = array('token' => $s_token);	
	$cursor = $collection->findOne($sQuery);

if ($cursor['login']) {
		
	$upload_dir = $user_upload . $cursor['login'] . $user_company_banners . "/";

	if (file_exists($upload_dir) == FALSE) {
		mkdir($upload_dir,0777,true);
	}
	 
	foreach($_FILES['banner_up']['name'] as $key=>$val) {        
		
	$file_name = $_FILES['banner_up']['name'][$key];

		$value = preg_replace('/(0)\.(\d+) (\d+)/', '$3$1$2', microtime());		
		$remdots = preg_replace('/\./', ',', $file_name, (substr_count($file_name, '.') - 1));

		$exp = explode(".",$remdots);
		$new_name = $value.".webp";
		
		$upload_image = $upload_dir.$new_name;
	
		move_uploaded_file($_FILES['banner_up']['tmp_name'][$key],$upload_image);	
	
		scale_and_compress($upload_dir.$new_name,$upload_dir.$new_name,1024,90);

	}

	$return = [$cursor['login'],$new_name];	
	echo json_encode($return);
		
		
} else {
	
	echo json_encode(['niezalogowany']);
	
}
;?>
