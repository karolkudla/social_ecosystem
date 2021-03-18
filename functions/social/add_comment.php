<?php

include $_SERVER['DOCUMENT_ROOT'].'/config.php';

$post_id = $_POST['post_id'];
$text = $_POST['text'];
$ua = $_POST['user_avatar'];
$un = $_POST['user_name'];
$ul = $_POST['user_login'];

	$comment = [
		'user_adding' => $un,
		'user_login' => $ul,
		'user_logo' => $ua,
		'date' => $data_pl,
		'text' => $text	
	];
	
	$col_posts = $db->selectCollection('posts');	
	$post = $col_posts->findOne(array('_id' => new MongoDB\BSON\ObjectID( $post_id )));
	
	$comments = $post['comments'];
	$comments[] = $comment;
		
	$updateResult = $col_posts->updateOne(
		[ '_id' => new MongoDB\BSON\ObjectID( $post_id ) ],
		[ '$set' => [ 
						'comments' => $comments
					]
		]
	);	
	
;?>