<?php
session_start();
header("content-type:image/png");
$image_width=100;        //图片宽度
$image_height=30;       //图片高度
$im=imagecreate($image_width,$image_height);    //创建画布
imagecolorallocate($im,255,255,255);        //画布背景
$vc='';     //初始化验证码
for($i=0;$i<4;$i++)     //生成4个验证码
{
    $vc.=dechex(mt_rand(0,15));
}
$_SESSION['verificationCode']=$vc;  //将验证码上传到session
for($i=0;$i<strlen($_SESSION['verificationCode']);$i++) //循环插入GD图片
{
    $font=mt_rand(3,5);
    $color=imagecolorallocate($im,mt_rand(0,100),mt_rand(0,150),mt_rand(0,200));
    $x=mt_rand(1,8)+$i*$image_width/4;
    $y=mt_rand(1,$image_height/4);
    imagestring($im,$font,$x,$y,$_SESSION['verificationCode'][$i],$color);
}
imagepng($im);
imagedestroy($im);
?>