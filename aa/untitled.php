<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
</head>

<body>
<?php
$link= mysql_connect("localhost","root","root") or die("数据连接失败");
/*if($link)
	echo"连接成功".mysql_get_host_info($like);
   else                                                                                
    echo"链接失败";*/
	mysql_query ("set names utf8");
	$select=mysql_select_db("itcst")or die("数据库访问失败".mysql_error());
	$sql="select * from emp_info";
	$result=mysql_query($sql,$link);
	/*while($row=mysql_fetch_row($result))
					$emp_info[]=$row;
					foreach($emp_info as $v)
						echo $v[0],'',$v[1],'',$v[2],'',$v[3],'',$v[4],'',"<br>";*/
							while($row=mysql_fetch_assoc($result))
					$emp_info[]=$row;
					foreach($emp_info as $v)
						echo $v["e_id"],'',$v["e_name"],'',$v["e_dapt"],'',$v["date_of_birth"],'',$v["date_of_entry"],'',"<br>";

?>
</body>
</html>