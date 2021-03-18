<?php

include $_SERVER['DOCUMENT_ROOT'].'/config.php';
$col_users = $db->selectCollection('users');

session_start();
$token = $_SESSION['token'];

	$user_query = array('token' => $token);
	$user = $col_users->findOne($user_query);

$name = $_POST['name'];
$zakladki = $user['shoper']['menu'];

$dec = json_decode($zakladki, true);

foreach ($dec as $key => $array) {
	foreach ($array as $k => $v) {
		if (stripos($v,$name) !== FALSE) {
			unset($dec[$key][$k]);
		}
	}
}

$enc = json_encode($dec);

$insertNewZakladka = $col_users->updateOne(		
		[ 'token' => $token ],
			[ '$set' => [ 
				'shoper.menu' => $enc
			]]		
		);	
	
;?>