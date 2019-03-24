<?php include("php/functions.php"); ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<title>Fast-Service</title>
	
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="demo-files/demo.css">
	<script src="js/jquery.js"></script>
	<script src="js/functions.js"></script>
	<link rel="shortcut icon" type="image/x-png" href="img/3.png">
</head>
<body>
	<div>
		<nav class="black">
			
			<a href="index.php"><img src="img/3.png"></a>
			<ul>
				<li><a href="#">Início</a></li>
				<li><a href="#">Sobre</a></li>
				<?php if (isLogged() ){ ?>
					<li><a href="php/perfil.php">Minha conta</a></li>
					<li><a href="php/servico.php">Anunciar</a></li>
					<li><a href="php/logout.php" class="btn-login">Sair</a></li>
				<?php } else{ ?>
				<li><a href="php/register.php">Registrar-se</a></li>
				<li><a href="#janela" rel="modal" class="btn-login">Login</a></li>
			<?php } ?>
			</ul>
			
		</nav>
	</div>

		<center>
			<div class="header-bg">
			<h2><label>F</label>ast -</h2><br>
			<h3><label>S</label>ervice</h3>
		</div>
			<br><div class="busca">
				<form action="">
					<input type="text" placeholder="  Estou procurando por..." required>

					<button type="submit"><i class="icon icon-search" ></i></button>
				</form>
			</div>
		</center>
			<?php 
			if (isset($_SESSION['user_invalid'])) {
				echo "<script>alert('Usuário não existe')</script>";
				unset($_SESSION['user_invalid']);
			}
			elseif(isset($_SESSION['password_incorrect'])){
				echo "<script>alert('Senha incorreta')</script>";
				unset($_SESSION['password_incorrect']);
			}
			elseif(isset($_SESSION['add_user'])){
				echo "<script>alert('Cadastrado com sucesso')</script>";
				unset($_SESSION['add_user']);
			}
			?>
		
				
	<div class="window" id="janela">
		<center>
			<a href="#" class="fechar">X</a>
			<h4>Login</h4>
			<hr>
			<form action="php/login2.php" method="POST">
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