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

	$tag1 = addslashes($_POST["tag1"]);
	$tag2 = addslashes($_POST["tag2"]);
	$tag3 = addslashes($_POST["tag3"]);

	$id_servico = addServico($dados, $foto);
	$id = $id_servico;
	$tags = pdoExecReturn("SELECT * FROM PALAVRAS_CHAVE WHERE PAC_NOME = ? OR PAC_NOME = ? OR PAC_NOME = ?", [$tag1, $tag2, $tag3]);
	foreach ($tags as $tag) {
		if($tag['PAC_NOME']==$tag1){
			$stmt = pdoExec("INSERT INTO SERVICOS_PALAVRAS_CHAVE SET SPC_SRV_ID=?, SPC_PAC_ID=? ", [$id, $tag['PAC_ID']]);
		}else{
			$stmt = pdoExec("INSERT INTO PALAVRAS_CHAVE SET PAC_NOME=? ", [$tag1]);
			$stmt1 = pdoExecReturn("SELECT PAC_ID FROM PALAVRAS_CHAVE WHERE PAC_NOME=? ", [$tag1]);
			$idPac = $stmt1[0]['PAC_ID'];
			$stmt2 = pdoExec("INSERT INTO SERVICOS_PALAVRAS_CHAVE SET SPC_SRV_ID=?, SPC_PAC_ID=? ", [$id, $idPac]);
		}
		if($tag['PAC_NOME']==$tag2){
			$stmt = pdoExec("INSERT INTO SERVICOS_PALAVRAS_CHAVE SET SPC_SRV_ID=?, SPC_PAC_ID=? ", [$id, $tag['PAC_ID']]);
		}else{
			$stmt = pdoExec("INSERT INTO PALAVRAS_CHAVE SET PAC_NOME=? ", [$tag2]);
			$stmt1 = pdoExecReturn("SELECT PAC_ID FROM PALAVRAS_CHAVE WHERE PAC_NOME=? ", [$tag2]);
			$idPac = $stmt1[0]['PAC_ID'];
			$stmt2 = pdoExec("INSERT INTO SERVICOS_PALAVRAS_CHAVE SET SPC_SRV_ID=?, SPC_PAC_ID=? ", [$id, $idPac]);
		}
		if($tag['PAC_NOME']==$tag3){
			$stmt = pdoExec("INSERT INTO SERVICOS_PALAVRAS_CHAVE SET SPC_SRV_ID=?, SPC_PAC_ID=? ", [$id, $tag['PAC_ID']]);
		}else{
			$stmt = pdoExec("INSERT INTO PALAVRAS_CHAVE SET PAC_NOME=? ", [$tag3]);
			$stmt1 = pdoExecReturn("SELECT PAC_ID FROM PALAVRAS_CHAVE WHERE PAC_NOME=? ", [$tag3]);
			$idPac = $stmt1[0]['PAC_ID'];
			$stmt2 = pdoExec("INSERT INTO SERVICOS_PALAVRAS_CHAVE SET SPC_SRV_ID=?, SPC_PAC_ID=?", [$id, $idPac]);
		}
	}
	header('location: anuncios.php'); 
 }
?>