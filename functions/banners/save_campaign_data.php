<?php 

	include $_SERVER['DOCUMENT_ROOT'].'/config.php';
	use Paynow\Environment;
	session_start();
	
	$stoken = $_SESSION['token'];
	$collection = $db->selectCollection('users');
	$sQuery = array('token' => $stoken);	
	$cursor = $collection->findOne($sQuery);
	
	if (isset($_POST['email'])) {
		$email = $_POST['email'];
	} else {
		$email = $cursor['user_data']['contact']['company_register_contact_email'];
	}
	
	if ($cursor['login']) {
		
		/* 1. Płatność */

		$client = new \Paynow\Client('443ff69e-50ee-4a5a-8f4c-8af82e11fb1f', '486d7d5c-f87a-4f66-94e9-0994e991b726', Environment::SANDBOX);
		$orderReference = rand();
		$idempotencyKey = uniqid($orderReference . '_');

		$paymentData = [
			"amount" => $_POST['p'],
			"currency" => "PLN",
			"externalId" => $orderReference,
			"description" => $cursor['user_data']['contact']['company_full_name']." - ".$_POST['type']." - ".$_POST['cat'],
			"buyer" => [
				"email" => $email
			]
		];

		try {
			$payment = new \Paynow\Service\Payment($client);
			$result = $payment->authorize($paymentData, $idempotencyKey);
			$response = $result;
		} catch (PaynowException $exception) {
			$response = $exception;
		}
		
		/* 2. Dane kampanii do bazy */
		
		$col_campaigns =  $db->selectCollection('campaigns');
		$timestamp = time(); 

		$insertOneResult = $col_campaigns->insertOne([
				'login'=>$cursor['login'],
				'firma'=>$cursor['user_data']['contact']['company_full_name'],
				'total_price' => $_POST['p']/100,
				'type'=>$_POST['type'],
				'regions'=>$_POST['regions'],
				'cat'=>$_POST['cat'],
				'img'=>$_POST['img'],
				'url'=>$_POST['url'],
				'acceptance'=>'no',
				'data'=> date("F d, Y h:i:s A", $timestamp)
				/* start i end dopiero przy akceptacji */
			]);
		
		/* zwróć dane płatności i id kampanii */
		$dec = json_decode(json_encode($response), true);
		
		$dec['campaign_id'] = (string)$insertOneResult->getInsertedId();
		$dec['type'] = 'banner'; 		
		echo json_encode($dec);
	
	} else {
		
		echo 'notlogged';
		
	}
	
;?>
	


