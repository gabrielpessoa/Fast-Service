<?php 
include("functions.php");
$dados['id_servico'] = $_GET['i'];
delFavoritos($dados);
?>