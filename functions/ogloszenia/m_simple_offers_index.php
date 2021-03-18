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

<div class="shop_panel">
	<div class="pl-banner slider-wrapper" style="position: relative;">
		<div style="position: absolute; height: 100%; width: 30%; padding-left: 30px;">
			<div class="flex-middle h-100" style="font-size: 20px;">Wspieramy walkę z COVID-19</div>
		</div>
		<img src="https://vokulsky.pl/img/pomoc/wspieramy_clean.jpg">
	</div>
</div>

<div class="flex bckg_w main_mobi_menu bb-lg">

	<div class="sliding_menu--item banner_covid" style="border-top: 3px solid rgb(109, 35, 251);">
		<img class="mobi_bottom_icon" src="https://vokulsky.pl/img/pomoc/serce_pomoc.png">
		<div style="font-weight: 900;">Wspieramy walkę z COVID-19</div>
	</div>
	<div class="sliding_sep"></div>
	
	<div class="sliding_menu--item banner_firmy">
		<img class="mobi_bottom_icon" src="https://vokulsky.pl/img/pomoc/pp.png">
		<div style="font-weight: 900;">Wspieramy Polskie Firmy</div>
	</div>
	<div class="sliding_sep"></div>

	<div class="sliding_menu--item banner_codziennosc">
		<img class="mobi_bottom_icon" src="https://vokulsky.pl/img/pomoc/pl_serce.png">
		<div style="font-weight: 900;">Wspieramy Codzienność</div>
	</div>
	<div class="sliding_sep"></div>

	<div class="sliding_menu--item banner_500">
		<div style="font-weight: 900;"><span style="font-size: 25px; line-height: 0; color: #854bf3;">500</span> bezpłatnych ogłoszeń</div>
	</div>

</div>

<div class="sliding_menu covid_mobi_menu">	

	<div class="sliding_menu--item">
		<label class="flex-column-center imp_user_choose pf_mobil"><img class="mobi_bottom_icon" src="https://vokulsky.pl/img/pomoc_icons/transport.svg"><input type="radio" name="importance_type" class="imp_type" value="1">Transport medyczny</label>
	</div>
	<div class="sliding_sep"></div>
	
	<div class="sliding_menu--item">
		<div><label class="flex-column-center imp_user_choose pf_mobil"><img class="mobi_bottom_icon" src="https://vokulsky.pl/img/pomoc_icons/wash.svg"><input type="radio" name="importance_type" class="imp_type" value="2">Dezynfekcja</label></div>
	</div>
	<div class="sliding_sep"></div>
		
	<div class="sliding_menu--item">
		<div><label class="flex-column-center imp_user_choose pf_mobil"><img class="mobi_bottom_icon" src="https://vokulsky.pl/img/pomoc_icons/doctor.svg"><input type="radio" name="importance_type" class="imp_type" value="5">Lekarze</label></div>
	</div>
	<div class="sliding_sep"></div>
	
	<div class="sliding_menu--item">
		<div><label class="flex-column-center imp_user_choose pf_mobil"><img class="mobi_bottom_icon" src="https://vokulsky.pl/img/pomoc_icons/hand-wash.svg"><input type="radio" name="importance_type" class="imp_type" value="10">Akcesoria dla zdrowia</label></div>
	</div>
	<div class="sliding_sep"></div>
	
	<div class="sliding_menu--item">
		<div><label class="flex-column-center imp_user_choose pf_mobil"><img class="mobi_bottom_icon" src="https://vokulsky.pl/img/pomoc_icons/help.svg"><input type="radio" name="importance_type" class="imp_type" value="11">Pozostałe pomoce</label></div>
	</div>

</div>	
	
