<?php
header('content-type:text/html;charset=utf-8');

set_time_limit(0);

require './064_00_con.php';

$resv = $_COOKIE['username'];

$sql = "select * from msg where flag=0 and resv='$resv' limit 1";

while (true){
	$res = mysql_query($sql, $conn);
	$rs = mysql_fetch_assoc($res);

	if (!empty($rs)){
		echo json_encode($rs);
		
		$sql = "update msg set flag=1 where mid=".$rs['mid'];
		mysql_query($sql, $conn);
		
		break;
	}
	sleep(1);
}
?>