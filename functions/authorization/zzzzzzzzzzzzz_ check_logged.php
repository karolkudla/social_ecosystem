<?php

include $_SERVER['DOCUMENT_ROOT'].'/config.php';
include 'permission.php';

$check_perm = [2,'open'];
$p = permission($check_perm);

if ($p['status'] == 'ok') { 

	$data = ['login'=>$p['login'],'logo_text'=>$p['logo_text'],'logo'=>$p['logo']];

} else {
	
	$data = ['info'=>'denied'];
	
}

$json = json_encode($data);
echo $json;

?>