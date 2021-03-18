<?php

	include $_SERVER['DOCUMENT_ROOT'].'/config.php';
	$prod_id = $_POST['product_id'];	/* offer id ?????? */
	$coll_prod = $db->selectCollection('prod');
	$p = $coll_prod->findOne(['_id' => new MongoDB\BSON\ObjectID($prod_id)]);
	
	$gallery = json_decode($p['pos']);
	
	$gallery_img_path  =  $user_download   .	  $p['url'] .	 $user_shoper_offers_gallery  .   $p['_id']    ."/";

	if (	$p['profile']	) {		
		$person_img_path  =   $user_download   .	  $p['url'] .	 $user_shoper_offers_gallery  .   $p['_id']    ."/".   $p['profile'];	
	}
	else {	
	
		$col_user = $db->selectCollection('users');
		$user = $col_user->findOne(['url' => $p['url']]);
		$alternative_profile = $user['user_data']['logo'];
	
		$person_img_path  =   $user_download   .	  $p['url'] .	 $user_shoper_avatar  .   $alternative_profile;
	}
	
	

?>

<div class="shoper_product_header">
	<div class="shoper_product_header--left">
		<div class="shoper_product_title">
		
			<?php 
				if ($p['state'] == 'new') {echo '(Nieopublikowana) - ';};
				if ($p['title']) {echo $p['title'];} else {echo 'Brak tytułu oferty.';};
			;?>
		
		</div>
	</div>
	<div class="shoper_product_header--right">
		
		<div>
			<?php 
				echo "<span style='font-size: 13px;'>".$p['product_data']['cennik']['cena']['text_value']." </span>";
				
				if ($p['product_data']['cennik']['cena']['value'] == 'cena_netto') {echo $p['product_data']['cennik']['cena_netto_wartosc']['value'];}
				if ($p['product_data']['cennik']['cena']['value'] == 'cena_brutto') {echo $p['product_data']['cennik']['cena_brutto_wartosc']['value'];}
				
				echo "<span style='font-size: 13px;'> ".$p['product_data']['cennik']['waluta_rozliczeniowa']['value']." </span>";
			;?>
		</div>

	</div>
</div>

<!--
<div class="shoper_product_header_buttons">
	<div class="blue_btn p_add_to_cart" pid="<?php echo $prod_id;?>">Kup teraz</div>
	<div class="blue_btn p_buy_now" pid="<?php echo $prod_id;?>">Dodaj do koszyka</div>
</div>
-->

<div class="shoper_product_two_cols">

		<?php 
			if (($p['pos']) && ($p['pos'] !== 'null')) {
		;?>
		<div class="shoper_product_gallery">
		<?php
			foreach ($gallery as $img) {
		;?>
				<img src="<?php echo $gallery_img_path.$img;?>">
		<?php
			}
		;?>
		</div>
		<?php
			} else {echo "<div class='flex-center-middle' style='width: 80%;'>Brak zdjęć.</div>";}
		;?>
	
	
	<div class="shoper_product_person">

			<div class="shoper_product_user_profile"><img src="<?php echo $person_img_path;?>"></div>
			
			<div class="user_profile_info">
				
				<div class="shoper_product_user_profile_info--name">
				
				<?php if ($p['product_data']['dane_opiekuna']['opiekun_imie_nazwisko']['value']) {echo $p['product_data']['dane_opiekuna']['opiekun_imie_nazwisko']['value'];} else {echo $p['product_data']['dane_opiekuna']['opiekun_firma_nazwa']['value'];};?>
				
				</div>
				<div class="shoper_product_user_profile_info--slogan">Opiekun produktu</div>
				
				<div class="user_profile_info--icons">
					<div class="vg_circle"><img src="https://vokulsky.pl/img/shoper_product/phone.svg" style="width: 20px;"></div>
					<div class="vg_circle"><img src="https://vokulsky.pl/img/shoper_product/mail.svg" style="width: 25px;"></div>
				</div>
				
				<div class="user_profile_info--extra"><?php if ($p['product_data']['dane_opiekuna']['opiekun_imie_nazwisko']['value']) {echo $p['product_data']['dane_opiekuna']['opiekun_firma_nazwa']['value'];};?></div>
				<div class="user_profile_info--extra"><span>Miasto </span><?php echo $p['product_data']['dane_opiekuna']['opiekun_firma_miasto']['value'];?></div>
				<div class="user_profile_info--extra"><span>Ulica </span><?php echo  $p['product_data']['dane_opiekuna']['opiekun_firma_ulica']['value'];?></div>
				<div class="user_profile_info--extra"><span>Kod pocztowy </span><?php echo  $p['product_data']['dane_opiekuna']['opiekun_firma_kod_pocztowy']['value'];?></div>
			</div>
		
	</div>
</div>

<div class="user_profile_shoper_banner">
	<div class="user_profile_shoper_banner--links" product_id="<?php echo $p['_id'];?>">
		<div class="shoper_product_desc_link">Opis</div>
		<div class="horizontal_sep"></div>
		<div class="shoper_product_specs_link">Specyfikacja</div>
		<div class="horizontal_sep"></div>
		<div class="shoper_product_multimedia_link">Multimedia</div>
		<div class="horizontal_sep"></div>
		<div class="">Komentarze</div>
	</div>
	
	<div class="shoper_product_cards_data">
		<div class="shoper_product_card shoper_product_description">
		<?php if ($p['desc']) {echo nl2br($p['desc']);} else {echo 'Brak opisu.';};?>
	</div>
		
</div>