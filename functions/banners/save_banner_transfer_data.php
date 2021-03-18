<?php

include $_SERVER['DOCUMENT_ROOT'].'/config.php';
$col_campaigns = $db->selectCollection('campaigns');
$col_users = $db->selectCollection('users');

session_start();
$token = $_SESSION['token'];

$td = $_POST['transfer_data'];

$cid = substr($td['campaign_id'],0,24);

/* Pobierz historię transakcji */

$Query = array('token' => $token);	
$cursor = $col_users->findOne($Query);

$trans_history = $cursor['transaction_history'];

$trans_history[] = $td;

/* Zapisz UNCONFIRMED transakcje w historii transkacji */

$updateResult = $col_users->updateOne(
						[ 'token' => $token ],
						[ '$set' => [ 
										'transaction_history' => $trans_history			
									]
						]
					);

/* Zapisz UNCONFIRMED transakcje przy id kampanii */

$updateResult = $col_campaigns->updateOne(
						[ '_id' => new MongoDB\BSON\ObjectID($cid) ],
						[ '$set' => [ 
										'paynow' => $td['paynow']
									]
						]
					);	

;?>