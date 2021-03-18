<?php

	include $_SERVER['DOCUMENT_ROOT'].'/config.php';
	$collection = $db->selectCollection('users');
	
	session_start();
	$updateResult = $collection->updateOne(
			[ 'token' => $_SESSION['token'] ],
			[ '$set' => [ 
				'fb_name' => $_POST['name'],
				'fb_email' => $_POST['email']
			]]
		);
		
;?>