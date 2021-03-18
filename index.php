<!doctype html>

<?php

	include $_SERVER['DOCUMENT_ROOT'].'/config.php';
	session_start();	

	$s_token = $_SESSION['token'];
	
		if ($s_token && $s_token !== '') {
			$collection = $db->selectCollection('users');
			$sQuery = array('token' => $s_token);	
			$cursor = $collection->findOne($sQuery);
		}

		if ($cursor['reg_form'] && $cursor['reg_form'] == 'fb') {
			$avatar = '<img src="https://graph.facebook.com/'.$cursor['login'].'/picture?type=square">';
		} else {
			$avatar = '<img src="'.$path.'/static/img/av.png">';
		}

?>

<html>
<head>

<link rel="manifest" href="<?php echo $path;?>css/favicon/manifest.json" />

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-162889743-1"></script>

<script>

	window.dataLayer = window.dataLayer || [];
	function gtag(){dataLayer.push(arguments);}
	gtag('js', new Date());

	gtag('config', 'UA-162889743-1');


  (function(d, s, id){
	 var js, fjs = d.getElementsByTagName(s)[0];
	 if (d.getElementById(id)) {return;}
	 js = d.createElement(s); js.id = id;
	 js.src = "https://connect.facebook.net/pl_PL/sdk.js";
	 fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));

  window.fbAsyncInit = function() {
	FB.init({
	  appId      : '803056166759107',
	  cookie     : true,
	  xfbml      : true,
	  version    : 'v6.0'
	});
	  
	FB.AppEvents.logPageView();   
	
  };

	var index = 'https://vg.wokulski.online';
	var users_uploads = '/users_uploads/';

	var user_shoper_avatar = '/shoper/avatar/';
	var user_shoper_bckg = '/shoper/w_tle/';
	var user_shoper_gallery = '/shoper/galeria/';
	var user_shoper_menu = '/shoper/menu/';

	var user_shoper_offers_gallery = '/shoper_offers/';
	var user_social_post_gallery = '/social/posts/';

	var user_simple_offers_gallery = '/simple_offers/';

	var user_company_banners = '/banners/';

</script>

  <meta charset="UTF-8">
  <meta name="description" content="">
  <meta name="keywords" content="ogłoszenia, darmowe, bezpłatne, covid, walka, firmy, producenci, sklepy ">
  <meta name="description" content="Platforma Społecznie Użyteczna. Wspieramy walkę z COVID-19. Wspieramy Polskie Firmy. Wspieramy Codzienność. 500 bezpłatnych ogłoszeń.">
  <meta name="author" content="Vokulsky Group">

  <meta property="fb:app_id"		content="803056166759107">
  <meta property="og:url"           content="https://vg.wokulski.online">
  <meta property="og:type"          content="website">
  <meta property="og:title"         content="Vokulsky Group - Platforma społecznie użyteczna">
  <meta property="og:description"   content="">
  <meta property="og:image"         content="https://vg.wokulski.online/img/fb/fb.png">

  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

<link rel="apple-touch-icon-precomposed" sizes="57x57" href="<?php echo $path;?>css/favicon/apple-touch-icon-57x57.png" />
<link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo $path;?>css/favicon/apple-touch-icon-114x114.png" />
<link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo $path;?>css/favicon/apple-touch-icon-72x72.png" />
<link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo $path;?>css/favicon/apple-touch-icon-144x144.png" />
<link rel="apple-touch-icon-precomposed" sizes="60x60" href="<?php echo $path;?>css/favicon/apple-touch-icon-60x60.png" />
<link rel="apple-touch-icon-precomposed" sizes="120x120" href="<?php echo $path;?>css/favicon/apple-touch-icon-120x120.png" />
<link rel="apple-touch-icon-precomposed" sizes="76x76" href="<?php echo $path;?>css/favicon/apple-touch-icon-76x76.png" />
<link rel="apple-touch-icon-precomposed" sizes="152x152" href="<?php echo $path;?>css/favicon/apple-touch-icon-152x152.png" />
<link rel="icon" type="image/png" href="<?php echo $path;?>css/favicon/favicon-196x196.png" sizes="196x196" />
<link rel="icon" type="image/png" href="<?php echo $path;?>css/favicon/favicon-96x96.png" sizes="96x96" />
<link rel="icon" type="image/png" href="<?php echo $path;?>css/favicon/favicon-32x32.png" sizes="32x32" />
<link rel="icon" type="image/png" href="<?php echo $path;?>css/favicon/favicon-16x16.png" sizes="16x16" />
<link rel="icon" type="image/png" href="<?php echo $path;?>css/favicon/favicon-128.png" sizes="128x128" />
<meta name="application-name" content="vg-app"/>
<meta name="msapplication-TileColor" content="#FFFFFF" />
<meta name="msapplication-TileImage" content="<?php echo $path;?>css/favicon/mstile-144x144.png" />
<meta name="msapplication-square70x70logo" content="<?php echo $path;?>css/favicon/mstile-70x70.png" />
<meta name="msapplication-square150x150logo" content="<?php echo $path;?>css/favicon/mstile-150x150.png" />
<meta name="msapplication-wide310x150logo" content="<?php echo $path;?>css/favicon/mstile-310x150.png" />
<meta name="msapplication-square310x310logo" content="<?php echo $path;?>css/favicon/mstile-310x310.png" />

