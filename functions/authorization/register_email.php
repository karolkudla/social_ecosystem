<?php 

include $_SERVER['DOCUMENT_ROOT'].'/config.php';
$col = $db->selectCollection('users');

	/* Sprawdza czy taki login(email) jest już zarejestrowany */
	$sQuery = array('login' => $_POST['email']);
	$cursor = $col->findOne($sQuery);

	$token = bin2hex(random_bytes(64));
	session_start();
	$_SESSION["token"] = $token;

	$free_offers = [
		'sprzedaz'=>'100',
		'uslugi'=>'100',
		'motoryzacja'=>'100',
		'nieruchomosci'=>'100',
		'praca'=>'100'
	];

	if ($cursor == '') {
		
		$crypted = password_hash($_POST['password'], PASSWORD_DEFAULT);

		$insertOneResult = $col->insertOne([
			'login' => $_POST['email'],
			'pass' => $crypted,
			'user_type' => 'std',
			'reg_form' => 'email',
			'name' => $_POST['name'],
			'province' => $_POST['province'],
			'region' => $_POST['region'],
			'gmina' => $_POST['gmina'],
			'rodz' => $_POST['rodz'],
			'woj_name' => $_POST['woj_name'],
			'pow_name' => $_POST['pow_name'],
			'gmi_name' => $_POST['gmi_name'],
			'free_offers' => $free_offers
			
		]);
		
		/* loguj odrazu */
		$updateResult = $col->updateOne(
			[ 'login' => $_POST['email'] ],
			[ '$set' => [ 'token' => $token ]]
		);

	} else {
		
		echo 'already_registered';
		
	}

;?>