<?php 
include("functions_controller.php");
$dados['id_servico'] = $_GET['i'];
delFavoritos($dados);
?>