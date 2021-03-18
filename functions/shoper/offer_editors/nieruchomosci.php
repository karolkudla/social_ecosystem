<?php include $_SERVER['DOCUMENT_ROOT'].'/config.php';?>

<!-- Kontener na moduł wyświetlający - closest(".container") -->
<!-- text_name -- Nazwa grupy pól - parent().siblings(".text name") -->
<!-- name, value, text_value -->

<div class="step hide" step="2">

<div class="shoper_editor_product_line container" container="podstawowe_dane">

	<div class="w-90">
		<div class="flex">
			<div class="w-100">
				<div class="shoper_editor_inline_header text_name">Rodzaj oferty</div>

				<label><input class="idg" type="radio"  name="rodzaj_oferty" value="ogloszenie">Ogłoszenie</label>
				<label><input class="idg" type="radio"  name="rodzaj_oferty" value="sprzedaz">Sprzedaż (Kup Teraz)</label>
				<label><input class="idg" type="radio"  name="rodzaj_oferty" value="licytacja">Licytacja</label>

			</div>

			<div class="w-100">
				<div class="shoper_editor_inline_header text_name">Dodajesz jako</div>
				<label><input class="idg" type="radio" name="dodajesz_jako" value="wlasciciel">Właściciel</label>
				<label><input class="idg" type="radio" name="dodajesz_jako" value="posrednik">Pośrednik</label>
			</div>

			<div class="w-100">
				<div class="shoper_editor_inline_header text_name">Oferta skierowana do</div>
				<label><input class="idg" type="radio" name="oferta_do" value="do_wszystkich">Do wszystkich użytkowników</label>
				<label><input class="idg" type="radio" name="oferta_do" value="firmy">Firmy / B2B</label>
				<label><input class="idg" type="radio" name="oferta_do" value="posrednicy">Pośrednicy</label>
				<label><input class="idg" type="radio" name="oferta_do" value="klienci_indywidualni">Klienci indywidualni</label>
			</div>

			<div class="w-100">
				<div class="shoper_editor_inline_header text_name">Wyróżniki oferty</div>
				<label><input class="idg" type="checkbox" name="100_pl" value="100_pl">100% Polska Firma</label>
			</div>

			<div class="w-100">
				<div class="shoper_editor_inline_header text_name">Ilość sztuk</div>
				<label><input class="idg" type="radio" name="ilosc_sztuk" value="nie_dotyczy">Nie dotyczy</label>
				<label><input class="idg" type="radio" name="ilosc_sztuk" value="oferta_stala">Oferta stała</label>
				<label><input class="idg" type="radio" name="ilosc_sztuk" value="jedna_sztuka">Jedna sztuka</label>
				<label><input class="idg" type="radio" name="ilosc_sztuk" value="wiele_sztuk">Wiele sztuk</label>
				<label><input class="idg std_text_input" name="ilosc_sztuk_liczba" type="text" placeholder="Podaj ilość" ></label>
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

