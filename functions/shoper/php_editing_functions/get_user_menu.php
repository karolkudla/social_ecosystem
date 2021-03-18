<?php

include $_SERVER['DOCUMENT_ROOT'].'/config.php';

session_start();
$token = $_SESSION['token'];

$col = $db->selectCollection('users');
$u = $col->findOne(['token' => $token]);

$menu = $u['shoper']['menu'];

echo json_encode($menu);

;?>