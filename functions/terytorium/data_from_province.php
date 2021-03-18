<?php 

	$file = file_get_contents($_SERVER['DOCUMENT_ROOT'].'/kats/terytorium_new1.json');
	$json = json_decode($file,true);
	
	$woj_kod = $_POST['woj_kod'];
	$pow_kod = $_POST['pow_kod'];

if ($_POST['get_powiaty'] == 1) {

	foreach ($json as $key => $data) {

		if (
			$data["WOJ"] == $woj_kod &&
			($data["NAZWA_DOD"] == 'miasto na prawach powiatu' ||
			 $data["NAZWA_DOD"] == 'miasto stołeczne, na prawach powiatu')

		) {
			$miasta[] = [
				'nazwa' => $data['NAZWA'],
				'kod' => $data['POW']
			];
		}

		if (
			$data["WOJ"] == $woj_kod &&
			$data["NAZWA_DOD"] == 'powiat'
		) {
			
			$powiaty[] = [
				'nazwa' => ucfirst($data['NAZWA']),
				'kod' => $data['POW'],
				'dopisek' => [$data['DOPISEK'][0],$data['DOPISEK'][1]]
			];
			
		};
		
	};

	$return = ['miasta'=>$miasta,'powiaty'=>$powiaty];
	echo json_encode($return);

} 

if ($_POST['get_mg'] == 1) {

	foreach ($json as $key => $data) {

		if (
			$data["WOJ"] == $woj_kod &&
			$data["POW"] == $pow_kod && 
			$data["GMI"] !== "" &&
			$data["RODZ"] !== ""
		) {
			$mg[] = [
				'nazwa' => $data['NAZWA'],
				'kod' => $data['GMI'],
				'rodz' => $data['RODZ'],
				'dopisek' => $data['NAZWA_DOD']
			];
		};

	};

	echo json_encode($mg);

} 

;?>