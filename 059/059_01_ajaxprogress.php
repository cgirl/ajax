<?php
header('content-type:text/html;charset=utf-8');
//print_r($_FILES);exit;
if (empty($_FILES)){
	exit('no files');
}

if ($_FILES['pic']['error'] != 0){
	exit('failed');
}

move_uploaded_file($_FILES['pic']['tmp_name'], 'upload/'.$_FILES['pic']['name']);
?>