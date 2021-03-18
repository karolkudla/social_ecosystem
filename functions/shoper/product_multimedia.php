<?php 
	include $_SERVER['DOCUMENT_ROOT'].'/config.php';
	$coll_prod = $db->selectCollection('prod');
	$p = $coll_prod->findOne(['_id' => new MongoDB\BSON\ObjectID($_POST['product_id'])]);
;?>

<div class="shoper_product_card shoper_product_multimedia">

	<div class="shoper_product_multimedia--youtube_slick">
	<?php
		if (strlen($p['yt']) > 5) {
			$decode = json_decode($p['yt']);
			foreach ($decode as $yt) {
	?>	
			<iframe src="https://www.youtube.com/embed/<?php echo $yt;?>?loop=1&modestbranding=1" srcdoc="<style>*{padding:0;margin:0;overflow:hidden}html,body{height:100%}img,span{position:absolute;width:100%;height:100%;top:0;bottom:0;margin:auto}span{height:1.5em;text-align:center;font:48px/1.5 sans-serif;color:white;text-shadow:0 0 0.5em black}</style><a href=https://www.youtube.com/embed/<?php echo $yt;?>?autoplay=1><img src=https://img.youtube.com/vi/<?php echo $yt;?>/hqdefault.jpg><span>▶</span></a>" frameborder=0 allowfullscreen allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"></iframe>

	<?php	}
		} else {echo '<div style="padding: 10px 0;">Brak multimediów</div>';}		
	?>
	</div>

</div>