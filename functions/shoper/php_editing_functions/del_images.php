<?php

include $_SERVER['DOCUMENT_ROOT'].'/config.php';
session_start();

$col_prod = $db->selectCollection('prod');	

$pid = substr($_POST['pid'],0,24);
$src = $_POST['src'];
$exp = explode("/",$src);

$item = $col_prod->findOne(['_id' => new MongoDB\BSON\ObjectID($pid)]);

foreach ($item['images'] as $key => $b) {
		
	if (strpos($b,end($exp)) !== FALSE) {
		unset($item['images'][$key]);
	}
}

$order = array_values($before);

unlink( 	 $user_upload . substr($user['_id']) . $user_simple_offers_gallery .   $pid   .  "/"  .  end($exp)  	);

$insertOneResult = $col_prod->updateOne(

	[ '_id' => new MongoDB\BSON\ObjectID( $pid ) ],
		[ '$set' => [ 
						'images' => $order
		]]
);

;?>