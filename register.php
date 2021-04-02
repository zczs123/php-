<?php
require_once("./connect.php");
session_start();
if(isset($_POST['token'])&&$_POST['token']==$_SESSION['token'])
{
    if($_POST['password']!=$_POST['reconfirmation'])
    {
        echo "<h2>两次输入密码不统一</h2>";
        header("refresh:3;url=./login.php");
        die();
    }
    $username =$_POST['username'];
    $password=md5($_POST['password']);
$sql="INSERT INTO user(username,password) VALUES('$username','$password')";

if(mysqli_query($link,$sql))
    {
        echo "<h2>添加成功!</h2>";
        header("refresh:3;url=./login.php");
        // header函数用于跳转到url后的页面
        die();//终止向下运行
    }
    else
    {
        echo "<h2>添加失败!请重新添加。</h2>";
        header("refresh:3;url=./register.php");
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
    <title>Register</title>
    <link rel="stylesheet" href="css/regester.css">
    <link rel="stylesheet" href="images/icon/font/iconfont.css">
</head>
<body>
   
<form method="post" action="">
    <table >
    <th><span>welcome</span></th>
    <tr class="form">
        <td class="item"> <i class="iconfont icon-user" aria-hidden="true"></i></td>
        <td class="item"><input type="text" placeholder="Username" name="username"></td>
    </tr>    
    <tr class="form">
        <td class="item"><i class="iconfont icon-password" aria-hidden="true"></i></td>  
        <td class="item">  <input type="password" placeholder="Password" name="password"></td>
    </tr>
    <tr class="form">
        <td class="item"><i class="iconfont icon-password" aria-hidden="true"></i></td>  
        <td class="item"><input type="text" placeholder="Reconfirmation" name="reconfirmation"></td>
    </tr>
    <tr class="form">
        <td class="item"><input type="submit" value="Submit" class="submit"></td>
        <td class="item"><input type="hidden" value="<?php echo $_SESSION['token']?>" name="token"></td>
        <td class="item"><button type="reset" value="Reset" class="reset">Reset</button>
    </tr>
</table>
</form>
</body>
</html>