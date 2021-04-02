<?php
/*图像验证码
1、产生随机验证码字符串
2、创建画布
3、绘制带填充的矩形
4、绘制像素点
5、绘制线段
6、写入TTF字符串
7、输出图像，销毁图像
*/
// 产生4位随机验证码
$arr1=array_merge(range('a','z'),range(0,9),range('A','Z'));
shuffle($arr1);
shuffle($arr1);
$arr2=array_rand($arr1,4);
$str= "";
foreach($arr2 as $index)
{
    $str .=$arr1[$index];
}
//将验证码字符串保存到session中
session_start();
$_SESSION['captcha']=strtolower($str);//验证码不分大小写
// 创建空画布
$width=80;
$height=30;
$img=imagecreatetruecolor($width,$height);
//绘制带填充的矩形
$color1=imagecolorallocate($img,mt_rand(0,255),mt_rand(0,255),mt_rand(0,255));
imagefilledrectangle($img,0,0,$width,$height,$color1);
// 绘制像素点
for($i=1;$i<=100;$i++)
{
    $color2=imagecolorallocate($img,mt_rand(0,255),mt_rand(0,255),mt_rand(0,255));
    imagesetpixel($img,mt_rand(0,$width),mt_rand(0,$height),$color2);
}
// 绘制线段
for($i=1;$i<=14;$i++)
{
    $color3=imagecolorallocate($img,mt_rand(0,255),mt_rand(0,255),mt_rand(0,255));
    imageline($img,mt_rand(0,$width),mt_rand(0,$height),mt_rand(0,$width),mt_rand(0,$height),$color3);
}
// 绘制一行TTF字符串
$fontfile="D:\dd\ziti\msyh.ttc";
$color4=imagecolorallocate($img,mt_rand(0,255),mt_rand(0,255),mt_rand(0,255));
imagettftext($img,18,0,10,25,$color4,$fontfile,$str);
//输出图像并销毁图像
header("content-type:image/png");
imagepng($img);
imagedestroy($img);