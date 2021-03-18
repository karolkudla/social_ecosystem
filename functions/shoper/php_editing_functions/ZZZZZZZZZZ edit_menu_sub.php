<?php

include $_SERVER['DOCUMENT_ROOT'].'/config.php';
$col = $db->selectCollection('users');

$duza = $_POST['bigzak']; /* wiemy do jakiej dopisać */
$mala = $_POST['subzak'];

session_start();
$token = $_SESSION['token'];

	$query = array('token' => $token);	
	$user = $col->findOne($query);
		
	$dec = json_decode($user['shoper']['menu'], true);

	foreach ($dec as $key => $inner) {
		if (stripos($key,$duza) !== FALSE) {
			$dec[$key][] = $mala;	
		}
	}

	$enc = json_encode($dec);

$insertOneResult = $col->updateOne(

	[ 'token' => $token ],
		[ '$set' => [ 
						'shoper.menu' => $enc
		]]
);


;?>