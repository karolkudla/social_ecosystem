<?php

	include $_SERVER['DOCUMENT_ROOT'].'/config.php';

		$col_posts = $db->selectCollection('posts');
		
		$filter = [];

		$options = [
			'sort' => ['_id' => -1],
			'limit' => 6
			/*'skip' => intval($skip)*/
		];
		
	$posts = $col_posts->find($filter,$options);

;?>

<div class="user_profile">

	<div class="user_profile_data">
		<div class="user_profile_bckg"><img src="https://vokulsky.pl/media/posts/5de659498d6b4b630f4c81a2/mini-1575377225056944400.webp"></div>
		
		<div class="user_profile_avatar"><img src="https://vokulsky.pl/loga/xcxvdv/1575226828087647900.webp"></div>
		
		<div class="user_profile_info">
			<div class="user_profile_info--name">Jan Kowalski</div>
			<div class="user_profile_info--slogan">spokojny, życzliwy</div>
			
			<div class="user_profile_info--icons">
				<div class="user_profile_info--add"></div>
				<div class="user_profile_info--message"></div>
				<div></div>
				<div></div>
			</div>
			
			<div class="user_profile_info--extra"><span>Pracuje w </span>Monsanto Labs</div>
			<div class="user_profile_info--extra"><span>Mieszka w </span>Boston Massachusets</div>
			<div class="user_profile_info--extra"><span>Z </span>Poznań</div>
		</div>
		
		<div class="user_profile_links">
			<div>Kontakty</div>
			<div>Zdjęcia / Filmy</div>
			<div>Zawodowe</div>
			<div>Polityka</div>
			<div>Hobby</div>
		</div>
		
	</div>

	<div class="user_profile_posts">
	
	<div class="user_profile_shoper_banner">
		<div class="user_profile_shoper_banner--links">
			<div class="">Sklep</div>
			<div class="horizontal_sep"></div>
			<div class="">Strona</div>
			<div class="horizontal_sep"></div>
			<div class="">Grupy</div>
		</div>
		
		<div class="user_profile_shoper_banner--shoper_data">
			<div style="font-size: 25px;">Dealer Mercedes <span style="font-weight: 400; color: navy; font-size: 13px;">Samochody nowe i używane</span></div>
		</div>
		
		<img src="https://vokulsky.pl/duze_loga/przyklad1/1574422053010713500.jpg">
	</div>
	
	<?php

		foreach ($posts as $post) {
			include 'layouts/post.php';
			
		}
	;?>
		
	</div>

</div>