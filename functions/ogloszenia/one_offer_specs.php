<?php

	include $_SERVER['DOCUMENT_ROOT'].'/config.php';
	$prod_id = $_POST['product_id'];	
	$col_prod = $db->selectCollection('prod');
	$p = $col_prod->findOne(['_id' => new MongoDB\BSON\ObjectID($prod_id)]);

	/* Sprzedaż */
	if ($p['cats'][0] == 'Sprzedaż') {
		$specyfikacje_opis = $p['product_data']['podstawowe_dane']['specyfikacje_oferty']['value'];
	}
	
	/* Motoryzacja */
	if ($p['cats'][0] == 'Motoryzacja') {
	$specyfikacje = $p['product_data']['specyfikacje_oferty'];
	$wyposazenie_dodatkowe = $p['product_data']['wyposazenie_dodatkowe'];
	$typ_nadwozia = $p['product_data']['typ_nadwozia'];
	$gwarancje = $p['product_data']['gwarancje'];
	$status_prawny = $p['product_data']['status_prawny'];
	$historia_serwisowa_podstawowe = $p['product_data']['historia_serwisowa_podstawowe'];
	$stan_techniczny = $p['product_data']['stan_techniczny'];
	$uszkodzenia = $p['product_data']['uszkodzenia'];
	$bhp = $p['product_data']['wyposazenie_bhp'];
	$lokalizacja = $p['product_data']['lokalizacja_oferty'];
	}
	
	/* Nieruchomości - Sprzedaż - Domy */
	if ($p['cats'][0] == 'Nieruchomości') {
	$specyfikacje = $p['product_data']['specyfikacja_oferty'];
	$otoczenie_obiektu = $p['product_data']['otoczenie_obiektu'];
	$informacje_szczegolowe = $p['product_data']['informacje_szczegolowe'];
	$wyposazenie = $p['product_data']['wyposazenie'];
	$wyposazenie_eksploatacyjne = $p['product_data']['wyposazenie_eksploatacyjne'];
	$szczegoly_otoczenia = $p['product_data']['szczegoly_otoczenia'];
	$zabezpieczenia = $p['product_data']['zabezpieczenia'];
	$oplaty_dodatkowe = $p['product_data']['oplaty_dodatkowe'];
	$warunki_umowy = $p['product_data']['warunki_umowy'];
	$info_eksploatacyjne = $p['product_data']['informacje_eksploatacyjne'];
	$cennik = $p['product_data']['cennik'];
	$ogrzewanie = $p['product_data']['ogrzewanie'];
	$info_o_obiekcie = $p['product_data']['info_o_obiekcie'];
	}
	
	/* Praca */
	if ($p['cats'][0] == 'Praca') {
	$wyksztalcenie = $p['product_data']['wyksztalcenie'];
	$prawo_jazdy = $p['product_data']['prawo_jazdy'];
	$dodatkowe = $p['product_data']['dodatkowe'];
	$jezyki_obce = $p['product_data']['jezyki_obce'];
	$staz_pracy = $p['product_data']['staz_pracy'];
	$lokalizacja_pracy = $p['product_data']['lokalizacja_miejsca_pracy']; /* text */
	$dane_pracodawcy = $p['product_data']['dane_pracodawcy'];
	$info_o_stanowisku = $p['product_data']['info_o_stanowisku'];
	}
	
	/* Uslugi */
	if ($p['cats'][0] == 'Usługi') {
	$specyfikacje_opis = $p['product_data']['podstawowe_dane']['specyfikacje_oferty']['value'];
	$lokalizacja = $p['product_data']['lokalizacja_wykonania_uslugi'];
	}

;?>


<div class="one_offer_card one_offer_specs">

<?php if ($p['cats'][0] == 'Sprzedaż') {
	
	if ($specyfikacje_opis) { ;?>
	<div class="">
		<?php echo nl2br($specyfikacje_opis);?>
	</div>
	<?php
	}
	
} ;?>


