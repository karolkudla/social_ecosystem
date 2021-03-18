<?php 

	include $_SERVER['DOCUMENT_ROOT'].'/config.php';
	
	$col_prod = $db->selectCollection('prod');
	$prod = $col_prod->findOne(['_id' => new MongoDB\BSON\ObjectID($_POST['pid'])]);
	
	if ($_POST['param'] == 'email') {
		
		$col_users = $db->selectCollection('users');
		$user = $col_users->findOne(['_id' => new MongoDB\BSON\ObjectID($prod['uid'])]);
		
		/* fb email */
		/* normal email */
		/* bonus email */
	
		if ($user['reg_form'] == 'fb') {
			
			echo $prod['bonus_email'];

		}
		
		if ($user['reg_form'] == 'email') {
			
			if ($user['bonus_email'] !== null) {
				$email = $user['bonus_email'];
			}
			
			if ($user['bonus_email'] == null) {
				$email = $user['login'];
			}
		}

		echo json_encode($email);
		
	}
	
	if ($_POST['param'] == 'tel') {
		
		echo json_encode($prod['product_data']['telefon']['tel_kontaktowy']['value']);
		
	}
	
	
;?>