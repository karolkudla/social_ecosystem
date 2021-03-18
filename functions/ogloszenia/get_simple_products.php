<?php
include $_SERVER['DOCUMENT_ROOT'].'/config.php';

$f = $_POST['f']; /* nazwa kategorii */
$d = $_POST['d']; /* głębokość kategorii */

$col_prod = $db->selectCollection('prod');

	$query = [
			'cats.'.$d => trim($f),
			'offer_type'=>'simple_offer',
			'state'=>'old',
			'acceptance'=>'yes'
		];	
		
	$options = ['sort' => ['_id' => -1]];


$s = $col_prod->find($query,$options);	
$x = $col_prod->count($query);


;?>

<?php
if ($x > 0) {
foreach ($s as $p) {	

	include 'layouts/index_list_simple_offers.php';
	
}} else {echo '<div style="width: 100%; text-align:center; padding: 20px 0;">Chwilowo brak produktów w tej kategorii.</div>';};

;?>

