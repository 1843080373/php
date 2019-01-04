<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>修改用户</title>
</head>
<body>
<?php
    require "dbconfig.php";

    $link = @mysql_connect(HOST,USER,PASS) or die("提示：数据库连接失败");
    mysql_select_db(DBNAME,$link);
    mysql_set_charset('utf8',$link);
    
    $id = $_GET['id'];
    $sql = mysql_query("SELECT * FROM t_user WHERE user_id=$id",$link);
    $sql_arr = mysql_fetch_assoc($sql); 

?>

<form action="action-editnews.php" method="post">
    <label>ID: </label><input type="text" name="user_id" value="<?php echo $sql_arr['user_id']?>">
    <label>用户名：</label><input type="text" name="username" value="<?php echo $sql_arr['user_name']?>">
    <label>手机：</label><input type="text" name="phone" value="<?php echo $sql_arr['phone']?>">
    <label>密码：</label><input type="text" name="password" value="<?php echo $sql_arr['password']?>">
    <input type="submit" value="提交">
</form>

</body>
</html>