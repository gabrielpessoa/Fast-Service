<?php 
include("functions_controller.php");
$img = $_GET['i'];
pdoExec("DELETE FROM IMAGENS WHERE IMG_NOME=?", [$img]);
header('location: ../view/anuncios_view.php');
unlink($img);
?>