<?php

	function scale_and_compress($source,$dest,$width,$quality) {
		
			$info = getimagesize($source);
			if ($info['mime'] == 'image/jpeg')
				$source_image = imagecreatefromjpeg($source);

			elseif ($info['mime'] == 'image/gif')
				$source_image = imagecreatefromgif($source);

			elseif ($info['mime'] == 'image/png')
				$source_image = imagecreatefrompng($source);
				
			elseif ($info['mime'] == 'image/webp')
				$source_image = imagecreatefromwebp($source);
			
			$source_imagex = imagesx($source_image);
			$source_imagey = imagesy($source_image);
			$dest_imagex = $width;
			$dest_imagey = ceil($source_imagey * ($width/$source_imagex));
				
			$dest_image = imagecreatetruecolor($dest_imagex, $dest_imagey);
			imagecopyresampled($dest_image, $source_image, 0, 0, 0, 0, $dest_imagex, 
			$dest_imagey, $source_imagex, $source_imagey);
			header("Content-Type: image/jpeg");
			imagewebp($dest_image,$dest,$quality);
		
		}
		
;?>