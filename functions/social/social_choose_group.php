<?php 

include $_SERVER['DOCUMENT_ROOT'].'/config.php';

$wall = $_POST['g'];
$skip = $_POST['skip'];
$device = $_POST['device'];

	$col_posts = $db->selectCollection('posts');
	
	if ($wall !== '') {
		$filter = ['group'=>$wall];
	} else {
		$filter = [];
	}
	
	$options = [
		'sort' => ['_id' => -1],
		'limit' => 6,
		'skip' => intval($skip)
	];
	
	$count = $col_posts->count($filter,$options);

if ($device == 'd') {
	
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


<?php if ($device == 'd') { ;?>
<div class="users_posts--col_container">
	<div class="users_posts--left_col">

		<?php
			if (count($even) > 0) {
				foreach ($even as $post) {
					include 'layouts/post.php';
				}
			} else {
	
				if ($flaga == 'to_even') {echo '';};
	
			}
		;?>

	</div>
	<div class="users_posts--right_col">
	
		<?php
			if (count($odd) > 0) {
				foreach ($odd as $post) {
					 include 'layouts/post.php';	
				}
			} else {
	
				if ($flaga == 'to_odd') {echo '';};
	
			}
		;?>
	
	</div>
</div>
<?php } else {	

	foreach ($posts as $post) {
		include 'layouts/post.php';
	}

};?>