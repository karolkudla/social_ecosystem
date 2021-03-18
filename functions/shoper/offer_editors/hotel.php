<?php include $_SERVER['DOCUMENT_ROOT'].'/config.php';?>

<div class="step hide" step="2">

	<div class="shoper_editor_product_line container" container="podstawowe_dane">
		<div class="w-90">
			<div class="flex">
				<div class="w-100">
					<div class="shoper_editor_inline_header text_name">Rodzaj oferty</div>
					<label><input class="idg" type="radio"  name="rodzaj_oferty" value="ogloszenie">Ogłoszenie</label>
					<label><input class="idg" type="radio"  name="rodzaj_oferty" value="licytacja">Licytacja</label>
					<label><input class="idg" type="radio"  name="rodzaj_oferty" value="rezerwacja">Rezerwacja</label>
					
				</div>

				<div class="w-100">
					<div class="shoper_editor_inline_header text_name">Dodajesz jako</div>
					<label><input class="idg" type="radio" name="dodajesz_jako" value="bezposrednio">Bezpośrednio</label>
					<label><input class="idg" type="radio" name="dodajesz_jako" value="posrednik">Pośrednik</label>
				</div>

				<div class="w-100">
					<div class="shoper_editor_inline_header text_name">Oferta skierowana do</div>
					<label><input class="idg" type="radio" name="oferta_do" value="do_wszystkich">Do wszystkich użytkowników</label>
					<label><input class="idg" type="radio" name="oferta_do" value="firmy">Firmy</label>
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
					<label><input class="idg std_text_input" name="ilosc_sztuk_liczba" type="text" placeholder="Podaj ilość"></label>
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
			
			<div class="flex">
				<div class="w-100">
					<div class="shoper_editor_inline_header text_name">Rodzaj obiektu</div>
					<label><input class="idg" type="checkbox" name="hotel" value="tak">Hotel</label>
					<label><input class="idg" type="checkbox" name="motel" value="tak">Motel</label>
					<label><input class="idg" type="checkbox" name="hostel" value="tak">Hostel</label>
					<label><input class="idg" type="checkbox" name="pensjonat" value="tak">Pensjonat</label>
					<label><input class="idg" type="checkbox" name="apartament" value="tak">Apartament</label>
				</div>
				
				<div class="w-100">
					<div class="shoper_editor_inline_header text_name">Rodzaj obiektu</div>
					<label><input class="idg" type="checkbox" name="willa" value="tak">Willa</label>
					<label><input class="idg" type="checkbox" name="agroturystyka" value="tak">Agroturystyka</label>
					<label><input class="idg" type="checkbox" name="dom_letniskowy" value="tak">Dom letniskowy</label>
					<label><input class="idg" type="checkbox" name="dom_wycieczkowy" value="tak">Dom wycieczkowy</label>
					<label><input class="idg" type="checkbox" name="kurort" value="tak">Kurort</label>
				</div>
				
				<div class="w-100">
					<div class="shoper_editor_inline_header text_name">Rodzaj obiektu</div>
					<label><input class="idg" type="checkbox" name="pole_biwakowe" value="tak">Pole biwakowe</label>
					<label><input class="idg" type="checkbox" name="pole_kempingowe" value="tak">Pole kempingowe</label>
					<label><input class="idg" type="checkbox" name="kwatera_prywatna" value="tak">Kwatera prywatna</label>
					<label><input class="idg" type="checkbox" name="dom_prywatny" value="tak">Dom prywatny</label>
					<label><input class="idg" type="checkbox" name="mieszkanie_prywatne" value="tak">Mieszkanie prywatne</label>
				</div>
				
				<div class="w-100">
					<div class="shoper_editor_inline_header text_name">Rodzaj obiektu</div>
					<label><input class="idg" type="checkbox" name="schronisko_mlodziezowe" value="tak">Schronisko młodzieżowe</label>
					<label><input class="idg" type="checkbox" name="schronisko_turystyczne" value="tak">Schronisko turystyczne</label>
					<label><input class="idg" type="checkbox" name="inne" value="tak">Inne</label>
				</div>
			</div>
			
		</div>
	</div>

	<div class="shoper_editor_product_line container" container="podstawowe_dane">
		<div class="w-90">
			<div class="about_info">Informacje o obiekcie</div>
			
			<div class="flex">
				<div class="w-100">
					<div class="shoper_editor_inline_header text_name">Informacje o obiekcie</div>
					
					<div class="flex space-between">
						<label>Standard obiektu</label>
						<label>
							<select class="idg std_text_input" type="select" name="standard_obiektu">
								<option></option>
								<option>* - 1 gwiazdka</option>
								<option>** - 2 gwiazdki</option>
								<option>*** - 3 gwiazdki</option>
								<option>**** - 4 gwiazdki</option>
								<option>***** - 5 gwiazdek</option>
								<option>ekonomiczny</option>
								<option>średni</option>
								<option>komfortowy</option>
								<option>premium</option>
								<option>luksusowy</option>
							</select>
						</label>
					</div>
					
					<div class="flex space-between">
						<label>Lokalizacja obiektu</label>
						<label>
							<select class="idg std_text_input" type="select" name="lokalizacja_obiektu">
								<option>Centrum miasta</option>
								<option>Blisko Centrum Miasta</option>
								<option>Miasto</option>
								<option>Przedmieścia</option>
								<option>Wieś</option>
								<option>nie dotyczy</option>
							</select>
						</label>
					</div>
					
					<div class="flex space-between">
						<label>Odległość od centrum miasta</label>
						<label>
							<select class="idg std_text_input" type="select" name="odleglosc_od_centrum">
								<option>Mniej niż 1 km</option>
								<option>Mniej niż 3 km</option>
								<option>Mniej niż 5 km</option>
								<option>Mniej niż 10 km</option>
								<option>Mniej niż 15 km</option>
								<option>Mniej niż 20 km</option>
								<option>Powyżej 20 km</option>
							</select>
						</label>
					</div>
					
					<div class="flex space-between">
						<label>Maksymalna liczba osób</label>
						<label>
							<input type="number" class="idg std_text_input" name="max_liczba_osob">
						</label>
					</div>
					
				</div>
				<div class="w-100">
			
					<div class="shoper_editor_inline_header text_name">Informacje o obiekcie</div>
				
					<div class="flex space-between">
						<label>Powierzchnia</label>
						<label>
							<input type="number" class="idg std_text_input" name="powierzchnia">
						</label>
					</div>
					
					<div class="flex space-between">
						<label>Klimatyzacja</label>
						<label>
							<select class="idg std_text_input" type="select" name="klimatyzacja">
								<option>Tak</option>
								<option>Nie</option>
							</select>
						</label>
					</div>
					

					<div class="flex space-between">
						<label>Darmowe WIFI</label>
						<label>
							<select class="idg std_text_input" type="select" name="wifi">
								<option>Tak</option>
								<option>Nie</option>
							</select>
						</label>
					</div>
				
					<div class="flex space-between">
						<label>Pobyt dla dziecka do 3 lat - gratis</label>
						<label>
							<select class="idg std_text_input" type="select" name="dziecko_3lat">
								<option>Tak</option>
								<option>Nie</option>
								<option>Nie dotyczy</option>
							</select>
						</label>
					</div>
				
				</div>
				
				<div class="w-100">
			
					<div class="shoper_editor_inline_header text_name">Informacje o obiekcie</div>
				
				<div class="flex space-between">
					<label>Tylko dla osób niepalących</label>
					<label>
						<select class="idg std_text_input" type="select" name="niepalace">
							<option>Tak</option>
							<option>Nie</option>
							<option>Nie dotyczy</option>
						</select>
					</label>
				</div>
				
				<div class="flex space-between">
					<label>Możliwość dostawienia dodatkowego łóżka</label>
					<label>
						<select class="idg std_text_input" type="select" name="dodatkowe_lozko">
							<option>Tak</option>
							<option>Nie</option>
							<option>Nie dotyczy</option>
						</select>
					</label>
				</div>
				
				<div class="flex space-between">
					<label>Możliwość pobytu ze zwierzętami</label>
					<label>
						<select class="idg std_text_input" type="select" name="zwierzeta">
							<option>Tak</option>
							<option>Nie</option>
							<option>Nie dotyczy</option>
						</select>
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
	
	<div class="shoper_editor_product_line container" container="dane_obiektu">
	
		<div class="w-90">
			<div class="about_info text_name">Dane obiektu</div>
			
				<div class="flex space-around">
			
					<div class="w-100">
						
						<div class="super_text_grid">
							<label class="inp">
								<input class="idg" type="super_text" name="obiekt_nazwa" placeholder="&nbsp;">
								<span class="label">Pełna nazwa obiektu</span>
								<span class="border"></span>
							</label>
						</div>
						
						<div class="super_text_grid">
							<label class="inp">
								<input class="idg" type="super_text" name="obiekt_ulica" placeholder="&nbsp;">
								<span class="label">Ulica</span>
								<span class="border"></span>
							</label>
						</div>
						
						<div class="super_text_grid">
							<label class="inp">
								<input class="idg" type="super_text" name="obiekt_miasto" placeholder="&nbsp;">
								<span class="label">Miasto</span>
								<span class="border"></span>
							</label>
						</div>
						
						<div class="super_text_grid">
							<label class="inp">
								<input class="idg" type="super_text" name="obiekt_kod_pocztowy" placeholder="&nbsp;">
								<span class="label">Kod pocztowy</span>
								<span class="border"></span>
							</label>
						</div>

					</div>
		
					<div class="w-100">
						
						<div class="super_text_grid">
							<label class="inp">
								<input class="idg" type="super_text" name="obiekt_nip" placeholder="&nbsp;">
								<span class="label">NIP</span>
								<span class="border"></span>
							</label>
						</div>
						
						<div class="super_text_grid">
							<label class="inp">
								<input class="idg" type="super_text" name="obiekt_regon" placeholder="&nbsp;">
								<span class="label">REGON</span>
								<span class="border"></span>
							</label>
						</div>
						
						<div class="super_text_grid">
							<label class="inp">
								<input class="idg" type="super_text" name="obiekt_krs" placeholder="&nbsp;">
								<span class="label">KRS</span>
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

