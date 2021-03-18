<div id="fav_title">OBSERWOWANE</div>

<?php

include $_SERVER['DOCUMENT_ROOT'].'/config.php';
$col_prod = $db->selectCollection('prod');		
			
session_start();
$faved = $_SESSION['favorited'];

if ($faved) {
foreach ($faved as $f) {
	$item = $col_prod->findOne(['_id' => new MongoDB\BSON\ObjectID( $f )]);
		
	$exp[$f]['nazwa'] = $item['title'];
	$p = $item['prices'];
	$exp[$f]['cena'] = $p['pln'];
	$exp[$f]['z_pln'] = $p['zln_pln'];
	$exp[$f]['z_z'] = $p['zln_zln'];
	$images = json_decode($item['pos']);
	$first_img = $images[0];
	$exp[$f]['img'] = $first_img;
	
}

foreach ($exp as $f => $a) {

;?>

<div style="display: flex;">
	<div class="cart_img_fav_w" style="display: flex; align-items: center; height: 100%; position: relative;">
		<img class="fav_img" src="<?php echo $product_gallery.$f."/".$a['img'];?>">
		<div class="cart_img_fav_hov" p="<?php echo $f;?>"><span class="icon-cross"><span></div>
	</div>

	<div class="fav_desc">
		<div class="fav_title" id="<?php echo $f;?>" name="<?php echo $a['nazwa'];?>"><?php echo $a['nazwa'] ;?></div>
		
		<div class="fav_price_pln"><?php echo $a['cena'] ;?>
		<div style="display: inline; font-size: 12px; color: gray; margin: 0 0 0 1px; height: 80%;">PLN</div>
		</div>
		
		<div>
		<div class="zielony_wrap_list">
			<div style="display: flex;">
				<div style=""><?php echo $a['z_pln'];?></div>
				<div style="color: grey; font-weight: 400; font-size: 10px; padding: 0 0 0 2px;">PLN</div>
			</div>
			<div style="margin: 0 5px 0 5px;"> + </div>
				<div style="display: flex;">
					<div style="display: flex;">
						<div style="display: flex; align-items: center;" >
							<img src="<?php echo $path;?>img/zielony.png" width="24px" height="24px">
						</div>
						<div ><?php echo $a['z_z'];?></div>								
					</div>
					<div style="color: #71b929; font-weight: 400; font-size: 10px; padding: 0 0 0 2px;">zielonych</div>
				</div>	
		</div>
		</div>
		
		<div style="display: flex; margin: 5px 0 0 0;">
			<div class="fav_add_to_cart" pid="<?php echo $f;?>">Do koszyka</div>
			<div class="fav_buy_now" pid="<?php echo $f;?>">Kup teraz</div>
		</div>	
	</div>	
</div>


<?php

}} else {
	
	echo '<center>Jeszcze wszystko przed Tobą!</center>';
	
}
?>

