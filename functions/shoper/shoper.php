<?php 

	include $_SERVER['DOCUMENT_ROOT'].'/config.php';
	$col_users = $db->selectCollection('users');
	$user_query = array('shoper.url' => $_POST['shoper_id']);
	$user = $col_users->findOne($user_query);
	
	$shoper_name = $user['shoper']['logo_text'];
	$slogan = $user['shoper']['slogan'];
	
	$little_logo_path = $user_download  	.	substr($user['_id'],0,24)	  .   $user_shoper_avatar     .	  "mini-".$user['shoper']['logo'];
	if ($user['shoper']['logo']) {$little_logo = '<img src="'.$little_logo_path.'">';} else {$little_logo = "<div class='logo_placeholder'>Dodaj logo</div>";};

	$big_logo_path =    $user_download	.	substr($user['_id'],0,24)	  .   $user_shoper_background .	  "big-".$user['shoper']['background'];
	if ($user['shoper']['background']) {$big_logo = '<img src="'.$big_logo_path.'">';} else {$big_logo = "<div class='little_banner_placeholder'>Dodaj banner</div>";};
		
	$menu = $user['shoper']['menu'];

;?>

<div class="main_display">

	<div class="left_panel">

		<div class="shop_menu">
			
			<div class="user_profile_data">
				<div class="user_profile_bckg"><?php echo $big_logo;?></div>
				
				<div class="user_profile_avatar"><?php echo $little_logo;?></div>
				
				<div class="user_profile_info">
					<div class="user_profile_info--name"><?php echo $shoper_name;?></div>
					<div class="user_profile_info--slogan"><?php echo $slogan;?></div>
					
					<div class="user_profile_info--icons">
						<div class="user_profile_info--add vg_circle"></div>
						<div class="user_profile_info--message vg_circle"></div>
						<div class="vg_circle"></div>
					</div>
					
					<div class="user_profile_info--extra"><span>Miasto </span><?php echo $city;?></div>
				</div>
			</div>
			
		</div>
		
		<div class="shop_menu">
			<div class="menu_title">Oferta</div>

			<?php 
				if ($menu && $menu !== '') {
				$i = 0;
				foreach ($menu as $items) {
			;?>		
					<div class="top_user_menu--sep"></div>
					<div class="top_user_menu--item shoper_offers_link" m1="<?php echo $items['name'];?>" m2="" i="<?php echo $i;?>"><?php echo $items['name'];?></div>
			<?php
					$i ++;
					if ($items['subs']) {
						foreach ($items['subs'] as $sub) {
			;?>
							<div class="top_user_menu--item top_user_menu--item_sub shoper_offers_link" m1="" m2="<?php echo $sub;?>" i="<?php echo $i;?>"><?php echo $sub;?></div>
			<?php	
						$i++;
						}
					}
				}
				} else {echo "<div style='width: 100%;display: flex;height: 50px;font-size: 14px;align-items: center;justify-content: center;'>Dodaj menu</div>";}
			;?>
		</div>

	</div>
	
	<div class="center_panel">

		<div class="shop_panel">

			<div class="top_menu top_menu_shoper">
				<div style="width: 50%;">
					<div class="menu_item shoper_index_link">Strona główna</div>
					<div class="menu_item shoper_posts_link">Aktualności</div>
					<div class="menu_item shoper_offers_link" m1="" m2="">Wszystkie oferty</div>
				</div>
				
				<div style="width: 10%;">
					<div class="menu_item shoper_contact">Kontakt</div>
				</div>	
			</div>
			
		</div>
		
		<div class="shoper_ajax" shoper="<?php echo $_POST['shoper_id'];?>"></div>
		
	</div>

	<div class="right_panel">
		
		<div class="shop_menu">
			<div class="menu_title">Filtry</div>
			<div class="top_user_menu--sep"></div>
			<div class="top_user_menu--item">Najnowsze</div>
			<div class="top_user_menu--item">Polecane</div>
			<div class="top_user_menu--item">Popularne</div>
			<div class="top_user_menu--item">Promocje</div>
			<div class="top_user_menu--item">100% Polska Firma</div>
		</div>
	
		<div class="shop_menu">
			<div class="menu_title">Oferty dla:</div>
			<div class="top_user_menu--sep"></div>
			<div class="top_user_menu--item">Firm / B2B</div>
			<div class="top_user_menu--item">Hurtowni</div>
			<div class="top_user_menu--item">Dystrybutorów</div>
			<div class="top_user_menu--item">Detaliczne</div>
		</div>
		
		<div class="shop_menu" style="padding-bottom: 10px;">
			<div class="menu_title">Kontakt</div>
			<div class="top_user_menu--sep"></div>
			<div style="height: 10px;"></div>
		
			<div style="font-size: 16px; font-weight: 400; text-align: center;"><?php echo $user['shoper']['contact']['company_full_name'];?></div>
			
			<div class="shoper_social_links" style="text-align: center;">	

				<?php if ($user['shoper']['contact'][5]['data']) {;?>	<a href="<?php echo $user['shoper']['contact']['link_facebook'];?>">	<span class="icon-facebook"></span>		</a>	<?php;};?>
				<?php if ($user['shoper']['contact'][6]['data']) {;?>	<a href="<?php echo $user['shoper']['contact']['link_instagram'];?>">	<span class="icon-instagram"></span>	</a>	<?php;};?>
				<?php if ($user['shoper']['contact'][7]['data']) {;?>	<a href="<?php echo $user['shoper']['contact']['link_youtube'];?>">	<span class="icon-youtube2"></span>		</a>	<?php;};?>
				
			</div>
			
			<?php if ( $user['shoper']['contact']['street'] ) {;?>
				<div class="shoper_contact_data">ul. <?php echo $user['shoper']['contact']['street'];?></div>
				<div class="shoper_contact_data"><?php echo $user['shoper']['contact']['postal_code'];?>, <?php echo $user['shoper']['contact']['city'];?></div>
			<?php ;}?>
			
			
		</div>
		
	</div>

</div>