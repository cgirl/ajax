<?php
/*
*/
require './063_01_con.php';

set_time_limit(0);
ob_start();
/* 关闭缓存
echo str_repeat(' ', 8000).'<br />';
ob_flush();
flush(); */

while(true){
	$sql = 'select * from msg where resv="admin" and flag = 0';
	$res = mysql_query($sql, $conn);
	$msg = mysql_fetch_assoc($res);
	if (!empty($msg)){
		$updsql = 'update msg set flag = 1 where flag=0 and mid='.$msg['mid'].' limit 1';
		mysql_query($updsql, $conn);
		
		$msg = json_encode($msg);
		echo '<script>';
		echo 'parent.window.comet('.$msg.')';
		echo '</script>';
		ob_flush();
		flush();
	}

	sleep(1);
}

?>