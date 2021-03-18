<?php

	include $_SERVER['DOCUMENT_ROOT'].'/config.php';
	$prod_id = $_POST['product_id'];	
	$coll_prod = $db->selectCollection('prod');
	$p = $coll_prod->findOne(['_id' => new MongoDB\BSON\ObjectID($prod_id)]);
	$decode = json_decode(json_encode($p['tags']),1);
	
;?>

<div class="shoper_product_card shoper_product_specs">

<?php
if ($decode) {
	foreach ($decode as $tag) {
;?>

		<div class="tag_wrapper">
			<p class="tag_label"><?php echo $tag['tag_title'];?></p>
			<div class="subpacks_columns">
<?php 
			
			foreach ($tag['subpacks'] as $sp) {
				
					if ($sp['subtag_type'] == 'radio') {
						foreach ($sp['values'] as $vals) {
							if ($vals['value'] == 'checked' && $vals['label'] == 'Tak') {echo '<div class="subtag_value"><span class="icon-checkmark">&nbsp</span>'.$sp['subtag_title'].'</div>';};
							if ($vals['value'] == 'checked' && $vals['label'] !== 'Tak' && $vals['label'] !== 'Nie') {echo '<div class="subtag_value"><span class="icon-checkmark">&nbsp</span>'.$vals['label'].'</div>';};
						}
					}
			}
			
			foreach ($tag['subpacks'] as $sp) {
				
					if ($sp['subtag_type'] == 'checkbox') {
						echo '<div class="subtag_title">'.$sp['subtag_title'].'</div>';
						foreach ($sp['values'] as $vals) {
							if ($vals['value'] == 'checked') {echo '<div class="subtag_value"><span class="icon-checkmark">&nbsp</span>'.$vals['label'].'</div>';};
						}
					}
					
					
			}
			
			foreach ($tag['subpacks'] as $sp) {
				
					if ($sp['subtag_type'] == 'text') {
						echo '<div class="subtag_text_wrapper"><div class="subtag_title"><span class="icon-circle-full">&nbsp</span>'.$sp['subtag_title'].'&nbsp </div><div>';
									$string = [];
									foreach ($sp['values'] as $vals) {
										if ($vals['value'] !== '') {
										echo '
												<div class="subtag_text_flex">
												<div class="subtag_subtitle"> - '.$vals['label'].'</div>
												<div class="subtag_text_value">'.$vals['value'].'</div>
												</div>
											 ';
										}
									}
									
						echo '</div></div>';
					}
			}

;?>
			</div>
		</div>
<?php
}} else {echo '<div style="padding: 10px 0;">Brak specyfikacji';}
;?>
</div>