<?php 
	include $_SERVER['DOCUMENT_ROOT'].'/config.php';
	session_start();
?>
<div class="step hide" step="2">
	
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
	
	<div class="shoper_editor_product_line container" container="podstawowe_dane">

		<div class="w-90">
			<div class="flex">
				<div class="w-100">
					<div class="shoper_editor_inline_header text_name">Rodzaj oferty</div>
					<label><input class="idg" type="radio"  name="rodzaj_oferty" value="ogloszenie" checked>Ogłoszenie</label>
				</div>

				<div class="w-100">
					<div class="shoper_editor_inline_header text_name">Stan przedmiotu oferty</div>
					<label><input class="idg" type="radio" name="stan_przedmiotu_oferty" value="uzywany" checked>Używany</label>
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
						<label><input class="idg std_text_input" type="number" name="cena_brutto_wartosc" placeholder="Podaj cenę"> PLN</label>
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
	
	<div class="shoper_editor_product_line container" container="typ_nadwozia">
		<div class="w-90">
			<div class="about_info text_name">Typ nadwozia</div>
			<div class="flex">	
				<div class="w-100">
					<div class="shoper_editor_inline_header text_name">Typ nadwozia</div>
					<label><input class="idg" type="checkbox" name="hatchback" value="tak">Hatchback</label>
					<label><input class="idg" type="checkbox" name="sedan" value="tak">Sedan</label>
					<label><input class="idg" type="checkbox" name="kombi" value="tak">Kombi</label>
					<label><input class="idg" type="checkbox" name="cabrio" value="tak">Kabriolet</label>
					<label><input class="idg" type="checkbox" name="targa" value="tak">Targa</label>
					<label><input class="idg" type="checkbox" name="liftback" value="tak">Liftback</label>
				</div>
				<div class="w-100">
					<div class="shoper_editor_inline_header text_name">Typ nadwozia</div>
					<label><input class="idg" type="checkbox" name="suv" value="tak">SUV</label>
					<label><input class="idg" type="checkbox" name="terenowy" value="tak">Terenowy</label>
					<label><input class="idg" type="checkbox" name="coupe" value="tak">Coupe</label>
					<label><input class="idg" type="checkbox" name="minivan" value="tak">Minivan</label>
					<label><input class="idg" type="checkbox" name="sportowy" value="tak">Sportowy</label>
				</div>
				<div class="w-100">
					<div class="shoper_editor_inline_header text_name">Typ nadwozia</div>
					<label><input class="idg" type="checkbox" name="van" value="tak">Van</label>
					<label><input class="idg" type="checkbox" name="minibus" value="tak">Minibus</label>
					<label><input class="idg" type="checkbox" name="bus" value="tak">Bus</label>
					<label><input class="idg" type="checkbox" name="roadster" value="tak">Roadster</label>
					<label><input class="idg" type="checkbox" name="zabytkowy" value="tak">Zabytkowy</label>
				</div>
				<div class="w-100">
				</div>
			</div>
		</div>
	</div>

	<div class="shoper_editor_product_line container" container="specyfikacje_oferty">
		<div class="w-90 mid_inputs">
			<div class="about_info text_name">Specyfikacje auta</div>
			<div class="flex">	
				<div class="w-100">
				
					<div class="flex space-between">
						<label class="text_name">Rok produkcji</label>
						<label><input class="idg std_text_input" name="rok_produkcji" type="text" placeholder="" ></label>
					</div>
					<div class="flex space-between">
						<label class="text_name">Rok pierwszej rejestracji</label>
						<label><input class="idg std_text_input" name="rok_rejestracji" type="text" placeholder="" ></label>
					</div>
					<div class="flex space-between">
						<label class="text_name">Numer VIN</label>
						<label><input class="idg std_text_input" name="vin" type="text" placeholder="" ></label>
					</div>
					<div class="flex space-between">
						<label class="text_name">Aktualny stan przebiegu (km)</label>
						<label><input class="idg std_text_input" name="przebieg_km" type="text" placeholder="" ></label>
					</div>
					<div class="flex space-between">
						<label class="text_name">Przebieg</label>
						<label>
							<select class="idg std_text_input" type="select" name="przebieg_dokumentacja">
								<option></option>
								<option>Udokumentowany</option>
								<option>Nieudokumentowany</option>
							</select>
						</label>
					</div>
					
				</div>
				<div class="w-100">
				
					<div class="flex space-between">
						<label class="text_name">Kolor</label>
						<label>
							<select class="idg std_text_input" type="select" name="kolor">
								<option></option>
								<option>Beżowy</option>
								<option>Biały</option>
								<option>Bordowy</option>
								<option>Brązowy</option>
								<option>Czarny</option>
								<option>Czerwony</option>
								<option>Fioletowy</option>
								<option>Niebieski</option>
								<option>Srebrny</option>
								<option>Szary</option>
								<option>Zielony</option>
								<option>Żółty</option>
								<option>Złoty</option>
								<option>Inny</option>
							</select>
						</label>
					</div>
					<div class="flex space-between">
						<label class="text_name">Typ lakieru</label>
						<label>
							<select class="idg std_text_input" type="select" name="typ_lakieru">
								<option></option>
								<option>Metalik</option>
								<option>Perła</option>
								<option>Mat</option>
								<option>Akryl (niemetalizowany)</option>
								<option>Inny</option>
							</select>
						</label>
					</div>
					<div class="flex space-between">
						<label class="text_name">Liczba drzwi</label>
						<label>
							<select class="idg std_text_input" type="select" name="liczba_drzwi">
								<option></option>
								<option>2</option>
								<option>3</option>
								<option>4</option>
								<option>5</option>
							</select>
						</label>
					</div>
					<div class="flex space-between">
						<label class="text_name">Liczba miejsc</label>
						<label>
							<select class="idg std_text_input" type="select" name="liczba_miejsc">
								<option></option>
								<option>2</option>
								<option>4</option>
								<option>5</option>
							</select>
						</label>
					</div>
					
					<div class="flex space-between">
						<label class="text_name">Kierownica</label>
						<label>
							<select class="idg std_text_input" type="select" name="kierownica">
								<option></option>
								<option>Po lewej</option>
								<option>Po prawej</option>
							</select>
						</label>
					</div>
					
				</div>
				
				<div class="w-100">
				
					<div class="flex space-between">
						<label class="text_name">Skrzynia biegów</label>
						<label>
							<select class="idg std_text_input" type="select" name="skrzynia">
								<option></option>
								<option>Manualna</option>
								<option>Automatyczna</option>
							</select>
						</label>
					</div>
					
					<div class="flex space-between">
						<label class="text_name">Napęd</label>
						<label>
							<select class="idg std_text_input" type="select" name="naped">
								<option></option>
								<option>Na przód</option>
								<option>Na tył</option>
								<option>4 x 4</option>
							</select>
						</label>
					</div>
					
					<div class="flex space-between">
						<label class="text_name">Rodzaj paliwa</label>
						<label>
							<select class="idg std_text_input" type="select" name="rodzaj_paliwa">
								<option></option>
								<option>Benzyna</option>
								<option>Diesel</option>
								<option>Hybryda</option>
								<option>Elektryczny</option>
								<option>Wodór</option>
							</select>
						</label>
					</div>
					
					<div class="flex space-between">
						<label class="text_name">Typ silnika</label>
						<label>
							<select class="idg std_text_input" type="select" name="typ_silnika">
								<option></option>
								<option>R2</option>
								<option>R3</option>
								<option>R4</option>
								<option>R5</option>
								<option>R6</option>
								<option>V6</option>
								<option>V8</option>
								<option>V10</option>
								<option>V12</option>
								<option>W8</option>
								<option>W12</option>
								<option>W16</option>
								<option>Wankla</option>
								<option>Boxer</option>
							</select>
						</label>
					</div>	
				</div>
				
				<div class="w-100">
				
					<div class="flex space-between">
						<label class="text_name">Pojemność silnika (ccm3)</label>
						<label><input class="idg std_text_input" name="pojemnosc_silnika" type="text" placeholder="" ></label>
					</div>
					
					<div class="flex space-between">
						<label class="text_name">Moc (KM)</label>
						<label><input class="idg std_text_input" name="moc_silnika" type="text" placeholder=""></label>
					</div>
					
					<div class="flex space-between">
						<label class="text_name">Filtr cząstek stałych</label>
						<label>
							<select class="idg std_text_input" type="select" name="filtr_czastek">
								<option></option>
								<option>Tak</option>
								<option>Nie</option>
							</select>
						</label>
					</div>
					
					<div class="flex space-between">
						<label class="text_name">Spalanie (cykl miejski l/100km)</label>
						<label><input class="idg std_text_input" name="spalanie_miejski" type="text" placeholder=""></label>
					</div>
					
					<div class="flex space-between">
						<label class="text_name">Spalanie (trasa l/100km)</label>
						<label><input class="idg std_text_input" name="spalanie_trasa" type="text" placeholder=""></label>
					</div>

				</div>
				
			</div>
		</div>
	</div>
	
	<div class="shoper_editor_product_line container" container="wyposazenie_dodatkowe">
		<div class="w-90">
			<div class="about_info text_name">Wyposażenie dodatkowe</div>
			<div class="flex">	
				<div class="w-100">
					<label><input class="idg" type="checkbox" name="ABS" value="tak">ABS</label>
					<label><input class="idg" type="checkbox" name="CD" value="tak">CD</label>
					<label><input class="idg" type="checkbox" name="centralny_zamek" value="tak">Centralny zamek</label>
					<label><input class="idg" type="checkbox" name="ele_szyby_przednie" value="tak">Elektr. szyby przednie</label>
					<label><input class="idg" type="checkbox" name="ele_szyby_tylne" value="tak">Elekt. szyby tylne</label>
					<label><input class="idg" type="checkbox" name="ele_lusterka" value="tak">Elekt. lusterka</label>
					<label><input class="idg" type="checkbox" name="immobilizer" value="tak">Immobiliser</label>
				</div>
				<div class="w-100">
					<label><input class="idg" type="checkbox" name="radio_fanryczne" value="tak">Radio fabryczne</label>
					<label><input class="idg" type="checkbox" name="radio_niefabryczne" value="tak">Radio niefabryczne</label>
					<label><input class="idg" type="checkbox" name="aux" value="tak">Gniazdo AUX</label>
					<label><input class="idg" type="checkbox" name="gniazdo_sd" value="tak">Gniazdo SD</label>
					<label><input class="idg" type="checkbox" name="alarm" value="tak">Alarm</label>
					<label><input class="idg" type="checkbox" name="alufelgi" value="tak">Alufelgi</label>
					<label><input class="idg" type="checkbox" name="asr" value="tak">ASR (Kontrola trakcji)</label>
				</div>
				<div class="w-100">
					<label><input class="idg" type="checkbox" name="bluetooth" value="tak">Bluetooth</label>
					<label><input class="idg" type="checkbox" name="czujnik_deszczu" value="tak">Czujnik deszczu</label>
					<label><input class="idg" type="checkbox" name="czujnik_pola" value="tak">Czujnik martwego pola</label>
					<label><input class="idg" type="checkbox" name="czujnik_zmierzchu" value="tak">Czujnik deszczu</label>
					<label><input class="idg" type="checkbox" name="czujnik_parkowania_przedni" value="tak">Czujnik parkowania przedni</label>
					<label><input class="idg" type="checkbox" name="czujnik_parkowania_tylny" value="tak">Czujnik parkowania tylny</label>
					<label><input class="idg" type="checkbox" name="dach_panoramiczny" value="tak">Dach panoramiczny</label>
				</div>
				<div class="w-100">
					<label><input class="idg" type="checkbox" name="elektrochrom_lusterka_boczne" value="tak">Elektrochromatyczne lusterka boczne</label>
					<label><input class="idg" type="checkbox" name="elektrochrom_lusterko_wsteczne" value="tak">Elektrochromatyczne lusterko tylne</label>
					<label><input class="idg" type="checkbox" name="ele_fotele" value="tak">Elekt. fotele</label>
					<label><input class="idg" type="checkbox" name="ele_rolety" value="tak">Elektr. rolety</label>
					<label><input class="idg" type="checkbox" name="esp" value="tak">ESP</label>
					<label><input class="idg" type="checkbox" name="asystent_parkowania" value="tak">Asystent parkowania</label>
					<label><input class="idg" type="checkbox" name="asystent_pasa" value="tak">Asystent pasa ruchu</label>
				</div>
				<div class="w-100">
					<label><input class="idg" type="checkbox" name="gniazdo_usb" value="tak">Gniazdo USB</label>
					<label><input class="idg" type="checkbox" name="hud" value="tak">HUD (wyświetlacz przezierny)</label>
					<label><input class="idg" type="checkbox" name="isofix" value="tak">Isofix</label>
					<label><input class="idg" type="checkbox" name="kam_cofania" value="tak">Kamera cofania</label>
					<label><input class="idg" type="checkbox" name="klima_auto" value="tak">Klimatyzacja automatyczna</label>
					<label><input class="idg" type="checkbox" name="klima_4" value="tak">Klimatyzacja 4-strefowa</label>
					<label><input class="idg" type="checkbox" name="klima_2" value="tak">Klimatyzacja 2-strefowa</label>
				</div>
			</div>
			<div class="flex">	
				<div class="w-100">
					<label><input class="idg" type="checkbox" name="klima_man" value="tak">Klimatyzacja manualna</label>
					<label><input class="idg" type="checkbox" name="komp" value="tak">Komputer pokładowy</label>
					<label><input class="idg" type="checkbox" name="lopatki" value="tak">Łopatki zmiany biegów</label>
					<label><input class="idg" type="checkbox" name="mp3" value="tak">MP3</label>
					<label><input class="idg" type="checkbox" name="nawigacja" value="tak">Nawigacja</label>
					<label><input class="idg" type="checkbox" name="dvd" value="tak">DVD</label>
					<label><input class="idg" type="checkbox" name="ogranicznik" value="tak">Ogranicznik prędkości</label>
				</div>
				<div class="w-100">
					<label><input class="idg" type="checkbox" name="ogrzewanie_postojowe" value="tak">Ogrzewanie postojowe</label>
					<label><input class="idg" type="checkbox" name="podgrzewana_szyba" value="tak">Podgrzewana przednia szyba</label>
					<label><input class="idg" type="checkbox" name="podgrzewane_boczne" value="tak">Podgrzewane lusterka boczne</label>
					<label><input class="idg" type="checkbox" name="podgrzewane_przednie_siedzenia" value="tak">Podgrzewane siedzenia przednie</label>
					<label><input class="idg" type="checkbox" name="podgrzewane_tylne_siedzenia" value="tak">Podgrzewane siedzenia tylne</label>
					<label><input class="idg" type="checkbox" name="poduszki_przednie" value="tak">Poduszki powietrzne przednie</label>
					<label><input class="idg" type="checkbox" name="poduszki_boczne" value="tak">Poduszki powietrzne boczne</label>
				</div>
				<div class="w-100">
					<label><input class="idg" type="checkbox" name="wylaczenie_poduszki_pas" value="tak">Wyłączanie poduszki pasażera</label>
					<label><input class="idg" type="checkbox" name="przyciemniane_szyby" value="tak">Przyciemniane szyby</label>
					<label><input class="idg" type="checkbox" name="wspomaganie" value="tak">Wspomaganie kierownicy</label>
					<label><input class="idg" type="checkbox" name="reg_zawieszenie" value="tak">Regulacja zawieszenia</label>
					<label><input class="idg" type="checkbox" name="rej_jazdy" value="tak">Rejestrator jazdy</label>
					<label><input class="idg" type="checkbox" name="relingi" value="tak">Relingi dachowe</label>
					<label><input class="idg" type="checkbox" name="start_stop" value="tak">System Start/Stop</label>
				</div>
				<div class="w-100">
					<label><input class="idg" type="checkbox" name="szyber" value="tak">Szyberdach</label>
					<label><input class="idg" type="checkbox" name="dzienna" value="tak">Światła dzienne</label>
					<label><input class="idg" type="checkbox" name="led" value="tak">Światła LED</label>
					<label><input class="idg" type="checkbox" name="mgla" value="tak">Światła przeciwmgielne</label>
					<label><input class="idg" type="checkbox" name="xenon" value="tak">Światła XENON</label>
					<label><input class="idg" type="checkbox" name="skora" value="tak">Skórzana tapicerka</label>
					<label><input class="idg" type="checkbox" name="welur" value="tak">Welurowa tapicerka</label>
				</div>
				<div class="w-100">
					<label><input class="idg" type="checkbox" name="tempomat" value="tak">Tempomat</label>
					<label><input class="idg" type="checkbox" name="temp_aktywny" value="tak">Tempomat aktywny</label>
					<label><input class="idg" type="checkbox" name="tuner" value="tak">Tuner</label>
					<label><input class="idg" type="checkbox" name="kierownica_wielo" value="tak">Kierownica wielofunkcyjna</label>
					<label><input class="idg" type="checkbox" name="zmieniarka_cd" value="tak">Zmieniarka CD</label>
				</div>
			</div>
		</div>
	</div>
	
	<div class="shoper_editor_product_line">
		<div class="next_step blue_btn">Następny krok &nbsp <span class="icon-arrow-right2"></span></div>
	</div>
	
