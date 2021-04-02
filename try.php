<?php
if(isset($_POST['token'])&&$_POST['token']=='upload')
{
    print_r($_FILES);
    $finfo=finfo_open(FILEINFO_MIME_TYPE);
    $content_type=finfo_file($finfo,$_FILES['uploadfile']['tmp_name']);
    echo $content_type;
    die();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" name='form1'method='post' enctype="multipart/form-data">
    上传照片：<input type="file" name='uploadfile'>
    <input type="submit" value="上传">
    <input type="hidden" name='token' value='upload'>
</form>
</body>
</html>
