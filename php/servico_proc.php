<?php  
include('functions.php');
if (isset($_POST['cadastrar'])) {
	$foto = $_FILES["foto"];
	$dados['name'] = addslashes($_POST['name']);
	$dados['type'] = addslashes($_POST['type']);
	$dados['description'] = addslashes($_POST['description']);
	$dados['price'] = addslashes($_POST['price']);
	$dados['user_id'] = addslashes($_SESSION['userId']);
	$dados['subtype'] = addslashes($_POST['subtype']);
	$dados["cep"] = addslashes($_POST["cep"]);
	$dados["numero"] = addslashes($_POST["numero"]);
	$dados["logradouro"] = addslashes($_POST["logradouro"]);
	$dados["bairro"] = addslashes($_POST["bairro"]);
	$dados["cidade"] = addslashes($_POST["cidade"]);
	$dados["estado"] = addslashes($_POST["estado"]);
	addServico($dados, $foto);
}
?>