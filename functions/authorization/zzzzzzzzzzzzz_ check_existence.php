<?php

	$url = $_POST['url'];
	
	include $_SERVER['DOCUMENT_ROOT'].'/config.php';
	$col_users = $db->selectCollection('users');

	$user_query = array('url' => $url);
	$user = $col_users->findOne($user_query);
	
	if ($url == $user['url']) {
		echo 'exist';
	} else {
		echo 'no_exist';
	}

;?>