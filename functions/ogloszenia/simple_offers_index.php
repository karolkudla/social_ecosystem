<?php
	include $_SERVER['DOCUMENT_ROOT'].'/config.php';
	$col_prod = $db->selectCollection('prod');
		
	$filter = ['state'=>'old','offer_type'=>'simple_offer','acceptance'=>'yes','importance'=>'yes'];
	$options = ['sort' => ['_id' => -1]];
	$prod = $col_prod->find($filter,$options);
		
	session_start();	
	$s_token = $_SESSION['token'];
	
		if ($s_token) {
			$collection = $db->selectCollection('users');
			$sQuery = array('token' => $s_token);	
			$cursor = $collection->findOne($sQuery);
			
			$ss = $col_prod->findOne(['imp_type'=>'4','localisation.WOJ'=>$cursor['province']]);
			$oz = $col_prod->findOne(['imp_type'=>'9','localisation.WOJ'=>$cursor['province']]);
			$pomoce = [$ss,$oz];
		};
		
		$ssm = $col_prod->findOne(['imp_type'=>'4','localisation.WOJ'=>'14']);
		$ozm = $col_prod->findOne(['imp_type'=>'9','localisation.WOJ'=>'14']);
		$pomoce_nologin = [$ssm,$ozm];
	
;?>


<div class="shop_menu" style="margin:0; border-bottom: 0;">

	<div class="flex bckg_w brt fs-13 bb-lg " style="">
	
		<div class="helper_filters_click flex-center-column fw-500" filter="covid" style="border-top: 4px solid rgb(24, 119, 242);"><img src="https://vg.wokulski.online/img/pomoc/maseczka.png" style="width: 40px;">&nbsp Wspieramy walkę z COVID-19</div>
		<div class="horizontal_sep"></div>
		<div class="helper_filters_click flex-center-column fw-500" filter="firmy"><img src="https://vg.wokulski.online/img/pomoc/pp.png" style="width: 40px;">&nbsp Wspieramy Polskie Firmy</div>
		<div class="horizontal_sep"></div>
		<div class="helper_filters_click flex-center-column fw-500" filter="codziennosc"><img src="https://vg.wokulski.online/img/pomoc/pl_serce.png" style="width: 40px;">&nbsp Wspieramy Codzienność</div>
		<div class="horizontal_sep"></div>
		<div class="helper_filters_click flex-center-column fw-500" filter="500b"><span style="color: #5e28c3; font-size: 24px;">500<sup>+</sup></span>&nbsp Bezpłatnych Ogłoszeń</div>
		
	</div>	
	
	<div class="pl-banner slider-wrapper" style="height: 260px; position: relative; overflow:hidden;">
		<div style="position: absolute; height: 100%; width: 30%; padding-left: 70px;">
			<div class="flex-middle fs-30 h-100">Wspieramy walkę z COVID-19</div>
		</div>
		<img class="bckg_test" src="https://vg.wokulski.online/img/pomoc/wspieramy_clean.jpg">
	</div>

</div>	
	
<!--	
	<div class="flex fs-13 fw-500 p10_0">
		<div class="menu_back_wrapper"></div>
		<div class="fcat"></div>
		<div class="categories_string"></div>
	</div>
	
	<div class="categories_list"></div>
-->

