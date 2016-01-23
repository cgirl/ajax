<?php
header("content-type:text/html;charset=utf-8");
sleep(3);
//print_r($_FILES);

if (empty($_FILES)){
	echo 'no file!';
	exit;
}

$errdesc = $_FILES['pic']['error']?'upload failed!':'upload success!';

echo '<script>'.
'parent.document.getElementsByTagName("h2")[0].innerHTML="'.$errdesc.
'";parent.document.getElementById("progress").innerHTML=""</script>';

?>