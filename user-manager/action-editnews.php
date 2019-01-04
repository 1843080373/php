<?php
require "dbconfig.php";
$link = @mysql_connect(HOST,USER,PASS) or die("提示：数据库连接失败");
mysql_select_db(DBNAME,$link);
mysql_set_charset('utf8',$link);

$id = $_POST['user_id'];
$username = $_POST['username'];
$phone = $_POST['phone'];
$password = $_POST['password'];
mysql_query("UPDATE t_user SET user_name='$username',phone='$phone',password='$password' WHERE user_id=$id",$link) or die('提示：数据库操作失败'.mysql_error());
header("Location:index.php");  
?>