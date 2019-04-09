<?php 
include("functions.php");
$img = $_GET['i'];
pdoExec("DELETE FROM IMAGENS WHERE IMG_NOME=?", [$img]);
header('location: anuncios.php');
unlink($img);
?>