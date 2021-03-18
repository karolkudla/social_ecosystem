<?php

include $_SERVER['DOCUMENT_ROOT'].'/config.php';
include $_SERVER['DOCUMENT_ROOT'].'/functions/authorization/permission.php';

;?>

<div class="main_display">

<div class="social_left_panel"></div>

<div class="social_container">

	<!-- Wyświetlaj tylko dla level3 -->
	<div class="social_menu_and_post_add shop_menu">
		<div class="subsub_top">
			<div class="menu_item menu_top_social" wall="">Główna</div>
			
			<div class="menu_item menu_top_social" wall="regio">Regionalna</div>
			
			<div class="menu_item menu_top_social" wall="advert">Reklamowa</div>
			
			<div class="menu_item menu_top_social" wall="friends">Znajomi</div>
		
			<div class="menu_item menu_top_social" wall="biznes">Biznesowa</div>	
		</div>

		<div class="top_user_menu--sep"></div>

		<div class="post_add_container">

			<div class="post_textarea_container">
				
				<div class="add_post_user_logo"></div>
				<textarea post_id="" class="post_add"></textarea>
					
			</div>
				
			<div class="post_add_photos">
			
				<div class="std_btn" style="position: relative;">	
					<form method="post" name="post_images" id="post_images" enctype="multipart/form-data" action="<?php echo $path;?>functions/social/up_post_images.php">   
						<input type="file" name="post_images[]" id="post_images_btn" multiple style="width: 100%; height: 100%; cursor: pointer;"/>
					</form>
					<object type="image/svg+xml" data="<?php echo $path;?>static/img/social/icons/photograph.svg" class="vg_icon_slide"></object><span>Dodaj zdjęcia</span>
				</div>	
				
				<!--<div class="std_btn"><object type="image/svg+xml" data="https://vokulsky.pl/img/social/film.svg" class="vg_icon_slide"></object><span>Film</span></div>-->
				
				<!--
				<div style="display: flex; align-items: center; position: relative;">	
					<form method="post" name="up_video" id="up_video" enctype="multipart/form-data" action="https://vokulsky.pl/functions/up_video.php">   
						<input type="file" name="up_video[]" id="up_video_btn" multiple style="width: 100%;"/>
					</form>
					Magic
				</div>	
				-->
				
				<!--<div class="std_btn"><object type="image/svg+xml" data="https://vokulsky.pl/img/social/calendar.svg" class="vg_icon_slide"></object><span>Data publikacji</span></div>-->
				
				<div class="desktop_social_send send" w=""><object type="image/svg+xml" data="<?php echo $path;?>static/img/social/icons/send.svg" class="vg_icon invert_blue"></object><span>Wyślij</span></div>
				<div class="open_post_textarea" w=""><object type="image/svg+xml" data="<?php echo $path;?>static/img/social/icons/send.svg" class="vg_icon invert_blue"></object><span>Tekst</span></div>
				
			</div>
			<div class="post_mini_gallery" style="padding-left: 5px;"></div>

		</div>
	</div>
	
	
	<div class="users_posts">
		
	</div>
		
</div>

<div class="social_right_panel"></div>