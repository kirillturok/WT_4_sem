<?php
	session_start();
 
	$randomnr = rand(1000, 9999);
	$_SESSION['randomnr2'] = $randomnr;
 
	$im = imagecreatetruecolor(100, 38);
 
	$white = imagecolorallocate($im, 255, 255, 255);
	$grey = imagecolorallocate($im, 150, 150, 150);
	$black = imagecolorallocate($im, 0, 0, 0);
 
	imagefilledrectangle($im, 0, 0, 200, 35, $black);
	
	$font = dirName(__FILE__).'/font/karate/Karate.ttf';

	imagettftext($im, 20, 4, 22, 30, $grey, $font, $randomnr);
 
	imagettftext($im, 20, 4, 15, 32, $white, $font, $randomnr);

	imagegif($im);
	imagedestroy($im);
?>