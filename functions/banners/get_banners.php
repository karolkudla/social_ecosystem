<?php 

	include $_SERVER['DOCUMENT_ROOT'].'/config.php';

	session_start();
	$stoken = $_SESSION['token'];

	/* Pobieramy, lokalizacje uzytkownika */
	$collection_users = $db->selectCollection('users');
	$sQuery = array('token' => $stoken);	
	$cursor = $collection_users->findOne($sQuery);

	if ($cursor['login'] && $cursor['login'] !== NULL && $cursor['login'] !== '' ) {

		$woj = $cursor['province'];
		$pow = $cursor['region'];
		$gmi = $cursor['gmina'];
		$rodz = $cursor['rodz'];
		
		/* Szukamy ogólnopolskiej, wojewódzkiej, powiatowej, gminnej */
		$collection_campaigns = $db->selectCollection('campaigns');
		
		/* Szukaj ogólnopolskiej */
		$plQuery = ['type'=>'polska','cat'=>$_POST['cat']];
		$plCursor = $collection_campaigns->find($plQuery);
		
		foreach ($plCursor as $key => $data) {
			$banners_pl[] = ['url'=>$data['url'],'img'=>$data['img']];
		};
		
		/* Szukaj wojewódzkich */
		$wojQuery = ['regions.'.$woj => '1','cat'=>$_POST['cat']];	
		$wojCursor = $collection_campaigns->find($wojQuery);
		
		foreach ($wojCursor as $key => $data) {
			$banners_woj[] = ['url'=>$data['url'],'img'=>$data['img']];
		};
		
		/* Szukaj powiatowych */
		$powQuery = ['regions.'.$woj.$pow => '1','cat'=>$_POST['cat']];	
		$powCursor = $collection_campaigns->find($powQuery);
		
		foreach ($powCursor as $key => $data) {
			$banners_pow[] = ['url'=>$data['url'],'img'=>$data['img']];
		};
		
		/* Szukaj gminnych */
		$gmiQuery = ['regions.'.$woj.$pow.$gmi.$rodz => '1','cat'=>$_POST['cat']];	
		$gmiCursor = $collection_campaigns->find($gmiQuery);
		
		foreach ($gmiCursor as $key => $data) {
			$banners_gmi[] = ['url'=>$data['url'],'img'=>$data['img']];
		};
		
		$banners = [
						'pl'=>$banners_pl,
						'woj'=>$banners_woj,
						'pow'=>$banners_pow,
						'gmi'=>$banners_gmi
		];
		
		echo json_encode($banners);
		
	} else {
		echo 'notlogged';
	}
	



;?>