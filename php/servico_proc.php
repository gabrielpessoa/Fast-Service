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
	
	$tags1 = addslashes($_POST["tags1"]);
	$tags2 = addslashes($_POST["tags2"]);
	$tags3 = addslashes($_POST["tags3"]);

	$id = $id_servico;
	$tags = pdoExecReturn("SELECT * FROM PALAVRAS_CHAVE WHERE PAC_NOME = ? OR PAC_NOME = ? OR PAC_NOME = ?", [$tags1, $tags2, $ags3]);
	foreach ($tags as $tag) {
		var_dump($tag);
		echo "<br>";
	} 
?>