<?php 
	include("functions.php");
		$servico = $_GET['deletar'];
		
		$stmt = rowCount("DELETE FROM SERVICOS WHERE SRV_ID='$servico'");
		header('location: anuncios.php');
 ?>