</div>

<div class="step hide" step="3">

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
	
	<div class="shoper_editor_product_line container" container="lokalizacja_oferty">
		<div class="w-90">

			<div class="flex">
			
				<div class="w-100 mid_inputs">
					<div class="flex">
						<label class="text_name">Transport na życzenie klienta</label>
						<label>
							<select class="idg std_text_input" type="select" name="transport_zyczenie">
								<option></option>
								<option>Tak</option>
								<option>Nie</option>
							</select>
						</label>
					</div>
						
					<div class="flex">
						<label class="text_name">Maksymalna odległość transportu</label>
						<label><input class="idg std_text_input" name="max_transport_km" type="text" placeholder=""></label>
						<label>km</label>
					</div>
				</div>
				
				<div class="w-100">
				</div>
				
			</div>
			
		</div>		

	</div>
	
	<div class="shoper_editor_product_line">
		<div class="next_step blue_btn">Następny krok &nbsp <span class="icon-arrow-right2"></span></div>
	</div>

</div>

<div class="step hide" step="4">

	<div class="shoper_editor_product_line container" container="gwarancje">
	
		<div class="w-90">
		
		<div class="about_info">Szczegóły dotyczące dokonania transakcji i formy jej zawarcia</div>
		<div class="flex">
			<div class="w-100">
				<div class="flex space-between">
					<label class="text_name">Typ transakcji</label>
					<label>
						<select class="idg std_text_input" type="select" name="typ_transakcji">
							<option></option>
							<option>Sprzedaż</option>
							<option>Odstąpienie leasingu</option>
							<option>Wykup auta po leasingu</option>
							<option>Inne</option>
						</select>
					</label>
				</div>
				<div class="flex space-between">
					<label class="text_name">Możliwość wystawienia faktury VAT</label>
					<label>
						<select class="idg std_text_input" type="select" name="faktura_vat">
							<option></option>
							<option>Faktura VAT</option>
							<option>Faktura VAT Marża</option>
							<option>Brak możliwości</option>
						</select>
					</label>
				</div>
				<div class="flex space-between">
					<label class="text_name">Rękojmia</label>
					<label>
						<select class="idg std_text_input" type="select" name="rekojmia">
							<option></option>
							<option>Gwarancja producenta</option>
							<option>Rękojmia za wady ukryte fizyczne i prawne zapisana w umowie</option>
							<option>Brak rękojmi za wady ukryte fizyczne i prawne</option>
						</select>
					</label>
				</div>
				<div class="flex space-between">
					<label class="text_name">Gwarancja sprzedażowa</label>
					<label>
						<select class="idg std_text_input" type="select" name="gwarancja_sprzedazowa">
							<option></option>
							<option>Tak</option>
							<option>Nie</option>
						</select>
					</label>
				</div>
				<div class="flex space-between">
					<label class="text_name">Okres gwarancji od daty zakupu</label>
					<label>
						<select class="idg std_text_input" type="select" name="okres_gwarancji">
							<option></option>
							<option>1</option>
							<option>2</option>
							<option>3</option>
							<option>4</option>
							<option>5</option>
							<option>6</option>
							<option>7</option>
							<option>8</option>
							
							<option>9</option>
							<option>10</option>
							<option>11</option>
							<option>12</option>
							<option>13</option>
							<option>14</option>
							<option>15</option>
							<option>16</option>
							
							<option>17</option>
							<option>18</option>
							<option>19</option>
							<option>20</option>
							<option>21</option>
							<option>22</option>
							<option>23</option>
							<option>24</option>
							
							<option>25</option>
							<option>26</option>
							<option>27</option>
							<option>28</option>
							<option>29</option>
							<option>30</option>
							<option>31</option>
							<option>32</option>
							
							<option>33</option>
							<option>34</option>
							<option>35</option>
							<option>36</option>
							<option>37</option>
							<option>38</option>
							<option>39</option>
							<option>40</option>
							
							<option>41</option>
							<option>42</option>
							<option>43</option>
							<option>44</option>
							<option>45</option>
							<option>46</option>
							<option>47</option>
							<option>48</option>
						</select>
					</label>
					<label>msc</label>
					</div>
				
				
			</div>
			
			<div class="w-100">
				<div class="shoper_editor_inline_header text_name">Elementy objęte gwarancją</div>
				<label><input class="idg" type="checkbox"  name="silnik" value="tak">Silnik</label>
				<label><input class="idg" type="checkbox"  name="rozrzad" value="tak">Rozrząd</label>
				<label><input class="idg" type="checkbox"  name="skrzynia" value="tak">Skrzynia biegów</label>
				<label><input class="idg" type="checkbox"  name="przeniesienie_napedu" value="tak">Przeniesienie napędu</label>
				<label><input class="idg" type="checkbox"  name="uklad_kierowniczy" value="tak">Układ kierowniczy</label>
			</div>
			
			<div class="w-100">
				<div class="shoper_editor_inline_header text_name">Elementy objęte gwarancją</div>
				<label><input class="idg" type="checkbox"  name="uklad_chlodzenia" value="tak">Układ chłodzenia</label>
				<label><input class="idg" type="checkbox"  name="elementy_zawieszenia" value="tak">Elementy zawieszenia</label>
				<label><input class="idg" type="checkbox"  name="uklad_wydechowy" value="tak">Układ wydechowy</label>
				<label><input class="idg" type="checkbox"  name="uklad_paliwowy" value="tak">Układ paliwowy</label>
				<label><input class="idg" type="checkbox"  name="uklad_hamulcowy" value="tak">Układ hamulcowy</label>
			</div>
			
			<div class="w-100">
				<div class="shoper_editor_inline_header text_name">Elementy objęte gwarancją</div>
				<label><input class="idg" type="checkbox"  name="uklad_elektryczny" value="tak">Układ elektryczny</label>
				<label><input class="idg" type="checkbox"  name="elektronika" value="tak">Elektronika</label>
				<label><input class="idg" type="checkbox"  name="powloka_lakiernicza" value="tak">Powłoka lakiernicza</label>
				<label><input class="idg" type="checkbox"  name="inne" value="tak">Inne</label>
			</div>
			
		</div>
		
		<div class="w-100">
			<div class="flex">
				<label class="text_name">Możliwość odbycia jazdy testowej na drogach publicznych</label>
				<label>
					<select class="idg std_text_input" type="select" name="jazda_testowa">
						<option></option>
						<option>Tak</option>
						<option>Nie</option>
					</select>
				</label>
			</div>
			<div class="flex">
				<label class="text_name">Wysokość kaucji za jazdę testową</label>
				<label><input class="idg std_text_input" type="number"   name="wysokosc_kaucji" placeholder="Kwota"></label>
				<label>PLN</label>
			</div>
		</div>
		
	</div>
	</div>

	<div class="shoper_editor_product_line">
		<div class="next_step blue_btn">Następny krok &nbsp <span class="icon-arrow-right2"></span></div>
	</div>
	
