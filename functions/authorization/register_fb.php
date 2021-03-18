<?php

	include $_SERVER['DOCUMENT_ROOT'].'/config.php';
	$collection = $db->selectCollection('users');
	
	$sQuery = array('login' => $_POST['fbid']);
	$cursor = $collection->findOne($sQuery);
	
	session_start();
	$_SESSION["token"] =  $_POST['fbatoken'];
	
	$free_offers = [
		'sprzedaz'=>'100',
		'uslugi'=>'100',
		'motoryzacja'=>'100',
		'nieruchomosci'=>'100',
		'praca'=>'100'
	];
	
	/* jeżeli nie znajduje takiego loginu, to rejestruje go w bazie i loguje poprzez dodanie fbatokena */
	if ($cursor == '') {
		
		$insertOneResult = $collection->insertOne([
			'login' => $_POST['fbid'],
			'user_type' => 'std',
			'token' =>  $_POST['fbatoken'],
			'reg_form' => 'fb',
			'province' => $_POST['province'],
			'region' => $_POST['region'],
			'gmina' => $_POST['gmina'],
			'rodz' => $_POST['rodz'],
			'woj_name' => $_POST['woj_name'],
			'pow_name' => $_POST['pow_name'],
			'gmi_name' => $_POST['gmi_name'],
			'free_offers' => $free_offers
		]);
		
	} else {
		
		/* Znalazło taki login, więc loguje */
		
		$updateResult = $collection->updateOne(
			[ 'login' => $_POST['fbid'] ],
			[ '$set' => [ 'token' =>  $_POST['fbatoken'] ]]
		);
		
		/* Jeśli jest shoper, to uzupełnij dane w sesji */
		
		if ($cursor['url']) {
			$_SESSION["url"] = $cursor['url'];
			$_SESSION["name"] = $cursor['user_data']['logo_text']; /* nazwa shopera */
			$_SESSION["avatar"] = $cursor['user_data']['logo']; /* logo shopera */			
		}

	}
	
	/* sprawdzaj czy jest name i email, jeśli nie to zwróć, że nie ma */
	echo json_encode(['fb_name'=>$cursor['fb_name'],'fb_email'=>$cursor['fb_email']]);

;?>