<link rel="stylesheet" type="text/css" href="<?php echo $path;?>css/style.css?<?php echo $ver;?>">
<link rel="stylesheet" type="text/css" href="<?php echo $path;?>css/mobile.css?<?php echo $ver;?>">
<link rel="stylesheet" type="text/css" href="<?php echo $path;?>css/edit_access.css?<?php echo $ver;?>">
<link rel="stylesheet" type="text/css" href="<?php echo $path;?>css/slick.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo $path;?>css/slick-theme.css?<?php echo $ver;?>"/>
<link rel="stylesheet" type="text/css" href="<?php echo $path;?>css/jQuery.Brazzers-Carousel.min.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo $path;?>css/lightslider.min.css"/>
<!--<link rel="stylesheet" type="text/css" href="<?php echo $path;?>css/jquery-ui.css"/>-->
<!--<link rel="stylesheet" type="text/css" href="<?php echo $path;?>css/cssmap-poland.css" media="screen" />-->

<link href="https://fonts.googleapis.com/css?family=Hind:100,300,400,500,600" rel="stylesheet">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js" integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU=" crossorigin="anonymous"></script>
<script src="<?php echo $path;?>scripts/jquery.form.min.js"></script>
<script src="//cdn.jsdelivr.net/gh/kenwheeler/slick@1.8.1/slick/slick.min.js"></script>
<script src="<?php echo $path;?>scripts/jQuery.Brazzers-Carousel.min.js"></script>
<script src="<?php echo $path;?>scripts/lightslider.min.js"></script>
<!--<script type="text/javascript" src="https://cssmapsplugin.com/5/jquery.cssmap.min.js"></script>-->

<!-- Main -->
<script type="text/javascript" src="<?php echo $path;?>functions/main.js?<?php echo $ver;?>"></script>

<!-- Authorization -->
<script type="text/javascript" src="<?php echo $path;?>functions/authorization/js/auth.js?<?php echo $ver;?>"></script>

<!-- Terytorium -->
<script type="text/javascript" src="<?php echo $path;?>functions/terytorium/get_region_city.js?<?php echo $ver;?>"></script>

<!-- Banners -->
<script type="text/javascript" src="<?php echo $path;?>functions/banners/js/banners.js?<?php echo $ver;?>"></script>
<script type="text/javascript" src="<?php echo $path;?>functions/banners/js/get_banners.js?<?php echo $ver;?>"></script>

<!-- Ogloszenia -->
<script type="text/javascript" src="<?php echo $path;?>functions/ogloszenia/js/one_offer_layout.js?<?php echo $ver;?>"></script>
<script type="text/javascript" src="<?php echo $path;?>functions/ogloszenia/js/accept_offers.js?<?php echo $ver;?>"></script>
<script type="text/javascript" src="<?php echo $path;?>functions/ogloszenia/js/main.js?<?php echo $ver;?>"></script>
<script type="text/javascript" src="<?php echo $path;?>functions/ogloszenia/js/js_editing_functions/edit_offer.js?<?php echo $ver;?>"></script>
<script type="text/javascript" src="<?php echo $path;?>functions/ogloszenia/js/js_editing_functions/save_product_editor.js?<?php echo $ver;?>"></script>
<script type="text/javascript" src="<?php echo $path;?>functions/ogloszenia/js/js_editing_functions/get_product_data.js?<?php echo $ver;?>"></script>

<!-- OiS Wspólne -->
<script type="text/javascript" src="<?php echo $path;?>functions/shoper/js/js_editing_functions/create_editor.js?<?php echo $ver;?>"></script>

<!-- Shoper -->
<script type="text/javascript" src="<?php echo $path;?>functions/shoper/js/shoper.js?<?php echo $ver;?>"></script>
<script type="text/javascript" src="<?php echo $path;?>functions/shoper/js/js_editing_functions/edit_shoper.js?<?php echo $ver;?>"></script>
<script type="text/javascript" src="<?php echo $path;?>functions/shoper/js/js_editing_functions/edit_product.js?<?php echo $ver;?>"></script>

<!-- Social -->
<script type="text/javascript" src="<?php echo $path;?>functions/social/js/social.js?<?php echo $ver;?>"></script>

<title>Vokulsky Group - Platforma społecznie użyteczna</title>

</head>

<?php /* if ($cursor['r'] == 'vokulsky') { */;?>

<body>



<div class="loading_main"><div class="lds-ripple"><div></div><div></div></div></div>

<div id="modal_overlay">
	<div id="modal_wrapper">
		<div id="modal">
		</div>
	</div>	
</div>

<div id="panel">
</div>

