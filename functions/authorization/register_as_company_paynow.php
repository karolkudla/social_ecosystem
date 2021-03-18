<?php	
	include $_SERVER['DOCUMENT_ROOT'].'/config.php';
	
	use Paynow\Environment;
	
	$cd = $_POST['company_data'];

	$client = new \Paynow\Client('443ff69e-50ee-4a5a-8f4c-8af82e11fb1f', '486d7d5c-f87a-4f66-94e9-0994e991b726', Environment::SANDBOX);
	
	$orderReference = rand();
	$idempotencyKey = uniqid($orderReference . '_');

	$paymentData = [
		"amount" => 100,
		"currency" => "PLN",
		"externalId" => $orderReference,
		"description" => "Weryfikacja firmy - ".$cd['company_full_name'],
		"buyer" => [
			"email" => $cd['company_register_contact_email']
		]
	];

	try {
		$payment = new \Paynow\Service\Payment($client);
		$result = $payment->authorize($paymentData, $idempotencyKey);
		$response = $result;
	} catch (PaynowException $exception) {
		$response = $exception;
	}
	
	echo json_encode($response);
	
;?>