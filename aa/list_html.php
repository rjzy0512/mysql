<?php if(!defined("APP")) die("Error!"); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>员工信息列表</title>
<style type="text/css">
.box{
	margin:20px;
	}
.box .title{
	font-size:22px;
	font-weight:bold;
	text-align:center;
	}
.box table{
	width:100%;
	margin-top:15px;
	border-collapse:collapse;
	font-size:12px;
	border:1px solid #B5D6E6;
	min-width:460px;
 	}
.box table th,.box table td{
	height:20px;
	border:1px solid #B5D6E6;
 	}
.box table th{
	background-color:#E8F6FC;
	font-weight:normal;
	}
.box table td{
	text-align:center;
	}
</style>
</head>

<body>
<div class="box">
	<div class="title">员工信息列表</div>
	<table>
    	<tr>
        	<th><a href="showList.php?order=e_id&sort=<?php echo($order=='e_id')?$sort:'desc';?>">ID</a></th>
            <th><a href="showList.php?order=e_name&sort=<?php echo($order=='e_name')?$sort:'desc';?>">姓名</a></th>
            <th><a href="showList.php?order=e_dept&sort=<?php echo($order=='e_dept')?$sort:'desc';?>">所属部门</a></th>
            <th><a href="showList.php?order=date_of_birth&sort=<?php echo($order=='date_of_birth')?$sort:'desc';?>">出生日期</a></th>
            <th><a href="showList.php?order=date_of_entry&sort=<?php echo($order=='date_of_entry')?$sort:'desc';?>">入职时间</a></th>
            <th>相关操作</th>
        </tr>
        <?php  if(!empty($emp_info)) 
        	 	{
             		foreach($emp_info as $row){ ?>
        	<tr>
        		<td><?php echo $row["e_id"]; ?></td>
        		<td><?php echo $row["e_name"]; ?></td>
          		<td><?php echo $row["e_dept"]; ?></td>
           		<td><?php echo $row["date_of_birth"]; ?></td>
            	<td><?php echo $row["date_of_entry"]; ?></td>
            	<td><div align="center"><span><img src="images/edt.gif" width="16" height="16" />编辑&nbsp;&nbsp;
                		<img src="images/del.gif" width="16" height="16" />删除</span></div></td>
        	</tr>
        	<?php } 
        		} else{ ?>
        <tr><td colspan="6">暂无员工数据！</td></tr>
        <?php }?>
    </table>
</div>
</body>
</html>