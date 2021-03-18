<?php

	include $_SERVER['DOCUMENT_ROOT'].'/config.php';
	$collection = $db->selectCollection('users');
	
	$sQuery = array('login' => $_POST['fbid']);	
	$cursor = $collection->findOne($sQuery);
			
		if ($cursor != '') {
	
			session_start();
			$_SESSION["token"] = $_POST['fbatoken'];

			/* Jeśli jest shoper, to uzupełnij dane w sesji */

			if ($cursor['url']) {
				$_SESSION["url"] = $cursor['url'];
				$_SESSION["name"] = $cursor['user_data']['logo_text']; /* nazwa shopera */
				$_SESSION["avatar"] = $cursor['user_data']['logo']; /* logo shopera */			
			}

			$updateResult = $collection->updateOne(
				[ 'login' => $_POST['fbid'] ],
				[ '$set' => [ 'token' => $_POST['fbatoken'] ]]
			);
	
			echo 'logged';
	
		} else {
			echo 'no_account';
		}
;?>