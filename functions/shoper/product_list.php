<?php 
	
	include $_SERVER['DOCUMENT_ROOT'].'/config.php';
	include $_SERVER['DOCUMENT_ROOT'].'/functions/authorization/permission.php';
	session_start();
	
	$shoper_id = $_POST['shoper_id'];
	$cats = $_POST['cats'];
	$menu_num = $_POST['num'];

	if ($cats[1] == '') {
		$filters = ['url' => $shoper_id, 'menu.main' => trim($cats[0]),'offer_type'=>'shoper_offer'];	
		$filters_for_old = ['url' => $shoper_id, 'menu.main' => trim($cats[0]),'state'=>'old','offer_type'=>'shoper_offer'];	
	}
	if ($cats[0] == '') {
		$filters = ['url' => $shoper_id, 'menu.sub' => trim($cats[1]),'offer_type'=>'shoper_offer'];	
		$filters_for_old = ['url' => $shoper_id, 'menu.sub' => trim($cats[1]),'state'=>'old','offer_type'=>'shoper_offer'];
	}
	if ($cats[0] == '' && $cats[1] == '') {
		$filters = ['url' => $shoper_id,'offer_type'=>'shoper_offer'];
		$filters_for_old = ['url' => $shoper_id,'state'=>'old','offer_type'=>'shoper_offer'];
	}

	$collection_users = $db->selectCollection('users');
	$u = $collection_users->findOne(  [		'url' => $shoper_id		]  );

	if (	$u['menu_images'][$menu_num]  	) {
		$shoper_banner = $user_download   .   $_POST['shoper_id']   .   $user_shoper_menu         .   $u['menu_images'][$menu_num];
	} else {
		$shoper_banner = $user_download   .	  $_POST['shoper_id']	.   $user_shoper_background   .	  $u['user_data']['big_logo'];
	}

;?>

<div class="shoper_banner">
	<?php if ($u['menu_desc'][$menu_num]) {;?><div class="shoper_menu_desc"><div style="width:50%;"><?php echo nl2br($u['menu_desc'][$menu_num]);?></div></div><?php };?>
	<img src="<?php echo $shoper_banner;?>"> 
</div>

<div style="font-size: 13px; font-weight: 400; margin: 5px 0 0 0;">Szukaj:</div>
<div class="shop_search">
	<div  style="width: 80%;" class="search_container_phrase"><div class="shop_search_icon brl"><img src="https://vg.wokulski.online/img/shop/search.svg"></div><input class="search_phrase" placeholder="Fraza"></div>
	<div  style="width: 20%;" class="search_container search_container_price"><div class="shop_search_icon"><img src="https://vg.wokulski.online/img/shop/tag.svg"></div><input class="search_from" placeholder="Cena"></div>
	
	<button class="blue_btn brr" style="border: 0; margin: 0;">Szukaj</button>
</div>

<div class="shoper_product_list_under" style="height: 20px;"></div>

<?php
	$collection_prod = $db->selectCollection('prod');
	$perm = permission([1,'',$_SESSION['url']]);
	
	if ($perm['status'] == 'ok') {
		
		$product_list = $collection_prod->find($filters);
		
		foreach ($product_list as $p) {
			include $_SERVER['DOCUMENT_ROOT'].'/functions/layouts/index_list.php';
		}
		
	} else {
		
		$product_list = $collection_prod->find($filters_for_old);
		
		foreach ($product_list as $p) {
			include $_SERVER['DOCUMENT_ROOT'].'/functions/layouts/index_list.php';
		}
		
	}
;?>