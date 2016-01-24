<?php
/*
comet反向ajax
又叫服务器推技术，server push

服务器端：
1.不要断开连接
2.有消息时再发送

原理：HTTP/1.1的长连接与chunk传输
chunk有切割分块的意思
就是说---服务器端到底要传输多少length给浏览器，只能每次只传一小块chunk

具体做法：
php用一个死循环，始终运行，有相关消息时，立即把内容推到浏览器上
*/
require './062_02_con.php';

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
	if (empty($msg)){
	} else {
		echo $msg['post'].'说：'.$msg['content'].'<br />';
		ob_flush(); //强迫php把内容发给apache
		flush(); //强迫apache将内容发送给浏览器
		
		$updsql = 'update msg set flag = 1 where mid='.$msg['mid'];
		mysql_query($updsql, $conn);
	}

	sleep(1);
}

?>