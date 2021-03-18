<?php 
	include $_SERVER['DOCUMENT_ROOT'].'/config.php';

	session_start();
	$token = $_SESSION['token'];

		$cat = $_POST['cat'];

		$col_users = $db->selectCollection('users');
		$user_query = array('token' => $token);
		$user = $col_users->findOne($user_query);
	
		$free_offers = $user['free_offers'];
		
		if ($cat == 'Sprzedaż') {$ckey = 'sprzedaz';};
		if ($cat == 'Usługi') {$ckey = 'uslugi';};
		if ($cat == 'Motoryzacja') {$ckey = 'motoryzacja';};
		if ($cat == 'Nieruchomości') {$ckey = 'nieruchomosci';};
		if ($cat == 'Praca') {$ckey = 'praca';};
		
		if ($free_offers[$ckey] > 0) {
			echo 'nolimit';
		} else {
			echo 'limit';
		}
		
;?>