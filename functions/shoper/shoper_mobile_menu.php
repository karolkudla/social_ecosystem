<div style="display: flex; align-items: center; margin: 10px 0;">
	<img class="shoper_logo" src="<?php echo $user_logo.$user['url']."/".$user['user_data']['logo'];?>">
	<div>
		<div style="font-size: 14px; line-height: 1.3; font-weight: 500;"><?php echo $user['user_data']['logo_text'];?></div>
		<div style="font-size: 10px; line-height: 1.3;"><?php echo $user['user_data']['slogan'];?></div>
	</div>
</div>

<?php							
	if ($user['menu'] && $user['menu'] !== '' && count($user['menu']) > 0) {
	$mm = $user['menu'];
	
	foreach ($mm as $key => $mpack) {
;?>

<div class="shoper_mobile_zakladka zakladka_card" url="<?php echo $user['url'];?>" zak="<?php echo $mpack['name'];?>" sub="" id="<?php echo $mpack['name'];?>"><?php echo $mpack['name'];?></div>

<?php		
		if ($mpack['subs']) {
			foreach ($mpack['subs'] as $k => $sub) {
				;?>
				
				<div class="shoper_mobile_sub_menu sub_menu" url="<?php echo $user['url'];?>" zak="<?php echo $mpack['name'];?>" sub="<?php echo $sub;?>" id="<?php echo $sub;?>"><?php echo $sub;?></div>
				
				<?php
			}
		}
	}

	
;?>

	<div class="shoper_mobile_zakladka wizytowka_card" url="<?php echo $user['url'];?>">O nas</div>
	<div class="shoper_mobile_zakladka contact_card" url="<?php echo $user['url'];?>">Kontakt</div>
	
<?php } else {echo '<div id="menu_sortable" style="font-size: 13px; position: relative;">Dodaj nowe menu</div>';};	?>
	