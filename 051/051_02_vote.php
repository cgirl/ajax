<?php
header("content-type:text/html;charset=utf-8");

sleep(3);
if (rand(1, 10) < 4){
	echo '0';
} else {
	$cnt = file_get_contents('ret.txt');
	$cnt += 1;
	$res = file_put_contents('ret.txt', $cnt);
	echo $cnt;
}


?>