<div class="result_main_list" id="<?php echo $p['_id'];?>">
	
		<div class="search_result--product_links"></div>
	
		<div class='pho_main_list product_on_list_simple'>		
			<div class="pho_click_list" id="<?php echo $p['_id'];?>" name="<?php echo $p['title'];?>">				
					<div class="brazzers">
					<?php
						if ($p['images'] && ($p['images'] !== 'null')) {
						
								foreach ($p['images'] as $img) {
									if ($img !== "") {echo '<img src="'.	$user_download	.  $p['uid']  .	  $user_simple_offers_gallery  .   $p['_id']   ."/mini-".   $img     .'">';};
								}
						} else {
							echo '<img src="https://vg.wokulski.online/img/ogloszenia/placeholder.webp">';
						}
					
					;?>
					</div>					
			</div>
		</div>
		
		<div class='tad_wrap_list' >
			<div>
				<div class="title_wrap_list product_on_list_simple">
					<div>
					<?php if ($p['state'] == 'new') {echo '(Nieopublikowana) - ';};?>
					<?php if ($p['title']) {echo $p['title'];} else {echo 'Brak tytułu.';};?>
					</div>
				</div>
				
				<div class="price_line">
				
					<div class="price_wrap_list">
						<?php 
						if ($p['cats'][0] == 'Praca') {
							echo '<span class="fs-13">wynagrodzenie </span>'.$p['product_data']['warunki']['wynagrodzenie_kwota']['value'].'<div style="font-size: 12px; color: gray; margin: 0 0 0 1px; height: 80%;">PLN</div>';
						;} else {
							if ($p['product_data']['cennik']['cena_brutto_wartosc']['value']) { ;?>
							<div><?php echo $p['product_data']['cennik']['cena_brutto_wartosc']['value'];?></div>
							<div style="font-size: 12px; color: gray; margin: 0 0 0 1px; height: 80%;">PLN</div>
						<?php } else {echo '<span style="font-size: 12px;">Ogłoszenie.</span>';}};?>
					</div>	
					
				</div>
				
					<?php if ($p['link']) {
			
						$arrParsedUrl = parse_url($p['link']);
						if (!empty($arrParsedUrl['scheme']))
						{
							// Contains http:// schema
							if ($arrParsedUrl['scheme'] === "http")
							{
								$link = $p['link'];
							}
							// Contains https:// schema
							else if ($arrParsedUrl['scheme'] === "https")
							{
								$link = $p['link'];
							}
						}
						// Don't contains http:// or https://
						else
						{
							$link = "https://".$p['link'];
						}
						
					;?>
					<div class="fs-12 fw-300 p0_10">
						Link do oferty w innym serwisie: <a href="<?php echo $link;?>" target="_blank">Klik!</a>
					</div>
					<?php };?>
			</div>
		</div>	
	
</div>