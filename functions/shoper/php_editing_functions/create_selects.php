<?php
include $_SERVER['DOCUMENT_ROOT'].'/config.php';
$cats = $_POST['cats'];

$c1 = $cats[1];
$c2 = $cats[2];
$c3 = $cats[3];
$c4 = $cats[4];

$f = ['Sprzedaż','Usługi','Motoryzacja','Nieruchomości','Turystyka','Praca','Bilety'];
if ($cats[0] == 'Sprzedaż') {$file = file_get_contents($root."kats/sprzedaz.json");}
if ($cats[0] == 'Usługi') {$file = file_get_contents($root."kats/uslugi.json");}
if ($cats[0] == 'Motoryzacja') {$file = file_get_contents($root."kats/moto.json");}

$json = json_decode($file, true);	

	foreach($f as $f1=>$f2) {
		$array_f[] = $f2;
	}

	if ($json) {
	foreach ($json as $k1=>$k2) {
		$array0[] = $k1;
	}
	}
	
	if ($json[$c1]) {
	foreach ($json[$c1] as $k3=>$k4) {
		$array1[] = $k3;
	}
	}
	
	if ($json[$c1][$c2]) {
	foreach ($json[$c1][$c2] as $k5=>$k6) {
		$array2[] = $k5;
	}
	}
	
	if ($json[$c1][$c2][$c3]) {
	foreach ($json[$c1][$c2][$c3] as $k7=>$k8) {
		$array3[] = $k7;
	}
	}

$selected = [$array_f,$array0,$array1,$array2,$array3];

$json = json_encode($selected);
echo $json;

;?>