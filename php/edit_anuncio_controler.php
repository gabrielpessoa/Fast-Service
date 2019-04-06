<?php
include("functions.php");
$dados['id_servico'] = addslashes($_POST['id']);
$dados['name'] = addslashes($_POST['name']);
$dados['description'] = addslashes($_POST['description']);
$dados['location'] = addslashes($_POST['location']);
$dados['price'] = addslashes($_POST['price']);
updateServico($dados);
?>