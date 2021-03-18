<?php include $_SERVER['DOCUMENT_ROOT'].'/config.php';?>

<div class="step hide" step="2">

	<div class="shoper_editor_product_line container" container="podstawowe_dane">

	<div class="w-90">
		<div class="flex">
			<div class="w-100">
				<div class="shoper_editor_inline_header text_name">Rodzaj oferty</div>

				<label><input class="idg" type="radio"  name="rodzaj_oferty" value="ogloszenie">Ogłoszenie</label>
				<label><input class="idg" type="radio"  name="rodzaj_oferty" value="sprzedaz">Sprzedaż (Kup Teraz)</label>
				<label><input class="idg" type="radio"  name="rodzaj_oferty" value="licytacja">Licytacja</label>
				<label><input class="idg" type="radio"  name="rodzaj_oferty" value="rezerwacja">Rezerwacja</label>
				<label><input class="idg" type="radio"  name="rodzaj_oferty" value="zamienie">Zamienię</label>
				<label><input class="idg" type="radio"  name="rodzaj_oferty" value="oddam">Oddam</label>

			</div>

			<div class="w-100">
				<div class="shoper_editor_inline_header text_name">Dodajesz jako</div>
				<label><input class="idg" type="radio" name="dodajesz_jako" value="organizator">Organizator</label>
				<label><input class="idg" type="radio" name="dodajesz_jako" value="posrednik">Pośrednik</label>
			</div>

			<div class="w-100">
				<div class="shoper_editor_inline_header text_name">Oferta skierowana do</div>
				<label><input class="idg" type="radio" name="oferta_do" value="do_wszystkich">Do wszystkich użytkowników</label>
				<label><input class="idg" type="radio" name="oferta_do" value="firmy">Firmy / B2B</label>
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

			<div class="w-100">
				<div class="shoper_editor_inline_header text_name">Oferta ważna do</div>
				<label><input class="idg std_text_input" name="oferta_wazna_do" type="text"></label>
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
			<div class="about_info text_name">Lokalizacja oferty</div>
			
			<div class="flex space-around">
				
				<div class="lokalizacja_mapa w-100">Mapa</div>
				
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
	
	<div class="shoper_editor_product_line container" container="dane_organizatora">
	
		<div class="w-90">
			<div class="about_info text_name">Dane organizatora</div>
			
				<div class="flex space-around">
			
					<div class="w-100">
						
						<div class="super_text_grid">
							<label class="inp">
								<input class="idg" type="super_text" name="organizator_nazwa" placeholder="&nbsp;">
								<span class="label">Pełna nazwa firmy organizatora</span>
								<span class="border"></span>
							</label>
						</div>
						
						<div class="super_text_grid">
							<label class="inp">
								<input class="idg" type="super_text" name="organizator_ulica" placeholder="&nbsp;">
								<span class="label">Ulica</span>
								<span class="border"></span>
							</label>
						</div>
						
						<div class="super_text_grid">
							<label class="inp">
								<input class="idg" type="super_text" name="organizator_miasto" placeholder="&nbsp;">
								<span class="label">Miasto</span>
								<span class="border"></span>
							</label>
						</div>
						
						<div class="super_text_grid">
							<label class="inp">
								<input class="idg" type="super_text" name="organizator_kod_pocztowy" placeholder="&nbsp;">
								<span class="label">Kod pocztowy</span>
								<span class="border"></span>
							</label>
						</div>

					</div>
		
					<div class="w-100">
						
						<div class="super_text_grid">
							<label class="inp">
								<input class="idg" type="super_text" name="organizator_nip" placeholder="&nbsp;">
								<span class="label">NIP</span>
								<span class="border"></span>
							</label>
						</div>
						
						<div class="super_text_grid">
							<label class="inp">
								<input class="idg" type="super_text" name="organizator_regon" placeholder="&nbsp;">
								<span class="label">REGON</span>
								<span class="border"></span>
							</label>
						</div>
						
						<div class="super_text_grid">
							<label class="inp">
								<input class="idg" type="super_text" name="organizator_krs" placeholder="&nbsp;">
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
						<label><input class="idg" 				 type="radio"  name="cena" value="nie_dotyczt">Nie dotyczy</label>

					</div>
					<div class="w-100">
						<div class="shoper_editor_inline_header text_name">Sposoby płatności</div>

						<label><input class="idg" type="checkbox"  name="sp_nie_dotyczy" value="sp_nie_dotyczy">Nie dotyczy</label>
						<label><input class="idg" type="checkbox"  name="sp_przelew" value="sp_przelew">Przelew</label>
						<label><input class="idg" type="checkbox"  name="sp_gotowka" value="sp_gotowka">Gotówka</label>
						<label><input class="idg" type="checkbox"  name="sp_pobranie" value="sp_pobranie">Przesyłka pobraniowa</label>
						<label><input class="idg" type="checkbox"  name="sp_odroczony_termin" value="sp_odroczony_termin">Płatność z odroczonym terminem</label>
						<label><input class="idg std_text_input" type="number"   name="sp_odroczony_termin_ilosc" placeholder="Podaj ilość dni odroczenia" ></label>

					</div>
					<div class="w-100">
						<div class="shoper_editor_inline_header text_name">Oznacz cenę jako</div>

						<label><input class="idg" type="radio"  name="cena_specjalna" value="promocja">Promocja</label>
						<label><input class="idg std_text_input" type="number"   name="promocja_cena" placeholder="Kwota" ></label>
						<label><input class="idg" type="radio"  name="cena_specjalna" value="okazja">Okazja</label>
						<label><input class="idg" type="radio"  name="cena_specjalna" value="wyprzedaz">Wyprzedaż</label>
		
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
		<?php include $_SERVER['DOCUMENT_ROOT'].'/edit_access/layouts/module_doplaty_rabaty.php' ;?>
	</div>
	
	<div class="shoper_editor_product_line">
		<div class="next_step blue_btn">Następny krok &nbsp <span class="icon-arrow-right2"></span></div>
	</div>
	
