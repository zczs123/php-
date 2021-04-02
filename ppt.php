<?php
//包含连接数据库的公共文件
require_once("./connect.php");
session_start();
if(empty($_SESSION['username']))
{
    header("refresh:3;url=./login.php");
    die();
}
//查询ppt数据库
$sql="SELECT *FROM ppt ORDER BY id DESC";
$result = mysqli_query($link,$sql);
$arrs=mysqli_fetch_all($result,MYSQLI_ASSOC);
$records=mysqli_num_rows($result);
//分页
$pagesize=6;
$page=isset($_GET['page']) ? $_GET['page'] : 1;
$startrow=($page-1)*$pagesize;
//获取总记录数和计算总页数
$pages=ceil($records/$pagesize);
//构建查询分页的SQL语句
$sql="SELECT *FROM ppt ORDER BY id DESC LIMIT {$startrow},{$pagesize}";
$result = mysqli_query($link,$sql);
$arrs=mysqli_fetch_all($result,MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>PPT</title>
  <link rel="stylesheet" href="css/ppt.css">
</head>
<body>
<div class="box">
	<div class="title">
		<h2>《网络操作系统》PPT资源共享平台</h2>
	</div>
<div class="photos">
<a href="./index.php">返回</a>
<a href="./uploadppt.php">上传PPT</a>

		共有<font color='red'><?php echo "$records" ?></font>个PPT
	<!-- 循环二维数组 -->
	<?php
		foreach($arrs as $arr)
		{?>
	<ul>
		<li>
			<a href="./detailppt.php?id=<?php echo $arr['id']?>"><img src="<?php echo $arr['imgsrc']?>"></a>
			<div class='intro'><a href="./detailppt.php?id=<?php echo $arr['id']?>"><?php echo $arr['title']?></a></div>
		</li>
		<?php }?>
	</ul>
	<div style="clear:both"></div>
	<div class="pagelist">
	<?php
	//循环起点和终点
	$start=$page-3;
	$end=$page+2;
	//如果当前页小于4时
	if($page<=3)
	{
		$start=1;
		$end=6;
	}
	//如果$page>=$pages-3
	if($page>=$pages-3)
	{
		$start=$pages-3;
		$end=$pages;
	}
	if($pages<6)
	{
		$start=1;
		$end=$pages;
	}
	//循环所有页码
	for($i=$start;$i<=$end;$i++)
	{
		//当前页不加链接
		if($page==$i)
		{
			echo "<span class='current'>$i</span>";
		}
		else
		{
			echo "<a href='./ppt.php?page=$i'>$i</a>";
		}
	}
?>
	</div>
</div>
</body>
</html>