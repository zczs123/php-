<?php
    require_once("./connect.php");
    $id=$_GET['id'];
    $sql="DELETE FROM user WHERE id=$id";
    if(mysqli_query($link,$sql))
    {
        echo "<h2>id={$id}删除成功!</h2>";
        header("refresh:3;url=./admin.php");
        // header函数用于跳转到url后的页面
        die();//终止向下运行
    }
    else
    {
        echo "<h2>id={$id}删除失败!</h2>";
        header("refresh:3;url=./admin.php");
        // header函数用于跳转到url后的页面
        die();//终止向下运行
    }
?>