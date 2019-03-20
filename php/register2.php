<?php  
include('functions.php');
$dados['username'] = $_POST['username'];
$dados['password1'] = md5($_POST['password1']);
$dados['email'] = $_POST['email'];

if ($_POST['password1']==$_POST['password2']) {
	addUser($dados);
}
else{
	$_SESSION['passwords_different'] = 1;
	header('location: register.php');
}

?>