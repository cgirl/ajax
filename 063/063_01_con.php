<?php
header('content-type:text/html;charset=utf-8');

$conn = mysql_connect('localhost', 'root', '123456');
mysql_query('set names utf8', $conn);
mysql_query('use test', $conn);

?>