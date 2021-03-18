<?php

include $_SERVER['DOCUMENT_ROOT'].'/config.php';
$pid = $_POST['pid'];
$count = $_POST['count'];

$col_prod = $db->selectCollection('prod');
$item = $col_prod->findOne(['_id' => new MongoDB\BSON\ObjectID($pid)]);
$img = json_decode($item['pos']);

$gallery_img_path  =  $user_download   .	  $p['url'] .	 $user_shoper_offers_gallery  .   $p['_id']    ."/";

;?>
<div id="close" style="position: absolute; top: 3%; right: 2%; font-size; 20px;"><span class="icon-cross"></span></div>

<div style="display: flex; flex-direction: column; align-items: center;">

<div style="width: 100%; display: flex; justify-content: center; align-items: center; padding: 20px 0 20px 0; background: whitesmoke;">
	<div><img src="<?php echo $gallery_img_path.$img[0];?>" style="width: 90px; height: 90px; object-fit: cover; border-radius: 3px; margin: 5px;"></div>
	<div>
		<div><div style="font-size: 24px; font-weight: 400; padding: 0 0 5px 10px;"><?php echo $item['title'];?></div></div>
		<div>
		
			<div style="
			display: flex; 
			justify-content: space-evenly; 
			align-items: center; 
			">
			
				<?php 
					if ($item['buy_data']['money']['inputs']) {
					$p = $item['buy_data']['money']['inputs'];
					
					foreach ($p as $k => $labval) {
						
						if (strpos($labval['label'],'only_pln') !== false) {$only_pln = $labval['value'];}
						if (strpos($labval['label'],'money_pln') !== false) {$money_pln = $labval['value'];}
						if (strpos($labval['label'],'money_zln') !== false) {$money_zln = $labval['value'];}
						if (strpos($labval['label'],'cena_wywolawcza') !== false) {$wywolawcza = $labval['value'];}
						if (strpos($labval['label'],'cena_kup_teraz') !== false) {$only_pln = $labval['value'];}
						
					} 
					
					} else {
					
						$p = $item['prices'];
						$only_pln = $p['pln'];
						$money_pln = $p['pln_zln'];
						$money_zln = $p['zln_zln'];
					
					}
				;?>
			
				<div class="p_payu">
					<div class="con_h" style="margin-bottom: 5px;">Cena PLN</div>
					<div class="fav_price_pln" style="margin: 0; font-size: 22px;"><?php echo $only_pln ;?>
						<div style="display: inline; font-size: 12px; color: gray; margin: 0 0 0 1px; height: 80%;">PLN</div>
					</div>
				</div>
				<div class="p_payz">
					<div class="con_h" style="margin-bottom: 5px;">Cena w Zielonych</div>
						<div class="p_pay--data">
							<div class="zielony_wrap_list">
							<div style="display: flex;">
								<div style=""><?php echo $money_pln;?></div>
								<div style="color: grey; font-weight: 400; font-size: 10px; padding: 0 0 0 2px;">PLN</div>
							</div>
							<div style="margin: 0 5px 0 5px;"> + </div>
								<div style="display: flex;">
									<div style="display: flex;">
										<div style="display: flex; align-items: center;" >
											<img src="<?php echo $path;?>img/zielony.png" width="24px" height="24px">
										</div>
										<div ><?php echo $money_zln;?></div>								
									</div>
									<div style="color: #71b929; font-weight: 400; font-size: 10px; padding: 0 0 0 2px;">zielonych</div>
								</div>	
							</div>
						</div>
				</div>

			</div>

		
		</div>
	</div>
