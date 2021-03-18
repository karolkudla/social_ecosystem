<div style="width: 70%;">

<?php
/*
	include $_SERVER['DOCUMENT_ROOT'].'/config.php';
	session_start();	
	$s_token = $_SESSION['token'];
	
		if ($s_token) {
			$collection = $db->selectCollection('users');
			$sQuery = array('token' => $s_token);	
			$user = $collection->findOne($sQuery);
			
			if ($user['login'] !== null && $user['login'] !== '' && $user['r'] == 'vokulsky') {
				
				
				$non_verified_confirmed_q = [
					'transaction_history.type'=>'verification',
					'transaction_history.status'=>'CONFIRMED'
				];
				
				$non_verified_unconfirmed_q = [
					'transaction_history.type'=>'verification',
					'transaction_history.status'=>'UNCONFIRMED'
				];
				
				$non_verified_confirmed_companys = $collection->find($non_verified_confirmed_q);
				$non_verified_unconfirmed_companys = $collection->find($non_verified_unconfirmed_q);

;?>


	<div class="flex">
	
		<div class="w-100">
			
			<?php
				foreach ($non_verified_confirmed_companys as $key => $data) {
			;?>
					<div>
						<div><?php echo $data['user_data']['contact']['company_full_name'];?></div>
						
						<?php if ($data['reg_form'] == 'fb') {;?>
							<div>Profil FB konta: <a href="https://facebook.com/profile.php?<?php echo $data['login'];?>" target="_blank"><?php echo $data['fb_name'];?></a></div>
						<?php;};?>
							
						<div><?php echo $data['user_data']['contact']['company_represent_person_name'];?></div>
						<div><?php echo $data['user_data']['contact']['company_register_contact_name'];?></div>
						<div><?php echo $data['user_data']['contact']['company_register_contact_email'];?></div>
						<div><?php echo $data['user_data']['contact']['company_register_contact_phone'];?></div>
						<div><?php echo $data['user_data']['contact']['street'];?></div>
						<div><?php echo $data['user_data']['contact']['local_num'];?></div>
						<div><?php echo $data['user_data']['contact']['postal_code'];?></div>
						<div><?php echo $data['user_data']['contact']['city'];?></div>
						<div><?php echo $data['user_data']['contact']['NIP'];?></div>
						<div><?php echo $data['user_data']['contact']['REGON'];?></div>
					
					</div>
			<?php
				}
			;?>
			
		</div>
		
		<div class="w-100">
		
			<?php
				foreach ($non_verified_unconfirmed_companys as $key => $data) {
			;?>
					
					
			<?php
				}
			;?>
		
		</div>
		
	</div>

<?php }} */ ;?>

</div>
