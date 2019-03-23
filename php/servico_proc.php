<?php  
include('functions.php');

$dados['name'] = addslashes($_POST['nome']);
$dados['tipo'] = addslashes($_POST['tipo']);
$dados['descricao'] = addslashes($_POST['descricao']);
$dados['localizacao'] = addslashes($_POST['localizacao']);
$dados['preco'] = addslashes($_POST['preco']);

addServico($dados);

?>