<?php
require "dbconfig.php";
$link = @mysql_connect(HOST,USER,PASS) or die("提示：数据库连接失败");
mysql_select_db(DBNAME,$link);
mysql_set_charset('utf8',$link);

$username = $_POST['username'];
$phone = $_POST['phone'];
$password = $_POST['password'];
mysql_query("INSERT INTO t_user(user_name,phone,password) VALUES ('$username','$phone','$password')",$link) or die('提示：数据库操作失败'.mysql_error());
header("Location:index.php");  
?>