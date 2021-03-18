<?php

include $_SERVER['DOCUMENT_ROOT'].'/config.php';

$post_id = $_POST['post_id'];
$logo = $_POST['logo'];

$col_posts = $db->selectCollection('posts');
$post = $col_posts->findOne(array('_id' => new MongoDB\BSON\ObjectID( $post_id )));
$comments = $post['comments'];

;?>

<div style="height: 90%;">
<div class="kom_comments_list">

	<?php 
		if ($comments) {
		foreach ($comments as $c) {	
	;?>		
		
		<div class="kom_one_comment">
			<div class="kom_logo"><img src="<?php echo $path."static/img/av.png";?>"></div>
			<div class="kom_one_comment--text">
				<div class="hello"><?php echo $c['user_adding'];?></div>
				<div><?php echo $c['text'];?></div>
			</div>
		</div>
		
	<?php	
		}
		} else {
			echo '<div class="no_comments"><div>Brak komentarzy!</div><div style="font-size: 16px;">Bądź pierwszy!</div></div>';
		}
	;?>

</div>

<div class="kom_add_comment_header">
	<div class="kom_logo">
		
			<img src="<?php echo $logo;?>">
		
	</div>

		<input class="kom_add_comment_input" placeholder="Napisz komentarz ..." post_id="<?php echo $post_id;?>">

</div>	
</div>

