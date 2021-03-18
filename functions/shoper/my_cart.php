<?php

include $_SERVER['DOCUMENT_ROOT'].'/config.php';
/*
$col_prod = $db->selectCollection('prod');
*/

session_start();
$pln = $_SESSION['pln'];
$zln = $_SESSION['zln'];

?>

<div id="koszyk_title">TWÓJ KOSZYK</div>

<div style="display: flex; height: 94%;">

	<div style="border-right: 1px solid lightgrey; width: 50%; display: flex; flex-direction: column;">
		<div style="text-align: center; margin-bottom: 10px; font-size: 12px; font-weight: 400;">KOSZYK PLN</div>
		<div style="height: 80%;">
			<?php
			if ($pln) {
				foreach ($pln as $sid=>$d1) {
			;?>		
			
				<div class="cart_line">
					<div class="cart_img_w" style="position: relative; display: flex; align-items: center; height: 70px; margin-right: 5px;">
						<img class="cart_img" src="<?php echo $product_gallery.$d1['id']."/".$d1['img']?>">
						<div class="cart_img_hov" cart="pln" sid="<?php echo $sid;?>"><span class="icon-cross"><span></div>
					</div>
					<div class="cart_prod_desc">
						<div class="cart_title" style="font-size: 13px; font-weight: 400;" id="<?php echo $d1['id'];?>" name="<?php echo $d1['nazwa'];?>"><?php echo $d1['nazwa'];?></div>
					<div style="display: flex;">	
						<div class="fav_price_pln">
							<div class="price_div_pln"><?php echo $d1['ceny']['pln'];?></div>
							<div style="display: inline; font-size: 12px; color: gray; margin: 0 0 0 1px; height: 80%;">PLN</div>
						</div>
						<div class="cart_counter">
							<div class="cart_minus" pm="down" sid="<?php echo $sid;?>" cart="pln"><span class="icon-minus"></span></div>
							<input class="cart_prod_count" value="<?php echo $d1['ilosc'];?>">
							<div class="cart_plus" pm="up" sid="<?php echo $sid;?>" cart="pln"><span class="icon-plus"></span></div>
						</div>
					</div>
					</div>
					<div class="change_cart" sid="<?php echo $sid;?>" which="pln"><span class="icon-arrow-right2"></span></div>
				</div>
			
			<?php	
				}
			} else {;?>	<div style='height: 100%; display: flex; justify-content: center; align-items: center; font-family: "Roboto"; font-weight: 400;'>Twój koszyk jest jeszcze pusty</div><?php;	};
			;?>
		</div>
	</div>
	
	<div style="width: 50%; display: flex; flex-direction: column;">
		<div style="text-align: center; margin-bottom: 10px; font-size: 12px; font-weight: 400;">KOSZYK ZIELONY</div>
		<div style="height: 80%;">
			<?php
			if ($zln) {
				foreach ($zln as $sid=>$d2) {
			;?>
			
				<div class="cart_line">
					<div class="change_cart" sid="<?php echo $sid;?>" which="zln"><span class="icon-arrow-left2"></span></div>
					<div class="cart_img_w" style="position: relative; display: flex; align-items: center; height: 70px; margin-right: 5px;">
						<img class="cart_img" src="<?php echo $product_gallery.$d2['id']."/".$d2['img'];?>">
						<div class="cart_img_hov" cart="zln" sid="<?php echo $sid;?>"><span class="icon-cross"><span></div>
					</div>
					<div class="cart_prod_desc">
						<div class="cart_title" style="font-size: 13px; font-weight: 400;" id="<?php echo $d2['id'];?>" name="<?php echo $d2['nazwa'];?>"><?php echo $d2['nazwa'];?></div>
						<div class="cart_zielony" style="margin: 3px 0 0 0;">
							<div style="display: flex;">
								<div class="price_div_zln_pln" style="color: #f98d61"><?php echo $d2['ceny']['zln_pln'];?></div>
								<div style="color: grey; font-weight: 400; font-size: 10px; padding: 0 0 0 2px;">PLN</div>
							</div>
							<div style="margin: 0 5px 0 5px;"> + </div>
								<div style="display: flex;">
									<div style="display: flex;">
										<div style="display: flex; align-items: center;" >
											<img src="<?php echo $path;?>img/zielony.png" width="24px" height="24px">
										</div>
										<div class="price_div_zln_zln"><?php echo $d2['ceny']['zln_zln'];?></div>								
									</div>
									<div style="color: #71b929; font-weight: 400; font-size: 10px; padding: 0 0 0 2px;">zielonych</div>
								</div>	
						</div>
						<div class="cart_counter">
							<div class="cart_minus" pm="down" sid="<?php echo $sid;?>" cart="zln"><span class="icon-minus"></span></div>
							<input class="cart_prod_count" value="<?php echo $d2['ilosc'];?>">
							<div class="cart_plus" pm="up" sid="<?php echo $sid;?>" cart="zln"><span class="icon-plus"></span></div>
						</div>
					</div>
				</div>
			
			<?php
				}
		} else {;?>	<div style='height: 100%; display: flex; justify-content: center; align-items: center; font-family: "Roboto"; font-weight: 400;'>Twój koszyk jest jeszcze pusty</div><?php;	};
			;?>
		</div>
	</div>

