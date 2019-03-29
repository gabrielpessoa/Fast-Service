<?php  
include('functions.php');
$dados['name'] = addslashes($_POST['name']);
$dados['username'] = addslashes($_POST['username']);
$dados['password1'] = addslashes(md5($_POST['password1']));
$dados['email'] = addslashes($_POST['email']);
$dados['fone'] = addslashes($_POST['fone']);

if ($_POST['password1']==$_POST['password2']) {
	addUser($dados);
}
else{
	$_SESSION['passwords_different'] = 1;
	header('location: register.php');
}

?>