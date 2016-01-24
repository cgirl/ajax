<?php
header('content-type:text/html;charset=utf-8');
//接收文件并合并

if(!file_exists('up.wmv')){
	move_uploaded_file($_FILES['part']['tmp_name'], 'upload/up.wmv');
} else {
	file_put_contents('upload/up.wmv', file_get_contents($_FILES['part']['tmp_name']), FILE_APPEND);
}

echo 'ok!';
?>