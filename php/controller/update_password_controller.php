<?php  
include("functions_controller.php");
$id = $_POST['id'];
if ($_POST['senha']==$_POST['senha2'] && !empty($_POST['senha']) && !empty($_POST['senha2'])) {
	$stmt = pdoExec("SELECT * FROM USUARIOS WHERE md5(USER_ID)=? AND USER_RESET_PW=?", [$id, 0]);
	if ($stmt->rowCount()>0) {
		echo "link usado";
		exit();
	}
	pdoExec("UPDATE USUARIOS SET USER_SENHA=?, USER_RESET_PW=? WHERE md5(USER_ID)=?", [md5($_POST['senha']), 0, $id]);
	echo "alterada com sucesso";
}
else{
	echo "senhas diferentes";
}
?>