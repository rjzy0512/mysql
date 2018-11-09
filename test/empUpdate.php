<?php
header('content-type:text/html;charset=utf-8');
require 'public_function.php';
dbInit();

$e_id = isset($_GET['e_id']) ? intval($_GET['e_id']) : 0;

if(!empty($_POST)){
	
	$update = array();
	
	$fields = array('e_name','e_dept','date_of_birth','date_of_entry');

	foreach($fields as $v){

		$data = isset($_POST[$v]) ? $_POST[$v] : '';

		if($data=='') die($v.'字段不能为空');

		$data = safeHandle($data);

		$update[] = "`$v`='$data'";
	}

	$update_str = implode(',', $update);

	$sql = "update `emp_info` set $update_str where  `e_id`=$e_id";

	if($res = query($sql)){
		header("Location: ./showList.php");
		die;
	}else{
		die('员工信息修改失败');
	}
}else{

	$sql = "select * from `emp_info` where `e_id`=$e_id";

	$emp_info = fetchRow($sql);

	define('APP', 'itcast');
	require 'update_html.php';
}

