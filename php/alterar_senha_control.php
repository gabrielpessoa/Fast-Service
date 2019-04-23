<?php 
 include('functions.php');
$senha = $_POST['password'];
$novasenha = $_POST['newpassword'];
$novasenha2 = $_POST['newpassword2'];
$usuario = $_SESSION['userId'];

 if($novasenha != $novasenha2) {
	$_SESSION['erro_senha_diferente'] = true;
	header('location:alterar_senha.php');
	exit;
}

$stmt = pdoExec('SELECT * FROM USUARIOS WHERE USER_ID =?', [$usuario]);
$dados = $stmt -> fetchAll();
foreach ($dados as $value) {
	if($novasenha2 == $novasenha){
		pdoExec('UPDATE USUARIOS SET USER_SENHA =? WHERE USER_ID =?', [$novasenha, $usuario]);
		$_SESSION['senha_sucesso'] = true;
		header('location:perfil.php');
	}
 	elseif($senha != $value['USER_SENHA']){
		$_SESSION['erro_senha'] = true;
		header('location:alterar_senha.php');
		exit;
	 } 


}
?>