<?php if ($p['cats'][0] == 'Motoryzacja') { ;?>
	
	<?php if ($typ_nadwozia) {;?>
	<div class="about_info fw-500">Typ nadwozia</div>
	<div class="">
		<?php 
			foreach ($typ_nadwozia as $key => $v) {
				echo "<div class='spec_line'>".$v['text_value']."</div>";
			}
		;?>
	</div>
	<?php };?>

	<?php if ($specyfikacje) {;?>
	<div class="about_info_2 fw-500">Podstawowa specyfikacja</div>
	<div class="cc3">
		<?php 
			foreach ($specyfikacje as $key => $v) {
				echo "<div class='spec_line'>".$v['text_name'].": <span class='fw-500'>".$v['value']."</span></div>";
			}
		;?>
	</div>
	<?php };?>
	
	<?php if ($wyposazenie_dodatkowe) {;?>
	<div class="about_info_2 fw-500">Wyposażenie dodatkowe</div>
	<div class="cc3">
		<?php 
			foreach ($wyposazenie_dodatkowe as $key => $v) {
				echo "<div class='spec_line'><li>".$v['text_value']."</li></div>";
			}
		;?>
	</div>
	<?php };?>
	
	<?php if ($gwarancje) {;?>
	<div class="about_info_2 fw-500">Gwarancje</div>
	<div class="cc2">
		<?php 
			foreach ($gwarancje as $key => $v) {
				if ($v['type'] !== 'tick') {
					echo "<div class='spec_line'>".$v['text_name'].": <span class='fw-500'>".$v['value']."</span></div>";
				}
			}
		;?>
	</div>

	<div class="about_info_2 fw-500">Elementy objęte gwarancją</div>
	<div class="cc2">
		<?php 
			foreach ($gwarancje as $key => $v) {
				if ($v['type'] == 'tick') {
					echo "<div class='spec_line'><li>".$v['text_value']."</li></div>";
				}
			}
		;?>
	</div>
	<?php };?>
	
	<?php if ($status_prawny) {;?>
	<div class="about_info_2 fw-500">Status prawny pojazdu</div>
	<div class="cc2">
		<?php 
			foreach ($status_prawny as $key => $v) {
				if ($v['type'] !== 'tick') {
					echo "<div class='spec_line'>".$v['text_name'].": <span class='fw-500'>".$v['value']."</span></div>";
				}
			}
		;?>
	</div>
	<?php };?>
	
	<?php if ($historia_serwisowa_podstawowe) {;?>
	<div class="about_info_2 fw-500">Historia serwisowa</div>
	<div class="">
		<?php 
			foreach ($historia_serwisowa_podstawowe as $key => $v) {
				if ($v['type'] == 'select') {
					echo "<div class='spec_line'>".$v['text_name'].": <span class='fw-500'>".$v['value']."</span></div>";
				}
			}
		;?>
	</div>

	<div class="shoper_editor_additional_info">Zakres wykonanego serwisu w ciągu ostatnich 6 msc</div>
	<div class="cc2">
		<?php 
			foreach ($historia_serwisowa_podstawowe as $key => $v) {
				if ($v['type'] == 'tick') {
					echo "<div class='spec_line'><li>".$v['text_value']."</li></div>";
				}
			}
		;?>
	</div>
	<?php };?>
	
	<?php if ($stan_techniczny) {;?>
	<div class="about_info_2 fw-500">Stan techniczny</div>
	<div class="cc2">
		<?php 
			foreach ($stan_techniczny as $key => $v) {
				if ($v['type'] !== 'tick') {
					echo "<div class='spec_line'>".$v['text_name'].": <span class='fw-500'>".$v['value']."</span></div>";
				}
			}
		;?>
	</div>
	<?php };?>
	
	<?php if ($uszkodzenia) {;?>
	<div class="about_info_2 fw-500">Uszkodzenia</div>
	<div class="">
		<?php 
			foreach ($uszkodzenia as $key => $v) {
				if ($v['type'] == 'select') {
					echo "<div class='spec_line'>".$v['text_name'].": <span class='fw-500'>".$v['value']."</span></div>";
				}
			}
		;?>
	</div>
	
	<div class="shoper_editor_additional_info"><b>Typ uszkodzeń</b></div>
	<div class="cc2">
		<?php 
			foreach ($uszkodzenia as $key => $v) {
				if ($v['text_name'] == 'Typ uszkodzeń') {
					echo "<div class='spec_line'><li>".$v['text_value']."</li></div>";
				}
			}
		;?>
	</div>
	
	<div class="shoper_editor_additional_info"><b>Rodzaj uszkodzeń</b></div>
	<div class="cc2">
		<?php 
			foreach ($uszkodzenia as $key => $v) {
				if ($v['text_name'] == 'Rodzaj uszkodzeń') {
					echo "<div class='spec_line'><li>".$v['text_value']."</li></div>";
				}
			}
		;?>
	</div>
	<?php };?>
	
	<?php if ($bhp) {;?>
	<div class="about_info_2 fw-500">Wyposażenie BHP</div>
	<div class="cc2">
		<?php 
			foreach ($bhp as $key => $v) {
				echo "<div class='spec_line'><li>".$v['text_value']."</li></div>";
			}
		;?>
	</div>
	<?php };?>
	
	<?php if ($lokalizacja['transport_zyczenie']['value'] == 'Tak') {;?>
	<div class="about_info_2 fw-500">Transport na życzenie klienta</div>
	<div class="cc3">
		<?php 
			echo "<div class='spec_line'>Maks. odległość transportu: ".$lokalizacja['max_transport_km']['value']." km</div>";
		;?>
	</div>
	<?php };?>
	
<?php };?>

