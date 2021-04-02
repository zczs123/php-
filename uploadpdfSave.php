<?php
//包含连接数据库的公共文件
require_once("./connect.php");
session_start();
    //判断用户是否登录
    if(empty($_SESSION["username"]))
    {
        header("location:./login.php");
        die();
    }
//判断表单来源是否合法
if(isset($_POST['token'])&&$_POST['token']==$_SESSION['token'])
{
    //获取表单数据
    $title = $_POST['title'];
    $intro =$_POST['intro'];
    $addate=time();
    //上传教材
    //判断上传教材是否有错误发生
    if($_FILES['uploadFile']['error']!=0)
    {
        echo "<h2>上传教材有错误发生！</h2>";
        header("refresh:3;url=./uploadpdf.php");
        die();
    }
    //判断文件类型是不是PDF
    $arr1=array("application/pdf");
    //创建finfo的资源：获取文件内容类型，与拓展名无关
    $finfo=finfo_open(FILEINFO_MIME_TYPE);
    //获取文件内容的原始类型，不会随拓展名的改变而改变
    $mime=finfo_file($finfo,$_FILES['uploadFile']['tmp_name']);
    if(!in_array($mime,$arr1))
    {
        echo "<h2>上传必须是PDF</h2>";
        header("refresh:3;url=./uploadpdf.php");
        die();
    }
    //判断文件后缀名是否为PDF格式
    $arr2=array("pdf");
    $ext =pathinfo($_FILES['uploadFile']['name'],PATHINFO_EXTENSION);//文件拓展名
    if(!in_array($ext,$arr2))
    {
        echo "<h2>上传必须是PDF</h2>";
        header("refresh:3;url=./uploadpdf.php");
        die();
    }
    //移动教材到PDF目录中
    $tmp_name=$_FILES['uploadFile']['tmp_name'];
    $dst_name="./pdf/".uniqid().".".$ext;
    move_uploaded_file($tmp_name,$dst_name);
    //将表单数据提交到数据库
    $title=$_POST['title'];
    $intro=$_POST['intro'];
    $pdfsrc=$dst_name;//将教材路径保存到数据库
    $addate=time();




    //判断添加的图片封面是否合法
    if($_FILES['uploadfile']['error']!=0)
    {
        echo "<h2>上传图片有错误发生！</h2>";
        header("refresh:3;url=./uploadpdf.php");
        die();
    }
    //判断文件类型是不是图片
    $arr3=array("image/jpeg","image/png","image/gif");
    //创建finfo的资源：获取文件内容类型，与拓展名无关
    $fin=finfo_open(FILEINFO_MIME_TYPE);
    //获取文件内容的原始类型，不会随拓展名的改变而改变
    $mim=finfo_file($fin,$_FILES['uploadfile']['tmp_name']);
    if(!in_array($mim,$arr3))
    {
        echo "<h2>封面必须是图片</h2>";
        header("refresh:3;url=./uploadpdf.php");
        die();
    }
    //判断文件后缀名是否为图片格式
    $arr4=array("jpg","png","gif","jpeg");
    $ex =pathinfo($_FILES['uploadfile']['name'],PATHINFO_EXTENSION);//文件拓展名
    if(!in_array($ex,$arr4))
    {
        echo "<h2>上传必须是图片</h2>";
        header("refresh:3;url=./uploadpdf.php");
        die();
    }
    //移动图片到封面目录中
    $tem_name=$_FILES['uploadfile']['tmp_name'];
    $des_name="./cover/".uniqid().".".$ex;
    move_uploaded_file($tem_name,$des_name);
    //将表单数据提交到数据库
    $imgsrc=$des_name;
    //判断记录是否添加成功
    $sql="INSERT INTO pdf VALUES(null,'$title','$pdfsrc','$intro',0,$addate,'$imgsrc')";
    if(mysqli_query($link,$sql))
    {
        echo "<h2>上传成功！</h2>";
        header("refresh:3;url=./pdf.php");
        die();
    }
}