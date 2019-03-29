<?php 
include("functions.php"); 
if (isLogged()) {
	header('location: /');
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
</head>
<body>
	<center>
		<div>
		<nav class="black">
			
			<a href="../index.php"><img src="../img/3.png"></a>
			<ul>
				<li><a href="../index.php">Início</a></li>
				<li><a href="sobre.php">Sobre</a></li>
				<li><a href="ajuda.php">Ajuda</a></li>
				<li><a href="register.php">Registrar-se</a></li>
				<li><a href="#janela" rel="modal" class="btn-login">Login</a></li>
			</ul>
			
		</nav>
			<label>.</label>
			<?php if (isset($_SESSION['user_exist'])) : ?>
				<script> alert("Usuário já existe"); </script>
			<?php endif; unset($_SESSION['user_exist']); ?>
			<?php if (isset($_SESSION['passwords_different'])) : ?>
				<script> alert("Senhas diferentes"); </script>
			<?php endif; unset($_SESSION['passwords_different']); ?>
			<?php if (isset($_SESSION['email_exist'])) : ?>
				<script> alert("E-mail já está em uso"); </script>
			<?php endif; unset($_SESSION['email_exist']); ?>
				
			<div class="cadastro" style="border: solid 1px #babaca; margin-top: 120px;">
        		
            		
			<form action="register2.php" method="POST">
				<p class="primary">Nome</p><br>
				<input type="text" name="name" placeholder="Digite aqui"><br>
				<br><p>Usuário</p>
				<input type="text" name="username" required placeholder="Digite aqui"><br>
				<br><p>E-mail</p>
				<input type="text" name="email" required placeholder="Digite aqui"><br>
				<br><p>Telefone</p>
				<input type="text" name="fone" required placeholder="Digite aqui"><br>
				<br><p>Senha</p>
				<input type="password" name="password1" required placeholder="Digite aqui"><br>
				<br><p>Confirmar senha</p>
				<input type="password" name="password2"  required placeholder="Digite aqui"><br>
				<button type="submit">Cadastrar</button>
			</form>

			</div>
		</div>
	</center>
		<div class="window" id="janela">
		<center>
			<a href="#" class="fechar">X</a>
			<h4>Login</h4>
			<hr>
			<form action="login2.php" method="POST">
				<p>Usuário</p><br>
				<input type="text" name="username" placeholder="Digite aqui"><br>
				<p>Senha</p><br>
				<input type="password" name="password" placeholder="Digite aqui"><br>
				<button type="submit">Entrar</button><br>
				<a href="#">Esqueceu sua senha?</a>
			</form>
		</center>
	</div>

	<div id="mascara">
		
	</div>

	<footer class="rodape">©Copyright 2019</footer>
</body>
</html>