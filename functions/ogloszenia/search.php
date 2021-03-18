<?php
	include $_SERVER['DOCUMENT_ROOT'].'/config.php';
	$col_prod = $db->selectCollection('prod');
	
	if (	trim($_POST['phrase']) !== ''	) {$filter['title'] =  new MongoDB\BSON\Regex($_POST['phrase'], 'i');};
	
	if (		$_POST['woj'] !== ''	) {$filter['localisation.WOJ'] = $_POST['woj'];};
	if (		$_POST['pow'] !== ''	) {$filter['localisation.POW'] = $_POST['pow'];};
	if (		$_POST['gmi'] !== ''	) {$filter['localisation.GMI'] = $_POST['gmi'];};
	if (		$_POST['rodz'] !== ''	) {$filter['localisation.RODZ'] = $_POST['rodz'];};
	
	if ( 
		$_POST['price_from'] !== '' && 
		$_POST['price_to'] !== '' 
	) {
		$filter['product_data.cennik.cena_brutto_wartosc.value'] = ['$gt' => $_POST['price_from'], '$lt' => $_POST['price_to']  ];
	};
	
	if ( 
		$_POST['price_from'] !== '' && 
		$_POST['price_to'] == '' 
	) {
		$filter['product_data.cennik.cena_brutto_wartosc.value'] = ['$gt' => $_POST['price_from'], '$lt' => '999999'  ];
	};
	
	if ( 
		$_POST['price_from'] == '' && 
		$_POST['price_to'] !== '' 
	) {
		$filter['product_data.cennik.cena_brutto_wartosc.value'] = ['$gt' => '0', '$lt' => $_POST['price_to']  ];
	};

	if (
		$_POST['cat']
	) {
		$deep = $_POST['cat_deep'];
		$filter['cats.'.$deep] = $_POST['cat'];
	}

	if (
		$_POST['pomoc']
	) {
			$filter['imp_type'] = $_POST['pomoc'];
	}
	
	$filter['offer_type'] = 'simple_offer';
	$filter['acceptance']= 'yes';
	
	$options = [
		'skip'=>(int)$_POST['skip'],
		'limit'=>0,
		'sort' => ['_id' => -1]
	];
	
	$results = $col_prod->find($filter,$options);
	$count = $col_prod->count($filter,$options);
	
	if ($count > 0) {
	
	/* print_r($filter); */
	
	foreach ($results as $p) {

		include $_SERVER['DOCUMENT_ROOT'].'/functions/ogloszenia/layouts/index_list_simple_offers.php';

	}
	
	} else {
		
		echo '<div class="this_is_the_end"></div>';
		
	}
;?>