<div class="shop_menu">
	<div class="helper_filters fs-13 p10">

		<div class="flex">
			<img src="https://vg.wokulski.online/img/pomoc/maseczka.png" style="width: 40px; height: 40px;">
			<div class="flex-middle fw-500" style="font-size: 16px;">&nbsp Pomocne filtry</div>
		</div>	

		<div class="top_user_menu--sep"></div>

		<div class="flex" style="width: 100%; height: 130px;">

				<div class="pf_desktop desktop_cat flex-center-column w-100">
					<label class="flex-center-column " style="width:100%;"><img class="vg_icon invert_blue p10" src="https://vg.wokulski.online/img/pomoc_icons/transport.svg">Transport medyczny<input type="radio" name="importance_type" class="imp_type" value="1"></label>
				</div>
				
			<div class="sliding_sep"></div>
				
				<div class="pf_desktop desktop_cat flex-center-column w-100">
					<label class="flex-center-column" style="width:100%;"><img class="vg_icon invert_blue p10" src="https://vg.wokulski.online/img/pomoc_icons/wash.svg">Dezynfekcja<input type="radio" name="importance_type" class="imp_type" value="2"></label>
				</div>
				
			<div class="sliding_sep"></div>
					
				<div class="pf_desktop desktop_cat flex-center-column w-100">
					<label class="flex-center-column " style="width:100%;"><img class="vg_icon invert_blue p10" src="https://vg.wokulski.online/img/pomoc_icons/doctor.svg">Lekarze<input type="radio" name="importance_type" class="imp_type" value="5"></label>
				</div>
				
			<div class="sliding_sep"></div>
				
				<div class="pf_desktop desktop_cat flex-center-column w-100">
					<label class="flex-center-column " style="width:100%;"><img class="vg_icon invert_blue p10" src="https://vg.wokulski.online/img/pomoc_icons/hand-wash.svg">Akcesoria dla zdrowia<input type="radio" name="importance_type" class="imp_type" value="10"></label>
				</div>
				
			<div class="sliding_sep"></div>
				
				<div class="pf_desktop desktop_cat flex-center-column w-100">
					<label class="flex-center-column " style="width:100%;"><img class="vg_icon invert_blue p10" src="https://vg.wokulski.online/img/pomoc_icons/help.svg">Pozostałe pomoce<input type="radio" name="importance_type" class="imp_type" value="11"></label>
				</div>

		</div>
	
	</div>

	<div class="top_user_menu--sep"></div>

	<div class="simple_offers_search_engine" style="width: 100%;">
		<div class="shop_search">
			<div style="width: 70%;" class="search_container_phrase borr">
				<div class="shop_search_icon"><img src="https://vg.wokulski.online/img/shop/search.svg"></div>
				<input class="search_phrase borr" placeholder="Czego szukasz?">
			</div>
			
			<div style="width: 15%;" class="search_container search_container_price borr">
				<div class="shop_search_icon"><img src="https://vg.wokulski.online/img/shop/tag.svg"></div>
				<input class="price_from" placeholder="Cena od:">
			</div>
			
			<div style="width: 15%;" class="search_container search_container_price">
				<input class="price_to" placeholder="Cena do:">
			</div>
		</div>	
		<div class="shop_search">	
			<div class="search_container" style="border-top: 1px solid lightgray;">
				<select class="select_wojewodztwa" style="margin:0">
					<option value="0"					kod="">Województwo</option>
					<option value="dolnoslaskie" 		kod="02">Dolnośląskie</option>
					<option value="kujawsko-pomorskie" 	kod="04">Kujawsko Pomorskie</option>
					<option value="lubelskie" 			kod="06">Lubelskie</option>
					<option value="lubuskie" 			kod="08">Lubuskie</option>
					<option value="lodzkie" 			kod="10">Łódzkie</option>
					<option value="malopolskie" 		kod="12">Małopolskie</option>
					<option value="mazowieckie" 		kod="14">Mazowieckie</option>
					<option value="opolskie" 			kod="16">Opolskie</option>
					<option value="podkarpackie" 		kod="18">Podkarpackie</option>
					<option value="podlaskie" 			kod="20">Podlaskie</option>
					<option value="pomorskie" 			kod="22">Pomorskie</option>
					<option value="slaskie" 			kod="24">Śląskie</option>
					<option value="swietokrzyskie" 		kod="26">Świętokrzyskie</option>
					<option value="warminsko-mazurskie" kod="28">Warmińsko - Mazurskie</option>
					<option value="wielkopolskie" 		kod="30">Wielkopolskie</option>
					<option value="zachodniopomorskie" 	kod="32">Zachodniopomorskie</option>
				</select>
				<select class="select_powiaty" style="margin:0"><option value="" kod="">Miasto / Powiat</option></select>
				<select class="select_miasta_gminy" style="margin:0"><option value="" kod="" rodz="">Miejscowość / Gmina</option></select>
			</div>
			<!--<div class="grey_btn erase_pomoc_filters" style="width: 110px; border-radius: 0; font-size: 13px;">Wyczyść filtry</div>-->
			<button class="blue_btn search_simple_offers" style="border: 0; margin: 0; border-radius: 0 0 15px 0;">Szukaj</button>
		</div>
	</div>

</div>

	<div class="result_list" style="overflow: hidden; border-radius: 10px;">

		<?php foreach ($prod as $p) { 

			include 'layouts/index_list_simple_offers.php';

		} ;?>
	</div>