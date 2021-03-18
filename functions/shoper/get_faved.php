<?php

session_start();
$faved = $_SESSION['favorited'];

echo json_encode($faved);

?>