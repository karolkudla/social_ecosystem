<?php

include $_SERVER['DOCUMENT_ROOT'].'/config.php';

$col_prod = $db->selectCollection('prod');

if ($_POST['imp_type'] !== '') {
	$importance = 'yes';
}

if ($_POST['imp_type'] == null || $_POST['imp_type'] == '') {
	$importance = 'no';
}

if ($_POST['acre'] == 'accept') {

	$updateResult = $col_prod->updateOne(
			[ '_id' => new MongoDB\BSON\ObjectID( $_POST['offer_id'] ) ],
			[ '$set' => [ 
							'acceptance'=>'yes',
							'acceptance_info'=>'',
							'imp_type'=>$_POST['imp_type'],
							'importance'=>$importance
						]
			]
		);	

}

if ($_POST['acre'] == 'reject') {

	$updateResult = $col_prod->updateOne(
			[ '_id' => new MongoDB\BSON\ObjectID( $_POST['offer_id'] ) ],
			[ '$set' => [ 
							'acceptance_info'=>$_POST['why'],
							'acceptance'=>'no_info',
							'imp_type'=>$_POST['imp_type'],
							'importance'=>$importance
						]
			]
		);	

}


	
;?>