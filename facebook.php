<html>
<?php 

include $_SERVER['DOCUMENT_ROOT'].'/config.php';
$p = $_GET['p'];

	if ($p == 'f') {
;?>
	<head>

		<meta property="fb:app_id"		  content="803056166759107">
		<meta property="og:url"           content="https://vokulsky.pl/firmy">
		<meta property="og:type"          content="website">
		<meta property="og:title"         content="Vokulsky Group">
		<meta property="og:description"   content="Wspieramy Polskie Firmy - 500 bezpłatnych ogłoszeń">
		<meta property="og:image"         content="https://vokulsky.pl/img/pomoc/wpf.jpg">
	  
	 </head>	
<?php			
	};

	if ($p == 'c') {
;?>
	<head>

		<meta property="fb:app_id"		  content="803056166759107">
		<meta property="og:url"           content="https://vokulsky.pl/codziennosc">
		<meta property="og:type"          content="website">
		<meta property="og:title"         content="Vokulsky Group">
		<meta property="og:description"   content="Wspieramy Codzienność - 500 bezpłatnych ogłoszeń">
		<meta property="og:image"         content="https://vokulsky.pl/img/pomoc/c.jpg">
	  
	 </head>	
<?php			
	};

	if (strlen($p) == 24) {
		
		$col_prod = $db->selectCollection('prod');					
		$item = $col_prod->findOne(['_id' => new MongoDB\BSON\ObjectID( $p )]);
		
		$img = $item['images'];

		if (	$item['product_data']['cennik']['cena_brutto_wartosc']['value']	) {$price = " - ".$item['product_data']['cennik']['cena_brutto_wartosc']['value']." zł";};
;?>
	<head>

		<meta property="fb:app_id"		  content="803056166759107">
		<meta property="og:url"           content="https://vokulsky.pl/ogloszenie/<?php echo $p;?>">
		<meta property="og:type"          content="website">
		<meta property="og:title"         content="<?php echo $item['title'].$price;?>">
		<meta property="og:description"   content="<?php echo $item['product_data']['podstawowe_dane']['opis_oferty']['value'];?>">
		<meta property="og:image"         content="<?php echo $user_download.$item['uid'].$user_simple_offers_gallery.$p."/big-".$img[0];?>">
	  
	 </head>	
<?php		
	} ;		
;?>


 </html>