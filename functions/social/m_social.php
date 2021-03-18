<?php

include $_SERVER['DOCUMENT_ROOT'].'/config.php';
include $_SERVER['DOCUMENT_ROOT'].'/functions/authorization/permission.php';

;?>

<div class="main_display">

<div class="social_container">

	<!-- Wyświetlaj tylko dla level3 -->
	<div class="top_user_menu--sep"></div>
	<div class="sliding_menu " style="display: flex;">
			<div class="sliding_menu--item menu_top_social" wall=""><img class="mobi_bottom_icon" src="<?php echo $path;?>static/img/social/icons/world.svg"><label>Główna</label></div>
			<div class="sliding_sep"></div>
			<div class="sliding_menu--item menu_top_social" wall="regio"><img class="mobi_bottom_icon" src="<?php echo $path;?>static/img/social/icons/brazil.svg"><label>Regionalna</label></div>
			<div class="sliding_sep"></div>
			<div class="sliding_menu--item menu_top_social" wall="advert"><img class="mobi_bottom_icon" src="<?php echo $path;?>static/img/social/icons/diamond.svg"><label>Reklamowa</label></div>
			<div class="sliding_sep"></div>
			<div class="sliding_menu--item menu_top_social" wall="friends"><img class="mobi_bottom_icon" src="<?php echo $path;?>static/img/social/icons/friends.svg"><label>Znajomi</label></div>
			<div class="sliding_sep"></div>
			<div class="sliding_menu--item menu_top_social" wall="biznes"><img class="mobi_bottom_icon" src="<?php echo $path;?>static/img/social/icons/agreement.svg"><label>Biznesowa</label></div>	
	</div>
	
	<div class="users_posts">
		
	</div>
		
</div>


<?php 
	if ( permission(['0'])['status'] == 'ok' ) {
?>
	<div class="post_add_container shop_menu" style="margin:0">

		<div class="post_textarea_container">
			<div class="add_post_user_logo"></div>
			<textarea post_id="" class="post_add"></textarea>
		</div>
		
		<div class="post_mini_gallery" style="padding-left: 5px;"></div>
			
		<div class="post_add_photos">
			<div class="std_btn" style="position: relative;">	
				<form method="post" name="post_images" id="post_images" enctype="multipart/form-data" action="<?php echo $path;?>functions/social/up_post_images.php">   
					<input type="file" name="post_images[]" id="post_images_btn" multiple style="width: 100%; height: 100%; cursor: pointer;"/>
				</form>
				<object type="image/svg+xml" data="<?php echo $path;?>static/img/social/icons/photograph.svg" class="vg_icon_slide"></object><span>Dodaj zdjęcia</span>
			</div>	

			<div class="desktop_social_send send" w=""><object type="image/svg+xml" data="<?php echo $path;?>static/img/social/icons/send.svg" class="vg_icon invert_blue"></object><span>Wyślij</span></div>
			<div class="open_post_textarea std_btn" w=""><object type="image/svg+xml" data="<?php echo $path;?>static/img/social/icons/send.svg" class="vg_icon invert_blue"></object><span>Napisz post</span></div>
		</div>

	</div>
<?php } else { ;?>

		<div class="flex-center-column post_add_container shop_menu" style="margin:0; padding-top: 10px;">
			<div class="login big_btn">Zaloguj się</div>
			<div class="shoper_editor_additional_info">aby dodawać i komentować posty</div>
		</div>

<?php ;};?>
