<?php
header('content-type:text/html;charset=utf-8');
require 'public_function.php';
dbInit();
$sql = 'select * from emp_info';
$emp_info = fetchAll($sql);
define('APP', 'itcast');
require 'list_html.php';