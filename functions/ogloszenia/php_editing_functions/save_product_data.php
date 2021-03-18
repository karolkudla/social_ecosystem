<?php

include $_SERVER['DOCUMENT_ROOT'].'/config.php';
$col = $db->selectCollection('prod');

$pid = substr($_POST['pid'],0,24); /* ucinamy niewidzialne znaki */

/* sprawdzamy jaki offer type - żeby nadać status non-accepted */
/* a potem wysyłamy offer type do js, żeby pokazać ofertę w odpowiednim layoucie */
/* bo okazjonalne i shoperowe mają rózne layouty */

$p = $col->findOne(['_id' => new MongoDB\BSON\ObjectID($pid)]);

/* odejmowanie liczby ogłoszeń */

$col_users = $db->selectCollection('users');
$query = ['login'=>$p['login']];
$user = $col_users->findOne($query);

if ($p['offer_type'] == 'simple_offer' && $_POST['version'] == 'old') {
	
	$cats = $_POST['cats'];
	$cat = $cats[0];
	
	if ($cat == 'Sprzedaż') {$ckey = 'sprzedaz';};
	if ($cat == 'Usługi') {$ckey = 'uslugi';};
	if ($cat == 'Motoryzacja') {$ckey = 'motoryzacja';};
	if ($cat == 'Nieruchomości') {$ckey = 'nieruchomosci';};
	if ($cat == 'Praca') {$ckey = 'praca';};

	$free_offers = $user['free_offers'];
	
	$insertOneResult = $col_users->updateOne(
		[ 'login' => $p['login'] ],
			[ '$set' => [
							'free_offers.'.$ckey => $free_offers[$ckey] - 1
						]
			]
	);
		
}

if ($p['offer_type'] == 'simple_offer' && $_POST['version'] == 'old') {
	$acceptance = 'no';
}

if ($_POST['version'] == 'new') {
	$state = 'new';
} else {
	$state = 'old';
}

$yt_pos = $_POST['yt_pos'];
$j_yt = json_encode($yt_pos);

$bonus = $_POST['bonus'];

if ($bonus == 'nb') {

	$insertOneResult = $col->updateOne(

		[ '_id' => new MongoDB\BSON\ObjectID( $pid ) ],
			[ '$set' => [
							'uid' => $user['_id'],
							'title' => $_POST['title'],
							'link' => $_POST['link'],
							'cats' => $_POST['cats'],
							'form' => $_POST['editor'],
							'images' => $_POST['img_pos'],
							'yt' => $j_yt,
							'menu' => $_POST['menu'],
							'state' => $state,
							'localisation' => $_POST['localisation'],
							'product_data' => $_POST['product_data'],
							'acceptance' => $acceptance
						]
			]
	);

} else {
	
	$insertOneResult = $col->updateOne(

		[ '_id' => new MongoDB\BSON\ObjectID( $pid ) ],
			[ '$set' => [
							'uid' => $user['_id'],
							'title' => $_POST['title'],
							'link' => $_POST['link'],
							'cats' => $_POST['cats'],
							'form' => $_POST['editor'],
							'images' => $_POST['img_pos'],
							'yt' => $j_yt,
							'menu' => $_POST['menu'],
							'state' => $state,
							'localisation' => $_POST['localisation'],
							'product_data' => $_POST['product_data'],
							'acceptance' => $acceptance,
							'bonus_name' => $bonus['bonus_name'],
							'bonus_email' => $bonus['bonus_email']
						]
			]
	);	
	
}

echo $p['offer_type'];

;?>