<div class="sliding_menu firmy_mobi_menu">

	<div class="sliding_menu--item">
		<div><label class="flex-column-center imp_user_choose pf_mobil"><img class="mobi_bottom_icon" src="https://vokulsky.pl/img/pomoc_icons/wspieramy_firmy/prawo.svg"><input type="radio" name="importance_type" class="imp_type" value="20">Prawo</label></div>
	</div>
	<div class="sliding_sep"></div>
	
	<div class="sliding_menu--item">
		<div><label class="flex-column-center imp_user_choose pf_mobil"><img class="mobi_bottom_icon" src="https://vokulsky.pl/img/pomoc_icons/wspieramy_firmy/finanse.svg"><input type="radio" name="importance_type" class="imp_type" value="21">Finanse</label></div>
	</div>
	<div class="sliding_sep"></div>
	
	<div class="sliding_menu--item">
		<div><label class="flex-column-center imp_user_choose pf_mobil"><img class="mobi_bottom_icon" src="https://vokulsky.pl/img/pomoc_icons/wspieramy_firmy/wsparcie_spr.svg"><input type="radio" name="importance_type" class="imp_type" value="22">Wsparcie sprzedażowe</label></div>
	</div>
	<div class="sliding_sep"></div>
	
	<div class="sliding_menu--item">
		<div><label class="flex-column-center imp_user_choose pf_mobil"><img class="mobi_bottom_icon" src="https://vokulsky.pl/img/pomoc_icons/wspieramy_firmy/producenci.svg"><input type="radio" name="importance_type" class="imp_type" value="23">Producenci</label></div>
	</div>
	<div class="sliding_sep"></div>
	
	<div class="sliding_menu--item">
		<div><label class="flex-column-center imp_user_choose pf_mobil"><img class="mobi_bottom_icon" src="https://vokulsky.pl/img/pomoc_icons/wspieramy_firmy/transport.svg"><input type="radio" name="importance_type" class="imp_type" value="24">Transport / Logistyka</label></div>
	</div>
	<div class="sliding_sep"></div>
	
	<div class="sliding_menu--item">
		<div><label class="flex-column-center imp_user_choose pf_mobil"><img class="mobi_bottom_icon" src="https://vokulsky.pl/img/pomoc_icons/help.svg"><input type="radio" name="importance_type" class="imp_type" value="25">Pozostała pomoc</label></div>
	</div>
	<div class="sliding_sep"></div>
	
</div>

<div class="sliding_menu codziennosc_mobi_menu">
		
	<div class="sliding_menu--item">
		<div><label class="flex-column-center imp_user_choose pf_mobil"><img class="mobi_bottom_icon" src="https://vokulsky.pl/img/pomoc_icons/food.svg"><input type="radio" name="importance_type" class="imp_type" value="7">Posiłki</label></div>
	</div>
	<div class="sliding_sep"></div>
	
	<div class="sliding_menu--item">
		<div><label class="flex-column-center imp_user_choose pf_mobil"><img class="mobi_bottom_icon" src="https://vokulsky.pl/img/pomoc_icons/living-room.svg"><input type="radio" name="importance_type" class="imp_type" value="6">Mieszkania na kwarantannę</label></div>
	</div>
	<div class="sliding_sep"></div>
	
	<div class="sliding_menu--item">
		<div><label class="flex-column-center imp_user_choose pf_mobil"><img class="mobi_bottom_icon" src="https://vokulsky.pl/img/pomoc_icons/truck.svg"><input type="radio" name="importance_type" class="imp_type" value="8">Zakupy z dowozem</label></div>
	</div>
	<div class="sliding_sep"></div>
	
	<div class="sliding_menu--item">
		<div><label class="flex-column-center imp_user_choose pf_mobil"><img class="mobi_bottom_icon" src="https://vokulsky.pl/img/pomoc_icons/truck.svg"><input type="radio" name="importance_type" class="imp_type" value="33">Przydatne usługi</label></div>
	</div>

</div>

<div class="sliding_menu standard_mobi_menu">
		
	<div class="sliding_menu--item menu_item_cat_simple" ot="simple_offers" f="0" d="0">
		<img class="mobi_bottom_icon " src="https://vokulsky.pl/img/shop/tag.svg">
		<div>Sprzedaż</div>
	</div>
	<div class="sliding_sep"></div>

	<div class="sliding_menu--item menu_item_cat_simple" ot="simple_offers" f="1" d="0">
		<img class="mobi_bottom_icon" src="https://vokulsky.pl/img/mobi/uslugi.svg">
		<div>Usługi</div>
	</div>
	<div class="sliding_sep"></div>
	<div class="sliding_menu--item menu_item_cat_simple" ot="simple_offers" f="2" d="0">
		<img class="mobi_bottom_icon" src="https://vokulsky.pl/img/mobi/moto.svg">
		<div>Motoryzacja</div>
	</div>
	<div class="sliding_sep"></div>
	<div class="sliding_menu--item menu_item_cat_simple" ot="simple_offers" f="3" d="0">
		<img class="mobi_bottom_icon" src="https://vokulsky.pl/img/mobi/nieruchomosci.svg">
		<div>Nieruchomości</div>
	</div>
	<div class="sliding_sep"></div>
	<div class="sliding_menu--item menu_item_cat_simple" ot="simple_offers" f="5" d="0">
		<img class="mobi_bottom_icon" src="https://vokulsky.pl/img/mobi/praca.svg">
		<div>Praca</div>
	</div>

