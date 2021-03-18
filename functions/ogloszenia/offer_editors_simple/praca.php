<?php 
	include $_SERVER['DOCUMENT_ROOT'].'/config.php';
	session_start();
?>

<div class="step hide" step="2">

	<div class="shoper_editor_product_line container" container="podstawowe_dane" style="display: none;">
		<div class="w-90">
			<div class="flex">
				<div class="w-100">
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
		
	<div class="shoper_editor_product_line container" container="podstawowe_dane">
		<div class="w-90">
			<div class="about_info text_name">Opis oferty</div>
			<div><textarea type="text" class="idg" name="opis_oferty"></textarea></div>
		</div>
	</div>

	<div class="shoper_editor_product_line">
		
		<div class="w-90">
			<div class="about_info text_name">Wymagania i preferencje pracodawcy wobec kandydatów</div>
		
			<div class="flex">
			
				<div class="w-100 container" container="wyksztalcenie">
					<div class="shoper_editor_inline_header text_name">Wykształcenie</div>
					
					<label><input class="idg" type="checkbox" name="brak_wymagan" value="tak">Brak wymagań</label>
					<label><input class="idg" type="checkbox" name="podstawowe" value="tak">Podstawowe</label>
					<label><input class="idg" type="checkbox" name="zawodowe" value="tak">Zawodowe</label>
					<label><input class="idg" type="checkbox" name="srednie" value="tak">Średnie</label>
					<label><input class="idg" type="checkbox" name="licencjat" value="tak">Licencjat</label>
					<label><input class="idg" type="checkbox" name="magister" value="tak">Magister</label>
					<label><input class="idg" type="checkbox" name="mba" value="tak">MBA</label>
				</div>
				
				<div class="w-100 container" container="prawo_jazdy">
					<div class="shoper_editor_inline_header text_name">Prawo jazdy</div>
					
					<label><input class="idg" type="checkbox" name="kat_a" value="tak">Kat. A</label>
					<label><input class="idg" type="checkbox" name="kat_b" value="tak">Kat. B</label>
					<label><input class="idg" type="checkbox" name="kat_be" value="tak">Kat. B + E</label>
					<label><input class="idg" type="checkbox" name="kat_c" value="tak">Kat. C</label>
					<label><input class="idg" type="checkbox" name="kat_ce" value="tak">Kat. C + E</label>
					<label><input class="idg" type="checkbox" name="kat_d" value="tak">Kat. D</label>
					<label><input class="idg" type="checkbox" name="kat_de" value="tak">Kat. D + E</label>
					<label><input class="idg" type="checkbox" name="kat_t" value="tak">Kat. T</label>
				</div>
				
				<div class="w-100 container" container="dodatkowe">
					<div class="shoper_editor_inline_header text_name">Dodatkowe preferencje</div>
					<label><input class="idg" type="checkbox" name="orzeczenie_niepelnosprawnosc" value="tak">Orzeczenie o niepełnosprawności</label>
					<label><input class="idg" type="checkbox" name="jako_bezrobotne" value="tak">Osoby zarejestrowane jako bezrobotne</label>
					<label><input class="idg" type="checkbox" name="niekaralnosc" value="tak">Zaświadczenie o niekaralności</label>
					<label><input class="idg" type="checkbox" name="studenci_i_uczniowie" value="tak">Studenci i uczniowie</label>
					<label><input class="idg" type="checkbox" name="wyjazdy_sluzbowe" value="tak">Gotowość do wyjazdów służbowych</label>
				</div>
				
				<div class="w-100 container" container="dodatkowe">
					<div class="shoper_editor_inline_header text_name">Dodatkowe preferencje</div>
					<label><input class="idg" type="checkbox" name="swiadectwo_pracy" value="tak">Świadectwo pracy</label>
					<label><input class="idg" type="checkbox" name="referencje" value="tak">Referencje</label>
					<label><input class="idg" type="checkbox" name="ms_office" value="tak">Dobra znajomość MS Office</label>
					<label><input class="idg" type="checkbox" name="ksiazeczka_zdrowia" value="tak">Książeczka zdrowia</label>
					<label><input class="idg" type="checkbox" name="uprawnienia_specjalistyczne" value="tak">Uprawnienia specjalistyczne / branżowe</label>

				</div>
			
			</div>
		</div>
	</div>
	
	
	<div class="shoper_editor_product_line container" container="jezyki_obce">
		
		<div class="w-90">	
			<div class="flex">
			
				<div class="w-100">
					<div class="shoper_editor_inline_header text_name">Znajomość języków obcych</div>

					<div class="flex">
						<label><input class="idg" type="checkbox" name="jezyk_1" value="jezyk_1">Język 1</label>
						<label><input class="idg std_text_input" type="text" name="jezyk_1_nazwa"></label>
					</div>
					
					<div class="flex">
						<label><input class="idg" type="checkbox" name="jezyk_2" value="jezyk_2">Język 2</label>
						<label><input class="idg std_text_input" type="text" name="jezyk_2_nazwa"></label>
					</div>
					
					<div class="flex">
						<label><input class="idg" type="checkbox" name="jezyk_3" value="jezyk_3">Język 3</label>
						<label><input class="idg std_text_input" type="text" name="jezyk_3_nazwa"></label>
					</div>
					
					<div class="flex">
						<label><input class="idg" type="checkbox" name="jezyk_4" value="jezyk_4">Język 4</label>
						<label><input class="idg std_text_input" type="text" name="jezyk_4_nazwa"></label>
					</div>
					
					<div class="flex">
						<label><input class="idg" type="checkbox" name="jezyk_5" value="jezyk_5">Język 5</label>
						<label><input class="idg std_text_input" type="text" name="jezyk_5_nazwa"></label>
					</div>
					
				</div>
				
				<div class="w-100">
					<div class="shoper_editor_inline_header text_name">Znajomość języków obcych</div>

					<div class="flex">
						<label><input class="idg" type="checkbox" name="jezyk_6" value="jezyk_6">Język 6</label>
						<label><input class="idg std_text_input" type="text" name="jezyk_6_nazwa"></label>
					</div>
					
					<div class="flex">
						<label><input class="idg" type="checkbox" name="jezyk_7" value="jezyk_7">Język 7</label>
						<label><input class="idg std_text_input" type="text" name="jezyk_7_nazwa"></label>
					</div>
					
					<div class="flex">
						<label><input class="idg" type="checkbox" name="jezyk_8" value="jezyk_8">Język 8</label>
						<label><input class="idg std_text_input" type="text" name="jezyk_8_nazwa"></label>
					</div>
					
					<div class="flex">
						<label><input class="idg" type="checkbox" name="jezyk_9" value="jezyk_9">Język 9</label>
						<label><input class="idg std_text_input" type="text" name="jezyk_9_nazwa"></label>
					</div>
					
					<div class="flex">
						<label><input class="idg" type="checkbox" name="jezyk_10" value="jezyk_10">Język 10</label>
						<label><input class="idg std_text_input" type="text" name="jezyk_10_nazwa"></label>
					</div>
					
				</div>

			</div>

		</div>	
			
	</div>
	
	<div class="shoper_editor_product_line container" container="staz_pracy">
		
		<div class="w-90">	
			<div class="flex">
	
				<div class="w-100 short_inputs">
					<div class="shoper_editor_inline_header text_name">Staż pracy</div>
					
					<div class="flex">
						<label><input class="idg" type="checkbox"  name="ogolny" value="tak">Staż pracy powyżej</label>
						<label><input class="idg std_text_input" type="number"   name="ogolny_wartosc"></label>
						<label>lat</label>
					</div>
					
					<div class="flex">
						<label><input class="idg" type="checkbox"  name="na_podobnym_stanowisku" value="tak">Na podobnym stanowisku powyżej</label>
						<label><input class="idg std_text_input" type="number"   name="na_podobnym_stanowisku_wartosc"></label>
						<label>lat</label>
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
	
		
	<div class="shoper_editor_product_line container" container="lokalizacja_miejsca_pracy">
		<div class="w-90">
			<div class="flex">
				<div class="w-100 short_inputs">
					<div class="about_info text_name">Miejsce wykonywania pracy</div>
					<label><input class="idg" type="checkbox" name="praca_stacjonarnie" value="praca_stacjonarnie">Stacjonarnie / W siedzibie firmy</label>
					<label><input class="idg" type="checkbox" name="zasieg_pracy" value="zasieg_pracy">Zasięg wykonywania pracy</label>
					<label><input class="idg std_text_input" type="number" name="zasieg_pracy_odleglosc">km - od siedziby firmy</label>
				
				</div>
				<div class="w-100">
					<div class="about_info text_name">Miejscowości wykonywania pracy</div>
					
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
					<div class="about_info text_name">Miejscowości wykonywania pracy</div>

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
	
	<div class="shoper_editor_product_line container" container="dane_pracodawcy">
	
		<div class="w-90">
			<div class="about_info text_name">Dane pracodawcy</div>
			
				<div class="flex space-around">
			
					<div class="w-100">
						
						<div class="super_text_grid">
							<label class="inp">
								<input class="idg" type="super_text" name="pracodawca_nazwa" placeholder="&nbsp;">
								<span class="label">Pełna nazwa firmy producenta</span>
								<span class="border"></span>
							</label>
						</div>
						
						<div class="super_text_grid">
							<label class="inp">
								<input class="idg" type="super_text" name="pracodawca_ulica" placeholder="&nbsp;">
								<span class="label">Ulica</span>
								<span class="border"></span>
							</label>
						</div>
						
						<div class="super_text_grid">
							<label class="inp">
								<input class="idg" type="super_text" name="pracodawca_miasto" placeholder="&nbsp;">
								<span class="label">Miasto</span>
								<span class="border"></span>
							</label>
						</div>
						
						<div class="super_text_grid">
							<label class="inp">
								<input class="idg" type="super_text" name="pracodawca_kod_pocztowy" placeholder="&nbsp;">
								<span class="label">Kod pocztowy</span>
								<span class="border"></span>
							</label>
						</div>

					</div>
		
					<div class="w-100">
						
						<div class="super_text_grid">
							<label class="inp">
								<input class="idg" type="super_text" name="pracodawca_nip" placeholder="&nbsp;">
								<span class="label">NIP</span>
								<span class="border"></span>
							</label>
						</div>
						
						<div class="super_text_grid">
							<label class="inp">
								<input class="idg" type="super_text" name="pracodawca_regon" placeholder="&nbsp;">
								<span class="label">REGON</span>
								<span class="border"></span>
							</label>
						</div>
						
						<div class="super_text_grid">
							<label class="inp">
								<input class="idg" type="super_text" name="pracodawca_krs" placeholder="&nbsp;">
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


