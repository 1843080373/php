<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>用户管理系统</title>
</head>
<style type="text/css">
.wrapper {width: 1000px;margin: 20px auto;}
h2 {text-align: center;}
.add {margin-bottom: 20px;}
.add a {text-decoration: none;color: #fff;background-color: green;padding: 6px;border-radius: 5px;}
td {text-align: center;}
</style>
<body>
    <div class="wrapper">
        <h2>用户管理系统</h2>
        <div class="add">
            <a href="addnews.html">增加用户</a>
        </div>
        <table width="960" border="1">
            <tr>
                <th>ID</th>
                <th>姓名</th>
                <th>手机号</th>
                <th>密码</th>
                <th>操作</th>
            </tr>

            <?php
                // 1.导入配置文件
                require "dbconfig.php";
                // 2. 连接mysql
                $link = @mysql_connect(HOST,USER,PASS) or die("提示：数据库连接失败！");
                // 选择数据库
                mysql_select_db(DBNAME,$link);
                // 编码设置
                mysql_set_charset('utf8',$link);

                // 3. 从DBNAME中查询到news数据库，返回数据库结果集,并按照addtime降序排列  
                $sql = 'select * from t_user order by user_id asc';
                // 结果集
                $result = mysql_query($sql,$link);

                // 解析结果集,$row为新闻所有数据，$newsNum为新闻数目
                $newsNum=mysql_num_rows($result);  

                for($i=0; $i<$newsNum; $i++){
                    $row = mysql_fetch_assoc($result);
                    echo "<tr>";
                    echo "<td>{$row['user_id']}</td>";
                    echo "<td>{$row['user_name']}</td>";
                    echo "<td>{$row['phone']}</td>";
                    echo "<td>{$row['password']}</td>";
                    echo "<td>
                            <a href='javascript:del({$row['user_id']})'>删除</a>
                            <a href='editnews.php?id={$row['user_id']}'>修改</a>
                          </td>";
                    echo "</tr>";
                }
               
                mysql_free_result($result);
                mysql_close($link);
            ?>
        </table>
    </div>
    
    <script type="text/javascript">
        function del (id) {
            if (confirm("确定删除这条信息吗？")){
                window.location = "action-del.php?id="+id;
            }
        }
    </script>
</body>
</html>