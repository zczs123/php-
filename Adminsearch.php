<?php
//包含连接数据库的公共文件
require_once("./connect.php");
$title=$_POST['search'];
$sql1="SELECT * FROM pdf WHERE title LIKE '{$title}%'";
$result1 = mysqli_query($link,$sql1);//执行SQL语句，并返回结果集对象
$arr1=mysqli_fetch_all($result1,MYSQLI_ASSOC);//返回关联数组
$record1 = mysqli_num_rows($result1);//取回匹配数

$sql2="SELECT * FROM ppt WHERE title LIKE '{$title}%'";
$result2 = mysqli_query($link,$sql2);//执行SQL语句，并返回结果集对象
$arr2=mysqli_fetch_all($result2,MYSQLI_ASSOC);//返回关联数组
$record2 = mysqli_num_rows($result2);//取回匹配数

$sql3="SELECT * FROM video WHERE title LIKE '{$title}%'";
$result3 = mysqli_query($link,$sql3);//执行SQL语句，并返回结果集对象
$arr3=mysqli_fetch_all($result3,MYSQLI_ASSOC);//返回关联数组
$record3 = mysqli_num_rows($result3);//取回匹配数

$sql7="SELECT * FROM user WHERE username LIKE '{$title}%'";
$result7=mysqli_query($link,$sql7);
$arr7=mysqli_fetch_all($result7,MYSQLI_ASSOC);
$records7=mysqli_num_rows($result7);

    if(!$record1&&!$record2&&!$record3&&!$records7)
    {
        echo "<h2>没有查询到你想要的结果</h2>";
        header("refresh:3;url=./index.php");
        die();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search</title>
</head>
<style>
body {
        color:black;
        font-size:14px;
        text-align:center;
    }
    span {
        margin-right:20px;
    }
    .search {
    margin-left:950px;
    font-size: 35px;
 }
</style>
<body>
<h2>查找如下</h2>
    <table width='800px'cellpadding='1px' border='1' align="center">
    
    <?php
        foreach($arr1 as $arr4){
        ?>
        <tr>
    <th>ID</th><th>title</th><th>pptsrc</th><th>intro</th><th>hits</th><th>imgsrc</th><th>操作选项</th>
    </tr>
   <tr>
        <td><?php echo $arr4['id']?></td>
        <td><?php echo $arr4['title']?></td>
        <td><?php echo $arr4['pdfsrc']?></td>
        <td><?php echo $arr4['intro']?></td>
        <td><?php echo $arr4['hits']?></td>
        <td><?php echo $arr4['imgsrc']?></td>
        <td>
        <a href="updatepdf.php?id=<?php echo $arr4['id']?>">修改 </a>| 
        <a href="deletepdf.php?id=<?php echo $arr4['id']?>">删除</a>
        </td>
    </tr>
        <?php } ?>
    

    <?php
        foreach($arr2 as $arr5){
        ?>
         <tr>
    <th>ID</th><th>title</th><th>pptsrc</th><th>intro</th><th>hits</th><th>imgsrc</th><th>操作选项</th>
    </tr>
   <tr>
        <td><?php echo $arr5['id']?></td>
        <td><?php echo $arr5['title']?></td>
        <td><?php echo $arr5['pptsrc']?></td>
        <td><?php echo $arr5['intro']?></td>
        <td><?php echo $arr5['hits']?></td>
        <td><?php echo $arr5['imgsrc']?></td>
        <td>
        <a href="updateppt.php?id=<?php echo $arr5['id']?>">修改 </a>| 
        <a href="deleteppt.php?id=<?php echo $arr5['id']?>">删除</a>
        </td>
    </tr>
        <?php } ?>
    

    <?php
        foreach($arr3 as $arr6){
        ?>
         <tr>
    <th>ID</th><th>title</th><th>pptsrc</th><th>intro</th><th>hits</th><th>imgsrc</th><th>操作选项</th>
    </tr>
   <tr>
        <td><?php echo $arr6['id']?></td>
        <td><?php echo $arr6['title']?></td>
        <td><?php echo $arr6['videosrc']?></td>
        <td><?php echo $arr6['intro']?></td>
        <td><?php echo $arr6['hits']?></td>
        <td><?php echo $arr6['imgsrc']?></td>
        <td>
        <a href="updatevideo.php?id=<?php echo $arr6['id']?>">修改 </a>| 
        <a href="deletevideo.php?id=<?php echo $arr6['id']?>">删除</a>
        </td>
    </tr>

    <?php } ?>
    
    <?php
        foreach($arr7 as $arr8){
        ?>
    <tr>
        <th>ID</th><th>username</th><th>password</th><th>操作选项</th>
    </tr>
    <tr>
        <td><?php echo $arr8['id']?></td>
        <td><?php echo $arr8['username']?></td>
        <td><?php echo $arr8['password']?></td>
        <td>
        <a href="update.php?id=<?php echo $arr8['id']?>">修改 </a>| 
        <a href="delete.php?id=<?php echo $arr8['id']?>">删除</a>
        </td>
    </tr>
        <?php }?>
    
    </table>
</body>
</html>