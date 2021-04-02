<?php
//包含链接数据库的公共文件
require_once("./connect.php");
session_start();
if(empty($_SESSION['username']))
{
    header("refresh:3;url=./login.php");
    die();
}
//获取地址栏传递的id
$id=$_GET['id'];
//构建查询的SQL语句
$sql= "SELECT *FROM video WHERE id=$id";
//执行SQL语句返回结果集对象
$result=mysqli_query($link,$sql);
//获取一行数据
$arr = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AVplay</title>
</head>
<style>
    body {
        background-image: url('./images/videoplay.jpeg');
        background-repeat: no-repeat;
        background-size: 100% auto;
    }
    video {
        width:880px;
        height: 320px;
        margin-left:200px;
        margin-top:40px;
    }
</style>
<body>
    <video src="<?php echo $arr['videosrc']?>" controls='controls' autoplay="autoplay" loop="loop"></video>
</body>
</html>