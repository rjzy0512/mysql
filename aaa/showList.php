<?php
//声明文件解析的编码格式
$page_size=2;
$res= mysql_query('select count(*) from emp_info');
if(!$res)die(mysql_error());

$count= mysql_fetch_row($res);
//去处查询结果中的第一列的值
$count=$count[0];
$max_page= ceil ($count/$page_size);
//获取当前选择的页码
$page=isset($_GET['page'])?intval($_GET['page']):1;
$page= $page> $max_page? $max_page: $page;
$page= $page<1?1:$page;

$page_html="<a href='showList.php?page=1'>首页</a>&nbsp;";
$page_html.="<a href='showList.php?page=".(($page-1)>0?
($page-1):1)."'>上一页</a>&nbsp;";

$page_html.="<a href='showList.php?page=".(($page+1)<$max_page?($page+1):$max_page)."'>下一页</a>&nbsp;";
$page_html.= "<a href='showList.php?page={$max_page}'>尾页</a>";

$lim=($page-1)*$page_size;
$sql="select *from emp_info limit {$lim},{$page_size}";
$res= mysql_query($sql);
if(!$res)dis(mysql_error());




header('content-type:text/html;charset=utf-8');

//连接数据库
$link = mysql_connect('localhost','root','root');
//判断数据库连接是否成功，如果不成功则显示错误信息并终止脚本继续执行
if(!$link){
	die('连接数据库失败！'.mysql_error());
}
//设置字符集，选择数据库
mysql_query('set names utf8');
mysql_query('use itcast');

//准备SQL语句
$sql = 'select * from `emp_info`';

//执行SQL语句，获取结果集
$res = mysql_query($sql,$link);
if(!$res) die(mysql_error());

//定义员工数组，用以保存员工信息
$emp_info = array();

//遍历结果集，获取每位员工的详细数据
while($row = mysql_fetch_assoc($res)){
	//把从结果集中取出的每一行数据赋值给$emp_info数组
	$emp_info[] = $row;
}

//设置常量，用以判断视图页面是否由此页面加载
define('APP', 'itcast');
//加载视图页面，显示数据
require './list_html.php';