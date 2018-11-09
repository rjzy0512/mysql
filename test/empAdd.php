<?php
header('content-type:text/html;charset=utf-8');

require 'public_function.php';

dbInit();


if(!empty($_POST)){

	$fields = array('e_name','e_dept','date_of_birth','date_of_entry');

	$values = array(); 
	
	foreach($fields as $k => $v){

		$data = isset($_POST[$v]) ? $_POST[$v] : '';

		if($data=='') die($v.'字段不能为空');

		$data = safeHandle($data);

		$fields[$k] = "`$v`";

		$values[] = "'$data'";
	}
	
	$fields = implode(',', $fields);

	$values = implode(',', $values);
	
	$sql = "insert into `emp_info` ($fields) values ($values)";

	if($res = query($sql)){
		header('Location: ./showList.php');
		die;
	}else{
		die('员工添加失败！');
	}
}
define('APP', 'itcast');
require 'add_html.php';
