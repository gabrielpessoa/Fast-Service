<?php include("functions.php"); ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<title>Cadastro de usuários</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="../css/styleLogin.css">
	<link rel="stylesheet" href="../css/style.css">
	<script src="../js/jquery.js"></script>	
	<script src="../js/functions.js"></script>	
</head>
<body>
	<center>
		<div>
		<nav>
			
			<img src="../img/1.jpeg">
			<ul>
				<li><a href="../index.php">Início</a></li>
				<li><a href="#">Sobre</a></li>
				<li><a href="register.php">Registrar-se</a></li>
				<?php if (isLogged() ){ ?>
					<li><a href="perfil.php">Minha conta</a></li>
					<li><a href="logout.php" class="btn-login">Sair</a></li>
				<?php } else{ ?>
				<li><a href="login.php" class="btn-login">Login</a></li>
			<?php } ?>
			</ul>
			
		</nav>
			<label>Cadastro de usuários</label>
			<?php if (isset($_SESSION['user_exist'])) : ?>
				<label class="red">Usuário já existe</label>
			<?php endif; unset($_SESSION['user_exist']); ?>
			<?php if (isset($_SESSION['passwords_different'])) : ?>
				<label class="red">Senhas diferentes</label>
			<?php endif; unset($_SESSION['passwords_different']); ?>
			<?php if (isset($_SESSION['email_exist'])) : ?>
				<label class="red">E-mail já existe</label>
			<?php endif; unset($_SESSION['email_exist']); ?>
				
			<div class="wrapper fadeInDown" style="width: 650px; height: 650px;">
        		<div id="formContent">
            		<div class="fadeIn first">
                		<img src="../img/1.jpeg" id="icon" alt="User Icon" />
            		</div>

					<form action="register2.php" method="POST">
						<label>Nome de usuário</label><br>
						<input type="text" name="username" id="login" class="fadeIn second" required placeholder="Digite aqui"><br>
						<label>E-mail</label><br>
						<input type="text" name="email" id="login" class="fadeIn third" required placeholder="Digite aqui"><br>

						<label>Senha</label><br>
						<input type="text" name="password1" id="login" class="fadeIn second" required placeholder="Digite aqui"><br>
						<label>Confirme a senha</label><br>
						<input type="text" name="password2" id="login" class="fadeIn third" required placeholder="Digite aqui"><br>
						<input type="submit" class="fadeIn fourth" value="Cadastrar">
					</form>

	      		</div>
			</div>
		</div>
	</center>
</body>
</html>