<?php include $_SERVER['DOCUMENT_ROOT'].'/config.php';?>

<div class="step hide" step="2">
	
	<div class="shoper_editor_product_line container" container="podstawowe_dane">

		<div class="w-90">
			<div class="flex">
				<div class="w-100">
					<div class="shoper_editor_inline_header text_name">Rodzaj oferty</div>

					<label><input class="idg" type="radio"  name="rodzaj_oferty" value="ogloszenie">Ogłoszenie</label>
					<label><input class="idg" type="radio"  name="rodzaj_oferty" value="sprzedaz">Sprzedaż (Kup teraz)</label>
					<label><input class="idg" type="radio"  name="rodzaj_oferty" value="licytacja">Licytacja</label>
					<label><input class="idg" type="radio"  name="rodzaj_oferty" value="rezerwacja">Rezerwacja</label>

				</div>
				
				<div class="w-100">
					<div class="shoper_editor_inline_header text_name">Dodajesz jako</div>
					<label><input class="idg" type="radio" name="dodajesz_jako" value="uslugodawca">Usługodawca</label>
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
			<div class="about_info text_name">Lokalizacja firmy</div>
			
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
	
	<div class="shoper_editor_product_line container" container="lokalizacja_wykonania_uslugi">
		<div class="w-90">
			<div class="flex">
				<div class="w-100 short_inputs">
					<div class="about_info text_name">Miejsce wykonania usługi</div>
					<label><input class="idg" type="checkbox" name="usluga_stacjonarnie" value="usluga_stacjonarnie">Stacjonarnie / W siedzibie firmy</label>
					<label><input class="idg" type="checkbox" name="cala_polska" value="cala_polska">Cała Polska</label>
					<label><input class="idg" type="checkbox" name="zasieg_uslugi" value="zasieg_uslugi">Zasięg wykonywania usługi</label>
					<label><input class="idg std_text_input" type="number" name="zasieg_uslugi_odleglosc">km - od siedziby firmy usługodawcy</label>
				
				</div>
				<div class="w-100">
					<div class="about_info text_name">Miejscowości wykonania usługi</div>
					
					<div class="flex">
						<label><input class="idg" type="checkbox" name="miejscowosc_1" value="miejscowosc_1">Miejsce 1</label>
						<label><input class="idg std_text_input" type="text" name="miejscowosc_1_nazwa"></label>
					</div>
					
					<div class="flex">
						<label><input class="idg" type="checkbox" name="miejscowosc_2" value="miejscowosc_2">Miejsce 2</label>
						<label><input class="idg std_text_input" type="text" name="miejscowosc_2_nazwa"></label>
					</div>
					
					<div class="flex">
						<label><input class="idg" type="checkbox" name="miejscowosc_3" value="miejscowosc_3">Miejsce 3</label>
						<label><input class="idg std_text_input" type="text" name="miejscowosc_3_nazwa"></label>
					</div>
					
					<div class="flex">
						<label><input class="idg" type="checkbox" name="miejscowosc_4" value="miejscowosc_4">Miejsce 4</label>
						<label><input class="idg std_text_input" type="text" name="miejscowosc_4_nazwa"></label>
					</div>
					
					<div class="flex">
						<label><input class="idg" type="checkbox" name="miejscowosc_5" value="miejscowosc_5">Miejsce 5</label>
						<label><input class="idg std_text_input" type="text" name="miejscowosc_5_nazwa"></label>
					</div>
				
				</div>
				<div class="w-100">
					<div class="about_info text_name">Miejscowości wykonania usługi</div>

					<div class="flex">
						<label><input class="idg" type="checkbox" name="miejscowosc_6" value="miejscowosc_6">Miejsce 6</label>
						<label><input class="idg std_text_input" type="text" name="miejscowosc_6_nazwa"></label>
					</div>
					
					<div class="flex">
						<label><input class="idg" type="checkbox" name="miejscowosc_7" value="miejscowosc_7">Miejsce 7</label>
						<label><input class="idg std_text_input" type="text" name="miejscowosc_7_nazwa"></label>
					</div>
					
					<div class="flex">
						<label><input class="idg" type="checkbox" name="miejscowosc_8" value="miejscowosc_8">Miejsce 8</label>
						<label><input class="idg std_text_input" type="text" name="miejscowosc_8_nazwa"></label>
					</div>
					
					<div class="flex">
						<label><input class="idg" type="checkbox" name="miejscowosc_9" value="miejscowosc_9">Miejsce 9</label>
						<label><input class="idg std_text_input" type="text" name="miejscowosc_9_nazwa"></label>
					</div>
					
					<div class="flex">
						<label><input class="idg" type="checkbox" name="miejscowosc_10" value="miejscowosc_10">Miejsce 10</label>
						<label><input class="idg std_text_input" type="text" name="miejscowosc_10_nazwa"></label>
					</div>

				</div>
			</div>
		</div>
	</div>
	
	<div class="shoper_editor_product_line container" container="dane_uslugodawcy">
	
		<div class="w-90">
			<div class="about_info text_name">Dane firmy wykonującej usługę</div>
			
				<div class="flex space-around">
			
					<div class="w-100">
						
						<div class="super_text_grid">
							<label class="inp">
								<input class="idg" type="super_text" name="uslugodawca_nazwa" placeholder="&nbsp;">
								<span class="label">Pełna nazwa firmy usługodawcy</span>
								<span class="border"></span>
							</label>
						</div>
						
						<div class="super_text_grid">
							<label class="inp">
								<input class="idg" type="super_text" name="uslugodawca_ulica" placeholder="&nbsp;">
								<span class="label">Ulica</span>
								<span class="border"></span>
							</label>
						</div>
						
						<div class="super_text_grid">
							<label class="inp">
								<input class="idg" type="super_text" name="uslugodawca_miasto" placeholder="&nbsp;">
								<span class="label">Miasto</span>
								<span class="border"></span>
							</label>
						</div>
						
						<div class="super_text_grid">
							<label class="inp">
								<input class="idg" type="super_text" name="uslugodawca_kod_pocztowy" placeholder="&nbsp;">
								<span class="label">Kod pocztowy</span>
								<span class="border"></span>
							</label>
						</div>

					</div>
		
					<div class="w-100">
						
						<div class="super_text_grid">
							<label class="inp">
								<input class="idg" type="super_text" name="uslugodawca_nip" placeholder="&nbsp;">
								<span class="label">NIP</span>
								<span class="border"></span>
							</label>
						</div>
						
						<div class="super_text_grid">
							<label class="inp">
								<input class="idg" type="super_text" name="uslugodawca_regon" placeholder="&nbsp;">
								<span class="label">REGON</span>
								<span class="border"></span>
							</label>
						</div>
						
						<div class="super_text_grid">
							<label class="inp">
								<input class="idg" type="super_text" name="uslugodawca_krs" placeholder="&nbsp;">
								<span class="label">KRS</span>
								<span class="border"></span>
							</label>
						</div>
						
					</div>
				
				</div>
				
		</div>
		
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
						<label><input class="idg std_text_input" type="number"   name="cena_brutto_wartosc" placeholder="Kwota brutto"></label>
						<label><input class="idg" 				 type="radio"  name="cena" value="cena_netto">Cena netto</label>
						<label><input class="idg std_text_input" type="number"   name="cena_netto_wartosc" placeholder="Kwota netto"></label>
			
					</div>
					
					<div class="w-100">
						<div class="shoper_editor_inline_header text_name">Cena szacunkowa (widełki)</div>

						<label><input class="idg" 				 type="checkbox" name="cena_widelki_od" value="cena_widelki_od">Cena szacunkowa</label>
						<label><input class="idg std_text_input" type="number"   name="cena_widelki_wartosc_od" placeholder="od"></label>
						<label><input class="idg std_text_input" type="number"   name="cena_widelki_wartosc_do" placeholder="do"></label>
			
					</div>
					
					<div class="w-100">
						<div class="shoper_editor_inline_header text_name">Oznacz cenę jako</div>

						<label><input class="idg" type="radio"  name="cena_specjalna" value="promocja">Promocja</label>
						<label><input class="idg std_text_input" type="number"   name="promocja_cena" placeholder="Kwota" ></label>
						<label><input class="idg" type="radio"  name="cena_specjalna" value="okazja">Okazja</label>

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
					
				</div>
		</div>
	</div>
	
	<div class="shoper_editor_product_line">
		<div class="w-90">
			<div class="about_info text_name">Dopłaty i rabaty</div>
			<div class="shoper_editor_inline_header">Czy chcesz dodać dopłaty lub rabaty ?
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
	
	<div class="shoper_editor_product_line container" container="gwarancje">
		<div class="w-90">
			<div class="about_info">Gwarancje</div>
			<div class="flex">
			
				<div class="w-100">
					<div class="shoper_editor_inline_header text_name">Gwarancja na wykonaną usługę</div>
					<label><input class="idg" type="radio"  name="gwarancja" value="brak_gwarancji">Brak gwarancji</label>
					<label><input class="idg" type="radio"  name="gwarancja" value="gwarancja_uslugodawcy">Gwarancja</label>
					<label>
						<select class="idg" type="select" name="gwarancja_uslugodawcy_czas">
							<option></option>
							<option>1 miesiąc</option>
							<option>2 miesiące</option>
							<option>3 miesiące</option>
						</select>
					</label>
				</div>
				
				<div class="w-100">
					<div class="shoper_editor_inline_header text_name">Ubezpieczenie OC usługodawcy</div>
					<label><input class="idg" type="radio"  name="ubezpieczenie_oc_uslugodawcy" value="brak_ubezpieczenia">Brak ubezpieczenia OC</label>
					<label><input class="idg" type="radio"  name="ubezpieczenie_oc_uslugodawcy" value="ubezpieczenie_do_kwoty">Ubezpieczenie do kwoty</label>
					<label>
						<select class="idg" type="select" name="ubezpieczenie_do_kwoty_wartosc">
							<option></option>
							<option>10 000 zł</option>
							<option>20 000 zł</option>
							<option>30 000 zł</option>
						</select>
					</label>
				</div>
				
				<div class="w-100">
					<div class="shoper_editor_inline_header text_name">Zaliczka przed wykonaniem usługi</div>
					<label><input class="idg" type="radio"  name="zaliczka" value="brak_zaliczki">Brak zaliczki</label>
					<label><input class="idg" type="radio"  name="zaliczka" value="platnosci_transzowe">Płatności transzowe w trakcie wykonywania usługi</label>
					<label><input class="idg" type="radio"  name="zaliczka" value="zaliczka_przed">Zaliczka przed wykonaniem usługi</label>
				</div>
				
				<div class="w-100">
					<div class="shoper_editor_inline_header text_name">Protokół zdawczo-odbiorczy</div>
					<label><input class="idg" type="radio"  name="protokol" value="nie">Brak protokołu</label>
					<label><input class="idg" type="radio"  name="protokol" value="tak">Protokół zdawczo-odbiorczy przed przystąpieniem do wykonania usługi</label>
				</div>
				
				<div class="w-100">
					<div class="shoper_editor_inline_header text_name">Doświadczenie usługodawcy w zakresie wykonywania świadczonej usługi</div>
					
					<label><input class="idg" type="radio"  name="doswiadczenie_uslugodawcy" value="mniej_niz_1">Poniżej 1 roku</label>
					<label><input class="idg" type="radio"  name="doswiadczenie_uslugodawcy" value="pomiedzy_1_a_2">1 - 2 lat</label>
					<label><input class="idg" type="radio"  name="doswiadczenie_uslugodawcy" value="pomiedzy_2_a_5">2 - 5 lat</label>
					<label><input class="idg" type="radio"  name="doswiadczenie_uslugodawcy" value="powyzej_5">Powyżej 5 lat</label>
				</div>
				
			</div>
		</div>
	</div>
	
	<div class="shoper_editor_product_line container" container="gwarancje">
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
			
			<div class="w-100">
				<div class="shoper_editor_inline_header text_name">Uprawnienia uslugodawcy</div>
				<label><input class="idg" type="radio"  name="uprawnienia_uslugodawcy" value="tak">Usługodawca oświadcza, że posiada wszelkie przewidziane prawem uprawnienia, pozwolenia i certyfikaty do wykonywania prac związanych ze wszystkimi apektami związanymi z wykonywaniem usługi</label>
				<label><input class="idg" type="radio"  name="uprawnienia_uslugodawcy" value="nie">Usługodawca nie posiada uprawnień, pozwoleń i certyfikatów do wykonywania prac związanych z usługą</label>
			</div>
			
		</div>
	</div>
	
	<div class="shoper_editor_product_line" container="gwarancje">
		<div class="w-90">
			
			<div class="w-100">
				<div class="shoper_editor_inline_header text_name">Wykształcenie kierunkowe usługodawcy</div>
				<label><input class="idg" type="radio"  name="wyksztalcenie_kierunkowe" value="tak">Usługodawca oświadcza, że wszystkie osoby bezpośrednio wykonujące zakres usługi posiadają potwierdzone wykształcenie i wiedzę z zakresu wykonywanej usługi</label>
				<label><input class="idg" type="radio"  name="wyksztalcenie_kierunkowe" value="nie">Usługodawca nie posiada potwierdzonego wykształcenia i wiedzy z zakresu wykonywanej usługi</label>
			</div>
			
		</div>
	</div>
	
</div>

<div class="step hide" step="6">
	<?php include $_SERVER['DOCUMENT_ROOT'].'/functions/shoper/offer_editors/podsumowanie.php' ;?>
</div>