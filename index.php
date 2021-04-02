<?php
//包含链接数据库的公共文件
require_once("./connect.php");
session_start();
if(empty($_SESSION['username']))
{
    header("refresh:3;url=./login.php");
    die();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>INDEX</title>
</head>
<style>

body {
    background-image: url('./images/index.jpg');
    background-repeat: no-repeat;
    background-size: 100% 100%;
    background-attachment: fixed;
}
table {
    height: 150px;
    width:400px;
    margin: 0 auto;
    margin-top: 2%;
    text-align: center;
    background: #00000020;
    padding:20px 50px ;
}
p {
    font-size:20px;
}
a {
   text-decoration: none;
   color: purple;
 }
 a:hover {
   color: red;
 }
 .search {
    margin-left:950px;
    font-size: 35px;
 }
</style>
<body>
<h1 align="center">欢迎来到《网络操作系统》资源共享平台</h1>
<form action="search.php" method='post'> 
<div class="search">
<input type="text"  placeholder="请输入想要查找的内容" name="search">
<input type="submit" value="搜索" name="submit">
</div>
</form>
    <table>
    <tr>
       <td><a href="ppt.php"><p>PPT资源共享专区</p></a></td>
    </tr>
    </table>
    <table>
    <tr>
        <td><a href="video.php"><p>视频资源共享专区</p></a></td>
    </tr>
    </table>
    <table>
    <tr>
        <td><a href="pdf.php"><p>教材资源共享专区</p></a></td>
    </tr>
    </table>
</body>
</html>