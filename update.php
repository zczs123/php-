<?php
require_once("./connect.php");
//获取地址栏传递的id
if(isset($_POST['token'])&&$_POST['token']=='update')
{
    $id=$_GET['id'];
    $username=$_POST['username'];
    $sql= "UPDATE user SET username='$username' WHERE id=$id";
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
        header("refresh:3;url=./admin.php");
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
    <title>用户信息修改</title>
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
    <td width="40px">姓名:</td><td> <input type="text" name="username" value="请输入新的姓名"></td>
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