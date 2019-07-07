<?php 
include("functions_controller.php");
if(empty($_POST['username']) && empty($_POST['password'])){
	exit();
}
$dados['username'] = addslashes($_POST['username']);
$dados['password'] = addslashes($_POST['password']);
login($dados);
?>