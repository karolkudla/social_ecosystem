<?php

include $_SERVER['DOCUMENT_ROOT'].'/config.php';

session_start();
$token = $_SESSION['token'];

	$col_users = $db->selectCollection('users');
	$col_prod = $db->selectCollection('prod');
	
	$user_query = array('token' => $token);
	$user = $col_users->findOne($user_query);
	
	$url = $user['url'];
	$login = $user['login'];

		$insertOneResult = $col_prod->insertOne(
			[ 
				'login' => $login, 
				'url' => $url,
				'state' => 'new',
				'offer_type' => $_POST['offer_type']
			]	
		);	

$id = $insertOneResult->getInsertedId();
echo $id->jsonSerialize()['$oid'];

;?>

