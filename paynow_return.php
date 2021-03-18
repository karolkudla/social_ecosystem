<?php
	include $_SERVER['DOCUMENT_ROOT'].'/config.php';
;?>

<link rel="stylesheet" type="text/css" href="<?php echo $path;?>css/style.css?<?php echo $ver;?>">
<link rel="stylesheet" type="text/css" href="<?php echo $path;?>css/edit_access.css?<?php echo $ver;?>">
<link href="https://fonts.googleapis.com/css?family=Hind:100,300,400,500,600" rel="stylesheet">

<?php

	/* Szuka w historii płatności tego ID */
	/* transaction history - paynow - paymentId
	/* Jak znajdzie to dopisuje CONFIRMED */
	/* Sprawdza jaki type - verification czy banner - jeśli banner to dopisuje confirmed do kolekcji campaign */
	/* Na końcu wyświetla informacje */

	$col_u = $db->selectCollection('users');
	$col_c = $db->selectCollection('campaigns');
	
	$paymentId = $_GET['paymentId'];
	$paymentStatus = $_GET['paymentStatus'];
	
	$query = ['transaction_history.paymentId'=>$paymentId];
	$cursor = $col_u->findOne($query);

	if ($cursor !== NULL) {
		
		$transaction_data = $cursor['transaction_history'];
		$dec = json_decode(json_encode($transaction_data), true);
		$key = array_search($paymentId, array_column($dec, 'paymentId'));

		$updateResult = $col_u->updateOne(
					[ 'transaction_history.paymentId' => $paymentId ],
					[ '$set' => [ 
									'transaction_history.'.$key.'.status' => 'CONFIRMED'
								]
					]
				);	
	
		/* Jeśli to płatność za kampanię, to dodaje rekord o płatności w kolekcji Kampanii */
		if ($transaction_data[$key]['type'] == 'banner') {
			$cid = $transaction_data[$key]['campaign_id'];
			
			$updateResult = $col_c->updateOne(
					[ '_id' => new MongoDB\BSON\ObjectID($cid) ],
					[ '$set' => [ 
									'paynow' => 'CONFIRMED'
								]
					]
				);
			
		} 

		if ( $paymentStatus == 'CONFIRMED'	) { 

		;?>

			<div class='flex-center-middle' style='height: 100%'>
				<div class='flex-center-column'>
					<div class='about_info'>Dziękujemy,</div>
					<div class='shoper_editor_additional_info'>nasi moderatorzy weryfikują treść zgłoszenia</div>
					<div class='shoper_editor_additional_info'>Powiadomimy Cię, gdy weryfikacja dobiegnie końca.</div>
					<div class="blue_btn"><a href="https://vokulsky.pl">Przejdź do strony głównej</a></div>
				</div>
			</div>

		<?php } else { ;?>

			<div class='flex-center-middle' style='height: 100%'>
				<div class='flex-center-column'>
					<div class='about_info'>Płatność nie została potwierdzona,</div>
					<div class='shoper_editor_additional_info'>Jeśli uważasz, że to błąd, skontaktuj się z nami. Podczas kontaktu podaj ten numer płatności: <?php echo $paymentId;?></div>
					<div class="blue_btn"><a href="https://vokulsky.pl">Przejdź do strony głównej</a></div>
				</div>
			</div>

		<?php };
		
			} else {
				
		;?>
		
			<div class='flex-center-middle' style='height: 100%'>
				<div class='flex-center-column'>
					<div class='about_info'>Brak takiej transakcji</div>
					<div class="blue_btn"><a href="https://vokulsky.pl">Przejdź do strony głównej</a></div>
				</div>
			</div>
		
		<?php
				
			}
	
;?>