</div>

<div class="step hide" step="5">
	
	<div class="shoper_editor_product_line container" container="status_prawny">
		<div class="w-90">
			<div class="about_info text_name">Status prawny pojazdu</div>
			<div class="flex">
				<div class="w-100">
					<div class="flex space-between">
						<label class="text_name">Sposób użytkowania auta</label>
						<label>
							<select class="idg std_text_input" type="select" name="sposob_uzytkowania">
								<option></option>
								<option>Pojazd nowy</option>
								<option>Pojazd demonstracyjny</option>
								<option>Użytkowany zarobkowo</option>
								<option>Użytkowany prywatnie</option>
								<option>Pojazd firmowy</option>
							</select>
						</label>
					</div>
					<div class="flex space-between">
						<label class="text_name">Pierwszy właściciel</label>
						<label>
							<select class="idg std_text_input" type="select" name="pierwszy_wlasciciel">
								<option></option>
								<option>Tak</option>
								<option>Nie</option>
							</select>
						</label>
					</div>
					<div class="flex space-between">
						<label class="text_name">Okres użytkowania przez aktualnego właściciela</label>
						<label>
							<select class="idg std_text_input" type="select" name="okres_uzytku">
								<option></option>
								<option>Nieużytkowany</option>
								<option>Poniżej 3 miesięcy</option>
								<option>3-6 miesięcy</option>
								<option>6-12 miesięcy</option>
								<option>1-3 lat</option>
								<option>3-5 lat</option>
								<option>5-7 lat</option>
								<option>Powyżej 7 lat</option>
							</select>
						</label>
					</div>
					<div class="flex space-between">
						<label class="text_name">Pojazd sprowadzony</label>
						<label>
							<select class="idg std_text_input" type="select" name="pojazd_sprowadzony">
								<option></option>
								<option>Tak</option>
								<option>Nie</option>
							</select>
						</label>
					</div>
					<div class="flex space-between">
						<label class="text_name">Data sprowadzenia</label>
						<label>
							<input class="idg std_text_input" type="date" name="sprowadzenie_data">
						</label>
					</div>
				</div>
				<div class="w-100">
					<div class="flex space-between">
						<label class="text_name">Rejestracja pojazdu</label>
						<label>
							<select class="idg std_text_input" type="select" name="rej_pojazdu">
								<option></option>
								<option>Bez prawa do rejestracji</option>
								<option>Zarejestrowany w Polsce</option>
								<option>Zarejestrowany jako pojazd zabytkowy</option>
								<option>Zarejestrowany poza Polską</option>
								<option>Rejestracja tymczasowa</option>
								<option>Wyrejestrowany w Polsce</option>
								<option>Wyrejestrowany poza Polską</option>
								<option>Inne</option>
							</select>
						</label>
					</div>
					<div class="flex space-between">
						<label class="text_name">Kraj aktualnej rejestracji/wyrejestrowania</label>
						<label>
							<input class="idg std_text_input" type="text" name="kraj_rej">
						</label>
					</div>
					<div class="flex space-between">
						<label class="text_name">Homologacja ciężarowa</label>
						<label>
							<select class="idg std_text_input" type="select" name="homolagacja_ciezarowa">
								<option></option>
								<option>Tak</option>
								<option>Nie</option>
							</select>
						</label>
					</div>
					<div class="flex space-between">
						<label class="text_name">Hak holowniczy</label>
						<label>
							<select class="idg std_text_input" type="select" name="hak">
								<option></option>
								<option>Tak</option>
								<option>Nie</option>
							</select>
						</label>
					</div>
					<div class="flex space-between">
						<label class="text_name">DMC przyczepy (kg)</label>
						<label>
							<input class="idg std_text_input" type="number" name="dmc_waga">
						</label>
					</div>
				</div>
				<div class="w-100">
					<div class="flex space-between">
						<label class="text_name">DMC przyczepy z hamulcem (kg)</label>
						<label>
							<input class="idg std_text_input" type="number" name="dmc_hamulec_waga">
						</label>
					</div>
					<div class="flex space-between">
						<label class="text_name"><input class="idg" type="checkbox"  name="przeglad_techniczny" value="tak">Przegląd techniczny ważny do</label>
						<label>
							<input class="idg std_text_input" type="date" name="przeglad_techniczny_data">
						</label>
					</div>
					<div class="flex space-between">
						<label class="text_name"><input class="idg" type="checkbox"  name="ubezpieczenie_do" value="tak">Ubezpieczenie OC ważne do</label>
						<label>
							<input class="idg std_text_input" type="date" name="ubezpieczenie_data">
						</label>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<div class="shoper_editor_product_line container" container="historia_serwisowa_podstawowe">
		<div class="w-90">
			<div class="about_info text_name">Historia serwisowa</div>
			<div class="flex">
				<div class="w-100">
					<div class="flex">
						<label class="text_name">Książka serwisowa</label>
						<label>
							<select class="idg std_text_input" type="select" name="ksiazka_serwisowa">
								<option></option>
								<option>Tak</option>
								<option>Nie</option>
							</select>
						</label>
					</div>
					
					<div class="flex">
						<label class="text_name">Sposób serwisowania</label>
						<label>
							<select class="idg std_text_input" type="select" name="sposob_serwisowania">
								<option></option>
								<option>Serwisowany w ASO</option>
								<option>Serwisowany poza ASO</option>
								<option>Serwisowany samodzielnie przez właściciela</option>
								<option>Nieznana historia serwisowa</option>
							</select>
						</label>
					</div>
					
					<label><input class="idg" type="radio" name="serwis" value="tak">Pojazd serwisowany w ciągu ostatnich 12 miesięcy</label>
					<label><input class="idg" type="radio" name="serwis" value="nie">Pojazd nie był serwisowany w ciągu ostatnich 12 miesięcy</label>
				</div>
			</div>
			
			<div class="flex">
				<div class="w-100">
					<div class="shoper_editor_inline_header text_name">Zakres wykonanego serwisu w ciągu ost. 6 msc</div>
					<label><input class="idg" type="checkbox"  name="serwis_lakier" value="tak">Powłoka lakiernicza</label>
					<label><input class="idg" type="checkbox"  name="serwis_silnik" value="tak">Silnik</label>
					<label><input class="idg" type="checkbox"  name="serwis_rozrzad" value="tak">Rozrząd</label>
					<label><input class="idg" type="checkbox"  name="serwis_skrzynia" value="tak">Skrzynia biegów</label>
					<label><input class="idg" type="checkbox"  name="serwis_przeniesienie" value="tak">Przeniesienie napędu</label>
				</div>
				
				<div class="w-100">
					<div class="shoper_editor_inline_header text_name">Zakres wykonanego serwisu w ciągu ost. 6 msc</div>
					<label><input class="idg" type="checkbox"  name="serwis_chlodzenie" value="tak">Układ chłodzenia</label>
					<label><input class="idg" type="checkbox"  name="serwis_uklad_kierowniczy" value="tak">Układ kierowniczy</label>
					<label><input class="idg" type="checkbox"  name="serwis_elementy_zawieszenia" value="tak">Elementy zawieszenia</label>
					<label><input class="idg" type="checkbox"  name="serwis_uklad_wydechowy" value="tak">Układ wydechowy</label>
					<label><input class="idg" type="checkbox"  name="serwis_uklad_paliwowy" value="tak">Układ paliwowy</label>
				</div>
				
				<div class="w-100">
					<div class="shoper_editor_inline_header text_name">Zakres wykonanego serwisu w ciągu ost. 6 msc</div>
					<label><input class="idg" type="checkbox"  name="serwis_uklad_hamulcowy" value="tak">Układ hamulcowy</label>
					<label><input class="idg" type="checkbox"  name="serwis_uklad_elektryczny" value="tak">Układ elektryczny</label>
					<label><input class="idg" type="checkbox"  name="serwis_elektronika_pojazdu" value="tak">Elektronika pojazdu</label>
					<label><input class="idg" type="checkbox"  name="serwis_klimatyzacja" value="tak">Przegląd klimatyzacji</label>
					<label><input class="idg" type="checkbox"  name="serwis_inne" value="tak">Inne</label>
				</div>
			</div>
			
		</div>
	</div>
	
	<div class="shoper_editor_product_line container" container="stan_techniczny">
		<div class="w-90">
		<div class="about_info text_name">Stan techniczny</div>
			<div class="flex">
				<div class="w-100">
				
					<div class="flex space-between">
						<label class="text_name"><input class="idg" type="checkbox" name="zabezp_antykorozyjne" value="tak">Zabezpieczenie antykorozyjne podwozia - (data)</label>
						<label>
							<input class="idg std_text_input" type="date" name="zabezp_antykorozyjne_data">
						</label>
					</div>

					<div class="flex space-between">
						<label class="text_name">Stan karoserii</label>
						<label>
							<select class="idg std_text_input" type="select" name="stan_karoserii">
								<option></option>
								<option>Brak korozji</option>
								<option>Delikatna korozja</option>
								<option>Skorodowane</option>
							</select>
						</label>
					</div>
					
					<div class="flex space-between">
						<label class="text_name">Stan nadkól</label>
						<label>
							<select class="idg std_text_input" type="select" name="stan_nadkol">
								<option></option>
								<option>Brak korozji</option>
								<option>Delikatna korozja</option>
								<option>Skorodowane</option>
							</select>
						</label>
					</div>
					
					<div class="flex space-between">
						<label class="text_name">Stan progów</label>
						<label>
							<select class="idg std_text_input" type="select" name="stan_progow">
								<option></option>
								<option>Brak korozji</option>
								<option>Delikatna korozja</option>
								<option>Skorodowane</option>
							</select>
						</label>
					</div>
					
					<div class="flex space-between">
						<label class="text_name">Stan podwozia</label>
						<label>
							<select class="idg std_text_input" type="select" name="stan_podwozia">
								<option></option>
								<option>Brak korozji</option>
								<option>Delikatna korozja</option>
								<option>Skorodowane</option>
							</select>
						</label>
					</div>
					

					<div class="flex space-between">
						<label class="text_name">Szczelność silnika i układu przeniesienia napędu</label>
						<label>
							<select class="idg std_text_input" type="select" name="szczelnosc_silnika">
								<option></option>
								<option>Brak wycieków</option>
								<option>Niewielkie wycieki</option>
								<option>Wycieki</option>
							</select>
						</label>
					</div>

				</div>
				<div class="w-100">

					<div class="flex space-between">
						<label class="text_name">Rodzaj opon</label>
						<label>
							<select class="idg std_text_input" type="select" name="opony_rodzaj">
								<option></option>
								<option>Letnie</option>
								<option>Zimowe</option>
								<option>Wielosezonowe</option>
							</select>
						</label>
					</div>
					
					<div class="flex space-between">
						<label class="text_name">Stan opon</label>
						<label>
							<select class="idg std_text_input" type="select" name="opony_stan">
								<option></option>
								<option>Nowe</option>
								<option>Używane</option>
								<option>Bieżnikowane</option>
								<option>Chińskie</option>
							</select>
						</label>
					</div>
					
					<div class="flex space-between">
						<label class="text_name">Komplet opon</label>
						<label>
							<select class="idg std_text_input" type="select" name="opony_komplet">
								<option></option>
								<option>Komplet</option>
								<option>Kompletowane 2+2</option>
								<option>Kompletowane z różnych</option>
							</select>
						</label>
					</div>
					
					<div class="flex space-between">
						<label class="text_name">Wiek opon</label>
						<label>
							<select class="idg std_text_input" type="select" name="opony_wiek">
								<option></option>
								<option>Nowe</option>
								<option>Poniżej 1 roku</option>
								<option>1 - 3 lat</option>
								<option>3 - 5 lat</option>
								<option>Powyżej 5 lat</option>
								<option>Do wymiany</option>
							</select>
						</label>
					</div>
					
					<div class="flex space-between">
						<label class="text_name">Głębokość bieżnika</label>
						<label>
							<select class="idg std_text_input" type="select" name="opony_bieznik">
								<option></option>
								<option>Nowe</option>
								<option>Powyżej 4 mm</option>
								<option>4 mm - 1.6 mm</option>
								<option>Opony do wymiany</option>
							</select>
						</label>
					</div>
					
				</div>

			</div>
		</div>
	</div>
	
	<div class="shoper_editor_product_line container" container="uszkodzenia">
		<div class="w-90">
		<div class="about_info text_name">Uszkodzenia</div>
		
		<div class="flex">
			<div class="w-100">
				<div class="flex">
					<label class="text_name">Deklaracja o uszkodzeniach</label>
					<label>
						<select class="idg std_text_input" type="select" name="deklaracja_uszkodzenia">
							<option></option>
							<option>Pojazd poważnie uszkodzony</option>
							<option>Pojazd uszkodzony</option>
							<option>Uszkodzenia nieznaczne - eksploatacyjne</option>
							<option>Pojazd nieuszkodzony</option>
						</select>
					</label>
				</div>
				
				<div class="flex">
					<label class="text_name">Historia kolizyjna pojazdu</label>
					<label>
						<select class="idg std_text_input" type="select" name="historia_kolizyjna">
							<option></option>
							<option>Auto bezkolizyjne</option>
							<option>Auto po kolizji</option>
							<option>Nieznana historia kolizyjna</option>
						</select>
					</label>
				</div>
				
				<div class="flex">
					<label class="text_name">Historia wypadkowa pojazdu</label>
					<label>
						<select class="idg std_text_input" type="select" name="historia_wypadkowa">
							<option></option>
							<option>Auto bezwypadkowe</option>
							<option>Auto powypadkowe</option>
							<option>Nieznana historia wypadkowa</option>
						</select>
					</label>
				</div>
			</div>
			<div class="w-100">
				<div class="shoper_editor_inline_header text_name">Typ uszkodzeń</div>
				<label><input class="idg" type="checkbox" name="typ_uszkodzen_kolizja_czolowa" value="tak">Kolizja czołowa</label>
				<label><input class="idg" type="checkbox" name="typ_uszkodzen_kolizja_tyl" value="tak">Kolizja w tył pojazdu</label>
				<label><input class="idg" type="checkbox" name="typ_uszkodzen_kolizja_boczna" value="tak">Kolizja boczna</label>
				<label><input class="idg" type="checkbox" name="typ_uszkodzen_kolizja_dachowanie" value="tak">Dachowanie</label>
			</div>
			<div class="w-100">
				<div class="shoper_editor_inline_header text_name">Typ uszkodzeń</div>
				<label><input class="idg" type="checkbox" name="typ_uszkodzen_kolizja_powodz" value="tak">Pojazd popowodziowy</label>
				<label><input class="idg" type="checkbox" name="typ_uszkodzen_kolizja_pozar" value="tak">Pojazd po pożarze</label>
				<label><input class="idg" type="checkbox" name="typ_uszkodzen_uszkodzenia_mechaniczne" value="tak">Uszkodzenia mechaniczne</label>
				<label><input class="idg" type="checkbox" name="typ_uszkodzen_inne" value="tak">Inne</label>
			</div>
		</div>
		
		<div class="flex">
			<div class="w-100">
				<div class="shoper_editor_inline_header text_name">Rodzaj uszkodzeń</div>
				<label><input class="idg" type="checkbox" name="rodzaj_uszkodzen_geometria" value="tak">Uszkodzona geometria</label>
				<label><input class="idg" type="checkbox" name="rodzaj_uszkodzen_rama_nosna" value="tak">Uszkodzona rama nośna</label>
				<label><input class="idg" type="checkbox" name="rodzaj_uszkodzen_blacharskie" value="tak">Uszkodzenia blacharskie</label>
				<label><input class="idg" type="checkbox" name="rodzaj_uszkodzen_lakiernicze" value="tak">Uszkodzenia lakiernicze</label>
				<label><input class="idg" type="checkbox" name="rodzaj_uszkodzen_silnik" value="tak">Uszkodzenie silnika</label>
			</div>
			<div class="w-100">
				<div class="shoper_editor_inline_header text_name">Rodzaj uszkodzeń</div>
				<label><input class="idg" type="checkbox" name="rodzaj_uszkodzen_skrzynia" value="tak">Uszkodzona skrzynia</label>
				<label><input class="idg" type="checkbox" name="rodzaj_uszkodzen_sprzeglo" value="tak">Uszkodzone sprzęgło</label>
				<label><input class="idg" type="checkbox" name="rodzaj_uszkodzen_przeniesienie" value="tak">Uszkodzone przeniesienie napędu</label>
				<label><input class="idg" type="checkbox" name="rodzaj_uszkodzen_chlodzenie" value="tak">Uszkodzony układ chłodzenia</label>
				<label><input class="idg" type="checkbox" name="rodzaj_uszkodzen_kierowniczy" value="tak">Uszkodzony układ kierowniczy</label>
			</div>
			<div class="w-100">
				<div class="shoper_editor_inline_header text_name">Rodzaj uszkodzeń</div>
				<label><input class="idg" type="checkbox" name="rodzaj_uszkodzen_zawieszenie" value="tak">Uszkodzone zawieszenie</label>
				<label><input class="idg" type="checkbox" name="rodzaj_uszkodzen_wydechowy" value="tak">Uszkodzony układ wydechowy</label>
				<label><input class="idg" type="checkbox" name="rodzaj_uszkodzen_paliwowy" value="tak">Uszkodzony układ paliwowy</label>
				<label><input class="idg" type="checkbox" name="rodzaj_uszkodzen_hamulcowy" value="tak">Uszkodzony układ hamulcowy</label>
				<label><input class="idg" type="checkbox" name="rodzaj_uszkodzen_elektryczny" value="tak">Uszkodzony układ elektryczny</label>
			</div>
			<div class="w-100">
				<div class="shoper_editor_inline_header text_name">Rodzaj uszkodzeń</div>
				<label><input class="idg" type="checkbox" name="rodzaj_uszkodzen_elektronika" value="tak">Udzkodzona elektronika</label>
				<label><input class="idg" type="checkbox" name="rodzaj_uszkodzen_wnetrze" value="tak">Uszkodzenia wnętrza</label>
				<label><input class="idg" type="checkbox" name="rodzaj_uszkodzen_tapicerka" value="tak">Uszkodzona tapicerka</label>
				<label><input class="idg" type="checkbox" name="rodzaj_uszkodzen_inne" value="tak">Inne uszkodzenia</label>
			</div>
		</div>
		
		</div>
	</div>
	
	<div class="shoper_editor_product_line container" container="wyposazenie_bhp">
		<div class="w-90">
		<div class="about_info text_name">Wyposażenie BHP i naprawcze</div>
			<div class="flex">
				<div class="w-100">
					<label><input class="idg" type="checkbox" name="gasnica" value="tak">Gaśnica z ważnym przeglądem</label>
					<label><input class="idg" type="checkbox" name="apteczka" value="tak">Apteczka</label>
					<label><input class="idg" type="checkbox" name="kolo_zapasowe" value="tak">Koło zapasowe</label>
					<label><input class="idg" type="checkbox" name="kolo_dojazdowe" value="tak">Koło dojazdowe</label>
					<label><input class="idg" type="checkbox" name="zestaw_naprawczy" value="tak">Zestaw naprawczy do opon</label>
				</div>
				<div class="w-100">
					<label><input class="idg" type="checkbox" name="lewarek" value="tak">Lewarek</label>
					<label><input class="idg" type="checkbox" name="trojkat" value="tak">Trójkąt ostrzegawczy</label>
					<label><input class="idg" type="checkbox" name="podst_narzedzia" value="tak">Zestaw podstawowych narzędzi naprawczych</label>
					<label><input class="idg" type="checkbox" name="kamizelka" value="tak">Kamizelka odblaskowa</label>
				</div>
				<div class="w-100">
				</div>
			</div>
		</div>
	</div>
	
	<div class="shoper_editor_product_line">
		<div class="next_step blue_btn get_view">Następny krok &nbsp <span class="icon-arrow-right2"></span></div>
	</div>
	
</div>

<div class="step hide" step="6">
	<?php include $_SERVER['DOCUMENT_ROOT'].'/functions/ogloszenia/offer_editors_simple/podsumowanie.php' ;?>
</div>