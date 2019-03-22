<?php include("php/functions.php"); ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<title>Fast-Service</title>
	
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<script src="js/jquery.js"></script>
	<script src="js/functions.js"></script>
</head>
<body style="background: transparent;">
	<div>
		<nav>
			
			<a href="index.php"><img src="img/1.jpeg"></a>
			<ul>
				<li><a href="#">Início</a></li>
				<li><a href="#">Sobre</a></li>
				<?php if (isLogged() ){ ?>
					<li><a href="php/perfil.php">Minha conta</a></li>
					<li><a href="php/logout.php" class="btn-login">Sair</a></li>
				<?php } else{ ?>
				<li><a href="php/register.php">Registrar-se</a></li>
				<li><a href="#janela" rel="modal" class="btn-login">Login</a></li>
			<?php } ?>
			</ul>
			
		</nav>

		<div class="header-bg">
			<h2><label>F</label>ast -</h2><br>
			<h3><label>S</label>ervice</h3>
		</div>
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
		<section>
			<h2>Fast-Service</h2>
			<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
			<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PcageMaker including versions of Lorem Ipsum.</p>
		</section>
	</div>
	
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