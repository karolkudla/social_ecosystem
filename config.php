<?php

	require_once("vendor/autoload.php"); 
	use MongoDB\Client as Mongo;

	$user = "karlolsky";
	$pwd = 'tekken';
	$mongo = new Mongo('mongodb+srv://karlolsky:tekken@rrc.km7ol.mongodb.net/vg?retryWrites=true&w=majority');
	
	$db = $mongo->vg;

	$root = "/home/wokulski/vg/";
	$path = "https://vg.wokulski.online/";
	
	$user_download = 				$path."users_uploads/"; /* + $user_url + */
	$user_upload = 					$root."users_uploads/"; /* + $user_url + */
	
	$user_social_avatar = 			"/social/avatar/";
	$user_social_background = 		"/social/w_tle/";
	$user_social_gallery = 			"/social/galeria/";
	$user_social_post_gallery = 	"/social/posts/";    /* + $post_id +  */
	
	$user_shoper_avatar = 			"/shoper/avatar/";
	$user_shoper_background = 		"/shoper/w_tle/";
	$user_shoper_gallery = 			"/shoper/galeria/";
	$user_shoper_menu = 			"/shoper/menu/";
	
	$user_simple_offers_gallery = "/simple_offers/"; /* + $offer_id +  */
	$user_shoper_offers_gallery = 	"/shoper_offers/";   /* + $offer_id +  */
	
	$user_company_banners = "/banners/";
	


	$ver = rand();

?>