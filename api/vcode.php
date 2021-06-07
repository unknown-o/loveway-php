<?php
session_start();
include('../config.php');
$img = imagecreatetruecolor(60, 30);
$black = imagecolorallocate($img, 0x00, 0x00, 0x00);
$green = imagecolorallocate($img, 0x00, 0xFF, 0x00);
$white = imagecolorallocate($img, 0xFF, 0xFF, 0xFF);
imagefill($img, 0, 0, $white);

$code = rand(1000, 9999);
$_SESSION['vcode'] = md5($code . $VERIFICATION_KEY);

imagestring($img, 5, 8, 8, $code, $black);
for ($i = 0; $i < 100; $i++) {
    imagesetpixel($img, rand(0, 60), rand(0, 30), $black);
    imagesetpixel($img, rand(0, 60), rand(0, 30), $green);
}
header("content-type: image/png");
imagepng($img);
imagedestroy($img);