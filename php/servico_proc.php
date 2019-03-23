<?php  
include('functions.php');

$dados['name'] = addslashes($_POST['name']);
$dados['type'] = addslashes($_POST['type']);
$dados['description'] = addslashes($_POST['description']);
$dados['location'] = addslashes($_POST['location']);
$dados['price'] = addslashes($_POST['price']);
$dados['user_id'] = addslashes($_POST['user_id']);

addServico($dados);

?>