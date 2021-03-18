<?php 
	
	$file = file_get_contents($_SERVER['DOCUMENT_ROOT'].'/kats/search_index.json');
	$json = json_decode($file,true);
	
	$key = array_search($_POST['province'], array_column($json, 'url'));
	
	foreach (	$json[$key]['subregions'] as $subregion) {
		$subregions[] = [
			'url'=>$subregion['url'],
			'name_long'=>$subregion['name_long']
		];
	}

	echo json_encode($subregions);

;?>