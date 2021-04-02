<?php
 require_once("./connect.php");
    session_start();
    //判断用户是否登录
    if(empty($_SESSION['username']))
    {
        header("location:./login.php");
        die();
    }
    $_SESSION['token']=uniqid();
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/upload.css">
    <title>Uploadvideo</title>
</head>
<body>
    <div class="box">
    <div class="title">
        <h2>上传视频</h2>
        <a href="./video.php">返回</a>
    </div>
<form action="uploadvideoSave.php" method="post" enctype="multipart/form-data">
<table align="center" width="600">
    <tr>
        <td width="100" align="right">视频标题：</td>
        <td><input type="text" name="title" size="60"></td>
    </tr>
    <tr>
        <td align="right">上传视频：</td>
        <td><input type="file" name="uploadFile"></td> 
    </tr>
    <tr>
        <td align="right">上传视频封面：</td>
        <td><input type="file" name="uploadfile"></td> 
    </tr>
    <tr>
        <td align="right">视频描述：</td>
        <td><textarea name="intro" cols="45" rows="5"></textarea></td> 
    </tr>
    <tr>
        <td></td>
        <td>
            <input type="submit" value="提交">
            <input type="hidden" name="token" value="<?php echo $_SESSION['token']?>">
            <input type="reset" value="重置">
        </td>
    </tr>
</table>
</form>
    </div>
</body>
</html>