<?php 
include "functions.php";
if(isLogged() && $_SESSION['userTipo'] == 2 ){
	$id = $_GET['id'];
	$valor = 0;
	$stmt =pdoExec("UPDATE USUARIOS SET USER_TIPO=? WHERE md5(USER_ID)=?", [$valor, $id]);
	header('location: gerenciaUser.php');
}
 ?>
