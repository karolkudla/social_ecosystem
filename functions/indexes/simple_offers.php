<?php

	include $_SERVER['DOCUMENT_ROOT'].'/config.php';
	session_start();	
	$s_token = $_SESSION['token'];
	
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

<div class="buy_more_offers_modal"></div>

<div class="main_display" service="simple_offers">

<div class="left_panel">

	<?php if ($cursor['login']) { ;?>

		<div class="shop_menu">
			<div class="menu_title">Szukaj w swoim regionie</div>
			<div class="top_user_menu--sep"></div>
			<div class="top_user_menu--item woj_search" woj="<?php echo $cursor['province'];?>"><div class="flex-middle"><img class="vg_icon_20" src="https://vg.wokulski.online/static/img/mobi/global.svg"> &nbsp <?php echo $cursor['woj_name'];?></div></div>
			<div class="top_user_menu--item pow_search" pow="<?php echo $cursor['region'];?>"><div class="flex-middle"><img class="vg_icon_20" src="https://vg.wokulski.online/static/img/mobi/address.svg"> &nbsp <?php echo $cursor['pow_name'];?></div></div>
			<div class="top_user_menu--item gmi_search" gmi="<?php echo $cursor['gmina'];?>" rodz="<?php echo $cursor['rodz'];?>"><div class="flex-middle"><img class="vg_icon_20" src="https://vg.wokulski.online/static/img/mobi/road.svg"> &nbsp <?php echo $cursor['gmi_name'];?></div></div>
		</div>
		
	<?php };?>	
			
	<div class="shop_menu" style="overflow:inherit; padding-bottom: 10px;">	
		
	<div class="menu_title">Naszą inicjatywę wspierają firmy</div>	

		<div class="woj_scroll">
		
			<div class="woj-banner slider-wrapper pion_banner">
				<div id="woj-lightSlider">
					<div><a href="https://bytom.com.pl"><img src="https://vg.wokulski.online/img/wojpowgmi/1.jpg"></a></div>
				</div>	
			</div>
			
		</div>
		
		<div class="pow_scroll">
		
			<div class="pow-banner slider-wrapper pion_banner">
				<div id="pow-lightSlider">
					<div><a href="https://vistula.pl"><img src="https://vg.wokulski.online/img/wojpowgmi/2.jpg"></a></div>
				</div>	
			</div>
			
		</div>
		
		<div class="gmi_scroll">

			<div class="gmi-banner slider-wrapper pion_banner">
				<div id="gmi-lightSlider">
					<div><a href="https://wolczanka.pl"><img src="https://vg.wokulski.online/img/wojpowgmi/3.png"></a></div>
				</div>	
			</div>
			
		</div>
		
		<div class="pion_banner">
		
			<div class="slider-wrapper"><a href="https://denicler.eu"><img src="https://vg.wokulski.online/img/wojpowgmi/4.png"></a></div>
		
		
		</div>
	
		<!--
		<div class="big_btn add_banner">Wesprzyj naszą inicjatywę</div>
		<?php if ($cursor['user_type'] == 'std') {;?>
		<div class="register_as_company register_as_company_button">Zarejestruj się jako firma</div>
		<?php } ;?>
		-->
		
	</div>

</div>
				
<div class="center_panel">


</div>

<div class="right_panel">
	
	<div class="shop_menu" style="overflow:inherit; padding-bottom: 10px;">	
		
		<div class="menu_title">Media</div>	
	
		<div class="">
			<div class="slider-wrapper"><a href="https://e.publico24.pl/magazine/2575" target="_blank"><img src="<?php echo $path;?>/static/img/wojpowgmi/m1.jpg"></a></div>
		</div>
	
		<div class="">
			<div class="slider-wrapper"><a href="https://e.publico24.pl/magazine/2329" target="_blank"><img src="<?php echo $path;?>/static/img/wojpowgmi/m2.png"></a></div>
		</div>
		
		<div class="">
			<div class="slider-wrapper"><a href="https://e.publico24.pl/magazine/2515" target="_blank"><img src="<?php echo $path;?>/static/img/wojpowgmi/m3.jpg"></a></div>
		</div>
	
		<!--
		<div class="big_btn add_banner">Wesprzyj naszą inicjatywę</div>
		<?php if ($cursor['user_type'] == 'std') {;?>
		<div class="register_as_company register_as_company_button">Zarejestruj się jako firma</div>
		<?php } ;?>
		-->
		
	</div>
	

	
</div>

</div>
	