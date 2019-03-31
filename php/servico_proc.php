<?php  
include('functions.php');

if (isset($_POST['cadastrar'])) {
	$foto = $_FILES["foto"];
	if (!empty($foto["name"])) {
			preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i", $foto["name"], $ext);

        	$nome_imagem = md5(uniqid(time())) . "." . $ext[1];
        	$caminho_imagem = "../produtos/img/" . $nome_imagem;

			move_uploaded_file($foto["tmp_name"], $caminho_imagem);					
	}
		$dados['name'] = addslashes($_POST['name']);
		$dados['type'] = addslashes($_POST['type']);
		$dados['description'] = addslashes($_POST['description']);
		$dados['location'] = addslashes($_POST['location']);
		$dados['price'] = addslashes($_POST['price']);
		$dados['foto'] = addslashes($nome_imagem);
		$dados['user_id'] = addslashes($_SESSION['userId']);
	addServico($dados);
}



?>