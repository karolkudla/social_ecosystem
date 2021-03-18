<?php

$w = $_POST['w'];

session_start();
if ($w == 'pln') {unset($_SESSION['pln']);}
if ($w == 'zln') {unset($_SESSION['zln']);}

;?>