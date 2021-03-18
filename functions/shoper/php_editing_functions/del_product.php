<?php 

include $_SERVER['DOCUMENT_ROOT'].'/config.php';
$col_prod = $db->selectCollection('prod');	

session_start();
$pid = substr($_POST['pid'],0,24);

/* zobaczyć czy ten produkt jest przypisany do urla wziętego z tokena z sesji */


$col_prod->deleteOne( array( '_id' => new MongoDB\BSON\ObjectID($pid) ) );

function deleteDirectory($dir) {
    if (!file_exists($dir)) {
        return true;
    }

    if (!is_dir($dir)) {
        return unlink($dir);
    }

    foreach (scandir($dir) as $item) {
        if ($item == '.' || $item == '..') {
            continue;
        }

        if (!deleteDirectory($dir . DIRECTORY_SEPARATOR . $item)) {
            return false;
        }

    }

    return rmdir($dir);
}


deleteDirectory($user_upload . $_SESSION['url'] . $user_shoper_offers_gallery .   $pid  	);


;?>