<!----------------------------------------------------------------------------------------------------------------------------------------------------------------->	
	
<?php if ($p['cats'][0] == 'Nieruchomości') { ;?>

	<?php if ($specyfikacje) {;?>
	<div class="about_info_2 fw-500">Podstawowa specyfikacja</div>
	<div class="">
		<?php 
			foreach ($specyfikacje as $key => $v) {
				echo "<div class='spec_line'>".$v['text_name'].": <span class='fw-500'>".$v['text_value']."</span></div>";
			}
		;?>
	</div>
	<?php };?>

	<?php if ($cennik['cena_za']) {;?>
	<?php echo "<div class='spec_line'>".$cennik['cena_brutto_wartosc']['text_name']." ".$cennik['cena_brutto_wartosc']['value']." zł</div>";?>
	<?php echo "<div class='spec_line'>".$cennik['cena_za']['text_name']." ".$cennik['cena_za']['text_value']."</div>";?>
	<?php };?>

	<?php if ($oplaty_dodatkowe) {;?>
	<div class="about_info_2 fw-500">Opłaty dodatkowe</div>
	<div class="">
		<?php 
			foreach ($oplaty_dodatkowe as $key => $v) {
				if ($v['type'] !== 'tick') {
					echo "<div class='spec_line'>".$v['text_name'].": <span class='fw-500'>".$v['value']."</span></div>";
				}
			}
		;?>
	</div>
	<?php };?>
	
	<?php if ($warunki_umowy) {;?>
	<div class="about_info_2 fw-500">Warunki umowy</div>
	<div class="">
		<?php 
			foreach ($warunki_umowy as $key => $v) {
				if ($v['type'] !== 'tick') {
					echo "<div class='spec_line'>".$v['text_name'].": <span class='fw-500'>".$v['value']."</span></div>";
				}
			}
		;?>
	</div>
	<?php };?>
	
	<?php if ($info_o_obiekcie) {;?>
	<div class="about_info_2 fw-500">Informacje o obiekcie</div>
	<div class="">
		<?php 
			foreach ($info_o_obiekcie as $key => $v) {
				if ($v['type'] !== 'tick') {
					echo "<div class='spec_line'>".$v['text_name'].": <span class='fw-500'>".$v['value']."</span></div>";
				}
			}
		;?>
	</div>
	<?php };?>
	
	<?php if ($info_eksploatacyjne) {;?>
	<div class="about_info_2 fw-500">Informacje eksploatacyjne</div>
	<div class="cc2">
		<?php 
			foreach ($info_eksploatacyjne as $key => $v) {
				if ($v['type'] !== 'tick') {
					echo "<div class='spec_line'>".$v['text_name'].": <span class='fw-500'>".$v['value']."</span></div>";
				}
			}
		;?>
	</div>
	<?php };?>

	<?php if ($otoczenie_obiektu) {;?>
	<div class="about_info_2 fw-500">Otoczenie obiektu</div>
	<div class="cc2">
		<?php 
			foreach ($otoczenie_obiektu as $key => $v) {
				echo "<div class='spec_line'><li>".$v['text_value']."</li></div>";
			}
		;?>
	</div>
	<?php };?>
	
	<?php if ($informacje_szczegolowe) {;?>
	<div class="about_info_2 fw-500">Informacje szczegółowe</div>
	<div class="cc2">
		<?php 
			foreach ($informacje_szczegolowe as $key => $v) {
				echo "<div class='spec_line'>".$v['text_name'].": <span class='fw-500'>".$v['value']."</span></div>";
			}
		;?>
	</div>
	<?php };?>
	
	<?php if ($wyposazenie) {;?>
	<div class="about_info_2 fw-500">Wyposażenie</div>
	<div class="cc2">
		<?php 
			foreach ($wyposazenie as $key => $v) {
				echo "<div class='spec_line'><li>".$v['text_value']."</li></div>";
			}
		;?>
	</div>
	<?php };?>
	
	<?php if ($wyposazenie_eksploatacyjne) {;?>
	<div class="about_info_2 fw-500">Wyposażenie eksploatacyjne</div>
	<div class="cc2">
		<?php 
			foreach ($wyposazenie_eksploatacyjne as $key => $v) {
				echo "<div class='spec_line'>".$v['text_name'].": <span class='fw-500'>".$v['value']."</span></div>";
			}
		;?>
	</div>
	<?php };?>
	
	<?php if ($szczegoly_otoczenia) {;?>
	<div class="about_info_2 fw-500">Szczegóły otoczenia</div>
	<div class="cc2">
		<?php 
			foreach ($szczegoly_otoczenia as $key => $v) {
				echo "<div class='spec_line'>".$v['text_name'].": <span class='fw-500'>".$v['value']."</span></div>";
			}
		;?>
	</div>
	<?php };?>
	
	<?php if ($ogrzewanie) {;?>
	<div class="about_info_2 fw-500">Ogrzewanie</div>
	<div class="cc2">
		<?php 
			foreach ($ogrzewanie as $key => $v) {
				echo "<div class='spec_line'>".$v['text_name'].": <span class='fw-500'>".$v['text_value']."</span></div>";
			}
		;?>
	</div>
	<?php };?>
	
	<?php if ($zabezpieczenia) {;?>
	<div class="about_info_2 fw-500">Zabezpieczenia</div>
	<div class="cc2">
		<?php 
			foreach ($zabezpieczenia as $key => $v) {
				echo "<div class='spec_line'><li>".$v['text_value']."</li></div>";
			}
		;?>
	</div>
	<?php };?>

<?php };?>

