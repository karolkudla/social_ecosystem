<?php 
	include $_SERVER['DOCUMENT_ROOT'].'/config.php';
;?>

<div class="in_modal_edit">

<div class="loading"><div class="lds-ripple"><div></div><div></div></div></div>

<div id="close" style="position: absolute; top: 2%; right: 2%; font-size; 20px;"><span class="icon-cross"></span></div>

<div class="shoper_editor_top_menu">
	<div class="steps">
		<div class="step_enabled" step="1">O nas</div>
		<i class="a-right"></i>
		<div class="step_trigger step_disabled" step="2">Kontakt</div>
		<i class="a-right"></i>
		<div class="step_trigger step_disabled" step="3">Menu</div>
	</div>
</div>

<div class="edit_panel_inner">
	
	<div class="step show" step="1">
		<div class="step_content">
		
			<div class="shoper_editor_section" style="background: #f5f8fb;">
		
				<div style="width: 40%;">
				
					<div class="shoper_editor_title">1. Nazwa firmy</div>
					<div style="display: grid;">
						<label for="logo_text" class="inp">
							<input type="text" id="logo_text" placeholder="&nbsp;">
							<span class="label">Nazwa firmy</span>
							<span class="border"></span>
						</label>
					</div>
					
				</div>

				<div style="width: 60%;">	
				
					<div class="shoper_editor_title">2. Hasło reklamowe</div>
					
					<div style="display: grid;">
						<label for="slogan_text" class="inp">
							<input type="text" id="slogan_text" placeholder="&nbsp;">
							<span class="label">Hasło reklamowe firmy</span>
							<span class="border"></span>
						</label>
					</div>

				</div>
			
			</div>
			
			<div class="shoper_editor_section">
				<div style="width: 40%;">
				
					<div class="shoper_editor_title">3. Logo</div>
					
					<div class="flex-center-middle">
						<div class="logo_img_wrapper" style="border-radius: 50%;">
			
							<form method="post" name="logo" id="logo_img" enctype="multipart/form-data" action="<?php echo $path;?>functions/shoper/php_editing_functions/up_logo.php">   
							<input type="file" name="logo[]" id="logo_img_btn"/>
							</form>
							
							<div class="add_logo_text" style="display: flex;">
							<span class="icon-plus"></span> <div class="con_h"> &nbsp Dodaj logo</div>
							</div>
				
						</div>
					</div>
				
				</div>
				<div style="width: 60%;">
				
					<div class="shoper_editor_title">4. Banner</div>
					
					<div class="flex-center-middle">
						<div class="shoper_editor_banner_img_wrapper">
			
							<form method="post" name="big_logo" id="big_logo_img" enctype="multipart/form-data" action="<?php echo $path;?>functions/shoper/php_editing_functions/up_duze_logo.php">   
							<input type="file" name="big_logo[]" id="big_logo_img_btn"/>
							</form>
							
							<div class="add_big_logo_text" style="display: flex;">
							<span class="icon-plus"></span> <div class="con_h"> &nbsp Dodaj duże logo</div>
							</div>
				
						</div>
					</div>
				
				</div>
			</div>
				
			<div class="shoper_editor_section" style="background: #f5f8fb;">
			
				<div>
					<div style="display: flex; height: 50px; align-items: center;">
						<div class="shoper_editor_title">5. Zdjęcia w galerii na stronie głównej</div>
						<div id="add_new_imgs" class="blue_btn">	
							<form method="post" name="wiz_images" id="wiz_imgs_up" enctype="multipart/form-data" action="<?php echo $path;?>functions/shoper/php_editing_functions/up_wiz_images.php">   
								<input type="file" name="wiz_images[]" id="wiz_imgs_up_button" multiple />
							</form>
							<span class="icon-plus"></span> &nbsp Dodaj nowe zdjęcia
						</div>	
					</div>
				
					<div class="wiz_imgs_edit_panel"></div>
				</div>
				
			</div>
			
			<div class="shoper_editor_section">
			
			<div style="display: flex; align-items: center; width: 100%; height: 70px;">
				<div class="shoper_editor_title">6. Filmy Youtube w galerii na stronie głównej</div>
				<div class="shoper_editor_youtube_input_wrapper">
					<div style="display: grid; width: 100%;">
						<label for="add_new_wiz_youtube_input" class="inp">
							<input id="add_new_wiz_youtube_input" placeholder="&nbsp;">
							<span class="label">Link do filmu na Youtube ...</span>
							<span class="border"></span>
						</label>
					</div>
				</div>
				<div id="save_one_wiz_yt"><span class="icon-plus"></div></span>
			</div>
			
			<div class="youtube_edit_wrapper"></div>

			</div>
			
			<div class="shoper_editor_section" style="background: #f5f8fb;">
			
				<div class="shoper_editor_title">7. Opis firmy</div>
				<textarea class="desc desc_1"></textarea>
			
			</div>
			
			<div class="shoper_editor_section" style="justify-content: center;">
				<div class="next_step blue_btn">Następny krok &nbsp <span class="icon-arrow-right2"></span></div>
			</div>
		
		</div>
	</div>

	<div class="step hide" step="2">
		<div class="step_content">

		<div style="margin: 30px;">
			<div class="shoper_editor_title">Dane kontaktowe</div>
			<div class="shoper_editor_contact_lines" style="display: flex; margin: 20px 0;">
				<div style="width: 50%;">
				
					<div style="display: grid;">
					<label class="inp">
						<input class="contact_data" id="company_full_name" placeholder="&nbsp;">
						<span class="label">Pełna nazwa firmy</span>
						<span class="border"></span>
					</label>
					</div>
					
					<div style="display: grid;">
						<label class="inp">
							<input class="contact_data" id="city" placeholder="&nbsp;">
							<span class="label">Miasto</span>
							<span class="border"></span>
						</label>
					</div>
					
					<div style="display: grid;">
						<label class="inp">
							<input class="contact_data" id="street" placeholder="&nbsp;">
							<span class="label">Ulica</span>
							<span class="border"></span>
						</label>
					</div>
					
					<div style="display: grid;">
						<label class="inp">
							<input class="contact_data" id="postal_code" placeholder="&nbsp;">
							<span class="label">Kod pocztowy</span>
							<span class="border"></span>
						</label>
					</div>
					
					<div style="display: grid;">
						<label class="inp">
							<input class="contact_data" id="NIP" placeholder="&nbsp;">
							<span class="label">NIP</span>
							<span class="border"></span>
						</label>
					</div>
					
					<div style="display: grid;">
						<label class="inp">
							<input class="contact_data" id="REGON" placeholder="&nbsp;">
							<span class="label">REGON</span>
							<span class="border"></span>
						</label>
					</div>
					
					<div style="display: grid;">
						<label class="inp">
							<input class="contact_data" id="KRS" placeholder="&nbsp;">
							<span class="label">KRS</span>
							<span class="border"></span>
						</label>
					</div>

				</div>
				
				<div style="width: 50%;">
				
					<div style="display: grid;">
						<label class="inp">
							<input class="contact_data" id="phone_1" placeholder="&nbsp;">
							<span class="label">Tel. 1</span>
							<span class="border"></span>
						</label>
					</div>
					
					<div style="display: grid;">
						<label class="inp">
							<input class="contact_data" id="phone_2" placeholder="&nbsp;">
							<span class="label">Tel. 2</span>
							<span class="border"></span>
						</label>
					</div>
					
					<div style="display: grid;">
						<label class="inp">
							<input class="contact_data" id="email" placeholder="&nbsp;">
							<span class="label">Email</span>
							<span class="border"></span>
						</label>
					</div>
					
					<div style="display: grid;">
						<label class="inp">
							<input class="contact_data" id="link_facebook" placeholder="&nbsp;">
							<span class="label">Link Facebook</span>
							<span class="border"></span>
						</label>
					</div>
					
					<div style="display: grid;">
						<label class="inp">
							<input class="contact_data" id="link_youtube" placeholder="&nbsp;">
							<span class="label">Link Youtube</span>
							<span class="border"></span>
						</label>
					</div>
					
					<div style="display: grid;">
						<label class="inp">
							<input class="contact_data" id="link_instagram" placeholder="&nbsp;">
							<span class="label">Link Instagram</span>
							<span class="border"></span>
						</label>
					</div>
				
				</div>
			</div>
		</div>	
		
		<div class="shoper_editor_section" style="justify-content: center;">
			<div class="next_step blue_btn">Następny krok &nbsp <span class="icon-arrow-right2"></span></div>
		</div>
		
		</div>
	</div>
	
	<div class="step hide" step="3">
		<div class="step_content">
		
			<div class="shoper_editor_section" style="background: #f5f8fb;">
				<div class="add_menu blue_btn"><span class="icon-plus" style="font-size: 10px;"></span> &nbsp Dodaj menu</div>
			</div>
		
			<div class="menu_wrapper">
				
				<div class="create_menu">
					<div class="del_menu_wrapper">
						<span class="icon-cross del_menu"></span> Usuń menu wraz ze wszystkimi podmenu
					</div>
					<div class="create_menu_col_1">
						<div class="menu_grid">
							<label class="inp">
								<input class="menu_name" placeholder="&nbsp;">
								<span class="label">Nazwa menu</span>
								<span class="border"></span>
							</label>
						</div>
					</div>
					<div class="create_menu_col_2">
						<div class="create_menu_img">
							<div class="create_menu_img--info">Dodaj banner menu</div>
							<form method="post" name="menu_img" class="menu_img" enctype="multipart/form-data" action="<?php echo $path;?>functions/shoper/php_editing_functions/up_menu_img.php">
								<input type="file" name="menu_img[]" class="menu_img_btn"/>
							</form>
						</div>
					</div>
					<div class="create_menu_col_3">
						<textarea class="shoper_editor_menu_desc">Opis</textarea>
					</div>
					<div class="menu_creator"></div>
					<div class="add_submenu">
						<span class="icon-plus" style="font-size: 10px;"></span>
						&nbsp Dodaj submenu
					</div>
				</div>
			
			</div>

			<div class="shoper_editor_section" style="justify-content: center; background: #f5f8fb;">
				<div class="last_step accept_wiz_editor blue_btn">Zapisz dane</div>
			</div>
			
		</div>
	</div>
	
</div>

</div>
   