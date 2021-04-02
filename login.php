<?php
session_start();//开启session
$_SESSION['token']= uniqid();//产生随机字符串验证
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN</title>
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="images/icon/font/iconfont.css">
    <link rel="stylesheet" href="images/icon/font/idcode/iconfont.css">
</head>
<body> 
<form method="post" action="loginSave.php">
    <table >
    <th><span>welcome</span></th>
    <tr class="form">
        <td class="item"> <i class="iconfont icon-user" aria-hidden="true"></i></td>
        <td class="item"><input type="text" placeholder="Username" name="username"></td>
    </tr>    
    <tr class="form">
        <td class="item"><i class="iconfont icon-password" aria-hidden="true"></i></td>  
        <td class="item"><input type="password" placeholder="Password" name="password"></td>
    </tr>
    <tr class="form">
        <td class="item"><i class="iconfont icon-yanzhengma3" aria-hidden="true"></i></td>  
        <td class="item"><input type="text" placeholder="IDcode" name="verify" size="4" maxlength="4"></td>
        <td class="item"><img src="./captcha.php" onClick="this.src='./captcha.php?'+Math.random()"></td>
        <!-- onclick是JS的单击事件，this.src是给当前图片添加src属性，重新赋值
        Math.random是JS的随机函数返回0-1间的随机小数
        图片每次请求地址不能一样 -->
    </tr>
    <tr class="form">
        <td class="item"><input type="submit" value="Login" class="login"></td>
        <td class="item"><a href="./register.php"><input type="button" value="Register" class="register"></a></td>
        <td><input type="hidden" value="<?php echo $_SESSION['token']?>" name="token"></td>
        <td class="item"><input type="submit" value="Admin" class="admin"></a></td> 
    </tr>
</table>
</form>
</body>
</html>