<?php

	$region = $_POST['r'];
	$client_email = $_POST['ce'];
	$client_tel = $_POST['ctel'];
	$client_name = $_POST['cname'];
	$client_is = $_POST['cis'];
	$client_question_is = $_POST['cqis'];
	$client_question = $_POST['cq'];

	$message = 
	'Imię i nazwisko: '.$client_name."\r\n".
	'Tel.: '.$client_tel."\r\n".
	'E-mail: '.$client_email."\r\n".
	'Użytkownik: '.$client_is."\r\n".
	'Pytanie dotyczy: '.$client_question_is."\r\n".
	"Wiadomość: \r\n".wordwrap($client_question,70)."\r\n";
	
	mail("kontakt@vokulsky.pl",$client_name." - ".$client_is,$message);
	
;?>