<?php if ($p['cats'][0] == 'Praca') { ;?>

	<div class="about_info fw-500">Wymagania wobec pracownika</div>

	<div class="flex">
	
		<?php if ($wyksztalcenie) {;?>
		<div class="p0_10">
			<div class="shoper_editor_additional_info">Wykształcenie</div>
			<div class="">
				<?php 
					foreach ($wyksztalcenie as $key => $v) {
						echo "<div class='spec_line'><li>".$v['text_value']."</li></div>";
					}
				;?>
			</div>
		</div>
		<?php };?>

		<?php if ($prawo_jazdy) {;?>
		<div class="p0_10">
			<div class="shoper_editor_additional_info">Prawo jazdy</div>
			<div class="">
				<?php 
					foreach ($prawo_jazdy as $key => $v) {
						echo "<div class='spec_line'><li>".$v['text_value']."</li></div>";
					};
				;?>
			</div>
		</div>
		<?php };?>
		
		<div class="p0_10">
			<?php if ($staz_pracy['ogolny_wartosc']) {;?><div class='spec_line'>Ogólny staż pracy: <?php echo $staz_pracy['ogolny_wartosc']['value'];?></div><?php ;};?>
			<?php if ($staz_pracy['na_podobnym_stanowisku_wartosc']) {;?><div class='spec_line'>Staż pracy na podobnym stanowisku: <?php echo $staz_pracy['na_podobnym_stanowisku_wartosc']['value'];?></div><?php ;};?>
		</div>

	</div>
	
	<?php if ($dodatkowe) {;?>
	<div class="shoper_editor_additional_info">Dodatkowe preferencje</div>
	<div class="cc2">
		<?php 
			foreach ($dodatkowe as $key => $v) {
				echo "<div class='spec_line'><li>".$v['text_value']."</li></div>";
			};
		;?>
	</div>
	<?php };?>

	<?php if ($jezyki_obce) {;?>
	<div class="about_info_2 fw-500">Znajomość języków obcych</div>
	<div class="">
		<?php 
			foreach ($jezyki_obce as $key => $v) {
				if ($v['type'] == 'text') {
					echo "<div class='spec_line'><li>".$v['value']."</li></div>";
				}
			}
		;?>
	</div>
	<?php };?>

	<?php if ($lokalizacja_pracy) {;?>
	<div class="about_info_2 fw-500">Lokalizacje miejsca pracy</div>
	<div class="">
		<?php 
			foreach ($lokalizacja_pracy as $key => $v) {
				if ($v['type'] == 'text') {
					echo "<div class='spec_line'><li>".$v['value']."</li></div>";
				}
			}
		;?>
	</div>
	<?php };?>

	<?php if ($dane_pracodawcy) {;?>
	<div class="about_info_2 fw-500">Dane pracodawcy</div>
	<div class="cc2">
		<?php 
			foreach ($dane_pracodawcy as $key => $v) {
				echo "<div class='spec_line'>".$v['text_name'].": <span class='fw-500'>".$v['value']."</span></div>";
			}
		;?>
	</div>
	<?php };?>

	
	<?php if ($info_o_stanowisku) {;?>
	<div class="about_info_2 fw-500">Informacje o stanowisku</div>
	<div class="cc2">
		<?php 
			foreach ($info_o_stanowisku as $key => $v) {
				echo "<div class='spec_line'>".$v['text_name'].": <span class='fw-500'>".$v['text_value']."</span></div>";
			}
		;?>
	</div>
	<?php };?>

<?php };?>

<?php if ($p['cats'][0] == 'Usługi') {
	
	if ($specyfikacje_opis) { ;?>
	<div class="about_info fw-500">Specyfikacje usługi</div>
	<div class="">
		<?php echo nl2br($specyfikacje_opis);?>
	</div>
	<?php
	}
	
	if ($lokalizacja) {
	
	;?>
	<div class="about_info fw-500">Zasięg wykonywania usługi</div>
	
<?php
	if ($lokalizacja['usluga_stacjonarnie']['text_value']) {echo "<li>Usługa wykonywana stacjonarnie</li>";};
	if ($lokalizacja['cala_polska']['text_value']) {echo "<li>Cała Polska</li>";};
	if ($lokalizacja['zasieg_uslugi_odleglosc']['value']) {echo "<li>Maks. odległość od lokalizacji ogłoszenia ". $lokalizacja['zasieg_uslugi_odleglosc']['value']."</li>";};
;?>	
	
	<div class="">
		<?php 
			foreach ($lokalizacja as $key => $v) {
				if ($v['type'] == 'text') {
					echo "<div class='spec_line'><li>".$v['value']."</li></div>";
				}
			}
		;?>
	</div>

	<?php };};?>

























</div>