<?php

$cart = $_POST['cart'];
$sid = $_POST['sid'];
$nc = $_POST['nc'];

session_start();
$pln = $_SESSION['pln'];
$zln = $_SESSION['zln'];

if ($cart == 'pln') {
	
	$one_price = $pln[$sid]['cena']['pln'];
	$new_all_price = $one_price*$nc;
	$pln[$sid]['ceny']['pln'] = $new_all_price;
	$pln[$sid]['ilosc'] = $nc;
	
	/* widmo dla zln */
	$one_price_zln_pln = $pln[$sid]['cena']['zln_pln'];
	$one_price_zln_zln = $pln[$sid]['cena']['zln_zln'];
	
	$new_all_price_zln_pln = $one_price_zln_pln*$nc;
	$new_all_price_zln_zln = $one_price_zln_zln*$nc;
	
	$pln[$sid]['ceny']['zln_pln'] = $new_all_price_zln_pln;
	$pln[$sid]['ceny']['zln_zln'] = $new_all_price_zln_zln;
	/*****************/
	
	$_SESSION['pln'] = $pln;
	$_SESSION['zln'] = $zln;
	
	$new = ['pln'=>$new_all_price];
	echo json_encode($new);

}

if ($cart == 'zln') {

	$one_price_zln_pln = $zln[$sid]['cena']['zln_pln'];
	$one_price_zln_zln = $zln[$sid]['cena']['zln_zln'];
	
	$new_all_price_zln_pln = $one_price_zln_pln*$nc;
	$new_all_price_zln_zln = $one_price_zln_zln*$nc;
	
	$zln[$sid]['ceny']['zln_pln'] = $new_all_price_zln_pln;
	$zln[$sid]['ceny']['zln_zln'] = $new_all_price_zln_zln;
	
	$zln[$sid]['ilosc'] = $nc;
	
	/* widmo dla pln */
	$one_price = $zln[$sid]['cena']['pln'];
	$new_all_price = $one_price*$nc;
	$zln[$sid]['ceny']['pln'] = $new_all_price;
	$zln[$sid]['ilosc'] = $nc;
	/*****************/
	
	$_SESSION['pln'] = $pln;
	$_SESSION['zln'] = $zln;
	
	$new = ['zln_pln'=>$new_all_price_zln_pln,'zln_zln'=>$new_all_price_zln_zln];
	echo json_encode($new);

}
;?>