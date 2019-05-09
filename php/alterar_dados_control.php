<?php 
include('functions.php');
	$senha = md5($_POST['password']);
	$novasenha = md5($_POST['newpassword']);
	$novasenha2 = md5($_POST['newpassword2']);
	$id = $_SESSION['userId'];
	$dados['userId'] = addslashes($_SESSION['userId']);
	$dados['name'] = addslashes($_POST['nome']);
	$dados['email'] = addslashes($_POST['email']);
	$dados['fone'] = addslashes($_POST['telefone']);

if(empty($_POST['password'])){
	updateUsuario($dados);
	header('location:perfil.php');
}else{
	if($novasenha != $novasenha2) {
		$_SESSION['erro_senha_diferente'] = true;
		header('location:alterar_dados.php');
		exit;
	}

	$stmt = pdoExec('SELECT * FROM USUARIOS WHERE USER_ID =?', [$id]);
	$dado = $stmt -> fetchAll();
	foreach ($dado as $value) {
		if(($novasenha2 == $novasenha) && ($senha==$value['USER_SENHA'])) {
			pdoExec("UPDATE USUARIOS SET USER_SENHA = ? WHERE USER_ID = ?",[$novasenha, $id]);
			updateUsuario($dados);
			$_SESSION['senha_sucesso'] = true;
			header('location:perfil.php');
		}
	 	elseif($senha != $value['USER_SENHA']) {
			$_SESSION['erro_senha'] = true;
			header('location:alterar_dados.php');
		 } 
	}

}
?>
