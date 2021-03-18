<?php
include $_SERVER['DOCUMENT_ROOT'].'/config.php';
session_start();

$col_users= $db->selectCollection('users');
$user = $col_users->findOne(['token' => $_SESSION['token']]);

if ($user['_id'] !== null) {

function auto_link_text($text) {
    $pattern  = '#\b(([\w-]+://?|www[.])[^\s()<>]+(?:\([\w\d]+\)|([^[:punct:]\s]|/)))#';
    return preg_replace_callback($pattern, 'auto_link_text_callback', $text);
}

function auto_link_text_callback($matches) {
    $max_url_length = 50;
    $max_depth_if_over_length = 2;
    $ellipsis = '&hellip;';

    $url_full = $matches[0];
    $url_short = '';

    if (strlen($url_full) > $max_url_length) {
        $parts = parse_url($url_full);
        $url_short = $parts['scheme'] . '://' . preg_replace('/^www\./', '', $parts['host']) . '/';

        $path_components = explode('/', trim($parts['path'], '/'));
        foreach ($path_components as $dir) {
            $url_string_components[] = $dir . '/';
        }

        if (!empty($parts['query'])) {
            $url_string_components[] = '?' . $parts['query'];
        }

        if (!empty($parts['fragment'])) {
            $url_string_components[] = '#' . $parts['fragment'];
        }

        for ($k = 0; $k < count($url_string_components); $k++) {
            $curr_component = $url_string_components[$k];
            if ($k >= $max_depth_if_over_length || strlen($url_short) + strlen($curr_component) > $max_url_length) {
                if ($k == 0 && strlen($url_short) < $max_url_length) {
                    // Always show a portion of first directory
                    $url_short .= substr($curr_component, 0, $max_url_length - strlen($url_short));
                }
                $url_short .= $ellipsis;
                break;
            }
            $url_short .= $curr_component;
        }

    } else {
        $url_short = $url_full;
    }

    return "<a rel=\"nofollow\" target=\"_blank\" href=\"$url_full\">$url_short</a>";
}

function getVideoUrlsFromString($html) {
    $regex = '#((?:www\.)?(?:youtube\.com\/(?:watch\?v=|embed\/|v\/)|youtu\.be\/|youtube\-nocookie\.com\/embed\/)([a-zA-Z0-9-]*))#i';
    preg_match_all($regex, $html, $matches);
    $matches = array_unique($matches[0]);
    usort($matches, function($a, $b) {
        return strlen($b) - strlen($a);
    });
    return $matches;
}

function ytid($url) {
	preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $url, $match);
return $match[1];
}

if ($user['reg_form'] && $user['reg_form'] == 'fb') {
	$avatar = 'https://graph.facebook.com/'.$user['login'].'/picture?type=square';
	$name = $user['fb_name'];
} else {
	$avatar = $path.'static/img/av.png';
	$name = $user['name'];
}

$text = $_POST['text'];
$imgs = $_POST['imgs'];
$new_id = $_POST['new_id'];
$wall = $_POST['w'];

$yt_link = getVideoUrlsFromString($text);
$yt_id = ytid($yt_link[0]);

	$post_data = [  
				'_id' => new MongoDB\BSON\ObjectID( $new_id ),
				'uid' => substr($user['_id'],0,24),
				'text' => auto_link_text($text),
				'imgs' => $imgs,
				'youtube'=> $yt_id,
				'group'=> $wall,
				'avatar'=>$avatar,
				'name'=>$name
				];

	$col_posts = $db->selectCollection('posts');
	
	$insertOneResult = $col_posts->insertOne($post_data);	
				
	$post_data['_id'] = $new_id; /* podmień Mongo Id na String Id - bo Mongo Id to Array $oid */
	echo json_encode($post_data);

}

;?>