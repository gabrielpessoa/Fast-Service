<?php 
session_start();
$conn = new PDO("mysql: host=localhost;dbname=FASTSERVICE", 'root', '');

function conexao(){
	global $conn;
	return $conn;
}

function pdoExec($prepare, $execute){
	$stmt = conexao()->prepare($prepare);
	$stmt -> execute($execute);
	return $stmt;
}

function addServico($dados){
	$nome = $dados['name'];
	$tipo = $dados['type'];
	$descricao = $dados['description'];
	$localizacao = $dados['location'];
	$preco = $dados['price'];
	$arquivo = $dados['foto'];
	$usuario = $dados['user_id'];
	
	if(!empty($dados)){
		pdoExec("INSERT INTO SERVICOS SET SRV_NOME=?, SRV_CATEGORIA=?, SRV_DESCRICAO=?, SRV_LOCALIZACAO=?, SRV_PRECO=?, SRV_IMAGEM=?, SRV_USER_ID=?", [$nome, $tipo, $descricao, $localizacao, $preco, $arquivo, $usuario]);
		header('location: ../index.php');
	}else{
		header('location: servico.php');
	}
}

function rowCount($prepare, $execute = []){
	$stmt = pdoExec($prepare, $execute)->rowCount();
	return $stmt;
}

function addUser($data){
	$name = $data['name'];
	$username = $data['username'];
	$password = $data['password1'];
	$email = $data['email'];
	$fone = $data['fone'];
	$stmt = rowCount("SELECT * FROM USUARIOS WHERE USER_USUARIO=?", [$username]) > 0;

	if ($stmt) {
		$_SESSION['user_exist'] = 1;
		header('location: register.php');
 		exit();
	}
	$stmt = rowCount("SELECT * FROM USUARIOS WHERE USER_EMAIL=?", [$email]) > 0;
	if ($stmt) {
		$_SESSION['email_exist'] = 1;
		header('location: register.php');
		exit();
	}
	else{
	    $_SESSION['add_user'] = 1;
		pdoExec("INSERT INTO USUARIOS SET USER_NOME = ?, USER_USUARIO =?, USER_SENHA=?, USER_EMAIL=?, USER_TELEFONE=?", [$name, $username, $password, $email, $fone]);
		header('location: ../index.php');
	}
}

function login($data){
	$username = $data['username'];
	$password = md5($data['password']);
	$stmt = pdoExec("SELECT * FROM USUARIOS WHERE USER_USUARIO=?", [$username]);

	if ($stmt->rowCount() > 0) {
		$dados = $stmt -> fetch();
		if ($dados['USER_USUARIO']==$username && $dados['USER_SENHA']!=$password) {
			$_SESSION['password_incorrect'] = 1;
			header('location: ../index.php?i='.$password);
			exit();
		}
		else{
			$_SESSION['userId'] = $dados['USER_ID'];
			$_SESSION['userName'] = $dados['USER_NOME'];
			$_SESSION['userEmail'] = $dados['USER_EMAIL'];
			$_SESSION['userFone'] = $dados['USER_TELEFONE'];
			$_SESSION['userLogin'] = $dados['USER_USUARIO'];
			header('location: ../index.php');
		}
	}
	else{
		$_SESSION['user_invalid'] = 1;
		header('location: ../index.php');
		exit();
	}
}

function isLogged(){
	if (isset($_SESSION['userName'])) {
		return true;
	}
	else{
		return false;
	}
}

function logout(){
	session_destroy();
	header('location: /');
}

function addComentario($data){
	$comentario = $data['comentario'];
	$usuario = $_SESSION['userId'];
	$servico = $data['id_servico'];
	$stmt = pdoExec("INSERT INTO COMENTARIOS SET CMT_COMENTARIO = ?, CMT_USER_ID = ?, CMT_SRV_ID=? ", [$comentario, $usuario, $servico]);
	header('location:'.$_SERVER['HTTP_REFERER']);

}
