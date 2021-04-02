<?php
require_once("./connect.php");
session_start();
if(empty($_SESSION['username']))
{
    header("refresh:3;url=./login.php");
    die();
}
//获取地址栏的参数
$id=$_GET['id'];
//数据库找到文件路径
$sql= "SELECT *FROM ppt WHERE id=$id";
$result=mysqli_query($link,$sql);
$arr = mysqli_fetch_assoc($result);
//只读方式打开文件
$handle = fopen($arr['pptsrc'],'rb');
//告诉游览器内容类型为八位的二进制数据流
//文件名加后缀
$name =pathinfo($arr['title'],PATHINFO_EXTENSION);//文件拓展名
if($name !='pptx')
{
    $name=$arr['title'].'.pptx';
}
else
{
    $name=$arr['title'];
}
header("contype-type:application/octet-stream");
//告诉游览器数据的存储方式以附件方式保存
header("content-disposition:attachement;filename=".iconv('utf-8','gbk',$name));
//循环取数据
while($str=fread($handle,1024))
{
    
    echo $str;//发送客户端
}
