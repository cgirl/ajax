<?php
header('content-type:text/html;charset=utf-8');
/*
 * javascript object notation
 */
$book = array('title'=>'天龙八部', 'intro'=>'人生太酷了');
echo json_encode($book);
?>
<?php
//{title:'天龙八部',intro:'人生苦短'}
?>