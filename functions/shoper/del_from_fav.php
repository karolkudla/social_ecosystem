<?php

$p = $_POST['p'];
session_start();
	
	$faved = $_SESSION['favorited'];

	if (($key = array_search($p, $faved)) !== false) {
					
    unset($faved[$key]);
	
	$_SESSION['favorited'] = $faved;
	
	}	

;?>