<div class="step hide" step="4">

	<div class="shoper_editor_product_line container" container="cennik">
		<div class="w-90">
				<div class="about_info text_name">Cennik</div>
				
				<div class="flex">
					<div class="w-100">
						<div class="shoper_editor_inline_header text_name">Waluta rozliczeniowa</div>

						<label><input class="idg" type="radio"  name="waluta_rozliczeniowa" value="PLN">PLN</label>
						<label><input class="idg" type="radio"  name="waluta_rozliczeniowa" value="EUR">EUR</label>
						<label><input class="idg" type="radio"  name="waluta_rozliczeniowa" value="USD">USD</label>
						<label><input class="idg" type="radio"  name="waluta_rozliczeniowa" value="inna">Inna</label>
						<label><input class="idg std_text_input" type="text"   name="waluta_rozliczeniowa_inna" placeholder="Podaj nazwę waluty" ></label>

					</div>
					<div class="w-100">
						<div class="shoper_editor_inline_header text_name">Cena</div>

						<label><input class="idg" 				 type="radio"  name="cena" value="cena_brutto">Cena brutto</label>
						<label><input class="idg std_text_input" type="number"   name="cena_brutto_wartosc" placeholder="Kwota brutto" ></label>
						<label><input class="idg" 				 type="radio"  name="cena" value="cena_netto">Cena netto</label>
						<label><input class="idg std_text_input" type="number"   name="cena_netto_wartosc" placeholder="Kwota netto" ></label>

					</div>
					<div class="w-100">
						<div class="shoper_editor_inline_header text_name">Cena obejmuje</div>

						<label><input class="idg" type="radio"  name="cena_za" value="doba">Dobę</label>
						<label><input class="idg" type="radio"  name="cena_za" value="godzina">Godzinę</label>
						<label><input class="idg" type="radio"  name="cena_za" value="inne">Inne</label>


					</div>
					<div class="w-100">
						<div class="shoper_editor_inline_header text_name">Sposoby płatności</div>

						<label><input class="idg" type="checkbox"  name="sp_nie_dotyczy" value="sp_nie_dotyczy">Nie dotyczy</label>
						<label><input class="idg" type="checkbox"  name="sp_przelew" value="sp_przelew">Przelew</label>
						<label><input class="idg" type="checkbox"  name="sp_gotowka" value="sp_gotowka">Gotówka</label>
						
						<label><input class="idg" type="checkbox"  name="sp_raty" value="sp_raty">Płatność ratalna</label>
						<label><input class="idg std_text_input" type="number"   name="sp_raty_ilosc" placeholder="Podaj ilość rat" ></label>
						<label><input class="idg" type="checkbox"  name="sp_odroczony_termin" value="sp_odroczony_termin">Płatność z odroczonym terminem</label>
						<label><input class="idg std_text_input" type="number"   name="sp_odroczony_termin_ilosc" placeholder="Podaj ilość dni odroczenia" ></label>

					</div>
					<div class="w-100">
						<div class="shoper_editor_inline_header text_name">Oznacz cenę jako</div>

						<label><input class="idg" type="radio"  name="cena_specjalna" value="promocja">Promocja</label>
						<label><input class="idg std_text_input" type="number"   name="promocja_cena" placeholder="Kwota" ></label>
						<label><input class="idg" type="radio"  name="cena_specjalna" value="okazja">Okazja</label>
		
					</div>
				</div>

		</div>
	</div>
	
	<div class="shoper_editor_product_line container" container="info_o_rezerwacji">
		<div class="w-90">
			<div class="w-100">
				<div class="shoper_editor_inline_header text_name">Informacje o rezerwacji</div>
				<div class="flex">
					<label><input class="idg" type="checkbox"  name="bezplatne_odwolanie" value="tak">Bezpłatne odwołanie rezerwacji</label>
					<label><input class="idg" type="checkbox"  name="brak_przedplaty" value="tak">Brak przedpłaty</label>
					<label><input class="idg" type="checkbox"  name="tylko_gotowka" value="tak">Płatność tylko gotówką</label>
					<label><input class="idg" type="checkbox"  name="platnosc_w_obiekcie" value="tak">Płatność w obiekcie</label>
					<label><input class="idg" type="checkbox"  name="rezerwacja_bez_karty" value="tak">Rezerwacja bez karty kredytowej</label>
				</div>
			</div>	
		</div>
	</div>
	
	<div class="shoper_editor_product_line container" container="gwarancje">
	
		<div class="w-90">
			<div class="about_info text_name">Informacje o wystawcy oferty</div>
			
			<div class="w-100">
				<div class="shoper_editor_inline_header text_name">Długość działalności firmy</div>
				<div class="flex">
					<label><input class="idg" type="radio"  name="dlugosc_dzialalnosci" value="mniej_niz_1">Poniżej 1 roku</label>
					<label><input class="idg" type="radio"  name="dlugosc_dzialalnosci" value="pomiedzy_1_a_2">1 - 2 lat</label>
					<label><input class="idg" type="radio"  name="dlugosc_dzialalnosci" value="pomiedzy_2_a_5">2 - 5 lat</label>
					<label><input class="idg" type="radio"  name="dlugosc_dzialalnosci" value="powyzej_5">Powyżej 5 lat</label>
				</div>
			</div>
			
			<div class="w-100">
				<div class="shoper_editor_inline_header text_name">Odstąpienie od umowy zakupu</div>
				<label><input class="idg" type="radio"  name="odstapienie_od_umowy" value="dowolny_czas">Wystawca oferty uwzględnia odstąpienie od zakupu na dowolnym etapie jego realizacji w terminie 10 dni od daty zawarcia transakcji</label>
				<div class="flex">
					<label><input class="idg" type="radio"  name="odstapienie_od_umowy" value="do_x_dni">Wystawca oferty uwzględnia prawo kupującego do odstąpienia od umowy zakupu na dowolnym etapie jego realizacji w terminie do </label>
					<label>
						<select class="idg" type="select" name="odstapienie_od_umowy_ilosc_dni">
							<option></option>
							<option>1 dzień</option>
							<option>2 dni</option>
							<option>3 dni</option>
						</select>
					</label>
					<label> dni od daty zawarcia transakcji</label>
				</div>
				
				<label><input class="idg" type="radio"  name="odstapienie_od_umowy" value="nie">Wystawca oferty nie uwzględnia prawa kupującego do odstąpienia od umowy zakupu</label>
				
				<div class="flex">
					<label><input class="idg" type="radio"  name="odstapienie_od_umowy" value="odstapienie_od_umowy_kwota">W przypadku odstąpienia kupującego od umowy zakupu wystawca oferty zwraca kupującemu kwotę w wysokości </label>
					<label><input class="idg std_text_input" type="number"   name="odstapenie_od_umowy_kwota_wartosc" placeholder="Podaj wartość %"> % wysokości zamówienia</label>
				</div>
			</div>
		
		</div>

	</div>
	
	<div class="shoper_editor_product_line">
		<div class="w-90">
			<div class="about_info text_name">Dopłaty i rabaty</div>
			<div class="shoper_editor_inline_header text_name">Czy chcesz dodać dopłaty lub rabaty ?
				<label><input class="idg" type="radio"  name="doplaty_rabaty" value="Tak">Tak</label>
				<label><input class="idg" type="radio"  name="doplaty_rabaty" value="nie">Nie</label>
			</div>
		</div>
	</div>
	
	<div class="shoper_editor_product_line">
		<?php include $_SERVER['DOCUMENT_ROOT'].'/edit_access/layouts/module_doplaty_rabaty.php';?>
	</div>
	
	<div class="shoper_editor_product_line">
		<div class="next_step blue_btn">Następny krok &nbsp <span class="icon-arrow-right2"></span></div>
	</div>
	
