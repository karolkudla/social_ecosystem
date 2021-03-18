<?php

include $_SERVER['DOCUMENT_ROOT'].'/config.php';

;?>

<div class="in_modal_edit" product_id = "" ot="simple_offer">

<div class="loading"><div class="lds-ripple"><div></div><div></div></div></div>

<div id="close" style="position: absolute; top: 3%; right: 2%; font-size; 20px;"><span class="icon-cross accept_editor_szkic_exit" ot="simple_offer"></span></div>

<div class="shoper_editor_top_menu">
	<div class="steps">
		<div class="step_enabled" step="1">Etap 1</div>
		<i class="a-right"></i>
	</div>	
</div>

<div class="edit_panel_inner" style="overflow-x: hidden;">
	
<div class="step show" step="1">

		<div class="shoper_editor_product_line">
			<div style="width: 90%;">
				<div class="about_info">Tytuł oferty</div>
				<div style="display: grid;">
				<label for="new_title" class="inp shoper_product_new_title" style="width: 95%;">
					<input class="new_title" type="text" placeholder="&nbsp;">
					<span class="label">Tytuł oferty</span>
					<span class="border"></span>
				</label>
				</div>
			</div>
		</div>

		<div class="shoper_editor_product_line cats_line">
			<div style="width:90%;">
				<div class="about_info">Wybierz kategorie produktu</div>
				<div class="shoper_editor_additional_info">Tu wybierasz w jakiej kategorii będzie wyświetlana Twoja oferta na platformie Vokulsky</div>
				<div class="shoper_editor_additional_info"><b>Pamiętaj, że kategorię możesz wybrać tylko raz.</b></div>
				<div class="categories_string">
					<select class="sel_cat simple_offers_sel_cat" d="0">
						<option>Wybierz</option>
						<option f="0">Sprzedaż</option>
						<option f="1">Usługi</option>
						<option f="2">Motoryzacja</option>
						<option f="3">Nieruchomości</option>
						<option style="display: none;" f="4">Turystyka</option>
						<option f="5">Praca</option>
						<option style="display: none;" f="6">Bilety</option>
					</select>
				</div>
				
			</div>
		</div>

		<div class="shoper_editor_product_line">
			<div style="width:90%;">
				<div class="about_info">Podaj link do oferty z innego serwisu</div>
				<div class="shoper_editor_additional_info">Możesz podać link do oferty, jeżeli nie chcesz teraz uzupełniać całej specyfikacji oferty</div>
				<div style="display: grid;">
				<label for="link_to_offer" class="inp" style="width: 95%;">
					<input class="link_to_offer" type="text" placeholder="&nbsp;">
					<span class="label">Link do oferty</span>
					<span class="border"></span>
				</label>
				</div>
			</div>
		</div>

		<div class="shoper_editor_product_line">
			<div style="width:90%;">
				<div class="about_info" style="display: flex;">
					Galeria zdjęć oferty
					
					<div class="blue_btn" id="add_new_imgs">	
						<form method="post" name="imgs_up" id="imgs_up" enctype="multipart/form-data" action="<?php echo $path;?>functions/ogloszenia/php_editing_functions/up_images.php"> 
							<input type="file" name="images[]" id="imgs_up_button" multiple />
						</form>
						<span class="icon-plus"></span> &nbsp Dodaj nowe zdjęcia
					</div>	
					
				</div>
					
				<div class="imgs_edit_panel"></div>
			</div>
		</div>
		
		<div class="shoper_editor_product_line">
			<div style="width:90%;">
				<div class="about_info" style="display: flex;">
				
					Filmy youtube
					
					<div style="display: grid; margin: 0 10px; width: 100%;">
						<label class="inp" style="width: 100%;">
							<input id="add_new_youtube_input" placeholder="&nbsp;">
							<span class="label">Link do filmu na Youtube ...</span>
							<span class="border"></span>
						</label>
					</div>
			
					<div id="save_one_yt"><span class="icon-plus"></div></span>

				</div>
				
				<div class="youtube_edit_wrapper"></div>
				
			</div>
		</div>
		
		<div class="shoper_editor_product_line">
			<div class="blue_btn first_step_simple">Następny krok &nbsp <span class="icon-arrow-right2"></span></div>
		</div>
		
</div>
</div>



</div>