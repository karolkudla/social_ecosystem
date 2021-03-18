<?php 

$sid = $_POST['sid'];
$w = $_POST['w'];

session_start();
$pln = $_SESSION['pln'];
$zln = $_SESSION['zln'];

if ($w == 'pln') {
		
	$zln[] = $pln[$sid];
	unset($pln[$sid]);
		
	$_SESSION['zln'] = $zln;
	$_SESSION['pln'] = $pln;
}

if ($w == 'zln') {
		
	$pln[] = $zln[$sid];
	unset($zln[$sid]);
	
	$_SESSION['pln'] = $pln;
	$_SESSION['zln'] = $zln;
	
}

;?>