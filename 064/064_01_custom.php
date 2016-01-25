<?php
header("content-type:text/html;charset=utf-8");
if (empty($_COOKIE['username'])){
	setcookie('username', 'user'.rand(10000, 99999));
}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Strict//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>iframe完成客服功能</title>
</head>
<script type="text/javascript" src="http://libs.baidu.com/jquery/1.7.2/jquery.min.js"></script>
<script type="text/javascript">
//长轮询
$(function(){
	var setting = {
		url:'064_03_cometbyajax.php',
		dataType:'json',
		success:function (res){
			$('<p>客服对你说：<br />'+res.content+'</p>').appendTo($('#msgzone'));
			window.setTimeout($.ajax(setting), 1000);
		}
	};
	$.ajax(setting);
});

function xunwen(){
	var cont = $('textarea:first').val();
	$.post('064_02_sendmsg.php', {resv:'admin', content:cont}, function(res){
		if(res == 'ok'){
			$('<p>你对客服说:<br />'+cont+'</p>').appendTo($('#msgzone'));
		}
	});
}
</script>
<style>
#msgzone{
	border:1px solid gray;
	width:500px;
	height:300px;
	overflow:scroll;
}
</style>
<body>
	<h1>comet反向ajax技术--在线客服系统--之用户端</h1>
	<h3>原理：ajax+长连接+轮询（长轮询），获取实时内容，并更新到父页面</h3>
	<div id="msgzone"></div>
	回复人:<span id="resv"></span>
	<p><textarea></textarea></p>
	<input type="button" value="询问" onclick="xunwen()"/>
</body>
</html>