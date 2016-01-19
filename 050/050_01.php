<?php
$cnt = file_get_contents('ret.txt');
$cnt += 1;
file_put_contents('ret.txt', $cnt);

//利用http协议的204特性
//header('HTTP/1.1 204 No Contents')
?>