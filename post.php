<?php
//conf
include 'config.php';

// 获取post参数
$input = file_get_contents("php://input");

//设置时间格式
date_default_timezone_set('PRC');

//解析字符串到变量里
parse_str("$input");
//echo "\n$LOAD_USE\n";
//获取本地时间&转换时间格式
$date = date("Y-m-d H:i:s");
$check_date = strtotime (date ("H:i:s"));

//判定SSID是否合法
if ($SSID == "Okay110monitor110"){
			
	//选择数据库连接
	$db_link = mysql_connect($db_host, $db_user, $db_pass);// or die(message(mysql_error()));

    //选择数据库
    mysql_select_db($db_name, $db_link);// or die(message(mysql_error()));
/*        
	//获取上次更新时间
	$sql_setect_uptime =  "select UP_TIME FROM m_sub WHERE hostname = '$HOSTNAME'";
	$result = mysql_query($sql_setect_uptime, $db_link);
	$row = mysql_fetch_array($result);
	
	//输出查询结果
	$sql_time = $row['UP_TIME']."  ";
	//转化查询结果格式
	$last_up_time = strtotime($sql_time);
	//当前时间与数据库的时间进行对比，此处是减法
	$static = ceil(($check_date-$last_up_time)/60);
	//echo "\n$static\n";
	//关闭数据库
	//mysql_close($db_link);
		
	//检查上次更新时间
	if($static >> 2){
		 //如果结果大于2，则本地状态变量为failes
		 $CHECK_STATUS = "failes";
	} else
	{
		 //如果结果小于2，则本地状态变量为normal
		 $CHECK_STATUS = "normal";   
	 }
*/
	//组合每个表的字段
	$values_use = "'$IP','$HOSTNAME','$CPU_USE','$MEM_USE','$DISK_USE','$LOAD_USE','$BAND','$STATUS','$date'";
	$fileds_use = "IP,HOSTNAME,CPU_USE,MEM_USE,DISK_USE,LOAD_USE,BAND,STATUS,UP_TIME";

	$values_basic = "'$IP','$HOSTNAME','$CPU','$MEM','$DISK','$date'";
	$fileds_basic = "IP,HOSTNAME,CPU,MEM,DISK,UP_TIME";

	$values_sub = "'$IP','$HOSTNAME','$SUB','$date'";
	$fileds_sub = "IP,HOSTNAME,SUB,UP_TIME";
	
	//判定变量是否为空
	if(empty($PORT80)) {
		$PORT80 = "null";
	}
	if(empty($PORT53)) {
		$PORT53 = "null";
	}
	if(empty($PORT3306)) {
		$PORT3306 = "null";
	}
	if(empty($CHECK_LOGS)) {
		$CHECK_LOGS = "null";
	}
	if(empty($CHECK_GATEWAY)) {
		$CHECK_GATEWAY = "null";
	}
	if(empty($CHECK_SERVICE)) {
		$CHECK_SERVICE = "null";
	}	
	
	$values_other = "'$IP','$HOSTNAME','$PORT80','$PORT53','$PORT3306','$CHECK_LOGS','$CHECK_GATEWAY','$CHECK_SERVICE','$date'";
	$fileds_other = "IP,HOSTNAME,PORT80,PORT53,PORT3306,CHECK_LOGS,CHECK_GATEWAY,CHECK_SERVICE,UP_TIME";

    //配置数据库连接
    //$db_link = mysql_connect($db_host, $db_user, $db_pass);// or die(message(mysql_error()));

    //选择数据库
    //mysql_select_db($db_name, $db_link);// or die(message(mysql_error()));
		
	//更新使用率
    $sql_use = "insert into  m_use ($fileds_use) values ($values_use) on duplicate key update IP='$IP',CPU_USE='$CPU_USE',DISK_USE='$DISK_USE',MEM_USE='$MEM_USE',LOAD_USE='$LOAD_USE',BAND='$BAND',STATUS='$STATUS',UP_TIME='$date'";
    $result = mysql_query($sql_use, $db_link);// or die(message(mysql_error()));
    //echo "$sql_use";
    
	//更新使用率到历史库
    $sql_use_his = "insert into  m_use_his ($fileds_use) values ($values_use) on duplicate key update IP='$IP',CPU_USE='$CPU_USE',DISK_USE='$DISK_USE',MEM_USE='$MEM_USE',LOAD_USE='$LOAD_USE',BAND='$BAND',STATUS='$STATUS',UP_TIME='$date'";
    $result = mysql_query($sql_use_his, $db_link);// or die(message(mysql_error()));
    //echo "$sql_use";
        
    //更新基础信息
    $sql_basic = "insert into  m_basic ($fileds_basic) values ($values_basic) on duplicate key update IP='$IP',CPU='$CPU',DISK='$DISK',MEM='$MEM',UP_TIME='$date'";
    $result_basic = mysql_query($sql_basic, $db_link);// or die(message(mysql_error()));
    //echo "$sql";
             
    //更新订阅及状态
    $sql_sub = "insert into  m_sub ($fileds_sub) values ($values_sub) on duplicate key update IP='$IP',SUB='$SUB',UP_TIME='$date'";
    //echo "$sql";
    $result = mysql_query($sql_sub, $db_link);// or die(message(mysql_error()));

    //更新其他信息
    $sql_other = "insert into  m_other ($fileds_other) values ($values_other) on duplicate key update IP='$IP',CHECK_GATEWAY='$CHECK_GATEWAY',PORT80='$PORT80',PORT53='$PORT53',PORT3306='$PORT3306',CHECK_LOGS='$CHECK_LOGS',CHECK_SERVICE='$CHECK_SERVICE',UP_TIME='$date'";
    $result = mysql_query($sql_other, $db_link);// or die(message(mysql_error()));
    //echo "$sql";
        
    //插入数据
    //$row = mysql_fetch_array($result);
    //var_dump($row);
    mysql_close($db_link);

    echo "OK\n";
}
else{
    //判定不合符
    echo "Parameter exception\n";
}
?>