<div class="step hide all_labels_80" step="4">

	<div class="shoper_editor_product_line container" container="warunki">
	
		<div class="w-90">
			<div class="about_info text_name">Warunki finansowe i szczegóły umowy</div>
			
			<div class="flex">

				<div class="w-100">
					<div class="shoper_editor_inline_header text_name">Wynagrodzenie stałe</div>
					<label><input class="idg" type="radio"  name="wynagrodzenie" value="stale">Wynagrodzenie stałe</label>
					<label><input class="idg std_text_input" type="text"   name="wynagrodzenie_kwota" placeholder="Kwota" ></label>
				</div>
				
				<div class="w-100">
					<div class="shoper_editor_inline_header text_name">Wynagrodzenie prowizyjne</div>
					<label><input class="idg" type="radio"  name="wynagrodzenie" value="prowizyjne">Wynagrodzenie prowizyjne</label>
					<label>Podstawa wynagrodzenia</label>
					<label><input class="idg std_text_input" type="text"   name="wynagrodzenie_prowizyjne_podstawa_kwota" placeholder="Podstawa"></label>
					<label>Prowizja od:</label>
					<label><input class="idg std_text_input" type="text"   name="wynagrodzenie_prowizyjne_od_kwota" placeholder="od"></label>
					<label>do:</label>
					<label><input class="idg std_text_input" type="text"   name="wynagrodzenie_prowizyjne_do_kwota" placeholder="do"></label>
				</div>
				
				<div class="w-100">
					<div class="shoper_editor_inline_header text_name">Oznacz wynagrodzenie jako</div>
					<label><input class="idg" type="radio"  name="oznaczenie_wynagrodzenia" value="wysokie">Wysokie</label>
					<label><input class="idg" type="radio"  name="oznaczenie_wynagrodzenia" value="bardzo_wysokie">Bardzo wysokie</label>
				</div>
					
			</div>
			
		</div>
	</div>
		
	<div class="shoper_editor_product_line container" container="info_o_stanowisku">
	
		<div class="w-90">
			<div class="about_info text_name">Informacje o stanowisku pracy</div>
			
			<div class="flex">
			
				<div class="w-100">
					<div class="shoper_editor_inline_header text_name">Rodzaj stanowiska</div>
					<label><input class="idg" type="radio"  name="rodzaj_stanowiska" value="prezes">Prezes</label>
					<label><input class="idg" type="radio"  name="rodzaj_stanowiska" value="czlonek_rady">Członek rady nadzorczej</label>
					<label><input class="idg" type="radio"  name="rodzaj_stanowiska" value="dyrektor">Dyrektor</label>
					<label><input class="idg" type="radio"  name="rodzaj_stanowiska" value="kierownik">Kierownik</label>
					<label><input class="idg" type="radio"  name="rodzaj_stanowiska" value="specjalista">Specjalista</label>
					<label><input class="idg" type="radio"  name="rodzaj_stanowiska" value="asystent">Asystent</label>
					<label><input class="idg" type="radio"  name="rodzaj_stanowiska" value="stazysta">Stażysta</label>
					<label><input class="idg" type="radio"  name="rodzaj_stanowiska" value="praktykant">Praktykant</label>
					<label><input class="idg" type="radio"  name="rodzaj_stanowiska" value="pracownik_fizyczny">Pracownik fizyczny</label>
				</div>
				
				<div class="w-100">
					<div class="shoper_editor_inline_header text_name">Forma zatrudnienia</div>
					<label><input class="idg" type="radio"  name="forma_zatrudnienia" value="pelen_etat">Pełen etat</label>
					<label><input class="idg" type="radio"  name="forma_zatrudnienia" value="czesciowy_etat">Częściowy etat</label>
					<label><input class="idg" type="radio"  name="forma_zatrudnienia" value="zlecenie">Zlecenie</label>
					<label><input class="idg" type="radio"  name="forma_zatrudnienia" value="umowa_o_dzielo">Umowa o dzieło</label>
					<label><input class="idg" type="radio"  name="forma_zatrudnienia" value="staz/praktyka">Staż / Praktyka</label>
					<label><input class="idg" type="radio"  name="forma_zatrudnienia" value="wolontariat">Wolontariat</label>
				</div>
				
				<div class="w-100">
					<div class="shoper_editor_inline_header text_name">Czas trwania umowy</div>
					<label><input class="idg" type="radio"  name="czas_umowy" value="bezterminowa">Bezterminowa</label>
					<label><input class="idg" type="radio"  name="czas_umowy" value="okres_probny">Okres próbny</label>
					<label><input class="idg" type="radio"  name="czas_umowy" value="kontrakt_terminowy">Kontrakt terminowy</label>
					<label><input class="idg" type="radio"  name="czas_umowy" value="praca_sezonowa">Praca sezonowa</label>
					<label><input class="idg" type="radio"  name="czas_umowy" value="praca_dorywcza">Praca dorywcza</label>
				</div>
				
				<div class="w-100">
					<div class="shoper_editor_inline_header text_name">Miejsce wykonywania pracy</div>
					<label><input class="idg" type="checkbox"  name="stacjonarne" value="tak">Stacjonarnie</label>
					<label><input class="idg" type="checkbox"  name="mobilne" value="tak">Mobilnie</label>
					<label><input class="idg" type="checkbox"  name="u_klienta" value="tak">U klienta</label>
					<label><input class="idg" type="checkbox"  name="delegacja" value="tak">Delegacja</label>
					<label><input class="idg" type="checkbox"  name="praca_zdalna" value="tak">Praca zdalna</label>
				</div>
				
			</div>
		</div>
	</div>
	
	<div class="shoper_editor_product_line container" container="info_o_stanowisku">
	
		<div class="w-90">
			<div class="flex">
			
				<div class="w-100">
					<div class="shoper_editor_inline_header text_name">Godziny wykonywania pracy</div>
					<label><input class="idg" type="checkbox"  name="rano-popoludnie" value="tak">Rano - Popołudnie</label>
					<label><input class="idg" type="checkbox"  name="popoludnie-wieczor" value="tak">Popołudnie - Wieczór</label>
					<label><input class="idg" type="checkbox"  name="praca-nocna" value="tak">Praca nocna</label>
					<label><input class="idg" type="checkbox"  name="nienormowany_czas" value="tak">Nienormowany czas pracy</label>
					<label><input class="idg" type="checkbox"  name="dowolne-godziny" value="tak">W dowolnych godzinach</label>
				</div>
				
				<div class="w-100">
					<div class="shoper_editor_inline_header text_name">Dni wykonywania pracy</div>
					<label><input class="idg" type="checkbox"  name="tylko_weekend" value="tak">Tylko weekendy</label>
					<label><input class="idg" type="checkbox"  name="pn-pt" value="tak">Od poniedziałku do piątku</label>
					<label><input class="idg" type="checkbox"  name="tez_weekend" value="tak">Również w weekendy</label>
					<label><input class="idg" type="checkbox"  name="tez_swieta" value="tak">Również w święta</label>
				</div>
				
				<div class="w-100">
					<div class="shoper_editor_inline_header text_name">Okresy rozliczeń wynagrodzenia</div>
					<label><input class="idg" type="radio"  name="okresy_rozliczen" value="miesiac">Co miesiąc</label>
					<label><input class="idg" type="radio"  name="okresy_rozliczen" value="dwa_tygodnie">Co 2 tygodnie</label>
					<label><input class="idg" type="radio"  name="okresy_rozliczen" value="tydzien">Co tydzień</label>
					<label><input class="idg" type="radio"  name="okresy_rozliczen" value="dzien">Codziennie</label>
					<label><input class="idg" type="radio"  name="okresy_rozliczen" value="po_wykonaniu_zlecenia">Po wykonaniu zlecenia</label>
				</div>
				
				<div class="w-100">
					<div class="shoper_editor_inline_header text_name">Kary umowne</div>
					<label><input class="idg" type="radio"  name="kary_umowne" value="nie">Brak klauzul o karach umownych</label>
					<label><input class="idg" type="radio"  name="kary_umowne" value="tak">Klauzula o karach umownych</label>
				</div>
				
			</div>
		</div>
	</div>
	
	<div class="shoper_editor_product_line">
		<div class="next_step blue_btn get_view">Następny krok &nbsp <span class="icon-arrow-right2"></span></div>
	</div>
		
</div>

<div class="step hide" step="5">
	<?php include $_SERVER['DOCUMENT_ROOT'].'/functions/ogloszenia/offer_editors_simple/podsumowanie.php' ;?>
</div>