</div>

<div class="step hide" step="5">

	<div class="shoper_editor_product_line container" container="wyposazenie">
		<div class="w-90">
			
			<div class="about_info text_name">Wyposażenie pokoju / domu / apartamentu</div>
			<div class="flex">
				<div class="w-100">
					<div class="shoper_editor_inline_header text_name">Wyposażenie</div>
					<label><input class="idg" type="checkbox"  name="obsluga_pokoju" value="tak">Obsługa pokoju</label>
					<label><input class="idg" type="checkbox"  name="obsluga_pokoju_calodobowa" value="tak">Całodobowa obsługa pokoju</label>
					<label><input class="idg" type="checkbox"  name="sejf" value="tak">Sejf</label>
					<label><input class="idg" type="checkbox"  name="telefon" value="tak">Telefon</label>
					<label><input class="idg" type="checkbox"  name="sniadanie_w_cenie" value="tak">Śniadanie w cenie</label>
					<label><input class="idg" type="checkbox"  name="posilki_w_cenie" value="tak">Posiłki w cenie</label>
					<label><input class="idg" type="checkbox"  name="taras" value="tak">Taras</label>
				</div>
				
				<div class="w-100">
					<div class="shoper_editor_inline_header text_name">Wyposażenie</div>
					<label><input class="idg" type="checkbox"  name="balkon" value="tak">Balkon</label>
					<label><input class="idg" type="checkbox"  name="widok" value="tak">Ładny widok</label>
					<label><input class="idg" type="checkbox"  name="dzwiekoszczelny" value="tak">Pomieszczenie dźwiękoszczelne</label>
					<label><input class="idg" type="checkbox"  name="zestaw_do_parzenia" value="tak">Zestaw do kawy/herbaty</label>
					<label><input class="idg" type="checkbox"  name="czajnik" value="tak">Czajnik</label>
					<label><input class="idg" type="checkbox"  name="ekspres" value="tak">Ekspres do kawy</label>
					<label><input class="idg" type="checkbox"  name="telewizor" value="tak">Telewizor</label>
				</div>
				
				<div class="w-100">
					<div class="shoper_editor_inline_header text_name">Wyposażenie</div>
					<label><input class="idg" type="checkbox"  name="telewizor_plaski" value="tak">Płaski telewizor</label>
					<label><input class="idg" type="checkbox"  name="tv_satelitarna" value="tak">TV satelitarna</label>
					<label><input class="idg" type="checkbox"  name="lazienka" value="tak">Łazienka</label>
					<label><input class="idg" type="checkbox"  name="lazienka_prysznic" value="tak">Łazienka z prysznicem</label>
					<label><input class="idg" type="checkbox"  name="lazienka_wanna" value="tak">Łazienka z wanną</label>
					<label><input class="idg" type="checkbox"  name="jacuzzi" value="tak">Jacuzzi</label>
					<label><input class="idg" type="checkbox"  name="minibar" value="tak">Minibar</label>
				</div>
				
				<div class="w-100">
					<div class="shoper_editor_inline_header text_name">Wyposażenie</div>
					<label><input class="idg" type="checkbox"  name="biurko" value="tak">Biurko</label>
					<label><input class="idg" type="checkbox"  name="szafa" value="tak">Szafa</label>
					<label><input class="idg" type="checkbox"  name="suszarka_do_wlosow" value="tak">Suszarka do włosów</label>
					<label><input class="idg" type="checkbox"  name="zestaw_kosmetykow" value="tak">Zestaw kosmetyków</label>
					<label><input class="idg" type="checkbox"  name="szlafrok" value="tak">Szlafrok</label>
					<label><input class="idg" type="checkbox"  name="reczniki" value="tak">Ręczniki</label>
					<label><input class="idg" type="checkbox"  name="kapcie" value="tak">Kapcie</label>
				</div>
				
				<div class="w-100">
					<div class="shoper_editor_inline_header text_name">Wyposażenie</div>
					<label><input class="idg" type="checkbox"  name="aneks_kuchenny" value="tak">Aneks kuchenny</label>
					<label><input class="idg" type="checkbox"  name="kuchnia" value="tak">Kuchnia</label>
					<label><input class="idg" type="checkbox"  name="pelne_wyposazenie_kuchni" value="tak">Pełne wyposażenie kuchni</label>
					<label><input class="idg" type="checkbox"  name="mikrofala" value="tak">Mikrofalówka</label>
					<label><input class="idg" type="checkbox"  name="lodowka" value="tak">Lodówka</label>
					<label><input class="idg" type="checkbox"  name="kuchenka" value="tak">Kuchenka</label>
					<label><input class="idg" type="checkbox"  name="pralka" value="tak">Pralka</label>
				</div>
			</div>
		</div>
	</div>
	
	<div class="shoper_editor_product_line container" container="wyposazenie_konf">
		<div class="w-90">
		
			<div class="about_info text_name">Wyposażenie sali konferencyjnej</div>
			<div class="flex">
				<div class="w-100">
					<label><input class="idg" type="checkbox"  name="projektor" value="tak">Projektor</label>
					<label><input class="idg" type="checkbox"  name="rzutnik" value="tak">Rzutnik</label>
					<label><input class="idg" type="checkbox"  name="rzutnik_auto_ekran" value="tak">Rzutnik z auto ekranem</label>
					<label><input class="idg" type="checkbox"  name="ekran" value="tak">Ekran</label>
					<label><input class="idg" type="checkbox"  name="duzy_ekran" value="tak">Duży ekran</label>
				</div>
				
				<div class="w-100">
					<label><input class="idg" type="checkbox"  name="naglosnienie" value="tak">Nagłośnienie</label>
					<label><input class="idg" type="checkbox"  name="wyposazenie_audio_video" value="tak">Wyposażenie audio/video</label>
					<label><input class="idg" type="checkbox"  name="mikrofon" value="tak">Mikrofon</label>
					<label><input class="idg" type="checkbox"  name="smart_board" value="tak">Smartboard</label>
					<label><input class="idg" type="checkbox"  name="flipchart" value="tak">Flipchart</label>
				</div>
				
				<div class="w-100">
				
					<label><input class="idg" type="checkbox"  name="klimatyzacja" value="tak">Klimatyzacja</label>
					<label><input class="idg" type="checkbox"  name="wifi" value="tak">WIFI</label>
					<label><input class="idg" type="checkbox"  name="zaciemnienie_sali" value="tak">Zaciemnienie sali</label>
					<label><input class="idg" type="checkbox"  name="swiatlo_dzienne" value="tak">Światło dzienne</label>
				</div>
			</div>
		</div>
	</div>
	
	<div class="shoper_editor_product_line container" container="wyposazenie_pola">
		<div class="w-90">
			
			<div class="about_info text_name">Wyposażenie pola kempingowego / biwakowego</div>
			<div class="flex">
				<div class="w-100">
					<label><input class="idg" type="checkbox"  name="prad" value="tak">Dostęp do prądu</label>
					<label><input class="idg" type="checkbox"  name="gastronomia" value="tak">Punkt gastronomiczny</label>
					<label><input class="idg" type="checkbox"  name="sklepy" value="tak">Sklepy w pobliżu</label>
					<label><input class="idg" type="checkbox"  name="utwardzony_dojazd" value="tak">Utwardzony dojazd</label>
					<label><input class="idg" type="checkbox"  name="ogrodzone" value="tak">Teren ogrodzony</label>
				</div>
				
				<div class="w-100">
					<label><input class="idg" type="checkbox"  name="monitorowane" value="tak">Teren monitorowany</label>
					<label><input class="idg" type="checkbox"  name="ochrona" value="tak">Ochrona obiektu</label>
					<label><input class="idg" type="checkbox"  name="kabina_prysznicowa_platna" value="tak">Płatne kabiny prysznicowe</label>
					<label><input class="idg" type="checkbox"  name="kabina_prysznicowa_bezplatna" value="tak">Bezpłatne kabiny prysznicowe</label>
					<label><input class="idg" type="checkbox"  name="przyrzadzanie_posilkow" value="tak">Stanowiska przyrządzania posiłków</label>
				</div>
				
				<div class="w-100">
					<label><input class="idg" type="checkbox"  name="zmywanie_naczyn" value="tak">Stanowiska zmywania naczyń</label>
					<label><input class="idg" type="checkbox"  name="spozywanie_posilkow" value="tak">Stanowiska spożywania posiłków</label>
					<label><input class="idg" type="checkbox"  name="higiena_sanitariat" value="tak">Urządzenia higieniczno/sanitarne</label>
					<label><input class="idg" type="checkbox"  name="zlew_ustepow" value="tak">Stanowiska do zlewu ustępów caravaningowych</label>
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
	
	<div class="shoper_editor_product_line container" container="pelna_oferta">
		<div class="w-90">
			<div class="about_info text_name">Pełna oferta obiektu</div>
			<div class="flex">
				<div class="w-100">
					<label><input class="idg" type="checkbox"  name="parking_platny" value="tak">Parking płatny</label>
					<label><input class="idg" type="checkbox"  name="parking_bezplatny" value="tak">Parking bezpłatny</label>
					<label><input class="idg" type="checkbox"  name="ladowanie_pojazdow" value="tak">Ładowanie pojazdów elektrycznych</label>
					<label><input class="idg" type="checkbox"  name="recepcja_24" value="tak">Całodobowa recepcja</label>
					<label><input class="idg" type="checkbox"  name="restauracja" value="tak">Restauracja</label>
				</div>
				
				<div class="w-100">
					<label><input class="idg" type="checkbox"  name="restauracja_24" value="tak">Całodobowa restauracja</label>
					<label><input class="idg" type="checkbox"  name="restauracja_obok" value="tak">Restauracja w pobliżu</label>
					<label><input class="idg" type="checkbox"  name="bar_hotelowy" value="tak">Bar hotelowy</label>
					<label><input class="idg" type="checkbox"  name="bar_24" value="tak">Bar całodobowy</label>
					<label><input class="idg" type="checkbox"  name="kantor" value="tak">Kantor</label>
				</div>
				
				<div class="w-100">
					<label><input class="idg" type="checkbox"  name="free_wifi" value="tak">Darmowe WIFI</label>
					<label><input class="idg" type="checkbox"  name="winda" value="tak">Winda</label>
					<label><input class="idg" type="checkbox"  name="niepelnosprawni" value="tak">Udogodnienia dla niepełnosprawnych</label>
					<label><input class="idg" type="checkbox"  name="sale_konferencyjne" value="tak">Sale konferencyjne</label>
					<label><input class="idg" type="checkbox"  name="concierge" value="tak">Usługi concierge</label>
				</div>
				
				<div class="w-100">
					<label><input class="idg" type="checkbox"  name="uslugi_transportowe" value="tak">Usługi transportowe</label>
					<label><input class="idg" type="checkbox"  name="wypozyczalnia_aut" value="tak">Wypożyczalnia aut</label>
					<label><input class="idg" type="checkbox"  name="wypozyczalnia_rowerow" value="tak">Wypożyczalnia rowerów</label>
					<label><input class="idg" type="checkbox"  name="transfer_lotniskowy" value="tak">Transfer lotniskowy</label>
					<label><input class="idg" type="checkbox"  name="sejf_recepcja" value="tak">Sejf w recepcji</label>
				</div>

			</div>
		</div>
	</div>
	
	<div class="shoper_editor_product_line container" container="dodatkowe_atrakcje">
		<div class="w-90">
			<div class="about_info text_name">Dodatkowe atrakcje w obiekcie</div>
			<div class="flex">
				<div class="w-100">
					<label><input class="idg" type="checkbox"  name="basen_kryty" value="tak">Basen kryty</label>
					<label><input class="idg" type="checkbox"  name="basen_otwarty" value="tak">Basen otwarty</label>
					<label><input class="idg" type="checkbox"  name="kapielisko" value="tak">Kąpielisko</label>
					<label><input class="idg" type="checkbox"  name="centrum_biznesowe" value="tak">Centrum biznesowe</label>
					<label><input class="idg" type="checkbox"  name="kasyno" value="tak">Kasyno</label>
					<label><input class="idg" type="checkbox"  name="fitness" value="tak">Fitness</label>
					<label><input class="idg" type="checkbox"  name="spa" value="tak">SPA</label>
					<label><input class="idg" type="checkbox"  name="sauna" value="tak">Sauna</label>
					<label><input class="idg" type="checkbox"  name="masaz" value="tak">Masaż</label>
				</div>
				
				<div class="w-100">
					<label><input class="idg" type="checkbox"  name="silownia" value="tak">Siłownia</label>
					<label><input class="idg" type="checkbox"  name="laznia" value="tak">Łaźnia</label>
					<label><input class="idg" type="checkbox"  name="kort_tenisowy" value="tak">Kort tenisowy</label>
					<label><input class="idg" type="checkbox"  name="golf" value="tak">Pole golfowe</label>
					<label><input class="idg" type="checkbox"  name="kregle" value="tak">Kręgle</label>
					<label><input class="idg" type="checkbox"  name="lodowisko" value="tak">Lodowisko</label>
					<label><input class="idg" type="checkbox"  name="siatkowka" value="tak">Boisko do siatkówki</label>
					<label><input class="idg" type="checkbox"  name="pilka_nozna" value="tak">Boisko do piłki nożnej</label>
					<label><input class="idg" type="checkbox"  name="koszykowka" value="tak">Boisko do koszykówki</label>
				</div>
				
				<div class="w-100">
					<label><input class="idg" type="checkbox"  name="stok" value="tak">Stok</label>
					<label><input class="idg" type="checkbox"  name="jezioro" value="tak">Jezioro</label>
					<label><input class="idg" type="checkbox"  name="staw" value="tak">Staw</label>
					<label><input class="idg" type="checkbox"  name="sala_gier" value="tak">Sala gier</label>
					<label><input class="idg" type="checkbox"  name="plac_zabaw" value="tak">Plac zabaw</label>
					<label><input class="idg" type="checkbox"  name="sala_zabaw" value="tak">Sala zabaw</label>
					<label><input class="idg" type="checkbox"  name="park_linowy" value="tak">Park linowy</label>
					<label><input class="idg" type="checkbox"  name="mini_zoo" value="tak">Mini ZOO</label>
					<label><input class="idg" type="checkbox"  name="opieka_dzieci" value="tak">Opieka nad dziećmi</label>
				</div>
				
				<div class="w-100">
					<label><input class="idg" type="checkbox"  name="eventy" value="tak">Eventy dla firm</label>
					<label><input class="idg" type="checkbox"  name="imprezy" value="tak">Imprezy okolicznościowe</label>
					<label><input class="idg" type="checkbox"  name="czas_wolny" value="tak">Organizacja czasu wolnego</label>
					<label><input class="idg" type="checkbox"  name="konie" value="tak">Jazda konna</label>
					<label><input class="idg" type="checkbox"  name="zaprzeg" value="tak">Jazda w zaprzęgu</label>
					<label><input class="idg" type="checkbox"  name="polowania" value="tak">Polowania</label>
					<label><input class="idg" type="checkbox"  name="kulig" value="tak">Kulig</label>
					<label><input class="idg" type="checkbox"  name="kajaki" value="tak">Kajaki</label>
					<label><input class="idg" type="checkbox"  name="balon" value="tak">Loty balonem</label>
				</div>
				
				<div class="w-100">
					<label><input class="idg" type="checkbox"  name="motolotnia" value="tak">Motolotnia</label>
					<label><input class="idg" type="checkbox"  name="spadochron" value="tak">Loty spadochronowe</label>
					<label><input class="idg" type="checkbox"  name="sprzet_wodny" value="tak">Sprzęt wodny</label>
					<label><input class="idg" type="checkbox"  name="sprzet_nurkowanie" value="tak">Sprzęt do nurkowania</label>
					<label><input class="idg" type="checkbox"  name="sprzet_zimowy" value="tak">Sprzęt zimowy</label>
					<label><input class="idg" type="checkbox"  name="paintball" value="tak">Paintball</label>
					<label><input class="idg" type="checkbox"  name="asg" value="tak">ASG</label>
					<label><input class="idg" type="checkbox"  name="strzelnica" value="tak">Strzelnica</label>
				</div>
			</div>
		
		</div>
		
	</div>
</div>

<div class="step hide" step="6">
	<?php include $_SERVER['DOCUMENT_ROOT'].'/functions/shoper/offer_editors/podsumowanie.php' ;?>
</div>