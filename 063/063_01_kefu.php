<?php
setcookie('username', 'admin');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Strict//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>iframe完成客服功能</title>
</head>
<script>
var xhr = new XMLHttpRequest();

function comet(msg){
	var cont = '';
	//alert(msg);
	cont += '<span onclick="reply(this)">'+msg.post+'</span>'+'对你说：<br />';
	cont += msg.content+'<br />';
	//alert(cont);
	document.getElementById('msgzone').innerHTML = cont;
}

function reply(post){
	//console.log(post);
	document.getElementById('resv').innerHTML = post.innerHTML;
}

 function huifu(){
	var resv = document.getElementById('resv').innerHTML;
	var content = document.getElementsByTagName('textarea')[0].value;
	 if (resv == '' || content==''){
		alert('请选择回复者并填写内容');
		return;
	}
	
	xhr.open('POST', '063_03_sendmsg.php', true);
	xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
	xhr.onreadystatechange = function (){
		if(xhr.readyState == 4){
			if(this.responseText == 'ok'){
				var resp = '';
				resp += '你对'+resv+'</span>'+'说：<br />';
				resp += content+'<br />'; 
				document.getElementById('msgzone').innerHTML += resp;
				document.getElementsByTagName('textarea')[0].value = '';
			} else {
				console.log('状态为：'+this.readyState);
			}
		}
	}
	xhr.send('resv='+resv+'&content='+content); 
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
	<h1>comet反向ajax技术--在线客服系统</h1>
	<h2>特点：界面粗糙，技术不粗糙</h2>
	<h3>原理：iframe+长连接，获取实时内容，并更新到父页面</h3>
	<div id="msgzone"></div>
	回复人:<span id="resv"></span>
	<p><textarea></textarea></p>
	<input type="button" value="回复" onclick="huifu()"/>
	<iframe src="063_02_cometbyiframe.php" width="0" height="0" frameborder="0"></iframe>
</body>
</html>