</div>


	<div style="width: 100%; padding: 10px 0 20px 0;">
	
	<?php 
		if ($item['form']) {
	
		foreach ($form as $k=>$d) {
	;?>
	
	<div style="width: 100%; font-weight: 400; font-size: 18px; margin: 25px 0 10px 0; display: flex; justify-content: center;">
		<div style="width: 50%;" class="options_name"><?php echo $d['q'];?></div>
	</div>

	<?php
		$r1= rand();
		foreach ($d['options'] as $o) {
			$r2 = rand();
			$r3 = rand();
	;?>
	
	<div class="form_line">
		<div style="display: flex; width: 50%; align-items: center;">
		<div class="form_col">
			<?php
				if ($d['mo'] == 'one_ans') {echo '<input type="radio" name="'.$r1.'" id="'.$r2.'" l="'.$o['name'].'" n="'.$d['q'].'">';};
				if ($d['mo'] == 'multi_ans') {echo '<input type="checkbox" id="'.$r2.'" l="'.$o['name'].'" n="'.$d['q'].'">';};
			;?>
		</div>
		<div class="form_col" style="width: 40%; font-weight: 400; font-size: 13px;">
			<label for="<?php echo $r2;?>"><?php echo $o['name'];?></label>
		</div>
		<div class="form_col" style=" display: flex; width: 60%; align-items: center; font-weight: 400;">
			<?php
				if ($o['type'] == 'doplaty') {echo '<div>+</div>';};
				if ($o['type'] == 'rabaty') {echo '<div>-</div>';};
				if ($o['type'] == 'no_change') {echo '<div>cena bez zmian</div>';};
				if ($o['math'] == 'per') {echo "<div style='font-size: 18px;'>".$o['values']['per']." %</div>";};
				if ($o['math'] == 'add') { ;?>
				
				<div style="display: flex;">
				
					<div class="fav_price_pln" style="margin: 0;"><?php echo $o['values']['pln'] ;?>
						<div style="display: inline; font-size: 12px; color: gray; margin: 0 0 0 1px; height: 80%;">PLN</div>
					</div>
					
					<div style="display: flex; justify-content: center; align-items: center; font-size: 12px; font-weight: 400; margin: 0 10px 0 10px;">lub</div>
					
					<div class="zielony_wrap_list">
					<div style="display: flex;">
						<div style=""><?php echo $o['values']['zln_pln'];?></div>
						<div style="color: grey; font-weight: 400; font-size: 10px; padding: 0 0 0 2px;">PLN</div>
					</div>
					<div style="margin: 0 5px 0 5px;"> + </div>
						<div style="display: flex;">
							<div style="display: flex;">
								<div style="display: flex; align-items: center;" >
									<img src="<?php echo $path;?>img/zielony.png" width="24px" height="24px">
								</div>
								<div ><?php echo $o["values"]["zln_zln"];?></div>								
							</div>
							<div style="color: #71b929; font-weight: 400; font-size: 10px; padding: 0 0 0 2px;">zielonych</div>
						</div>	
					</div>	
					
				</div>
			<?php
				};
			;?>
		</div>
		</div>
	</div>
		
	<?php
		}
		}	
		}
	;?>
	
	</div>
	
	<div style="width: 100%; display: flex; justify-content: center;">
		<div style="display: grid; width: 58%; margin: 30px 0 15px 0;">
			<label class="inp">
				<input type="number" min="1" class="conf_count" placeholder="&nbsp;" value="<?php echo $count;?>" step="1" style="text-align: center;">
				<span class="label">Podaj ilość</span>
				<span class="border"></span>
			</label>
		</div>
	</div>
	
	<div class="price_math" style="width: 55%; margin: 15px 0 15px 0; font-size: 18px; font-weight: 400;">
		<div style="display: flex; align-items: flex-end; margin: 20px;">Cena PLN:<div class="pln_math fav_price_pln" style="font-size: 24px; margin: 0 0 0 10px;"></div> &nbsp PLN</div>
		<div style="display: flex; align-items: flex-end; margin: 20px;">Cena w pakiecie Zielonym:
		
		
				<div class="p_payz">
						<div class="p_pay--data">
							<div class="zielony_wrap_list" style="font-size: 20px; padding: 5px 20px;">
							<div style="display: flex;">
								<div class="zln_pln_math"></div>
								<div style="color: grey; font-weight: 400; font-size: 10px; padding: 0 0 0 2px;">PLN</div>
							</div>
							<div style="margin: 0 5px 0 5px;"> + </div>
								<div style="display: flex;">
									<div style="display: flex;">
										<div style="display: flex; align-items: center;" >
											<img src="<?php echo $path;?>img/zielony.png" width="20px" height="20px">
										</div>
										<div class="zln_zln_math"></div>								
									</div>
									<div style="color: #71b929; font-weight: 400; font-size: 10px; padding: 0 0 0 2px;">zielonych</div>
								</div>	
							</div>
						</div>
				</div>
		
		
		</div>
	</div>
	
	<div class="conf_accept_buttons" style="width: 60%; margin-bottom: 40px;">
		<div class="conf_accept conf_buy_now">KUP TERAZ</div>
		<div class="conf_accept conf_add_to_cart">DODAJ DO KOSZYKA</div>
	</div>

	<div id="conf_pid" style="display:none;"><?php echo $pid ;?></div>

</div>
	