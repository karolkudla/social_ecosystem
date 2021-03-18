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
					</div>
					
					<div class="w-100">
						<div class="shoper_editor_inline_header text_name">Oznacz cenę jako</div>

						<label><input class="idg" type="radio"  name="cena_specjalna" value="promocja">Promocja</label>
						<label><input class="idg std_text_input" type="number"   name="promocja_cena" placeholder="Kwota"></label>
						<label><input class="idg" type="radio"  name="cena_specjalna" value="okazja">Okazja</label>
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
					<div class="shoper_editor_inline_header text_name">Opłata dla pośrednika oferty</div>
					<label><input class="idg" type="radio"  name="oplata_posrednik" value="nie">Brak opłaty dla pośrednika</label>
					<label><input class="idg" type="radio"  name="oplata_posrednik" value="tak">Opłata dla pośrednika w kwocie</label>
					<label><input class="idg std_text_input" type="number"   name="oplata_posrednik_wartosc" placeholder=""></label>
				</div>
				
				<div class="w-100">
					<div class="shoper_editor_inline_header text_name">Opłaty dodatkowe (nieuwzględnione powyżej)</div>
					<label><input class="idg" type="radio"  name="oplaty_dodatkowe" value="nie">Brak opłat dodatkowych</label>
					<label><input class="idg" type="radio"  name="oplaty_dodatkowe" value="tak">Opłaty dodatkowe w kwocie</label>
					<label><input class="idg std_text_input" type="number"   name="oplaty_dodatkowe_wartosc" placeholder=""></label>
				</div>
				
				<div class="w-100">
				</div>
				
				<div class="w-100">
				</div>
				
			</div>
		
		</div>
	
	</div>

	