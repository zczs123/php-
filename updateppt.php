<?php
require_once("./connect.php");
//获取地址栏传递的id
if(isset($_POST['token'])&&$_POST['token']=='update')
{
    $id=$_GET['id'];
    $title=$_POST['title'];
    $pptsrc=$_POST['pptsrc'];
    $intro=$_POST['intro'];
    $hits=$_POST['hits'];
    $imgsrc=$_POST['imgsrc'];
    $sql= "UPDATE ppt SET title= '$title', pptsrc= '$pptsrc',intro= '$intro', hits= '$hits', imgsrc= '$imgsrc' WHERE id=$id";
    if(mysqli_query($link,$sql))
    
    { 
        echo "<h2>id={$id}修改成功!</h2>";
        header("refresh:3;url=./admin.php");
        // header函数用于跳转到url后的页面
        die();//终止向下运行
    }
    else
    {
        echo "<h2>id={$id}修改失败!</h2>";
        //header("refresh:3;url=./list.php");
        // header函数用于跳转到url后的页面
        die();//终止向下运行
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PPT信息修改</title>
</head>
<style>
div {
   text-align:center;
   color: purple;
    }
</style>
<body>
<div>
<h2>信息修改表</h2>
    <a href="./admin.php">返回</a>
    </div>
    <form action="" method="post">
    <table width=400px align='center'>
    <tr>
    <td width="80px">标题:</td><td> <input type="text" name="title" value="请输入新的标题"></td>
    </tr>
    <tr>
    <td width="80px">资源路径:</td><td> <input type="text" name="pptsrc" value="请输入新的资源路径"></td>
    </tr>
    <tr>
    <td width="80px">资源介绍:</td><td> <input type="text" name="intro" value="请输入新的资源介绍"></td>
    </tr>
    <tr>
    <td width="80px">访问量:</td><td> <input type="text" name="hits" value="请输入新的访问量"></td>
    </tr>
    <tr>
    <td width="80px">图片路径:</td><td> <input type="text" name="imgsrc" value="请输入新的图片路径"></td>
    </tr>
        <tr>
        <td>
            <input type="submit" value='修改'>
        </td>
        <td>
            <input type="reset" value='重置'>
            <td class="item"><input type="hidden" value='update' name="token"></td>
        </td>
        </tr>
    </table>
    </form>
</body>
</html>