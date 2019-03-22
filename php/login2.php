<?php 
include("functions.php");
$dados['username'] = addslashes($_POST['username']);
$dados['password'] = addslashes($_POST['password']);
login($dados);
?>