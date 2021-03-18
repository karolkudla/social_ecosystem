<?php 

session_start();
include $_SERVER['DOCUMENT_ROOT'].'/config.php';
$col_prod = $db->selectCollection('prod');

$product_id = substr($_POST['product_id'],0,24);
$item = $col_prod->findOne(['_id' => new MongoDB\BSON\ObjectID($product_id)]);

foreach($item as $key => $value) {
    if($key != '_id' && $key != 'title') {
        $new[$key] = $value;
    }
}

$new['title'] = 'Kopia - '.$item['title'];
$new['state'] = 'sibling';

$insertOneResult = $col_prod->insertOne($new);
$new_id = $insertOneResult->getInsertedId();

/* Zdjęcia produktu */

$old_dir = $user_upload . $_SESSION['url'] . $user_shoper_offers_gallery  . $product_id . "/";

if (	file_exists($old_dir)	 ) { 
	
	$new_dir = $user_upload . $_SESSION['url'] . $user_shoper_offers_gallery  . $new_id . "/";
	mkdir($new_dir, 0777, true);
	
	$old_images = scandir($old_dir);
	foreach ($old_images as $img) {
		if ($img != '.' && $img != '..') {
			copy($old_dir.$img,$new_dir.$img);
		}
	}
	
} 

/* Profilowe opiekuna */
if ($item['profile']) {
	$old_profile_path = $user_upload . $_SESSION['url'] . $user_shoper_offers_gallery  .  $product_id  .  $item['profile'];

	if (	file_exists($old_profile_path)	) { 

		$new_profile_path = $user_upload . $_SESSION['url'] . $user_shoper_offers_gallery  . $new_id;
		
		if (	file_exists($new_profile_path == FALSE)   )   {
			mkdir($new_profile_path, 0777, true);
		};
		
		copy($old_profile_path,$new_profile_path.$item['profile']);
		
	}
}

echo $new_id; 

;?>