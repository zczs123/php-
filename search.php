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

    if(!$record1&&!$record2&&!$record3)
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
    ul li {
        list-style: none;
        float: left;
        width: 290px;
        padding: 8px 5px;
        margin: 10px;
        text-align: center;
    }
    img {
        width:200px;
        height:100px;
    }
   h2 {
       text-align: center;
   }
</style>
<body>
<h2>查找如下</h2>
    <?php
		foreach($arr1 as $arr4)
		{?>
	<ul>
		<li>
            <?php if(isset($arr4['pdfsrc']))
            {?>
            <a href="./detailpdf.php?id=<?php echo $arr4['id']?>"><img src="<?php echo $arr4['imgsrc']?>"></a>
			<div class='intro'><a href="./detailpdf.php?id=<?php echo $arr4['id']?>"><?php echo $arr4['title']?></a></div>
            <?php }?>
		</li>
        <?php } ?>
    </ul>
    <?php
		foreach($arr2 as $arr5)
		{?>
	<ul>
		<li>
            <?php if(isset($arr5['pptsrc']))
            {?>
            <a href="./detailppt.php?id=<?php echo $arr5['id']?>"><img src="<?php echo $arr5['imgsrc']?>"></a>
			<div class='intro'><a href="./detailppt.php?id=<?php echo $arr5['id']?>"><?php echo $arr5['title']?></a></div>
            <?php }?>
		</li>
        <?php } ?>
    </ul>
    <?php
		foreach($arr3 as $arr6)
		{?>
	<ul>
		<li>
            <?php if(isset($arr6['videosrc']))
            {?>
            <a href="./detailvideo.php?id=<?php echo $arr6['id']?>"><img src="<?php echo $arr6['imgsrc']?>"></a>
			<div class='intro'><a href="./detailvideo.php?id=<?php echo $arr6['id']?>"><?php echo $arr6['title']?></a></div>
            <?php }?>
		</li>
        <?php } ?>
    </ul>
</body>
</html>