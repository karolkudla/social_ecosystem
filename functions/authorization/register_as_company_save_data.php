<?php

include $_SERVER['DOCUMENT_ROOT'].'/config.php';
$col = $db->selectCollection('users');

session_start();
$token = $_SESSION['token'];

$updateResult = $col->updateOne(
						[ 'token' => $token ],
						[ '$set' => [ 
										'user_data.contact' => $_POST['company_data']
									]
						]
					);	

;?>