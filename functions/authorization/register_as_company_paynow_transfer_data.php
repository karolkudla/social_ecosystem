<?php

include $_SERVER['DOCUMENT_ROOT'].'/config.php';
$col = $db->selectCollection('users');

$td = $_POST['transfer_data'];
$td['type'] = 'verification';

session_start();
$token = $_SESSION['token'];

$trans_history[] = $td;

$updateResult = $col->updateOne(
						[ 'token' => $token ],
						[ '$set' => [ 
										'transaction_history' => $trans_history
									]
						]
					);	

;?>