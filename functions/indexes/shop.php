<?php

	include $_SERVER['DOCUMENT_ROOT'].'/config.php';
	session_start();	
	$s_token = $_SESSION['token'];
	
	$col_prod = $db->selectCollection('prod');
	$prod = $col_prod->find(['state'=>'old']);
	
		if ($s_token) {
			$collection = $db->selectCollection('users');
			$sQuery = array('token' => $s_token);	
			$cursor = $collection->findOne($sQuery);
		}
		
		/* avatar pobierany z facebooka */
		
		if ($cursor['login']) {
			$avatar = 'http://graph.facebook.com/'.$cursor['login'].'/picture?type=square';
		} else {
			$avatar = '/img/avatar-vokulsky.jpg';
		}
		
		

?>
	
<div class="main_display">

<div class="left_panel">

	<?php if ($cursor['login']) { ;?>

		<div class="shop_menu">
			<div class="menu_title">Szukaj w swoim regionie</div>
			<div class="top_user_menu--sep"></div>
			<div class="top_user_menu--item woj_search" woj="<?php echo $cursor['province'];?>"><div class="flex-middle"><img class="vg_icon_20" src="https://vg.wokulski.online/img/mobi/global.svg"> &nbsp <?php echo $cursor['woj_name'];?></div></div>
			<div class="top_user_menu--item pow_search" pow="<?php echo $cursor['region'];?>"><div class="flex-middle"><img class="vg_icon_20" src="https://vg.wokulski.online/img/mobi/address.svg"> &nbsp <?php echo $cursor['pow_name'];?></div></div>
			<div class="top_user_menu--item gmi_search" gmi="<?php echo $cursor['gmina'];?>" rodz="<?php echo $cursor['rodz'];?>"><div class="flex-middle"><img class="vg_icon_20" src="https://vg.wokulski.online/img/mobi/road.svg"> &nbsp <?php echo $cursor['gmi_name'];?></div></div>
		</div>
		
	<?php };?>	

	<div class="shop_menu">
		<div class="menu_title">Filtry</div>
		<div class="top_user_menu--sep"></div>
		<div class="top_user_menu--item">Promocje</div>
		<div class="top_user_menu--item">100% Polska Firma</div>
	</div>
	
	<div class="shop_menu">
		<div class="menu_title">Oferty dla:</div>
		<div class="top_user_menu--sep"></div>
		<div class="top_user_menu--item">Hurtowni</div>
		<div class="top_user_menu--item">Dystrybutorów</div>
		<div class="top_user_menu--item">Detaliczne</div>
	</div>
	
	<div class="shop_menu">
		<div class="menu_title">Oferty od:</div>
		<div class="top_user_menu--sep"></div>
		<div class="top_user_menu--item">Od producenta</div>
		<div class="top_user_menu--item">Od pośrednika</div>
	</div>	

</div>
				
<div class="center_panel">

	<div class="shop_menu" style="margin:0;">

		<div class="top_menu">
			<div class="menu_item menu_item_cat" f="0" d="0">Sprzedaż</div>
			<div class="menu_item menu_item_cat" f="1" d="0">Usługi</div>
			<div class="menu_item menu_item_cat" f="2" d="0">Motoryzacja</div>
			<div class="menu_item menu_item_cat" f="3" d="0">Turystyka</div>
			<div class="menu_item menu_item_cat" f="4" d="0">Bilety</div>
			<div class="menu_item menu_item_cat" f="5" d="0">Nieruchomości</div>
			<div class="menu_item menu_item_cat" f="6" d="0">Praca</div>	
		</div>
		
		<div class="top_user_menu--sep"></div>
		
		<div class="pl-banner slider-wrapper brb" style="height: 260px; position: relative; overflow:hidden;">
			<div style="
					position: absolute;
					height: 100%;
					width: 100%;
					padding-left: 60px;
					background: linear-gradient(130deg, rgba(255, 255, 255, 0.98) 42%, rgba(255, 255, 255, 0) 50%);">
				<div class="flex-center-column fs-30 h-100" style="width: 30%; justify-content: center; align-items: flex-start;">
					Dołącz do Internetowej Galerii Handlowej
					<span class="blue_btn" style="margin: 5px 0;">Sprawdź korzyści</span>
				</div>
			</div>
			<img class="bckg_test" src="<?php echo $path;?>static/img/shopers/banners/1.jpeg">
		</div>
	
	</div>
	
	<div class="flex fs-13 fw-500 p10_0">
		<div class="menu_back_wrapper"></div>
		<div class="fcat"></div>
		<div class="categories_string"></div>
	</div>
	
	<div class="categories_list"></div>

	<div style="font-size: 13px; font-weight: 400; padding: 10px 0 10px 10px;" class="in_categories">
		Szukaj:
	</div>
		
	<div class="simple_offers_search_engine shop_menu" style="margin: 0;">
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
			<button class="blue_btn search_simple_offers" style="border: 0; margin: 0; border-radius: 0;">Szukaj</button>
		</div>
	</div>

	
	<div class="result_list" style="background: white; overflow: hidden; border-radius: 10px;">	
		<?php foreach ($prod as $p) { 

			include $_SERVER['DOCUMENT_ROOT'].'/functions/shoper/layouts/shoper_list_products.php';

		} ;?>
	</div>

</div>

<div class="right_panel">
	
	<div class="shop_menu">
	
	<?php if ($cursor['login']) { ;?>
		
		<div class="menu_title">Moje konto</div>	
		<?php include $_SERVER['DOCUMENT_ROOT'].'/functions/indexes/user_menu.php';?>	
		
	<?php } else { ;?>
		
		
		<div class="p15">
			<div class="about_info">Załóż własny sklep internetowy</div>
			<span class="fs-13">w 10 minut w 2 prostych krokach</span>
			<div class="big_btn register">Zarejestruj się</div>
		</div>
		
	<?php };?>
	
	</div>

</div>

</div>