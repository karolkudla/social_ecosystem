<?php

$l = $_POST['l'];
$p = $_POST['p'];

	include $_SERVER['DOCUMENT_ROOT'].'/config.php';
	$collection = $db->selectCollection('users');
	
	$sQuery = array('login' => $l);	
	$cursor = $collection->findOne($sQuery);
			
		if ($cursor['login']) {
						
			if (password_verify($p, $cursor['pass'])) 
				{
					$arr[] = 'logged';
					$arr[] = $cursor['user_data']['logo_text'];
					$enc = json_encode($arr);
					echo $enc;
					
					$token = bin2hex(random_bytes(64));
					
					session_start();
					$_SESSION["token"] = $token;
					$_SESSION["url"] = $cursor['url'];
					$_SESSION["name"] = $cursor['user_data']['logo_text']; /* nazwa shopera */
					$_SESSION["avatar"] = $cursor['user_data']['logo']; /* logo shopera */
					
					$updateResult = $collection->updateOne(
						[ 'login' => $l ],
						[ '$set' => [ 'token' => $token ]]
					);
								
				} else {
					$arr[] = 'Błędne hasło!';
					$enc = json_encode($arr);
					echo $enc;
					};
			
		} else {
					$arr[] = 'Brak takiego konta!';
					$enc = json_encode($arr);
					echo $enc;
		}
		


;?>