<div class="top">

	<div>
		<div class="top_icon_wrap main_page"><div><object class="top_icon" type="image/svg+xml" data="<?php echo $path;?>static/img/new-icons/home-run.svg"></object></div><div style="font-size: 11px; margin-top: -5px;">Strona główna</div></div>
	</div>

	<div style="justify-content: center;">
		<div class="top_icon_wrap portal_simple_offers" state="deactivated"><div><object class="top_icon" type="image/svg+xml" data="<?php echo $path;?>static/img/ogloszenia/icons/speaker.svg"></object></div><div style="font-size: 11px; margin-top: -5px;">Ogłoszenia</div></div>
		<div class="top_icon_wrap portal_marketplace" state="deactivated"><div><object class="top_icon" type="image/svg+xml" data="<?php echo $path;?>static/img/new-icons/supermarket.svg"></object></div><div style="font-size: 11px; margin-top: -5px;">Sklepy</div></div>
		<div class="top_icon_wrap portal_social" state="deactivated"><div><object class="top_icon" type="image/svg+xml" data="<?php echo $path;?>static/img/social/icons/network.svg"></object></div><div style="font-size: 11px; margin-top: -5px;">Społeczność</div></div>
	</div>
	
	<div style="justify-content: flex-end;">
		<!--<div><div><object class="top_icon" type="image/svg+xml" data="https://vokulsky.pl/img/icons/messages2.svg"></object></div></div>-->
		<!--<div><div><object class="top_icon" type="image/svg+xml" data="https://vokulsky.pl/img/icons/notification.svg"></object></div></div>-->
		<div style="position: relative;">
			
				<div class="top_avatar"><?php echo $avatar;?></div>
			
			<div class="top_user_menu">
			
				<?php include 'functions/indexes/user_menu.php';?>
			
			</div>
		</div>
		<!--<div><object class="top_icon" type="image/svg+xml" data="https://vokulsky.pl/img/icons/menu.svg"></object></div>-->
		
		<?php if ($cursor['login'] !== null) {
				if ($cursor['fb_name'] !== null) {echo '<div class="top_try">Zalogowany: '.$cursor['fb_name'].'</div>';}
				if ($cursor['name'] !== null) {echo '<div class="top_try">Zalogowany: '.$cursor['name'].'</div>';}
		} else { ;?>
		
		<div class="top_try">
			<span class="login">Zaloguj</span>
			lub
			<span class="register">Zarejestruj</span>
		</div>
		
		<?php };?>
		
	</div>
	
</div>

<div class="sub_top">
		
	<div class="sub_top--left">
		<div class="sub_top--logos">
		
			<img class="sub_top--logos--mini" src="<?php echo $path;?>static/img/av.png">
			<div>
				<a href="<?php echo $path;?>"><img class="sub_top--logos--big" src="<?php echo $path;?>static/img/logo/vg_logo_mini.png"></a>
				<span class="sub_top--slogan">Wspieramy walkę z COVID-19</span>
			</div>
		
		</div>
	</div>
<!--
	<div style="display: flex;">
	<input type="text" class="bckg" style="width: 500px;"><button class="bckg_ok">ok</button>
	</div>
-->
	<div class="sub_top--right"></div>
		
</div>
		


<div id="ajax">

	<div style="height: 100vh;"></div>

</div>

<div class="index_footer">
	
	<div class="f_data--vokulsky">
		<div><img src="<?php echo $path;?>static/img/logo/vg_logo_mini.png" style="width: 200px;"></div>
		<div class="fs-13">Platforma ludzi aktywnych</div>
		<div class="top_user_menu--sep p10_0"></div>
	</div>
	
	<div>
		<div><b>Współpraca reklamowa</b></div>
		<div><a href="mailto:demo@demo.com<">demo@demo.com</a></div>
		
		<div class="top_user_menu--sep p10_0"></div>
		
		<div><b>Szukasz pracy?</b></div>
		<div class="fs-13">Napisz do nas:</div>
		<div><a href="mailto:demo@demo.com<">demo@demo.com</a></div>
	</div>
	
	<div>
		<div><b>Pomoc dt. serwisu:</b></div>
		<div><a href="mailto:demo@demo.com<">demo@demo.com</a></div>
		
		<div class="top_user_menu--sep p10_0"></div>
		
		<div><b>Kontakt ogólny:</b></div>
		<div><a href="mailto:demo@demo.com<">demo@demo.com<</a></div>
		<div><a href="mailto:demo@demo.com<">demo@demo.com<</a></div>
		
		<div class="top_user_menu--sep p10_0"></div>
		
	</div>
	
	<div>
		<div><img src="<?php echo $path;?>static/img/av.png" style="width: 50px; height: 50px;"></div>
		<div><a href="<?php echo $path;?>static/pdf/regulamin-dodawania-ofert-vokulsky.pdf">Regulamin dodawania ofert</a></div>
		<div><a href="<?php echo $path;?>static/pdf/regulamin-dodawania-ofert-vokulsky.pdf">Polityka prywatności</a></div>
		
		<div class="top_user_menu--sep p10_0"></div>
		<div class="fs-13">Icons made by <a href="https://www.flaticon.com/authors/freepik" title="Freepik">Freepik</a><br>from <a href="https://www.flaticon.com/" title="Flaticon"> www.flaticon.com</a></div>
	</div>
	
</div>
;
</body>

<?php ;/* ;} else {echo 'Trwa aktualizacja ...';}; */?>

</html>

