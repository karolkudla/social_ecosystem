<div class="flex podsumowanie">

	<div class="view_ready"></div>
	
	<div class="shoper_editor_product_edit_information">
	
		<div class="about_info">Podsumowanie</div>
		<div class="shoper_editor_inline_header ">Dziękujemy za dodanie nowej oferty.</div>

		<div class="blue_btn accept_editor" style="background: #ffc107; color: black;">Opublikuj ofertę</div>
	
		<?php 
			
			if ($_SESSION['token']) {
					$collection = $db->selectCollection('users');
					$sQuery = array('token' => $_SESSION['token']);	
					$cursor = $collection->findOne($sQuery);
					
					if ($cursor['login'] !== null && $cursor['r'] == 'vokulsky') {
						
		;?>
		
						<div class="flex-column">
							<label class="flex-middle"><input type="checkbox" class="bonus_checkbox">Bonus</label>
							<input type="text" class="std_text_input bonus_name" placeholder="N">
							<input type="text" class="std_text_input bonus_email" placeholder="@">
						</div>
		
		<?php
						
					}
			}

		;?>
	
	</div>

</div>
