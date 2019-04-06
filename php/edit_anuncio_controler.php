<?php
include("functions.php");
$dados['name'] = addslashes($_POST['name']);
$dados['description'] = addslashes($_POST['description']);
$dados['location'] = addslashes($_POST['location']);
$dados['price'] = addslashes($_POST['price']);
$dados['id_servico'] = addslashes($_POST['id_servico']);
updateServico($dados);
?>