</div>

<?php 
if ($pln) {
foreach ($pln as $val) {
	$pp = $val['ceny']['pln'];
	$ppa[] = $pp;
}

if ($ppa) {$pln_sum = array_sum($ppa);};
} else {$pln_sum = 0;}

if ($zln) {
foreach ($zln as $val) {
	
	$ppp = $val['ceny']['zln_pln'];
	$ppz = $val['ceny']['zln_zln'];
	
	$pppa[] = $ppp;
	$ppza[] = $ppz;
}

if ($pppa) {$zln_pln_sum = array_sum($pppa);};
if ($ppza) {$zln_zln_sum = array_sum($ppza);};
} else {$zln_pln_sum = 0; $zln_zln_sum = 0;}
;?>

<div style="display: flex; width: 100%; position: absolute; bottom: 0; border-top: 1px solid lightgray; margin: 0 0 20px 0;">
	<div style="width: 50%;">
	
		<div style="display: flex; flex-direction: column; justify-content: center; height: 70px; padding-left: 40px;">
		<div style="font-size: 12px;">SUMA</div>
		<div style="font-weight: 400;"><?php echo $pln_sum;?> PLN</div>
		</div>
		
		<div style="display: flex; justify-content: center; flex-direction: column; align-items: center;">
			<div class="cart_buttons realize">Realizuj koszyk</div>
			<div class="delete_cart" w="pln">Kasuj koszyk</div>
		</div>
		
	</div>
	<div style="width: 50%; display: flex; flex-direction: column;">
	
		<div style="display: flex; flex-direction: column; justify-content: center; height: 70px; padding-left: 40px;">
		<div style="font-size: 12px;">SUMA</div>
		<div class="cart_zielony">
			<div style="display: flex;">
				<div class="price_div_zln_pln" style="color: #f98d61"><?php echo $zln_pln_sum;?></div>
				<div style="color: grey; font-weight: 400; font-size: 10px; padding: 0 0 0 2px;">PLN</div>
			</div>
			<div style="margin: 0 5px 0 5px;"> + </div>
				<div style="display: flex;">
					<div style="display: flex;">
						<div style="display: flex; align-items: center;" >
							<img src="<?php echo $path;?>img/zielony.png" width="24px" height="24px">
						</div>
						<div class="price_div_zln_zln"><?php echo $zln_zln_sum;?></div>								
					</div>
					<div style="color: #71b929; font-weight: 400; font-size: 10px; padding: 0 0 0 2px;">zielonych</div>
				</div>	
		</div>
		</div>
		
		<div style="display: flex; justify-content: center; flex-direction: column; align-items: center;">
			<div class="cart_buttons realize">Realizuj koszyk</div>
			<div class="delete_cart" w="zln">Kasuj koszyk</div>
		</div>
		
	</div>
</div>
