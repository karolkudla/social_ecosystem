<?php

$cart = $_POST['cart'];
$sid = $_POST['sid'];

session_start();

if ($cart == 'pln') {
	unset($_SESSION['pln'][$sid]);
}

if ($cart == 'zln') {
	unset($_SESSION['zln'][$sid]);
}

;?>