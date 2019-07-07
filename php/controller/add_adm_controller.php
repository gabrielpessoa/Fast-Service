<?php 
include "functions_controller.php";
if(isLogged() && $_SESSION['userTipo'] > 0 ){
	$id = $_GET['id'];
	$valor = 1;
	$stmt =pdoExec("UPDATE USUARIOS SET USER_TIPO=? WHERE md5(USER_ID)=?", [$valor, $id]);
	header('location: ../view/gerencia_usuario_view.php');
}	

 ?>