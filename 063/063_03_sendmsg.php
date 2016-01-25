<?php
header('content-type:text/html;charset=utf-8');

require './063_01_con.php';

$resv = $_POST['resv'];
$content = $_POST['content'];
$post = $_COOKIE['username'];

$sql = "insert into msg (resv, post, content) 
		values ('$resv', '$post','$content')";
echo mysql_query($sql, $conn)?'ok':'fail';
?>