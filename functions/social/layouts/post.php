<?php 
if ($_POST['ajax']) {
	include $_SERVER['DOCUMENT_ROOT'].'/config.php';
	$post = $_POST['data'];
}

$timestamp = intval(substr($post['_id'], 0, 8), 16);
$datum = (new DateTime())->setTimestamp($timestamp);
?>

<div class="kom_post" post_id="<?php echo $post['_id'];?>">

	<div class="kom_header">
		<div class="kom_logo">
			
				<img src="<?php echo $post['avatar'];?>">
			
		</div>
		<div class="kom_info">
			<div class="kom_who show_mini_profile"><?php echo $post['name'];?></div>
			<div class="kom_when"><?php echo $datum->format('Y/m/d H:i');?></div>
		</div>
	</div>
	
	<div class="top_user_menu--sep"></div>
	
	<?php if (strlen($post['text']) > 180) {$fade = 'y';} else {$fade = 'n';};?>
	<div class="kom_text <?php if ($fade == 'y') {;?>fade_active<?php } ;?>">
		<?php echo nl2br($post['text']);?>
		<?php if ($fade == 'y') {;?><span class="fade">zobacz post ...</span><?php };?>
	</div>
	
	<div class="kom_gallery">
		<?php if ($post['imgs']) { ;?>
			<div class="kom_gallery_slick">
		<?php foreach ($post['imgs'] as $img) { ;?>
					<img src="<?php echo $user_download . $post['uid']  .  $user_social_post_gallery  .  $post['_id']   ."/big-".   $img;?>">
		<?php };?>
			</div>
		<?php };
			if ($post['youtube']) {
		;?>
			<div class="youtube_background">
				<iframe src="https://www.youtube.com/embed/<?php echo $post['youtube'];?>?loop=1&modestbranding=1" 
					style="width: 100%;"
					frameborder=0 
					allowfullscreen 
					srcdoc="<style>*{padding:0;margin:0;overflow:hidden}html,body{height:100%}img,span{position:absolute;width:100%;top:0;bottom:0;margin:auto}span{height:1.5em;text-align:center;font:48px/1.5 sans-serif;color:white;text-shadow:0 0 0.5em black}</style><a href=https://www.youtube.com/embed/<?php echo $post['youtube'];?>?autoplay=1><img src=https://img.youtube.com/vi/<?php echo $post['youtube'];?>/hqdefault.jpg><span>▶</span></a>" 
					frameborder=0 
					allowfullscreen 
					autoplay=1 
					height="300" 
					allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture">
				</iframe>
			</div>
		<?php
			}
		?>		
	</div>

	<div class="kom_footer">
		<div class="kom_footer--like_share">
		<!--
			<div><object type="image/svg+xml" data="https://vg.wokulski.online/static/img/social/like.svg" class="vg_icon_social vg_icon_like"></object></div>
			<div><object type="image/svg+xml" data="https://vg.wokulski.online/static/img/social/finger.svg" class="vg_icon_social"></object></div>
			<div class="social_share_btn">Udostępnij</div>
		-->
		</div>		
		<?php 
			$cc = count($post['comments']);
			if ($cc == 0 || $cc > 4) {$ending = 'y';}
			if ($cc == 1) {$ending = '';}
			if ((1 < $cc) && ($cc < 5)) {$ending = 'e';}
		;?>
		<div class="kom_comments"><?php echo $cc;?> komentarz<?php echo $ending;?></div>
		<div class="kom_comments_expanded">
			
		</div>
	</div>

</div>