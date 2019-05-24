<?php 
include("functions.php"); 
if (isLogged()) {
	header('location: ../index.php');
	exit();
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<title>Cadastro de usuários</title>
	<link rel="stylesheet" href="../css/style.css">
	<script src="../js/jquery.js"></script>	
	<script src="../js/functions.js"></script>
	<link rel="shortcut icon" type="image/x-png" href="../img/3.png">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <script type="text/javascript" src="../js/jquery.maskedinput-1.1.4.pack.js"/></script>
	
</head>
<body>
	<center>
		<div>
			<nav class="black">
				
				<a href="../index.php"><img src="../img/3.png"></a>
				<ul>
					<li><a href="/"><i class="fas fa-home"></i>Início</a></li>
					<li><a href="ajuda.php"><i class="fas fa-question-circle"></i>Ajuda</a></li>
					<li><a href="register.php"><i class="fas fa-user-plus"></i>Registrar-se</a></li>
					<li><a href="#janela" rel="modal" class="btn-login"><i class="fas fa-user-alt"></i>Login</a></li>
				</ul>
			</nav>
		</div>
		<br>
		<div class="busca">
			<form action="search.php">
				<input type="text" placeholder="  Estou procurando por..." required>
				<button type="submit"><i class="fas fa-search" ></i></button>
			</form>
				<ul class="icons-busca">
				    <li class="icons"> <a href=search.php?search=<?=md5(4);?> > <i class="fas fa-tshirt"></i>Moda e Beleza </a></li>
				    <li class="icons"> <a href=search.php?search=<?=md5(7);?> > <i class="fas fa-volleyball-ball"></i>Esportes e Lazer </a></li>
				    <li class="icons"> <a href=search.php?search=<?=md5(8);?> > <i class="fas fa-mortar-pestle"></i>Culinária </a></li>
				    <li class="icons"> <a href=search.php?search=<?=md5(10);?> ><i class="fas fa-guitar"></i>Músicas e Hobbies </a></li>
				    <li class="icons"> <a href=search.php?search=todos><i class="fas fa-th-list"></i>Todas as Categorias </a></li>
				</ul>
		</div>
			<?php if (isset($_SESSION['user_exist'])) : ?>
				<p class="red">Usuário já existe</p>
			<?php endif; unset($_SESSION['user_exist']); ?>
			<?php if (isset($_SESSION['passwords_different'])) : ?>
				<p class="red">Senhas diferentes</p>
			<?php endif; unset($_SESSION['passwords_different']); ?>
			<?php if (isset($_SESSION['email_exist'])) : ?>
				<p class="red">E-mail já está em uso</p>
			<?php endif; unset($_SESSION['email_exist']); ?>
				
			<div class="cadastro" style="border: solid 1px #babaca; margin-top: 120px;">
				<center>
        		<h2 style="margin: 50px;">Cadastro de usuários</h2>
				<form  method="POST" action="" id="register">
					<p class="primary">Nome</p><br>
					<input type="text" name="name" required placeholder="Seu nome"><br>
					<br><p>Usuário</p>
					<input type="text" name="username" id="username" required="" placeholder="Seu usuario"><br>
					<div class="alerts usuario"></div>
					<br><p>E-mail</p>
					<input type="email" id="email"name="email" required placeholder="Seu e-mail"><br>
					<div class="alerts email"></div>
					<br><p>Telefone para contato</p>
					<input type="tel" name="fone" id="tel" required placeholder="Seu telefone" maxlength="11"><br>
					<br><p>Senha</p>
					<input type="password" id="senhas" name="password1" required placeholder="Sua senha" minlength="6" maxlength="8"><br>
					<br><p>Confirmar senha</p>
					<input type="password" id="senhas" name="password2"  required placeholder="Confirme sua senha" minlength="6" maxlength="8"><br>
					<div class="alerts senhas"></div>
					<br><button type="submit" id="btn-register-user">Cadastrar</button>
				</form>
				</center>
			</div>
	</center>

	<?php include("login.php");?>

	<footer class="rodape">©Copyright 2019</footer>
</body>
</html>