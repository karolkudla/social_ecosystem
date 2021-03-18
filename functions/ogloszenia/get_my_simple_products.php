<?php 

	include $_SERVER['DOCUMENT_ROOT'].'/config.php';

	session_start();
	$token = $_SESSION['token'];

		$col_users = $db->selectCollection('users');
		$col_prod = $db->selectCollection('prod');
		
		$user_query = array('token' => $token);
		$user = $col_users->findOne($user_query);
		$login = $user['login'];
		
		$simple_offers_query = array('login' => $login, 'offer_type'=>'simple_offer');
		$options = ['sort' => ['_id' => -1]];
		
		$offers = $col_prod->find($simple_offers_query,$options);
		
		$offers_count = $col_prod->count($simple_offers_query);
;?>

<div class="my_offers_title">
	<div class="about_info my_simple_offers" me="<?php echo $login;?>">Moje oferty okazjonalne</div>
</div>
		
<?php	
	
	if ($offers_count > 0) {
	
		foreach (	$offers as $p	) {

			include 'layouts/my_list_simple_offers.php';

	};} else {
		
		echo '<div class="bckg_w flex-center-middle p30 brb">W tym miejscu znajdzie się lista Twoich ogłoszeń.<br>Dodaj pierwszą ofertę!<div class="blue_btn add_new_offer">Dodaj nowe ogłoszenie</div></div>';
		
	} ?>
