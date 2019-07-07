<?php 
include('functions_controller.php');
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
	header('location: ../view/perfil_view.php');
}else{
	if($novasenha != $novasenha2) {
		$_SESSION['erro_senha_diferente'] = true;
		header('location: ../view/alterar_dados_view.php');
		exit;
	}

	$stmt = pdoExec('SELECT * FROM USUARIOS WHERE USER_ID =?', [$id]);
	$dado = $stmt -> fetchAll();
	foreach ($dado as $value) {
		if(($novasenha2 == $novasenha) && ($senha==$value['USER_SENHA'])) {
			pdoExec("UPDATE USUARIOS SET USER_SENHA = ? WHERE USER_ID = ?",[$novasenha, $id]);
			updateUsuario($dados);
			$_SESSION['senha_sucesso'] = true;
			header('location: ../view/perfil_view.php');
		}
	 	elseif($senha != $value['USER_SENHA']) {
			$_SESSION['erro_senha'] = true;
			header('location: ../view/alterar_dados_view.php');
		 } 
	}

}
?>
