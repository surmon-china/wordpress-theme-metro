<?php
/*
* title ：resizeThumbnailImage 压缩图片
* param ：$thumb 压缩后的路径 绝对
* param ：$image 压缩前的路径 绝对
* param ：$scale 压缩比率 0.5 = 50%
* param ：$fixed array('width'=>64, 'height'=>64);  压缩后的宽高
* return：string 压缩后的路径
*/
function resizeThumbnailImage($thumb,$image,$scale,$fixed=array()){
	list($imagewidth, $imageheight, $imageType) = getimagesize($image);
	$imageType = image_type_to_mime_type($imageType);
	if(isset($fixed['width']) && isset($fixed['height'])){
		$newImageWidth = $imagewidth < $fixed['width'] ? $imagewidth : $fixed['width'];
		$newImageHeight = $imageheight < $fixed['height'] ? $imageheight : $fixed['height'];
	}else{
		$newImageWidth = ceil($imagewidth * $scale);
		$newImageHeight = ceil($imageheight * $scale);
	}
	$newImage = imagecreatetruecolor($newImageWidth,$newImageHeight);
	switch($imageType) {
		case "image/gif":
			$source=imagecreatefromgif($image);
			break;
		case "image/pjpeg":
		case "image/jpeg":
		case "image/jpg":
			$source=imagecreatefromjpeg($image);
			break;
		case "image/png":
		case "image/x-png":
			$source=imagecreatefrompng($image);
			break;
	}
	imagecopyresampled($newImage,$source,0,0,0,0,$newImageWidth,$newImageHeight,$imagewidth,$imageheight);
	switch($imageType) {
		case "image/gif":
			imagegif($newImage,$thumb);
			break;
		case "image/pjpeg":
		case "image/jpeg":
		case "image/jpg":
			imagejpeg($newImage,$thumb,100);
			break;
		case "image/png":
		case "image/x-png":
			imagepng($newImage,$thumb);
			break;
	}
	return $thumb;
}
resizeThumbnailImage($thumb,$image,$scale,array('width'=>64, 'height'=>64))
?>