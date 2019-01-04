<?php
require "dbconfig.php";
$link = @mysql_connect(HOST,USER,PASS) or die("提示：数据库连接失败");
mysql_select_db(DBNAME,$link);
mysql_set_charset('utf8',$link);

$id = $_GET['id'];
mysql_query("DELETE FROM t_user WHERE user_id={$id}",$link) or die('提示：数据库执行异常'.mysql_error());
header("Location:index.php");  
?>