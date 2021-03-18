<?php

	include $_SERVER['DOCUMENT_ROOT'].'/config.php';
	$col_users = $db->selectCollection('users');
	$user_query = array('shoper.url' => $_POST['shoper_id']);
	$user = $col_users->findOne($user_query);
	
	$big_logo_path =    $user_download	.	substr($user['_id'],0,24)	  .   $user_shoper_background .	  "big-".$user['shoper']['background'];
	if ($user['shoper']['background']) {$big_logo = '<img src="'.$big_logo_path.'">';} else {$big_logo = "<div class='little_banner_placeholder'>Dodaj banner</div>";};
	
	$gallery_path = $user_download     .	 substr($user['_id'],0,24)     .     $user_shoper_gallery;
		
	$youtube = $user['shoper']['youtube'];
	$gallery = $user['shoper']['gallery'];
	$about = $user['shoper']['desc'];
	if (empty($about)) {$about = 'Dodaj opis firmy';};

;?>

<div class="shoper_banner">
	<?php echo $big_logo;?>	
</div>

<div style="font-size: 13px; font-weight: 400; margin: 5px 0 0 0;">Szukaj:</div>
<div class="shop_search">
	<div  style="width: 80%;" class="search_container_phrase"><div class="shop_search_icon brl"><img src="https://vg.wokulski.online/img/shop/search.svg"></div><input class="search_phrase" placeholder="Fraza"></div>
	<div  style="width: 20%;" class="search_container search_container_price"><div class="shop_search_icon"><img src="https://vg.wokulski.online/img/shop/tag.svg"></div><input class="search_from" placeholder="Cena"></div>
	
	<button class="blue_btn brr" style="border: 0; margin: 0;">Szukaj</button>
</div>

<div style="height: 20px;"></div>

<div class="user_profile_shoper_banner">
	<div class="user_profile_shoper_banner--links">
		<div class="">O nas</div>
		<div class="horizontal_sep"></div>
		<div class="">Komentarze</div>
	</div>

	<div class="shoper_index_multimedia" style="display: flex; ">
		<div class="shoper_gallery" style="padding-right: 5px;">
			<?php
			if ($gallery && $gallery !== 'null') {
				
				foreach ($gallery as $img) {
			?>			
				<div><img src="<?php echo $gallery_path."mini-".$img;?>" width="100%" height="100%"></div>	
			<?php
				}
			} else {echo '<div class="to_fill">Dodaj zdjęcia</div>';};
			?>	
		</div>
		
		<div class="shoper_gallery" style="padding-left: 5px;">
			<?php if ($youtube && $youtube !== '') {
			
			foreach ($youtube as $yt) {
			?>
				<div>
				<iframe src="https://www.youtube.com/embed/<?php echo $yt;?>?loop=1&modestbranding=1" frameborder=0 allowfullscreen srcdoc="<style>*{padding:0;margin:0;overflow:hidden}html,body{height:100%}img,span{position:absolute;width:100%;top:0;bottom:0;margin:auto;height:100%}span{height:1.5em;text-align:center;font:48px/1.5 sans-serif;color:white;text-shadow:0 0 0.5em black}</style><a href=https://www.youtube.com/embed/<?php echo $yt;?>?autoplay=1><img src=https://img.youtube.com/vi/<?php echo $yt;?>/hqdefault.jpg><span>▶</span></a>" frameborder=0 allowfullscreen width="300" height="200" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"></iframe>
				</div>
			<?php
			}
			} else {echo '<div class="to_fill">Dodaj filmy</div>';};
			?>
		</div>
	</div>
	
	<div class="shoper_about">
		<?php echo nl2br($about);?>
	</div>

</div>