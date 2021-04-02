<?php
//包含连接数据库的公共文件
require_once("./connect.php");
session_start();
//判断表单是否合法提交
if(isset($_POST['token'])&&$_POST['token']==$_SESSION['token'])
{
    //获取表单提交数据
    $username = $_POST['username'];//用户名
    $password = md5($_POST['password']);//加密字符串
    $passward = $_POST['password'];
    $verify = $_POST['verify'];//验证码
    //判断验证码与服务器保存的是否一致验证码不分大小写
    if(strtolower($verify) != $_SESSION['captcha'])
    {
        echo "<h2>请重新输入验证码</h2>";
        header("refresh:3;url=./login.php");
        die();
    }
    //判断用户名和密码与数据库是否一致
    $sql="SELECT * FROM user WHERE username='$username' AND password='$password'";
    $sql1="SELECT * FROM admin WHERE name='$username' AND passward='$passward'";
    $result1 = mysqli_query($link,$sql1);//执行SQL语句，并返回结果集对象
    $records1 = mysqli_num_rows($result1);//取回记录数
    $result = mysqli_query($link,$sql);//执行SQL语句，并返回结果集对象
    $records = mysqli_num_rows($result);//取回记录数
    if(!$records&&!$records1)
    {
        echo "<h2>用户名或密码不正确！</h2>";
        header("refresh:3;url=./login.php");
        die();
    }
    if($records1!=0)
    {
    header("location:./admin.php");
    die();
    }
   if($records!=0)
    {
    //保护用户信息到SESSION中
    $_SESSION['username']=$username;
    //跳转到首页
    header("location:./index.php");
    die();
    }
}
else
{
    //返回登录界面
    header("location:./login.php");
}