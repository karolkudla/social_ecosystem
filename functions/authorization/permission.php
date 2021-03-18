<?php
	
$a = $_POST['action'];
$f = $_POST['f'];

function permission($a) {

	include $_SERVER['DOCUMENT_ROOT'].'/config.php';
	$col_users = $db->selectCollection('users');

	$perms = [
		'std' => [],
		'level1' => ['banners'],
		'level2' => ['banners','shoper'],
		'level3' => ['social']
	];

	session_start();
	$s_token = $_SESSION['token'];
	$check_token = array('token' => $s_token);
	$user = $col_users->findOne($check_token);
	$db_token = $user['token'];

	if (!empty($s_token) && !empty($db_token)) {
		
		$role = $user['user_type'];
		$state = $user['user_data']['state'];
		$url = $user['url'];
		$login = $user['login'];
						
			switch ($a[0]) {
				
				/* Wymienić login i url na uid ????? */
				
				/**************************************************************/
				case "0":
				
				if ($s_token !== '' && $s_token == $db_token) {
					$flaga = ['status'=>'ok'];
				} else {
					$flaga = ['status'=>'Zaloguj się.','user_type'=>$role];
				}
				
				break;
				/**************************************************************/
				case "1":
							
				if (($s_token !== '') && ($s_token == $db_token) && ($url == $a[2])) {
					$flaga = ['status'=>'ok','state'=>$state];
				}	else {$flaga = ['status'=>'Próbujesz edytować nie swoje konto.'];}
					
				break;
				/**************************************************************/
				case "2":

				if ($s_token !== '' && $s_token == $db_token) {
					foreach ($perms as $perm_name => $perm_for) {
						if ($role == $perm_name) {
							
							foreach ($perm_for as $param) {
						
									if ($a[1] == $param) {
										$flaga = ['status'=>'ok','id'=>$user['_id'],'role'=>$user['user_type']];
										break;
									} else {
										$flaga = ['status'=>'Wykup inny pakiet, aby mieć dostęp do tej usługi.'];
									}
								
							}
						break;
						}
					}
				}	else {$flaga = ['status'=>'Zaloguj się.'];}
				break;
				/**************************************************************/
				case "3":
							
				if (($s_token !== '') && ($s_token == $db_token) && ($login == $a[2])) {
					$flaga = ['status'=>'ok','state'=>$state];
				}	else {$flaga = ['status'=>'Próbujesz edytować nie swoje konto.'];}
					
				break;
				/**************************************************************/
			}		
	} else {$flaga = ['status'=>'Zaloguj się.'];}

	return $flaga;
	
}

if ($f == 'y') {
	/* Frontend */
	echo json_encode(permission($a));
}

;?>