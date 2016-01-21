<?php
header('content-type:text/html;charset=utf-8');
/*
 * 从数据库取出n条数据
 */
$news = array('新闻1','新闻2','新闻3');
foreach($news as $k=>$v){
	echo '<li>'.$v.'</li>';
}
?>