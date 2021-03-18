<?php 

include $_SERVER['DOCUMENT_ROOT'].'/config.php';

$f = $_POST['f'];
$d = $_POST['d'];
$k = $_POST['k'];

if ($f == '0') {$file = file_get_contents($root."kats/sprzedaz.json");}
if ($f == '1') {$file = file_get_contents($root."kats/uslugi.json");}
if ($f == '2') {$file = file_get_contents($root."kats/moto.json");}
if ($f == '3' || $f == '4' || $f == '5' || $f == '6') {$array = [];$file = json_encode($array);}

$json = json_decode($file, true);	

if ($d == '0') {
	foreach ($json as $k1=>$k2) {
		$array[] = $k1;
	}
}

if ($d == '1') {
	if ($json[$k[0]]) {
	foreach ($json[$k[0]] as $k1=>$k2) {
		$array[] = $k1;
	}
	} else {	$array = [];	}
}

if ($d == '2') {
	if ($json[$k[0]][$k[1]]) {
	foreach ($json[$k[0]][$k[1]] as $k1=>$k2) {
		$array[] = $k1;
	}
	} else {	$array = [];	}
}

if ($d == '3') {
	if ($json[$k[0]][$k[1]][$k[2]]) {
	foreach ($json[$k[0]][$k[1]][$k[2]] as $k1=>$k2) {
		$array[] = $k1;
	}
	} else {	$array = [];	}
}

if ($d == '4') {
	if ($json[$k[0]][$k[1]][$k[2]][$k[3]]) {
	foreach ($json[$k[0]][$k[1]][$k[2]][$k[3]] as $k1=>$k2) {
		$array[] = $k1;
	}
	} else {	$array = [];	}
}

if ($d == '5') {
	if ($json[$k[0]][$k[1]][$k[2]][$k[3]][$k[4]]) {
	foreach ($json[$k[0]][$k[1]][$k[2]][$k[4]] as $k1=>$k2) {
		$array[] = $k1;
	}
	} else {	$array = [];	}
}

$fid = [$f,$d];
$packet = [$array,$fid];

$send = json_encode($packet);
echo $send;

;?>
