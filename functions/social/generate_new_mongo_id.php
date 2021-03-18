<?php 

include $_SERVER['DOCUMENT_ROOT'].'/config.php'; 
$generated_id = new MongoDB\BSON\ObjectID();
echo $generated_id;

;?>