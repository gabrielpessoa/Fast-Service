<?php
include("functions_controller.php");
$dados['name'] = addslashes($_POST['name']);
$dados['description'] = addslashes($_POST['description']);
$dados['location'] = addslashes($_POST['location']);
$dados['price'] = addslashes($_POST['price']);
$dados['id_servico'] = addslashes($_POST['id_servico']);
$dados['type'] = addslashes($_POST['type']);
$dados['subtype'] = addslashes($_POST['subtype']);
$dados['cep'] = addslashes($_POST['cep']);
$dados['numero'] = addslashes($_POST['numero']);
$dados['logradouro'] = addslashes($_POST['logradouro']);
$dados['bairro'] = addslashes($_POST['bairro']);
$dados['cidade'] = addslashes($_POST['cidade']);
$dados['estado'] = addslashes($_POST['estado']);
$img = $_FILES['img'];

updateServico($dados, $img);
?>