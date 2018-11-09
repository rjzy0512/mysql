<?php

function dbInit(){
	$link = mysql_connect('localhost','root','root');
	if(!$link){
		die('连接数据库失败！'.mysql_error());
	}
	mysql_query('set names utf8');
	mysql_query('use itcast');
}


function query($sql) {

	if ($result = mysql_query($sql)) {
		return $result;
	} else {
		echo 'SQL执行失败:<br>';
		echo '错误的SQL为:', $sql, '<br>';
		echo '错误的代码为:', mysql_errno(), '<br>';
		echo '错误的信息为:', mysql_error(), '<br>';
		die;
	}
}


function fetchAll($sql) {

	if ($result = query($sql)) {
		$rows = array();
		while( $row = mysql_fetch_array($result, MYSQL_ASSOC)) {
			$rows[] = $row;
		}
		mysql_free_result($result);
		return $rows;

	} else {
		return false;
	}
}


function fetchRow($sql) {
	if ($result = query($sql)) {
		$row = mysql_fetch_array($result, MYSQL_ASSOC);
		return $row;
	} else {
		return false;
	}
}



function safeHandle($data){
	$data = htmlspecialchars($data);
	$data = mysql_real_escape_string($data);
	return $data;
}