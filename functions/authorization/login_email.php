<?php

$l = $_POST['l'];
$p = $_POST['p'];

	include $_SERVER['DOCUMENT_ROOT'].'/config.php';
	$collection = $db->selectCollection('users');
	
	$sQuery = array('login' => $l);	
	$cursor = $collection->findOne($sQuery);
			
		if ($cursor != '') {
						
			if (password_verify($p, $cursor['pass'])) 
				{
					$arr[] = 'logged';
					$enc = json_encode($arr);
					echo $enc;
					
					$token = bin2hex(random_bytes(64));
					
					session_start();
					$_SESSION["token"] = $token;
				
					/* Jeśli jest shoper, to uzupełnij dane w sesji */
	
					if ($cursor['url']) {
						$_SESSION["url"] = $cursor['url'];
						$_SESSION["name"] = $cursor['user_data']['logo_text']; /* nazwa shopera */
						$_SESSION["avatar"] = $cursor['user_data']['logo']; /* logo shopera */			
					}

					$updateResult = $collection->updateOne(
						[ 'login' => $l ],
						[ '$set' => [ 'token' => $token ]]
					);
								
				} else {
					$arr[] = 'Błędne hasło.';
					$enc = json_encode($arr);
					echo $enc;
					};
			
		} else {
					$arr[] = 'Brak takiego konta.';
					$enc = json_encode($arr);
					echo $enc;
		}
		


;?>