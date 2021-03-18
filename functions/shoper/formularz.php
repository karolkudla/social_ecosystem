<?php

$to = $_POST['to'];
$e = $_POST['e'];
$msg = $_POST['msg'];

$subject = "Wiadomość z formularza Innowacje od: ".$e."";
$headers = "reply-to: ".$e."";

mail($to,$subject,$msg,$headers);

?>