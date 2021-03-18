<?php 

	include $_SERVER['DOCUMENT_ROOT'].'/config.php';
	session_start();	
	$s_token = $_SESSION['token'];
	
		if ($s_token) {
			$collection = $db->selectCollection('users');
			$sQuery = array('token' => $s_token);	
			$cursor = $collection->findOne($sQuery);
		}

;?>

<div class="shoper_editor_product_line bckg_w" style="padding: 40px 0;">

	<div style="width: 85%;">
	
		<div class="w-100">
			
				<div class="about_info">Lokalizacja wyświetlania</div>
				
				<div>
					<label><input class="lokalizacja_banneru_polska lokalizacja_banneru" type="radio"  name="lokalizacja_banneru" value="polska">Reklama ogólnopolska</label>
					<label><input class="lokalizacja_banneru_wojewodztwa lokalizacja_banneru" type="radio"  name="lokalizacja_banneru" value="wojewodztwo">Reklama w województwach</label>
					<label><input class="lokalizacja_banneru_powiaty lokalizacja_banneru" type="radio"  name="lokalizacja_banneru" value="powiat">Reklama w powiatach</label>
					<label><input class="lokalizacja_banneru_gminy lokalizacja_banneru" type="radio"  name="lokalizacja_banneru" value="gmina">Reklama w gminach</label>
				</div>
				
				<div class="banner_wojewodztwa select_regiony">
					
				</div>
			
				<div class="banner_powiaty select_regiony">
					
				</div>
			
				<div class="banner_gminy select_regiony">

				</div>
		
		</div>

		<div class="w-100">
			<div class="banner_poziomy_wybierz" style="display: none;">
				<div class="about_info">Banner poziomy</div>
				<div class="flex-middle space-between">
					<label><input class="rodzaj_banneru_poziom" type="radio"  name="rodzaj_banneru_poziom" value="poziomy" checked>Banner reklamowy poziomy</label>
					
						<form typ="poziom" method="post" class="banner_up_poziom add_banner_img" id="banner_up_poziom" enctype="multipart/form-data" action="<?php echo $path;?>functions/banners/add_image.php">   
							<input type="file" name="banner_up[]" class="banner_up_button" />
						</form>
					
				</div>
				<div class="flex-middle space-between">
					<label style="width: 100%;">Link do przekierowania po kliknięciu:<input class="std_text_input banner_poziomy banner_input" type="text"></label>
					<div class="blue_btn podglad_poziom" url="" typ="poziom">Podgląd</div>
				</div>
			</div>
				
			<div class="banner_pionowy_wybierz" style="display: none;">
				<div class="about_info">Banner pionowy</div>
				<div class="flex-middle space-between">
					<label><input class="rodzaj_banneru_pion" type="radio"  name="rodzaj_banneru_pion" value="pionowy" checked>Banner reklamowy pionowy</label>
					
						<form typ="pion" method="post" class="banner_up_pion add_banner_img" id="banner_up_pion" enctype="multipart/form-data" action="<?php echo $path;?>functions/banners/add_image.php">   
							<input type="file" name="banner_up[]" class="banner_up_button" />
						</form>
					
				</div>
				<div class="flex-middle space-between">
					<label style="width: 100%;">Link do przekierowania po kliknięciu:<input class="std_text_input banner_pionowy banner_input" type="text"></label>
					<div class="blue_btn podglad_pion" url="" typ="pion">Podgląd</div>
				</div>
			</div>	
		</div>

		<div class="w-100">
			<div class="about_info">Kategoria wyświetlania reklamy</div>
			
			<select class="select_banner_category">
				<option f="brak">Wybierz kategorię, w której będzie wyświetlać się reklama</option>
				<option f="0">Sprzedaż</option>
				<option f="1">Usługi</option>
				<option f="2">Motoryzacja</option>
				<option f="3">Nieruchomości</option>
				<option f="5">Praca</option>
			</select>
			
		</div>
		
		<div class="w-100">
			<div class="about_info">Podsumowanie</div>
			
			<div class="flex">
				<div class="w-100 flex-center-column">
					<div class="shoper_editor_additional_info">Zamawiający:</div>
					<label><b><?php echo $cursor['user_data']['contact']['company_full_name'];?></b></label>
					<label><?php echo $cursor['user_data']['contact']['street']." ".$cursor['user_data']['contact']['local_num'] ?></label>
					<label><?php echo $cursor['user_data']['contact']['postal_code']." ".$cursor['user_data']['contact']['city'];?></label>
					<label>NIP: <?php echo $cursor['user_data']['contact']['NIP'];?></label>
					<label>REGON: <?php echo $cursor['user_data']['contact']['REGON'];?></label>
				</div>

				<div class="w-100 flex-center-column">
					<label><b>Czas emisji: &nbsp </b> 30 dni</label>
					<label><b>Kwota brutto razem:</b></label>
					<label class="podsumowanie_cena" value="" style="font-size: 21px;"><div class="blue_btn check_price">Sprawdź cenę</div></label>
				</div>
			</div>
			
			<div class="flex">
				<div class="w-100">
					<div class="flex space-between">
						<label><input class="rodzaj_faktury" type="radio"  name="rodzaj_faktury" value="efaktura" checked>e-faktura na adres email</label>
						<label style="width: 73%;"><input class="email_input_for_faktura std_text_input" type="text" placeholder="e-mail" value="<?php echo $cursor['user_data']['contact']['company_register_contact_email'];?>"><label>
					</div>
					<label><input  class="rodzaj_faktury" type="radio"  name="rodzaj_faktury" value="faktura">Faktura przesyłana na adres siedziby firmy</label>
				</div>
			</div>
			
			<div class="flex">
				<div class="blue_btn pay_for_banner">Przejdź do płatności</div>
			</div>
			
		</div>
	
	
</div>

</div>
