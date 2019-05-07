<?php
include('functions.php');  
$id = $_GET['i'];
pdoExec('DELETE FROM COMENTARIOS WHERE md5(CMT_ID) = ?', [$id]);
header('location:'.$_SERVER['HTTP_REFERER']);

?>