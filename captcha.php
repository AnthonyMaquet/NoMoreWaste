<?php 
session_start();

$captcha = rand(1000,9999);
$_SESSION['captcha'] = $captcha;
$img = imagecreate(65,30);

$bg = imagecolorallocate($img,255,255,255); //couleur du fond
$textcolor = imagecolorallocate($img, 0, 0, 0); //couleur du texte

//ajouter texte a l'image
imagefill($img, 0, 0, $bg);
imagestring($img, 5, 5, 5, $captcha, $textcolor);
header("Cache-Control: no-cache, must-revalidate");
header('Content-type:image/jpeg');
imagejpeg($img); //crée l'image
imagedestroy($img);

?> 
