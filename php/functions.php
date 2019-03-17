<?php 
session_start();
$conn = new PDO("mysql: host=localhost;dbname=FASTSERVICE", 'service', '049633');

function conexao(){
	global $conn;
	return $conn;
}

function pdoExec($prepare, $execute){
	$stmt = conexao()->prepare($prepare);
	$stmt -> execute($execute);
	return $stmt;
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
		pdoExec("INSERT INTO USUARIOS SET USER_NOME = ?, USER_SENHA=?, USER_EMAIL=?", [$username, $password, $email]);
	}
	

}

?>