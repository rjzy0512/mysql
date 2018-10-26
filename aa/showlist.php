<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
</head>

<body>
<?php
	$link = mysql_connect("localhost","root","root") or die("Connection Fail");
	
	mysql_query("set names utf8");
	
	$select = mysql_select_db("ads",$link) or die("Link Error".mysql_error());
	
	$fields=array('e_id','e_name','e_dept','date_of_entry','date_of_birth');
	
	$sql_order='';
	
	$order=isset($_GET['order'])? $_GET['order']:'';
	
	$sort=isset($_GET['sort'])? $_GET['sort']:'';
	
	if(in_array($order,$fields))
	{
		if($sort == 'desc')
		{
			$sql_order = "order by $order desc";
			$sort = 'asc';
		}
		else
		{
			$sql_order = "order by $order asc";
			$sort = 'desc';
		}
	}
	
	$sql = "select * from emp_info $sql_order";
	
	$result = mysql_query($sql,$link);
	
	while($row = mysql_fetch_assoc($result))
		$emp_info[] = $row;
		
	mysql_free_result($result);
	
	mysql_close($link);
	
	define("APP","ads");
	
	require "list_html.php";
?>
</body>
</html>