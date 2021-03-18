<?php 

	$col_users= $db->selectCollection('users');
	$user = $col_users->findOne(['login' => $p['login']]);

	if ($user['reg_form'] == 'fb') {
		
		if ($p['bonus_name'] !== null || $p['bonus_email'] !== null) {
			
			$email = $p['bonus_email'];
			$name = $p['bonus_name'];
			$avatar = '<div class="user_avatar_one_offer"><div class="lh_1 fw-500">VG</div><div class="fs-13">Użytkownik</div></div>';
			
		}
		
		if ($p['bonus_name'] == null && $p['bonus_email'] == null) {
		
			$email = $user['fb_email'];
			$avatar = '<img src="https://graph.facebook.com/'.$user['login'].'/picture?type=large">';
			$name = $user['fb_name'];
		
		}
		
	}
	
	if ($user['reg_form'] == 'email') {
		
		if ($p['bonus_name'] !== null && $p['bonus_email'] !== null) {
			
			$email = $p['bonus_email'];
			$name = $p['bonus_name'];
			$avatar = '<div class="user_avatar_one_offer"><div class="lh_1 fw-500">VG</div><div class="fs-13">Użytkownik</div></div>';
			
		}
		
		if ($p['bonus_name'] == null && $p['bonus_email'] == null) {
			
			$name = $user['name'];
			$email = $user['login'];
			$avatar = '<div class="user_avatar_one_offer"><div class="lh_1 fw-500">VG</div><div class="fs-13">Użytkownik</div></div>';
	
		}
	
	}
	
	$tel = $p['product_data']['telefon']['tel_kontaktowy']['value'];
	$woj_v = $p['product_data']['lokalizacja_oferty']['lokalizacja_wojewodztwo']['value'];
	$pow_v = $p['product_data']['lokalizacja_oferty']['lokalizacja_powiat']['value'];
	$gmi_v = $p['product_data']['lokalizacja_oferty']['lokalizacja_miasto']['value'];
	
	if ($woj_v !== 'Województwo') {$woj = $woj_v;} else {$woj = '';}
	if ($pow_v !== 'Miasto / Powiat') {$pow = $pow_v;} else {$pow = '';}
	if ($gmi_v !== 'Miasto / Gmina') {$gmi = $gmi_v;} else {$gmi = '';}
		
;?>



<div class="shoper_product_person shop_menu">

			<div class="shoper_product_user_profile"><?php echo $avatar;?></div>
			
			<div class="user_profile_info">
				
				<div class="shoper_product_user_profile_info--name">
				
					<?php echo $name;?>
				
				</div>
				<div class="shoper_product_user_profile_info--slogan">Wystawca ogłoszenia</div>
				
				<div class="user_profile_info--icons">
				
				<?php if ($tel) { ;?>
					<div class="vg_circle user_profile_phone_click"><img src="https://vg.wokulski.online/img/shoper_product/phone.svg" style="width: 20px;"></div>
				<?php };?>	
				
				<?php if ($email) {;?>	
					<div class="vg_circle user_profile_email_click"><img src="https://vg.wokulski.online/img/shoper_product/mail.svg" style="width: 25px;"></div>
				<?php };?>	
					
					<div class="user_profile_phone hidden_user_data flex-middle space-between"><span>tel. <a href="tel:<?php echo $tel;?>"><?php echo $tel;?></a></span><span class="icon-cross hide_user_data" style="font-size: 18px;"></span></div>
					<div class="user_profile_email hidden_user_data flex-middle space-between"><span><?php echo $email;?></span><span class="icon-cross hide_user_data" style="font-size: 18px;"></span></div>
					
					
					
				</div>

				<div class="user_profile_localisation"><?php echo $woj;?></div>
				<div class="user_profile_localisation"><?php echo $pow;?></div>
				<div class="user_profile_localisation"><b><?php echo $gmi;?></b></div>
				
				

			</div>
		
	</div>