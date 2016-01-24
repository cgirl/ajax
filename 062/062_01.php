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
set_time_limit(0);
ob_start();
echo str_repeat(' ', 4000).'<br />';
ob_flush();
flush();

$i = 0;
while(true){
	echo str_repeat(' ', 4000).'<br />';
	echo $i++.'<br />';
	ob_flush(); //强迫php把内容发给apache
	flush(); //强迫apache将内容发送给浏览器
	sleep(1);
}

?>