<div class="shoper_editor_product_line container" container="specyfikacja_oferty">
		<div class="w-90">		
			
			<div class="about_info text_name">Specyfikacja oferty</div>
			<div class="flex">

				<div class="w-100">
					<div class="shoper_editor_inline_header text_name">Rodzaj umowy</div>
					<label><input class="idg" type="radio"  name="rodzaj_umowy" value="kupno-sprzedaz">Umowa kupna - sprzedaży</label>
					<label><input class="idg" type="radio"  name="rodzaj_umowy" value="odstapienie">Umowa odstąpienia lokalu</label>
					<label><input class="idg" type="radio"  name="rodzaj_umowy" value="najem">Umowa najmu</label>
					<label><input class="idg" type="radio"  name="rodzaj_umowy" value="najem_okazjonalny">Najem okazjonalny</label>
					<label><input class="idg" type="radio"  name="rodzaj_umowy" value="inna">Inna</label>
				</div>
				
				<div class="w-100">
					<div class="shoper_editor_inline_header text_name">Rodzaj obiektu</div>
					<label><input class="idg" type="radio"  name="rodzaj_obiektu" value="dom">Domy</label>
					<label><input class="idg" type="radio"  name="rodzaj_obiektu" value="mieszkanie">Mieszkania</label>
					<label><input class="idg" type="radio"  name="rodzaj_obiektu" value="pokoje">Pokoje</label>
					<label><input class="idg" type="radio"  name="rodzaj_obiektu" value="lokale_uzytkowe">Lokale użytkowe</label>
				</div>
				
				<div class="w-100">
					<div class="shoper_editor_inline_header text_name">Rodzaj obiektu</div>
					<label><input class="idg" type="radio"  name="rodzaj_obiektu" value="hale_magazyny">Hale i magazyny</label>
					<label><input class="idg" type="radio"  name="rodzaj_obiektu" value="dzialki">Działki</label>
					<label><input class="idg" type="radio"  name="rodzaj_obiektu" value="garaze">Garaże</label>
					<label><input class="idg" type="radio"  name="rodzaj_obiektu" value="inne">Inne</label>
				</div>
				
			</div>
			
		</div>
</div>

<div class="shoper_editor_product_line container" container="otoczenie_obiektu">
		<div class="w-90">		
			
			<div class="about_info text_name">Otoczenie obiektu</div>
			<div class="flex">
				<div class="w-100">
					<label><input class="idg" type="checkbox"  name="las" value="tak">Las</label>
					<label><input class="idg" type="checkbox"  name="jezioro" value="tak">Jezioro</label>
					<label><input class="idg" type="checkbox"  name="gory" value="tak">Góry</label>
					<label><input class="idg" type="checkbox"  name="trasy_rowerowe" value="tak">Trasy rowerowe</label>
					<label><input class="idg" type="checkbox"  name="trasy_piesze" value="tak">Trasy piesze</label>
					<label><input class="idg" type="checkbox"  name="trasy_narciarskie" value="tak">Trasy narciarskie</label>
				</div>
				
				<div class="w-100">
					
					<label><input class="idg" type="checkbox"  name="trasy_konne" value="tak">Trasy konne</label>
					<label><input class="idg" type="checkbox"  name="punkty_widokowe" value="tak">Punkty widokowe</label>
					<label><input class="idg" type="checkbox"  name="zabytki" value="tak">Zabytki</label>
					<label><input class="idg" type="checkbox"  name="atrakcje_dla_dzieci" value="tak">Atrakcje dla dzieci</label>
					<label><input class="idg" type="checkbox"  name="osrodki_wypoczynkowe" value="tak">Ośrodki wypoczynkowe</label>
					<label><input class="idg" type="checkbox"  name="puby" value="tak">Puby</label>
				</div>
				
				<div class="w-100">
					<label><input class="idg" type="checkbox"  name="restauracje" value="tak">Restauracje</label>
					<label><input class="idg" type="checkbox"  name="lotnisko" value="tak">Lotnisko</label>
					<label><input class="idg" type="checkbox"  name="metro" value="tak">Metro</label>
					<label><input class="idg" type="checkbox"  name="komunikacja_miejska" value="tak">Komunikacja miejska</label>
					<label><input class="idg" type="checkbox"  name="dworzec" value="tak">Dworzec</label>
				</div>
				
			</div>
		</div>
	</div>

<div class="shoper_editor_product_line">
	<div class="next_step blue_btn check_nieruchomosci">Następny krok &nbsp <span class="icon-arrow-right2"></span></div>
</div>

</div>

