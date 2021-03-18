<?php

include $_SERVER['DOCUMENT_ROOT'].'/config.php';
$col = $db->selectCollection('users');

$name = $_POST['name'];

session_start();
$token = $_SESSION['token'];

	$query = array('token' => $token);	
	$user = $col->findOne($query);
	
if ($user['shoper']['menu'] && $user['shoper']['menu'] !== '') {
	
	$dec = json_decode($user['shoper']['menu'], true);
	$zakladki = $dec;	
	$zakladki[$name] = [];


} else {
	
	$zakladki[$name] = [];
	
}

$enc = json_encode($zakladki); 

$insertOneResult = $col->updateOne(

	[ 'token' => $token ],
		[ '$set' => [ 
						'shoper.menu' => $enc
		]]
);

;?>