<?php  
include('functions.php');
if (isset($_POST['cadastrar'])) {
	$foto = $_FILES["foto"];
	$dados['name'] = addslashes($_POST['name']);
	$dados['type'] = addslashes($_POST['type']);
	$dados['description'] = addslashes($_POST['description']);
	$dados['location'] = addslashes($_POST['location']);
	$dados['price'] = addslashes($_POST['price']);
	$dados['user_id'] = addslashes($_SESSION['userId']);
	addServico($dados, $foto);
}
?>