<?php
$db_host='localhost';
$db_user='root';
$db_pass='1234';
$db_name='zc';
$charset='utf8';
//连接数据库
 if(!$link=@mysqli_connect($db_host,$db_user,$db_pass))
 {
     echo "<h2>PHP连接MySQL服务器失败！</h2>";
     die();
 }
 //选择当前数据库
 if(!mysqli_select_db($link,$db_name))
 {
     echo "<h2>选择数据库{$db_name}失败！</h2>";
     die();
 }
 mysqli_set_charset($link,$charset);