<?php 

include $_SERVER['DOCUMENT_ROOT'].'/config.php';

$shoper_id = $_POST['shoper_id'];
$skip = $_POST['skip'];
$device = $_POST['device'];

	$col_posts = $db->selectCollection('posts');
	$filter = [];
	
	$options = [
		'sort' => ['_id' => -1],
		'limit' => 6,
		'skip' => intval($skip)
	];
	
	$count = $col_posts->count($filter,$options);

if ($device == 'desktop') {
	
	if ($count > 0) {
		
		$posts = $col_posts->find($filter,$options);
		
		foreach ($posts as $key => $post) {
			if ($key % 2 == 0) {
				$even[] = $post;
			} else {
				$odd[] = $post;
			}
		}
	 } 
	 
	 if (	(count($even)) > 0 && (count($odd) == 0)	) {$flaga = 'to_odd';}
	 if (	(count($odd)) > 0 && (count($even) == 0)	) {$flaga = 'to_even';}
	 if (	$count == 0	  ) {$flaga = 'to_even';} 
	 
} else {
	
	$posts = $col_posts->find($filter,$options);
	
}
;?>


<?php if ($device == 'desktop') { ;?>
<div class="users_posts--col_container">
	<div class="users_posts--left_col">

		<?php
			if (count($even) > 0) {
				foreach ($even as $post) {
					include $_SERVER['DOCUMENT_ROOT'].'/functions/layouts/post.php';
				}
			} else {
	
				if ($flaga == 'to_even') {echo '<div class="no_more_posts"><img src="'.$path.'img/social/no_more_post.png"><div>Brak kolejnych postów. Napisz swój!</div></div>';};
	
			}
		;?>

	</div>
	<div class="users_posts--right_col">
	
		<?php
			if (count($odd) > 0) {
				foreach ($odd as $post) {
					include $_SERVER['DOCUMENT_ROOT'].'/functions/layouts/post.php';
				}
			} else {
	
				if ($flaga == 'to_odd') {echo '<div class="no_more_posts"><img src="'.$path.'img/social/no_more_post.png"><div>Brak kolejnych postów. Napisz swój!</div></div>';};
	
			}
		;?>
	
	</div>
</div>
<?php } else {	

	foreach ($posts as $post) {
		include $_SERVER['DOCUMENT_ROOT'].'/functions/layouts/post.php';
	}

};?>