<?php
	include $_SERVER['DOCUMENT_ROOT'].'/config.php';
	
	$col_prod = $db->selectCollection('prod');
	
	$filter = [
		'offer_type'=>'simple_offer',
		'acceptance'=>'no'
	];
	
	$p = $col_prod->findOne($filter);
	

	/* ******************************************************************* */

	$gallery = $p['images'];
	$gallery_img_path  =  $user_download   .	  $p['uid'] .	 $user_simple_offers_gallery  .   $p['_id']    ."/";

	if ($p['login']) {

?>

<div style="width: 70%; padding: 20px;">

<div class="flex p10_0" style="border-radius: 25px; background: whitesmoke;">
	<div class="blue_btn accept_this_offer" style="background: #8bc34a;" pid="<?php echo $p['_id'];?>">Akceptuj</div>
	<div class="blue_btn reject_this_offer" style="background: lightgrey;" pid="<?php echo $p['_id'];?>">Odrzuć</div>
	<textarea class="why_rejected" style="width: 75%;" placeholder="Powód odrzucenia"></textarea>
</div>

<div class="flex wrap">
	<label class="flex-middle importance_choose ic-covid"><input type="radio" name="importance_type" class="imp_type" value="1">Transport medyczny</label>
	<label class="flex-middle importance_choose ic-covid"><input type="radio" name="importance_type" class="imp_type" value="2">Dezynfekcja</label>
	<label class="flex-middle importance_choose ic-covid"><input type="radio" name="importance_type" class="imp_type" value="3">Apteki</label>
	<label class="flex-middle importance_choose ic-covid"><input type="radio" name="importance_type" class="imp_type" value="4">Sanepid</label>
	<label class="flex-middle importance_choose ic-covid"><input type="radio" name="importance_type" class="imp_type" value="5">Lekarze</label>
	<label class="flex-middle importance_choose ic-covid"><input type="radio" name="importance_type" class="imp_type" value="9">Oddział zakaźny</label>
	<label class="flex-middle importance_choose ic-covid"><input type="radio" name="importance_type" class="imp_type" value="10">Akcesoria dla zdrowia</label>
	<label class="flex-middle importance_choose ic-covid"><input type="radio" name="importance_type" class="imp_type" value="11">Pozostałe pomoce</label>
</div>

<div class="flex wrap">
	<label class="flex-middle importance_choose ic-firmy"><input type="radio" name="importance_type" class="imp_type" value="20">Prawo</label>
	<label class="flex-middle importance_choose ic-firmy"><input type="radio" name="importance_type" class="imp_type" value="21">Finanse</label>
	<label class="flex-middle importance_choose ic-firmy"><input type="radio" name="importance_type" class="imp_type" value="22">Wsparcie sprzedażowe</label>
	<label class="flex-middle importance_choose ic-firmy"><input type="radio" name="importance_type" class="imp_type" value="23">Producenci</label>
	<label class="flex-middle importance_choose ic-firmy"><input type="radio" name="importance_type" class="imp_type" value="24">Transport / Logistyka</label>
	<label class="flex-middle importance_choose ic-firmy"><input type="radio" name="importance_type" class="imp_type" value="25">Pozostałe</label>
</div>

<div class="flex wrap">
	<label class="flex-middle importance_choose ic-codziennosc"><input type="radio" name="importance_type" class="imp_type" value="6">Mieszkania na kwarantannę</label>
	<label class="flex-middle importance_choose ic-codziennosc"><input type="radio" name="importance_type" class="imp_type" value="7">Posiłki</label>
	<label class="flex-middle importance_choose ic-codziennosc"><input type="radio" name="importance_type" class="imp_type" value="8">Zakupy z dowozem</label>
	<label class="flex-middle importance_choose ic-codziennosc"><input type="radio" name="importance_type" class="imp_type" value="33">Przydatne usługi</label>
</div>

<div style="background: whitesmoke; padding: 15px; border-radius: 15px;">

	<div class="offer_product_header">
		<div class="shoper_product_header--left">
			<div class="shoper_product_title">
			
				<div>
				<?php 
					if ($p['state'] == 'new') {echo '(Nieopublikowana) - ';};
					if ($p['title']) {echo $p['title'];} else {echo 'Brak tytułu oferty.';};
				;?>
				</div>
				
				<?php if ($p['link']) {;?>
				<div class="fs-12 fw-300">
					Link do oferty w innym serwisie: <a href="<?php echo $p['link'];?>"><?php echo $p['link'];?></a>
				</div>
				<?php };?>
			
			</div>
		</div>
		<div class="shoper_product_header--right">
			
			<div>
				<!-- jeżeli praca to wynagrodzenie -->
				<?php echo $p['product_data']['cennik']['cena_brutto_wartosc']['value'];?> PLN
			</div>

		</div>
	</div>

	<div class="shoper_product_two_cols">

			<?php 
				if ($gallery) {
			;?>
			<div class="shoper_product_gallery">
			<?php
				foreach ($gallery as $img) {
			;?>
					<img src="<?php echo $gallery_img_path."big-".$img;?>">
			<?php
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
		
	</div>

</div>

	<?php } else {
		
;?>


	<div class="flex-center-middle" style="height: 200px;">
		Nic więcej.
	</div>


<?php
		
		
	};?>