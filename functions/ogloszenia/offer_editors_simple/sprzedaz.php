<?php 
	include $_SERVER['DOCUMENT_ROOT'].'/config.php';
	session_start();
?>

<!-- Kontener na moduł wyświetlający - closest(".container") -->
<!-- text_name -- Nazwa grupy pól - parent().siblings(".text name") -->
<!-- name, value, text_value -->

<div class="step hide" step="2">

<div class="shoper_editor_product_line container" container="podstawowe_dane" style="display:none;">

	<div class="w-90">
		<div class="flex">
			<div class="w-100 required">
				<div class="shoper_editor_inline_header text_name">Rodzaj oferty</div>
				<label><input class="idg" type="radio"  name="rodzaj_oferty" value="ogloszenie" checked>Ogłoszenie</label>
			</div>
		</div>
	</div>
	
</div>

<div class="shoper_editor_product_line container" container="telefon">	
	<div class="w-90">
	
		<div class="flex">
	
			<div class="w-100">
				<div class="about_info text_name">Tel. kontaktowy</div>
				<label><input class="idg std_text_input" type="number" name="tel_kontaktowy" placeholder="Podaj nr tel"></label>
			</div>
			
			<div class="w-100">
			</div>
			
			<div class="w-100">
			</div>
			
			<div class="w-100">
			</div>
			
		</div>
	
	</div>	
</div>

<div class="shoper_editor_product_line container" container="cennik">
		<div class="w-90">				
				<div class="flex">
					
					<div class="w-100">
						<div class="about_info text_name">Cena</div>
						<label><input class="idg std_text_input" type="number" name="cena_brutto_wartosc" placeholder="Podaj cenę"></label>
					</div>
					
					<div class="w-100">
					</div>
					
					<div class="w-100">
					</div>
					
					<div class="w-100">
					</div>
				
				</div>
					
		</div>
	</div>

<div class="shoper_editor_product_line container" container="podstawowe_dane">
	<div class="w-90">
		<div class="about_info text_name">Opis oferty</div>
		<div><textarea type="text" class="idg" name="opis_oferty"></textarea></div>
	</div>
</div>

<div class="shoper_editor_product_line container" container="podstawowe_dane">
	<div class="w-90">
		<div class="about_info text_name">Specyfikacje oferty</div>
		<div><textarea type="text" class="idg" name="specyfikacje_oferty"></textarea></div>
	</div>
</div>


	<div class="shoper_editor_product_line container" container="lokalizacja_oferty">
		
		<div class="w-90">
			<div class="about_info text_name">Lokalizacja oferty</div>
			
			<div class="flex space-around">
				<div class="flex w-100">
					<select class="select_wojewodztwa idg std_text_input" type="select" name="lokalizacja_wojewodztwo">
						<option value=""					kod="">Województwo</option>
						<option value="Dolnośląskie" 		kod="02">Dolnośląskie</option>
						<option value="Kujawsko Pomorskie" 	kod="04">Kujawsko Pomorskie</option>
						<option value="Lubelskie" 			kod="06">Lubelskie</option>
						<option value="Lubuskie" 			kod="08">Lubuskie</option>
						<option value="Łódzkie" 			kod="10">Łódzkie</option>
						<option value="Małopolskie" 		kod="12">Małopolskie</option>
						<option value="Mazowieckie" 		kod="14">Mazowieckie</option>
						<option value="Opolskie" 			kod="16">Opolskie</option>
						<option value="Podkarpackie" 		kod="18">Podkarpackie</option>
						<option value="Podlaskie" 			kod="20">Podlaskie</option>
						<option value="Pomorskie" 			kod="22">Pomorskie</option>
						<option value="Śląskie" 			kod="24">Śląskie</option>
						<option value="Świętokrzyskie" 		kod="26">Świętokrzyskie</option>
						<option value="Warmińsko - Mazurskie" kod="28">Warmińsko - Mazurskie</option>
						<option value="Wielkopolskie" 		kod="30">Wielkopolskie</option>
						<option value="Zachodniopomorskie" 	kod="32">Zachodniopomorskie</option>
					</select>
					<select class="select_powiaty idg std_text_input" type="select" name="lokalizacja_powiat"><option value="" kod="">Miasto / Powiat</option></select>
					<select class="select_miasta_gminy idg std_text_input" type="select" name="lokalizacja_miasto"><option value="" kod="" rodz="">Miejscowość / Gmina</option></select>
				</div>
			</div>
			
			<div class="lokalizacja_mapa w-100"></div>
			
		</div>
		
	</div>
		


<div class="shoper_editor_product_line">
	<div class="next_step blue_btn get_view">Następny krok &nbsp <span class="icon-arrow-right2"></span></div>
</div>

</div>

<div class="step hide" step="3">
	<?php include $_SERVER['DOCUMENT_ROOT'].'/functions/ogloszenia/offer_editors_simple/podsumowanie.php' ;?>
</div>