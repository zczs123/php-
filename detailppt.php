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
//更新访问量
$sql="UPDATE ppt SET hits=hits+1 WHERE id=$id";
mysqli_query($link,$sql);

//构建查询的SQL语句
$sql= "SELECT *FROM ppt WHERE id=$id";
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
    <title>Detail</title>
    <link rel="stylesheet" href="css/detail.css">
</head>
<body>
    <div class="box">
        <div class="title">
            <h2><?php echo $arr['title'] ?></h2>
            访问<font color=red> <?php echo $arr['hits']?></font>次
            发布时间<font color=red><?php echo date("Y-m-d H:i:s",$arr['addate'])?></font>
            <a href="./ppt.php">返回</a>
        </div>
    <div class="detail">
        <div class="photo"><img align="center" src="<?php echo $arr['imgsrc']?>"></div>
        <p><?php echo $arr['intro']?></p>
    </div>
    <div class="download"><a href="./downloadppt.php?id=<?php echo $arr['id']?>">下载PPT</a></div>
    </div>
</body>
</html>