<div class="step hide all_labels_80" step="3">

	<div class="shoper_editor_product_line container" container="dane_opiekuna">
		
		<div class="w-90">
			<div class="about_info text_name">Dane opiekuna</div>
			<div class="shoper_editor_additional_info">Dane kontaktowe osoby odpowiedzialnej za kontakt w sprawie oferty</div>
			
			<div class="flex space-around">
				
				<div class="flex-center-middle w-100">
					<div class="profile_img_wrapper">
				
						<form method="post" name="profile_img" id="profile_img" enctype="multipart/form-data" action="<?php echo $path;?>edit_access/up_profile_img.php">   
						<input type="file" name="profile_img[]" id="profile_img_btn"/>
						</form>
						
						<div class="add_profile_text" style="display: flex;">
						<span class="icon-plus"></span> <div class="con_h"> &nbsp Dodaj zdjęcie profilowe</div>
						</div>
				
					</div>
				</div>
				
				<div class="w-100">
					<div class="super_text_grid">
					<label class="inp">
						<input class="idg" type="super_text" name="opiekun_imie_nazwisko" placeholder="&nbsp;">
						<span class="label">Imię i nazwisko</span>
						<span class="border"></span>
					</label>
					</div>
					
					<div class="super_text_grid">
						<label class="inp">
							<input class="idg" type="super_text" name="opiekun_tel" placeholder="&nbsp;">
							<span class="label">Telefon</span>
							<span class="border"></span>
						</label>
					</div>
					
					<div class="super_text_grid">
						<label class="inp">
							<input class="idg" type="super_text" name="opiekun_email" placeholder="&nbsp;">
							<span class="label">Email</span>
							<span class="border"></span>
						</label>
					</div>
				
				</div>
				<div class="w-100">
				
					<div class="super_text_grid">
						<label class="inp">
							<input class="idg" type="super_text" name="opiekun_firma_nazwa" placeholder="&nbsp;">
							<span class="label">Nazwa firmy</span>
							<span class="border"></span>
						</label>
					</div>
					
					<div class="super_text_grid">
						<label class="inp">
							<input class="idg" type="super_text" name="opiekun_firma_ulica" placeholder="&nbsp;">
							<span class="label">Ulica</span>
							<span class="border"></span>
						</label>
					</div>
					
					<div class="super_text_grid">
						<label class="inp">
							<input class="idg" type="super_text" name="opiekun_firma_miasto" placeholder="&nbsp;">
							<span class="label">Miasto</span>
							<span class="border"></span>
						</label>
					</div>
					
					<div class="super_text_grid">
						<label class="inp">
							<input class="idg" type="super_text" name="opiekun_firma_kod_pocztowy" placeholder="&nbsp;">
							<span class="label">Kod pocztowy</span>
							<span class="border"></span>
						</label>
					</div>
					
				</div>
			</div>
		</div>
		
	</div>
	
	<div class="shoper_editor_product_line container" container="lokalizacja_oferty">
		
		<div class="w-90">
			<div class="about_info text_name">Lokalizacja obiektu</div>
			
			<div class="flex space-around">
				
				<div class="lokalizacja_mapa w-100">Mapka</div>
				
				<div class="w-100">
				
					<div class="super_text_grid">
					<label class="inp">
						<input class="idg" type="super_text" name="lokalizacja_ulica" placeholder="&nbsp;">
						<span class="label">Ulica</span>
						<span class="border"></span>
					</label>
					</div>
					
					<div class="super_text_grid">
						<label class="inp">
							<input class="idg" type="super_text" name="lokalizacja_miasto" placeholder="&nbsp;">
							<span class="label">Miasto</span>
							<span class="border"></span>
						</label>
					</div>
					
					<div class="super_text_grid">
						<label class="inp">
							<input class="idg" type="super_text" name="lokalizacja_kod_pocztowy" placeholder="&nbsp;">
							<span class="label">Kod pocztowy</span>
							<span class="border"></span>
						</label>
					</div>
				
				</div>
				
			</div>
			
		</div>
		
	</div>
	
	<div class="shoper_editor_product_line">
		<div class="next_step blue_btn">Następny krok &nbsp <span class="icon-arrow-right2"></span></div>
	</div>

</div>

<div class="step hide" step="4"></div>

<div class="step hide" step="5"></div>

<div class="step hide" step="6">
	<?php include $_SERVER['DOCUMENT_ROOT'].'/functions/shoper/offer_editors/podsumowanie.php' ;?>
</div>