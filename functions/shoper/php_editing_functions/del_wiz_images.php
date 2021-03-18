<?php

include $_SERVER['DOCUMENT_ROOT'].'/config.php';

$col_users = $db->selectCollection('users');

session_start();
$token = $_SESSION['token'];

	$user_query = array('token' => $token);	
	$user = $col_users->findOne($user_query);

$src = $_POST['src'];
$exp = explode("/",$src);

unlink( 	 $user_upload . substr($user['_id'],0,24) . $user_shoper_gallery .  end($exp)  	);

$before = $user['shoper']['gallery'];

foreach ($before as $key => $b) {
		
	if (strpos($b,end($exp)) !== FALSE) {
		unset($before[$key]);
	}
}

$insertOneResult = $col_users->updateOne(

	[ 'token' => $token],
		[ '$set' => [ 
						'shoper.gallery' => $before
		]]
);


?>