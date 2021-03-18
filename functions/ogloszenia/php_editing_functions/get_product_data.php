<?php 

include $_SERVER['DOCUMENT_ROOT'].'/config.php';
$col = $db->selectCollection('prod');
$pid = $_POST['pid'];
$cut = substr($pid,0,24); /* ucinanie, bo dodaje niewidzialne znaki */
$i = $col->findOne(['_id' => new MongoDB\BSON\ObjectID($cut)]);

$cats = $i['cats'];

$form = $i['form'];

$pos = $i['pos'];
$j_pos = json_decode($pos);

$yt = $i['yt'];
$j_yt = json_decode($yt);

$profile = $i['profile'];
$menu = $i['menu'];

if (	empty($i['profile'])	) {
	$col_user = $db->selectCollection('users');
	$user = $col_user->findOne(['url' => $i['url']]);
	$alternative_profile = $user['user_data']['logo'];
} 

if (    empty($i['product_data']['dane_opiekuna']['opiekun_imie_nazwisko'])		) {
	$col_user = $db->selectCollection('users');
	$user = $col_user->findOne(['url' => $i['url']]);
	$alternative_contact = $user['user_data']['contact'];
}

$data = [
	'title' => $i['title'],
	'link' => $i['link'],
	'cats' => $cats,
	'form' => $form,
	'img' => $j_pos,
	'yt' => $j_yt,
	'profile' => $profile,
	'alternative_profile' => $alternative_profile,
	'alternative_contact' => $alternative_contact,
	'menu' => $menu,
	'state'=>$i['state'],
	'url'=>$i['url'],
	'login' => $i['login'],
	'offer_type'=>$i['offer_type'],
	'product_data' => $i['product_data'],
	'localisation' => $i['localisation']
];

$json = json_encode($data);
echo $json;

;?>