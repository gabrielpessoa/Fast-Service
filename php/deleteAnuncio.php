<?php 
	include("functions.php");
		$servico = $_SESSION['SRV_ID'];

		$stmt = rowCount("DELETE FROM SERVICOS WHERE SRV_ID='$servico'");
		header('location: anuncios.php');
 ?>