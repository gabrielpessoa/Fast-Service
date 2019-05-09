<?php
include('functions.php');

$id = $_POST['id'];
$comentario = $_POST['comentario'];
pdoExec('UPDATE COMENTARIOS SET CMT_COMENTARIO = ? WHERE CMT_ID=?', [$comentario, $id]);

?>