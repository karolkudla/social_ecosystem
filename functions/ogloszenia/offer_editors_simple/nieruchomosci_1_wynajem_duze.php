	<div class="shoper_editor_product_line container" container="cennik">
		<div class="w-90">
				<div class="about_info text_name">Cennik</div>
				
				<div class="flex">
	
					<div class="w-100">
						<div class="shoper_editor_inline_header text_name">Cena wynajmu</div>

						<label><input class="idg" 				 type="radio"  name="cena" value="cena_brutto" checked>Cena brutto</label>
						<label><input class="idg std_text_input" type="number"   name="cena_brutto_wartosc" placeholder="Kwota brutto" ></label>

					</div>
					<div class="w-100">
						<div class="shoper_editor_inline_header text_name">Okres rozliczeniowy</div>

						<label><input class="idg" type="radio"  name="cena_za" value="doba">Doba</label>
						<label><input class="idg" type="radio"  name="cena_za" value="tydzien">Tydzień</label>
						<label><input class="idg" type="radio"  name="cena_za" value="miesiac">Miesiąc</label>
						<label><input class="idg" type="radio"  name="cena_za" value="kwartal">Kwartał</label>
						<label><input class="idg" type="radio"  name="cena_za" value="rok">Rok</label>

					</div>
					
					<div class="w-100">
					</div>
					
					<div class="w-100">
					</div>

				</div>

		</div>
	</div>
	
	<div class="shoper_editor_product_line container" container="oplaty_dodatkowe">
	
		<div class="w-90">
		<div class="about_info text_name">Opłaty dodatkowe</div>
		
			<div class="flex">
			
				<div class="w-100">
					<div class="shoper_editor_inline_header text_name">Kaucja zwrotna</div>
					<label><input class="idg" type="radio"  name="kaucja_zwrotna" value="nie">Brak kaucji zwrotnej</label>
					<label><input class="idg" type="radio"  name="kaucja_zwrotna" value="tak">Kaucja zwrotna w kwocie</label>
					<label><input class="idg std_text_input" type="number"   name="kaucja_zwrotna_wartosc" placeholder=""></label>
				</div>
				
				<div class="w-100">
					<div class="shoper_editor_inline_header text_name">Opłaty dodatkowe (nieuwzględnione powyżej)</div>
					<label><input class="idg" type="radio"  name="oplaty_dodatkowe" value="nie">Brak opłat dodatkowych</label>
					<label><input class="idg" type="radio"  name="oplaty_dodatkowe" value="tak">Opłaty dodatkowe w kwocie</label>
					<label><input class="idg std_text_input" type="number"   name="oplaty_dodatkowe_wartosc" placeholder=""></label>
				</div>
				
				<div class="w-100">
				</div>
				
			</div>
		
		</div>
	
	</div>
	
	<div class="shoper_editor_product_line container" container="warunki_umowy">
	
		<div class="w-90">
		<div class="about_info text_name">Warunki zawarcia umowy</div>
		
			<div class="flex">
			
				<div class="w-100">
				
					<div class="shoper_editor_inline_header text_name">Lokal dostępny od dnia</div>
					<label><input class="idg std_text_input" type="date" name="lokal_dostepny_od_data"></label>
					
					<div class="shoper_editor_inline_header mt-10 text_name">Planowany okres wynajmu</div>
					<label><input class="idg" type="radio"  name="planowany_okres" value="bezterminowy">Bezterminowy</label>
					<label><input class="idg" type="radio"  name="planowany_okres" value="terminowy">Terminowy</label>
					
				</div>
				
				<div class="w-100">
					<div class="shoper_editor_inline_header text_name">Minimalny okres wynajmu</div>
					<label><input class="idg" type="radio"  name="minimalny_okres" value="brak">Brak</label>
					<label><input class="idg" type="radio"  name="minimalny_okres" value="powyzej_3msc">Powyżej 3 msc</label>
					<label><input class="idg" type="radio"  name="minimalny_okres" value="powyzej_6msc">Powyżej 6 msc</label>
					<label><input class="idg" type="radio"  name="minimalny_okres" value="rok">Rok</label>
					<label><input class="idg" type="radio"  name="minimalny_okres" value="powyzej_rok">Powyżej roku</label>
				</div>
				
				<div class="w-100">
					<div class="shoper_editor_inline_header text_name">Sposób zawarcia umowy</div>
					<label><input class="idg" type="radio"  name="sposob_zawarcia" value="standard">Standardowy</label>
					<label><input class="idg" type="radio"  name="sposob_zawarcia" value="notarialnie_wystawca">Notarialnie - koszty ponosi wystawca</label>
					<label><input class="idg" type="radio"  name="sposob_zawarcia" value="notarialnie_wynajmujacy">Notarialnie - koszty ponosi wynajmujący</label>
				</div>

				<div class="w-100">
					<div class="shoper_editor_inline_header text_name">Warunki odstąpienia od umowy najmu</div>
					<label><input class="idg" type="radio"  name="warunki_odstapienia" value="brak_kar">Brak kar umownych w przypadku odstąpienia od umowy</label>
					<label><input class="idg" type="radio"  name="warunki_odstapienia" value="kara">Kary umowne w przypadku przedterminowego rozwiązania umowy w kwocie (zł)</label>
					<label><input class="idg std_text_input" type="number"   name="kara_wartosc" placeholder=""></label>
				</div>

			</div>
		
		</div>
	
	</div>
	
	<div class="shoper_editor_product_line">
		<div class="next_step blue_btn">Następny krok &nbsp <span class="icon-arrow-right2"></span></div>
	</div>
	