<?php
include 'config.php';
//设置时间格式
date_default_timezone_set('PRC');
//获取本地时间&转换时间格式
$date = date("Y-m-d H:i:s");
$hostname = $_GET['hostname'];
<<<<<<< HEAD
=======
$ssid = $_GET['ssid'];
$s_time = $_GET['time'];
$s_action = $_GET['action'];
$session = $_GET['session'];

//选择数据库连接
$db_link = mysql_connect($db_host, $db_user, $db_pass) or die(message(mysql_error()));

//选择数据库
mysql_select_db($db_name, $db_link) or die(message(mysql_error()));


if ($ssid != ce187194a62013ff2){
	print "登陆失败,请重新登陆\n";
}else{
	$sql_report =  "select * FROM `m_report` where HOSTNAME = '$hostname'";
	$result = mysql_query($sql_report, $db_link) or die(message(mysql_error()));
	$row = mysql_fetch_array($result);
	$report_host_control = $row['CONTROL']."";
	$report_host = $row['HOSTNAME']."";
	$report_session = $row['SESSION']."";
	if(!empty($report_host)){
		if ($s_action == start){
			if ($report_session == $session) {
				$up_start_sql ="insert into m_report  (HOSTNAME,CONTROL) values ('$hostname','OK') on duplicate key update HOSTNAME='$hostname',CONTROL='OK'";
				$up_result = mysql_query($up_start_sql,$db_link);
				print "$hostname $s_action monitor ok\n";
			}else{
				print  "$hostname $s_action session is error\n";
			}
		}elseif ($s_action == stop){
			if  ($report_session == $session) {
				$up_stop_sql = "insert into m_report  (HOSTNAME,CONTROL) values ('$hostname','STOP') on duplicate key update HOSTNAME='$hostname',CONTROL='STOP'";
				$up_result = mysql_query($up_stop_sql,$db_link);
				print "$hostname $s_action monitor ok\n";
			}else{
				print  "$hostname $s_action session is error\n";
			}
		}
	}else{
		print "$hostname id dont exsit\n";
   	}	
}

mysql_close($db_link);
>>>>>>> b0629c503ae40ff69fe499b766b5f534c688e0f1
?>