</div>

<div class="step hide" step="5">

	<div class="shoper_editor_product_line container" container="sposob_dostarczenia">
		<div class="w-90">
			<div class="about_info text_name">Sposoby dostarczenia</div>
			<div class="flex">
				
				<div class="w-100 short_inputs">
					<div class="shoper_editor_inline_header text_name">Sposoby dostarczenia</div>
					<label><input class="idg" type="checkbox"  name="sd_nie_dotyczy" value="sd_nie_dotyczy">Nie dotyczy</label>
					<label><input class="idg" type="checkbox"  name="sd_odbior_osobisty" value="sd_odbior_osobisty">Odbiór osobisty</label>
					<label><input class="idg" type="checkbox"  name="sd_transport_sprzedajacego" value="sd_transport_sprzedajacego">Transport po stronie sprzedającego</label>
					
					<div class="flex space-between p10_0 bb-lg">
						<label><input class="idg" type="checkbox"  name="sd_paczka" value="sd_paczka_priorytet">Paczka pocztowa priorytetowa</label>
						<label><input class="idg std_text_input" type="number"   name="sd_paczka_priorytet_cena"></label>
					</div>
					
					<div class="flex space-between p10_0 bb-lg">
						<label><input class="idg" type="checkbox"  name="sd_list_polecony" value="sd_list_polecony">List polecony</label>
						<label><input class="idg std_text_input" type="number"   name="sd_list_polecony_cena"></label>
					</div>
					
					<div class="flex space-between p10_0 bb-lg">
						<label><input class="idg" type="checkbox"  name="sd_paczkomat" value="sd_paczkomat">Paczkomaty 24/7 InPost - przedpłata</label>
						<label><input class="idg std_text_input" type="number"   name="sd_paczkomat_cena"></label>
					</div>
					
				</div>
				
				<div class="w-100 short_inputs">
					<div class="shoper_editor_inline_header text_name">Sposoby dostarczenia</div>
					
					<div class="flex space-between p10_0 bb-lg">
						<label><input class="idg" type="checkbox"  name="sd_kurier" value="sd_kurier">Przesyłka kurierska - przedpłata</label>
						<label><input class="idg std_text_input" type="number"   name="sd_kurier_cena"></label>
					</div>
					
					<div class="flex space-between p10_0 bb-lg">
						<label><input class="idg" type="checkbox"  name="sd_paczka_ekonomiczna" value="sd_paczka_ekonomiczna">Paczka pocztowa ekonomiczna</label>
						<label><input class="idg std_text_input" type="number"   name="sd_paczka_ekonomiczna_cena"></label>
					</div>
					
					<div class="flex space-between p10_0 bb-lg">
						<label><input class="idg" type="checkbox"  name="sd_list_polecony_ekonomiczny" value="sd_list_polecony_ekonomiczny">List polecony ekonomiczny</label>
						<label><input class="idg std_text_input" type="number"   name="sd_list_polecony_ekonomiczny_cena"></label>
					</div>
					
					<div class="flex space-between p10_0 bb-lg">
						<label><input class="idg" type="checkbox"  name="sd_kurier_pobranie" value="sd_kurier_pobranie">Przesyłka kurierska - pobranie</label>
						<label><input class="idg std_text_input" type="number"   name="sd_kurier_pobranie_cena"></label>
					</div>

					<div class="flex space-between p10_0 bb-lg">
						<label><input class="idg" type="checkbox"  name="sd_paczka_ruch" value="sd_paczka_ruch">Odbiór w punkcie - Paczka w RUCHU</label>
						<label><input class="idg std_text_input" type="number"   name="sd_paczka_ruch_cena"></label>
					</div>

				</div>
				
				<div class="w-100 short_inputs">
					<div class="shoper_editor_inline_header text_name">Sposoby dostarczenia</div>
					
					<div class="flex space-between p10_0 bb-lg">
						<label><input class="idg" type="checkbox"  name="sd_odbior_pp" value="sd_odbior_pp">Odbiór w punkcie - Poczta Polska - przedpłata</label>
						<label><input class="idg std_text_input" type="number"   name="sd_odbior_pp_cena"></label>
					</div>
					
					<div class="flex space-between p10_0 bb-lg">
						<label><input class="idg" type="checkbox"  name="sd_odbior_zabka_przedplata" value="sd_odbior_zabka_przedplata">Odbiór w punkcie Żabka - przedpłata</label>
						<label><input class="idg std_text_input" type="number"   name="sd_odbior_zabka_przedplata_cena"></label>
					</div>
					
					<div class="flex space-between p10_0 bb-lg">
						<label><input class="idg" type="checkbox"  name="sd_odbior_zabka_pobranie" value="sd_odbior_zabka_pobranie">Odbiór w punkcie Żabka - pobranie</label>
						<label><input class="idg std_text_input" type="number"   name="sd_odbior_zabka_pobranie_cena"></label>
					</div>
					
					<div class="flex space-between p10_0 bb-lg">
						<label><input class="idg" type="checkbox"  name="sd_zagranica" value="sd_zagranica">Wysyłka za granicę - przedpłata</label>
						<label><input class="idg std_text_input" type="number"   name="sd_zagranica_cena"></label>
					</div>
					
				</div>
				
				<div class="w-100">
					<div class="shoper_editor_inline_header text_name">Termin realizacji</div>
					<label><input class="idg" type="radio"  name="termin_realizacji" value="nie_dotyczy">Nie dotyczy</label>
					<label><input class="idg" type="radio"  name="termin_realizacji" value="w_chwili_zawarcie">W chwili zawarcia transakcji</label>
					<label><input class="idg" type="radio"  name="termin_realizacji" value="inny">Inny termin realizacji</label>
					<label><input class="idg std_text_input" type="number"   name="termin_realizacji_inny" placeholder="Podaj termin realizacji" ></label>
					
					<div style="height: 30px;"></div>
					
					<div>
						<div class="shoper_editor_inline_header text_name">Dodatkowe informacje</div>
						<div><textarea type="text" class="idg" name="dodatkowe_informacje"></textarea></div>
					</div>
					
				</div>
				
			</div>
		</div>
	</div>
	
	<div class="shoper_editor_product_line" container="gwarancje">
		<div class="w-90">
			
			<div class="about_info text_name">Deklaracje</div>
			
			<div class="w-100">
				<div class="shoper_editor_inline_header text_name">Długość działalności firmy</div>
				<label><input class="idg" type="radio"  name="dlugosc_dzialalnosci" value="mniej_niz_1">Poniżej 1 roku</label>
				<label><input class="idg" type="radio"  name="dlugosc_dzialalnosci" value="pomiedzy_1_a_2">1 - 2 lat</label>
				<label><input class="idg" type="radio"  name="dlugosc_dzialalnosci" value="pomiedzy_2_a_5">2 - 5 lat</label>
				<label><input class="idg" type="radio"  name="dlugosc_dzialalnosci" value="powyzej_5">Powyżej 5 lat</label>
			</div>
		
		</div>
	</div>
	
	<div class="shoper_editor_product_line" container="gwarancje">
		<div class="w-90">
		
			<div class="w-100">
				<div class="shoper_editor_inline_header text_name">Deklaracja terminowości</div>
				<label><input class="idg" type="radio"  name="deklaracja_terminowosci" value="nie">Brak pisemnej deklaracji</label>
				<label><input class="idg" type="radio"  name="deklaracja_terminowosci" value="tak">Pisemna deklaracja usługodawcy z podaniem dokładnego terminu wykonania usługi</label>
			</div>
			
		</div>
	</div>
	
	<div class="shoper_editor_product_line" container="gwarancje">
		<div class="w-90">
			
			<div class="w-100 short_inputs">
				<div class="shoper_editor_inline_header text_name">W przypadku opóźnienia dostawy</div>
				<div class="flex">
					<label><input class="idg" type="radio"  name="opoznienie_dostawy" value="sprzedawca_zwraca">W przypadku opóźnienia dostawy powyżej 7 dni sprzedawca zwraca</label>
					<label><input class="idg std_text_input" type="number"   name="sprzedawca_zwraca_wartosc" placeholder="Podaj kwotę"> zł</label>
				</div>
				<label><input class="idg" type="radio"  name="opoznienie_dostawy" value="sprzedawca_nie_zwraca">W przypadku opóźnienia dostawy powyżej 7 dni sprzedawca nie uwzględnia rekompensaty finansowej</label>
			</div>	
				
		</div>
	</div>
	
	<div class="shoper_editor_product_line" container="gwarancje">
		<div class="w-90">
		
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
					<label>dni od daty zawarcia transakcji</label>
				</div>
				<label><input class="idg" type="radio"  name="odstapienie_od_umowy" value="nie">Wystawca oferty nie uwzględnia prawa kupującego do odstąpienia od umowy zakupu</label>
				
				<div class="flex">
					<label><input class="idg" type="radio"  name="odstapienie_od_umowy" value="odstapienie_od_umowy_kwota">W przypadku odstąpienia kupującego od umowy zakupu wystawca oferty zwraca kupującemu kwotę w wysokości </label>
					<label><input class="idg std_text_input" type="number"   name="odstapenie_od_umowy_kwota_wartosc" placeholder="Podaj wartość %"> % wysokości zamówienia</label>
				</div>
			</div>
		
		</div>
	</div>
	
	<div class="shoper_editor_product_line" container="gwarancje">
		<div class="w-90">

			<div class="w-100">
				<div class="shoper_editor_inline_header text_name">W przypadku dostarczenia produktu wadliwego, lub niezgodnego z zamówieniem</div>
				<label><input class="idg" type="radio"  name="niezgodny_produkt" value="sprzedawca_deklaruje">Sprzedawca deklaruje się do natychmiastowego dostarczenia produktu zgodnego z zamówieniem pokrywając wszelkie koszty z tym związane</label>
				<label><input class="idg" type="radio"  name="niezgodny_produkt" value="spzedawca_nie_deklaruje">Sprzedawca nie deklaruje natychmiastowego dostarczenia prdouktu zgodnego z zamówieniem i nie pokrywa kosztów z tym związanych</label>
			</div>
		
		</div>
	</div>
	
</div>

<div class="step hide" step="6">
	<?php include $_SERVER['DOCUMENT_ROOT'].'/functions/shoper/offer_editors/podsumowanie.php' ;?>
</div>