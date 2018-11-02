<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
</head>

<body><?php
function dbInit(){
$link= mysql_connect('localhost','root','root');
//判断数据库连接是否成功，如果不成功则显示错误信息并终止脚本继续执行
if(!$link){
	die('连接数据库失败！'.mysql_error());
}
//设置字符集，选择数据库
mysql_query('set names utf8');
mysql_query('use itcast');}
function query($sql){
	if($result=mysql_query($sql)){
		return $result;
		}else{
			echo'SQl执行失败:<br>';
			echo'错误的SQl为:',$sql,'<br>';
			echo'错误的代码:',mysql_errno(),'<br>';
			echo'错误信息',mysql_error(),'<br>';
			die;
			}
}
	function fetchall($sql){
		if($result= query($sql)){
			$rows=array();
			while( $row=mysql_fetch_array($result,MYSQl_ASSOC)){
				$rows[]=$row;
				}
				mysql_free_result($result);
				return false;
				
			
			}
		
		
		
		}
	
	function fetchRow($sql){
		if($result=query($sql)){
			if($result= query($sql)){
				$row=mysql_fetch_array($result,MYSQl_ASSOC);
				return $row;
			
				}else{return false;}
			
			}
		
		
		}
	
	?>
</body>
</html>