<?php

	include $_SERVER['DOCUMENT_ROOT'].'/config.php';
	$offer_id = $_POST['offer_id'];	
	$coll_prod = $db->selectCollection('prod');
	
	/* przypadek błędnego id (inna niż 24 znaki) ogłoszenia lub braku ogłoszenia */
	
	$p = $coll_prod->findOne(['_id' => new MongoDB\BSON\ObjectID($offer_id)]);

	$gallery_img_path  =  $user_download   .	  substr($p['uid'],0,24) .	 $user_simple_offers_gallery  .   $p['_id']    ."/";

?>

<div class="offer_product_header">
		<div class="shoper_product_title">
		
			<?php 
				if ($p['state'] == 'new') {echo '(Nieopublikowana) - ';};
				if ($p['title']) {echo $p['title'];} else {echo 'Brak tytułu oferty.';};
			;?>
			
			<?php if ($p['link']) {
			
				$arrParsedUrl = parse_url($p['link']);
				if (!empty($arrParsedUrl['scheme']))
				{
					// Contains http:// schema
					if ($arrParsedUrl['scheme'] === "http")
					{
						$link = $p['link'];
					}
					// Contains https:// schema
					else if ($arrParsedUrl['scheme'] === "https")
					{
						$link = $p['link'];
					}
				}
				// Don't contains http:// or https://
				else
				{
					$link = "https://".$p['link'];
				}
				
			;?>
			<div class="fs-12 fw-300">
				Link do oferty w innym serwisie: <a href="<?php echo $link;?>" target="_blank">Klik!</a>
			</div>
			<?php };?>
		
		</div>

		<div class="fw-500" style="font-size: 24px;">
			<?php if ($p['cats'][0] == 'Praca') {	echo '<span class="fs-13">wynagrodzenie </span>'.$p['product_data']['warunki']['wynagrodzenie_kwota']['value']	;};?>
			<?php if ($p['product_data']['cennik']['cena_brutto_wartosc']['value']) {echo $p['product_data']['cennik']['cena_brutto_wartosc']['value']." <span class='fs-13'>PLN</span>";};?> 
		</div>

</div>

<div class="shoper_product_two_cols">

		<?php 
			if (($p['images']) && ($p['images'] !== 'null')) {
		;?>
		<div class="shoper_product_gallery">
		<?php
			foreach ($p['images'] as $img) {

				if ($img !== "") {echo '<img src="'.	$user_download	.  $p['uid']  .	  $user_simple_offers_gallery  .   $p['_id']   ."/big-".   $img     .'">';};

			}
		;?>
		</div>
		<?php
			} else {echo "<div class='shoper_product_gallery'><img src='https://vokulsky.pl/img/ogloszenia/placeholder.webp'></div>";}
		;?>
	
		<?php include 'user_profile.php';?>
	
</div>

<div class="user_profile_shoper_banner">
	<div class="user_profile_shoper_banner--links" product_id="<?php echo $p['_id'];?>">
		<div class="one_offer_desc_link">Opis</div>
		<div class="horizontal_sep"></div>
		<div class="one_offer_specs_link">Specyfikacja</div>
		<div class="horizontal_sep"></div>
		<div class="one_offer_multimedia_link">Multimedia</div>
	</div>
	
	<div class="one_offer_cards_data">
		<div class="one_offer_card one_offer_description">
		<?php if ($p['product_data']['podstawowe_dane']['opis_oferty']['value']) {echo nl2br($p['product_data']['podstawowe_dane']['opis_oferty']['value']);} else {echo 'Brak opisu.';};?>
	</div>
		
</div>


