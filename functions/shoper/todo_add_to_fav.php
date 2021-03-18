<?php

$p = $_POST['p'];
session_start();

if ($_SESSION['favorited']) {
	
	$faved = $_SESSION['favorited'];
	$faved[] = $p;
	$_SESSION['favorited'] = $faved;
	
} else {
	
	$faved[] = $p;
	$_SESSION['favorited'] = $faved;
	
}

;?>