</div>

<div class="pomoce_items" style="border-top: 1px solid whitesmoke;">
<?php 
				if ($cursor['login']) {
					foreach ($pomoce as $p) { 
						include 'layouts/list_pomoce.php';
					} 
				} else {
					foreach ($pomoce_nologin as $p) { 
						include 'layouts/list_pomoce.php';
					} 
				} 
;?>
</div>

<div class="flex-center">
	<input class="search_phrase" style="width: 100%; padding: 12px;border: 1px solid #efefef !important;border: 0;" placeholder="Czego szukasz?">	
	<button class="blue_btn search_simple_offers" style="border: 0; margin: 0; border-radius: 0; padding: 10px;"><img class="mobi_bottom_icon" style="filter: invert(97%) sepia(0%) saturate(3636%) hue-rotate(29deg) brightness(116%) contrast(103%);" src="https://vokulsky.pl/img/mobi/search.svg"></button>	
</div>


<div class="result_list">

<div class="my_offers_title">
	<div class="about_info">Ogłoszenia w ramach pomocy</div>
</div>

	<?php foreach ($prod as $p) { 
		include 'layouts/index_list_simple_offers.php';
	} ;?>
</div>

<div class="simple_offers_bottom_menu--opened">
	
	<div class="simple_offers_bottom_menu--card simple_offers_bottom_menu--opened_search">
		
		<div class="menu_title" style="text-align: center;">Filtruj według ceny</div>
			<div class="top_user_menu--sep w-100"></div>
		
		<div class="shop_search">
			<div class="search_container search_container_price">
				<div class="shop_search_icon"><img src="https://vokulsky.pl/img/shop/tag.svg"></div>
				<input class="price_from" placeholder="Cena od:">
			</div>
			
			<div class="top_user_menu--sep w-100"></div>
			
			<div class="search_container search_container_price">
				<div class="shop_search_icon"><img src="https://vokulsky.pl/img/shop/tag.svg"></div>
				<input class="price_to" placeholder="Cena do:">
			</div>
			
			<div class="blue_btn search_simple_offers filter_simple_offers hide_bottom_menu">Filtruj</div>
			
		</div>

	</div>
	
	<div class="simple_offers_bottom_menu--card simple_offers_bottom_menu--opened_region">
		
		<div>
			<div class="menu_title" style="text-align: center;">Szukaj w swoim regionie</div>
			<div class="top_user_menu--sep w-100"></div>
			
			<?php if ($cursor['login']) {;?>
			
			<div class="top_user_menu--item woj_search hide_bottom_menu flex-middle" woj="<?php echo $cursor['province'];?>"><img class="mobi_bottom_icon p0_10" src="https://vokulsky.pl/img/mobi/global.svg"><?php echo $cursor['woj_name'];?></div>
			<div class="top_user_menu--sep w-100"></div>
			<div class="top_user_menu--item pow_search hide_bottom_menu flex-middle" pow="<?php echo $cursor['region'];?>"><img class="mobi_bottom_icon p0_10" src="https://vokulsky.pl/img/mobi/address.svg"><?php echo $cursor['pow_name'];?></div>
			<div class="top_user_menu--sep w-100"></div>
			<div class="top_user_menu--item gmi_search hide_bottom_menu flex-middle" gmi="<?php echo $cursor['gmina'];?>" rodz="<?php echo $cursor['rodz'];?>"><img class="mobi_bottom_icon p0_10" src="https://vokulsky.pl/img/mobi/road.svg"><?php echo $cursor['gmi_name'];?></div>
		
			<?php } else { ;?>
				
			<div class="flex-center-column" style="margin: 30px 0;">
				<div class="login big_btn">Zaloguj się</div>
				<div class="shoper_editor_additional_info">aby szybko szukać w swoim regionie</div>
			</div>
			<div class="top_user_menu--sep w-100"></div>	
			<?php };?>
		
		</div>
		
		<div class="menu_title" style="text-align: center;">Szukaj w innych miejscach</div>
			<div class="top_user_menu--sep w-100"></div>
		
		<div class="shop_search">	
			<div class="search_container flex" style="margin-bottom: 10px;">
			
				<div class="w-100" style="padding: 5px;">
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
				</div>	
					<div class="top_user_menu--sep w-100"></div>
				<div class="w-100" style="padding: 5px;">	
					<select class="select_powiaty" style="margin:0"><option value="" kod="">Miasto / Powiat</option></select>
				</div>
					<div class="top_user_menu--sep w-100"></div>
				<div class="w-100" style="padding: 5px;">	
					<select class="select_miasta_gminy" style="margin:0"><option value="" kod="" rodz="">Miejscowość / Gmina</option></select>
				</div>
			
			</div>
			<div class="blue_btn search_simple_offers filter_simple_offers hide_bottom_menu">Szukaj</div>
		</div>
		
	</div>
	
	<div class="simple_offers_bottom_menu--card simple_offers_bottom_menu--opened_cats">
		
		<div class="bottom_menu_items--wrapper flex-center-middle h-100 bottom_main_categories">
			<div class="bottom_menu_items flex-center-middle flex" style="margin-top: 70px;">
				<div class="bottom_menu_item menu_item_cat_simple"  ot="simple_offers" f="0" d="0"><img class="mobi_cats_icon" src="https://vokulsky.pl/img/mobi/sprzedaz.svg">Sprzedaż</div>
				<div class="bottom_menu_item menu_item_cat_simple"  ot="simple_offers" f="1" d="0"><img class="mobi_cats_icon" src="https://vokulsky.pl/img/mobi/uslugi.svg">Usługi</div>
				<div class="bottom_menu_item menu_item_cat_simple"  ot="simple_offers" f="2" d="0"><img class="mobi_cats_icon" src="https://vokulsky.pl/img/mobi/moto.svg">Motoryzacja</div>
				<div class="bottom_menu_item menu_item_cat_simple hide_bottom_menu"  ot="simple_offers" f="5" d="0"><img class="mobi_cats_icon" src="https://vokulsky.pl/img/mobi/nieruchomosci.svg">Nieruchomości</div>
				<div class="bottom_menu_item menu_item_cat_simple hide_bottom_menu"  ot="simple_offers" f="6" d="0"><img class="mobi_cats_icon" src="https://vokulsky.pl/img/mobi/praca.svg">Praca</div>	
			</div>
		</div>
		
		<div class="bottom_menu_items--wrapper h-100">
			<div class="flex-middle fw-500 bb-lg" style="padding: 70px 0 10px 0;">
				<div class="menu_back_wrapper"></div>
				<div class="fcat"></div>
				<div class="categories_string" style="display: none;"></div>
				<span class="icon-cross close_mobile_menu_card" style="position: absolute; right: 10px; top: 75px; font-size: 20px;"></span>
			</div>
			<div class="categories_list"></div>
			<div class="blue_btn mobile_choose_cat_button">Wybierz kategorię<span class="mobile_choose_cat_name"></span></div>
		</div>

	</div>
	
</div>

<div class="simple_offers_bottom_menu">

	<div class="simple_offers_bottom_menu--btn simple_offers_bottom_menu--btn_search"><img class="mobi_bottom_icon" src="https://vokulsky.pl/img/shop/tag.svg"></div>
	<div class="simple_offers_bottom_menu--btn simple_offers_bottom_menu--btn_region"><img class="mobi_bottom_icon" src="https://vokulsky.pl/img/mobi/event.svg"></div>
	<div class="simple_offers_bottom_menu--btn simple_offers_bottom_menu--btn_cats"><img class="mobi_bottom_icon" src="https://vokulsky.pl/img/mobi/x.svg"></div>

</div>