<?php

include $_SERVER['DOCUMENT_ROOT'].'/config.php';
$col = $db->selectCollection('users');

session_start();
$token = $_SESSION['token'];

$updateResult = $col->updateOne(
						[ 'token' => $token ],
						[ '$set' => [ 
										'shoper.logo_text' => $_POST['logo_text'],
										'shoper.slogan' => $_POST['slogan'],
										'shoper.gallery' => $_POST['images'],
										'shoper.youtube' => $_POST['youtube'],
										'shoper.desc' => $_POST['desc'],
										'shoper.contact' => $_POST['contact'],
										'shoper.menu' => $_POST['menu'],
										'shoper.menu_images' => $_POST['menu_images'],
										'shoper.menu_desc' => $_POST['menu_desc'],
										'shoper.state' => 'old'
									]
						]
					);	

;?>