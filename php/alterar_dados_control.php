<?php 
 include('functions.php');
$senha = $_POST['password'];
$novasenha = $_POST['newpassword'];
$novasenha2 = $_POST['newpassword2'];
$dados['userId'] = $_SESSION['userId'];
$dados['name'] = $_POST['nome'];
$dados['email'] = $_POST['email'];
$dados['fone'] = $_POST['telefone'];

if(empty($senha) {
 	if($novasenha != $novasenha2) {
		$_SESSION['erro_senha_diferente'] = true;
		header('location:alterar_senha.php');
		exit;
	}

	$stmt = pdoExec('SELECT * FROM USUARIOS WHERE USER_ID =?', [$dados['userId']]);
	$dados = $stmt -> fetchAll();
	foreach ($dados as $value) {
		if($novasenha2 == $novasenha && $senha==$value['USER_SENHA']){
			pdoExec('UPDATE USUARIOS SET USER_SENHA =? WHERE USER_ID =?', [md5($novasenha), $dados['userId']]);
			$_SESSION['senha_sucesso'] = true;
			header('location:perfil.php');
		}
	 	elseif($senha != $value['USER_SENHA']){
			$_SESSION['erro_senha'] = true;
			header('location:alterar_senha.php');
			exit;
		 } 
	}

	updateUsuario($dados);

}else{
	if($novasenha != $novasenha2) {
		$_SESSION['erro_senha_diferente'] = true;
		header('location:alterar_senha.php');
		exit;
	}

	$stmt = pdoExec('SELECT * FROM USUARIOS WHERE USER_ID =?', [$dados['userId']]);
	$dados = $stmt -> fetchAll();
	foreach ($dados as $value) {
		if($novasenha2 == $novasenha && $senha==$value['USER_SENHA']){
			pdoExec('UPDATE USUARIOS SET USER_SENHA =? WHERE USER_ID =?', [md5($novasenha), $dados['userId']]);
			$_SESSION['senha_sucesso'] = true;
			header('location:perfil.php');
		}
	 	elseif($senha != $value['USER_SENHA']){
			$_SESSION['erro_senha'] = true;
			header('location:alterar_senha.php');
			exit;
		 } 
	}
}
?>