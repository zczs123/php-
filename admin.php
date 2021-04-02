<?php
require_once("./connect.php");
$sql1="SELECT * FROM user";
$result1=mysqli_query($link,$sql1);
$arrs1=mysqli_fetch_all($result1,MYSQLI_ASSOC);
$records1=mysqli_num_rows($result1);
$sql2="SELECT * FROM ppt";
$result2=mysqli_query($link,$sql2);
$arrs2=mysqli_fetch_all($result2,MYSQLI_ASSOC);
$records2=mysqli_num_rows($result2);
$sql3="SELECT * FROM pdf";
$result3=mysqli_query($link,$sql3);
$arrs3=mysqli_fetch_all($result3,MYSQLI_ASSOC);
$records3=mysqli_num_rows($result3);
$sql4="SELECT * FROM video";
$result4=mysqli_query($link,$sql4);
$arrs4=mysqli_fetch_all($result4,MYSQLI_ASSOC);
$records4=mysqli_num_rows($result4);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
</head>
<style>
    body {
        background-image: url('./images/admin.jpg');
        background-repeat: no-repeat;
        background-position: center 0;
        background-attachment: fixed;
        background-size: cover;
        -webkit-background-size:cover;
        zoom:1;
        background-color:#f7f7f7;
        color: #a2a2a2;
        font-size:14px;
        text-align:center;
    }
    a:visited {color:#a2a2a2; text-decoration:none;}
    a:link { color:#fafaf9; text-decoration:none;}
    a:hover { color:#f2910f;}
    span {
        margin-right:20px;
    }
    .search {
    margin-left:950px;
    font-size: 35px;
 }
 .user {
     margin-top:1px;
 }
  h2 {
    margin-top:20px;
 }
</style>
<body>
    <h1>资源管理中心</h1>
<div>
<form action="Adminsearch.php" method='post'>
<div class="search"> 
    <input type="text"  placeholder="请输入想要查找的内容" name="search">
    <input type="submit" value="搜索" name="submit">
</div>    
</form>
    <h2 class='user'>用户资源管理</h2>
    总计 <font color='#fafaf9'><?php echo $records1 ?></font> 个用户
</div>
    <table width='800px'cellpadding='1px' align="center">
    <tr>
    <th>ID</th><th>username</th><th>password</th><th>操作选项</th>
    </tr>
    <?php
        foreach($arrs1 as $arr1){
        ?>
    <tr>
        <td><?php echo $arr1['id']?></td>
        <td><?php echo $arr1['username']?></td>
        <td><?php echo $arr1['password']?></td>
        <td>
        <a href="update.php?id=<?php echo $arr1['id']?>">修改 </a>| 
        <a href="delete.php?id=<?php echo $arr1['id']?>">删除</a>
        </td>
    </tr>
        <?php }?>
    </table>
<br>
<h2>ppt资源管理</h2>
总计 <font color='#fafaf9'><?php echo $records2 ?></font> 个ppt文件
    <table width='800px'cellpadding='1px' align="center">
    <tr>
    <th>ID</th><th>title</th><th>pptsrc</th><th>intro</th><th>hits</th><th>imgsrc</th><th>操作选项</th>
    </tr>
    <?php
        foreach($arrs2 as $arr2){
        ?>
    <tr>
        <td><?php echo $arr2['id']?></td>
        <td><?php echo $arr2['title']?></td>
        <td><?php echo $arr2['pptsrc']?></td>
        <td><?php echo $arr2['intro']?></td>
        <td><?php echo $arr2['hits']?></td>
        <td><?php echo $arr2['imgsrc']?></td>
        <td>
        <a href="updateppt.php?id=<?php echo $arr2['id']?>">修改 </a>| 
        <a href="deleteppt.php?id=<?php echo $arr2['id']?>">删除</a>
        </td>
    </tr>
        <?php }?>
    </table>
    <br>
<h2>pdf资源管理</h2>
总计 <font color='#fafaf9'><?php echo $records3 ?></font> 个pdf文件
    <table width='800px'cellpadding='1px'  align="center">
    <tr>
    <th>ID</th><th>title</th><th>pdfsrc</th><th>intro</th><th>hits</th><th>imgsrc</th><th>操作选项</th>
    </tr>
    <?php
        foreach($arrs3 as $arr3){
        ?>
    <tr>
        <td><?php echo $arr3['id']?></td>
        <td><?php echo $arr3['title']?></td>
        <td><?php echo $arr3['pdfsrc']?></td>
        <td><?php echo $arr3['intro']?></td>
        <td><?php echo $arr3['hits']?></td>
        <td><?php echo $arr3['imgsrc']?></td>
        <td>
        <a href="updatepdf.php?id=<?php echo $arr3['id']?>">修改 </a>| 
        <a href="deletepdf.php?id=<?php echo $arr3['id']?>">删除</a>
        </td>
    </tr>
        <?php }?>
    </table>
    <br>
<h2>视频资源管理</h2>
总计 <font color='#fafaf9'><?php echo $records3 ?></font> 个视频文件
    <table width='800px'cellpadding='1px' align="center">
    <tr>
    <th>ID</th><th>title</th><th>videosrc</th><th>intro</th><th>hits</th><th>imgsrc</th><th>操作选项</th>
    </tr>
    <?php
        foreach($arrs4 as $arr4){
        ?>
    <tr>
        <td><?php echo $arr4['id']?></td>
        <td><?php echo $arr4['title']?></td>
        <td><?php echo $arr4['videosrc']?></td>
        <td><?php echo $arr4['intro']?></td>
        <td><?php echo $arr4['hits']?></td>
        <td><?php echo $arr4['imgsrc']?></td>
        <td>
        <a href="updatevideo.php?id=<?php echo $arr4['id']?>">修改 </a>| 
        <a href="deletevideo.php?id=<?php echo $arr4['id']?>">删除</a>
        </td>
    </tr>
        <?php }?>
    </table>
</body>
</html>