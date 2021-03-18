<?php 

include $_SERVER['DOCUMENT_ROOT'].'/config.php';
$col = $db->selectCollection('users');

session_start();
$token = $_SESSION['token'];

$u = $col->findOne(array('token' => $token));

$url = $u['shoper']['url'];
$state = $u['shoper']['state'];
$nazwa = $u['shoper']['logo_text'];
$slogan = $u['shoper']['slogan'];
$logo = $u['shoper']['logo'];
$big_logo = $u['shoper']['background'];
$wiz_images = $u['shoper']['gallery'];
$wiz_youtube = $u['shoper']['youtube'];
$desc = $u['shoper']['desc'];
$contact = $u['shoper']['contact'];
$menu = $u['shoper']['menu'];
$menu_images = $u['shoper']['menu_images'];
$menu_desc = $u['shoper']['menu_desc'];

$data = [
	'uid' => substr($u['_id'],0,24),
	'url' => $url,
	'state' => $state,
	'nazwa' => $nazwa,
	'slogan' => $slogan,
	'logo' => $logo,
	'background' => $big_logo,
	'gallery' => $wiz_images,
	'wiz_youtube' => $wiz_youtube,
	'desc' => $desc,
	'contact' => $contact,
	'menu' => $menu,
	'menu_images' => $menu_images,
	'menu_desc' => $menu_desc
];

$json = json_encode($data);
echo $json;

;?>