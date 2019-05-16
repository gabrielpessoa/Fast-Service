<?php 
	include("functions.php");
	if ($_SESSION['userTipo'] > 0) {
		if (isset($_GET['categoria'])) {
			$categoria = $_GET['categoria'];
			$stmt = pdoExec("INSERT INTO CATEGORIAS SET CTG_NOME=?",[$categoria]);
			$_SESSION['ctg_cadastrada']=true;
			header('location: addCategoria.php');
		}elseif (isset($_POST['enviar'])) {
			$subCategoria = $_POST['subCategoria'];
			$categoria = $_POST['type'];
			$stmt = pdoExec("INSERT INTO SUBCATEGORIAS SET SCTG_NOME=?, SCTG_CTG_ID=?",[$subCategoria, $categoria]);
			$_SESSION['sctg_cadastrada']=true;
			header('location: addCategoria.php');
		}
	}
 ?>