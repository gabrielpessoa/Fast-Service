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
	$nome = $dados['nome'];
	$tipo = $dados['tipo'];
	$descricao = $dados['descricao'];
	$localizacao = $dados['localizacao'];
	$preco = $dados['preco'];
	
	if($dados != ''){
		pdoExec("INSERT INTO SERVICOS SET SERVICO_NOME=?, SERVICO_TIPO=?, SERVICO_DESCRICAO=?, SERVICO_LOCALIZACAO=?, SERVICO_PRECO=?, SERVICO_USER_ID=?", [$nome, $tipo, $descricao, $localizacao, $preco, $_SESSION['userId']]);
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
	$username = $data['username'];
	$password = $data['password1'];
	$email = $data['email'];
	$stmt = rowCount("SELECT * FROM USUARIOS WHERE USER_NOME=?", [$username]) > 0;

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
		pdoExec("INSERT INTO USUARIOS SET USER_NOME = ?, USER_SENHA=?, USER_EMAIL=?", [$username, $password, $email]);
		header('location: ../index.php');
	}
}

function login($data){
	$username = $data['username'];
	$password = md5($data['password']);
	$stmt = pdoExec("SELECT * FROM USUARIOS WHERE USER_NOME=?", [$username]);

	if ($stmt->rowCount() > 0) {
		$dados = $stmt -> fetch();
		if ($dados['USER_NOME']==$username && $dados['USER_SENHA']!=$password) {
			$_SESSION['password_incorrect'] = 1;
			header('location: ../index.php');
			exit();
		}
		else{
			$_SESSION['userId'] = $dados['USER_ID'];
			$_SESSION['userName'] = $dados['USER_NOME'];
			$_SESSION['userEmail'] = $dados['USER_EMAIL'];
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
?>