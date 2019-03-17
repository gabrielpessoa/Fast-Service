<?php include("functions.php"); ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<title>Cadastro de usuários</title>
	<link rel="stylesheet" href="../css/style.css">
	<script src="js/jquery.js"></script>	
</head>
<body>
	<center>
		<div>
			<h4>Cadastro de usuários</h4>
			<?php if (isset($_SESSION['user_exist'])) : ?>
				<label class="red">Usuário já existe</label>
			<?php endif; unset($_SESSION['user_exist']); ?>
			<?php if (isset($_SESSION['passwords_different'])) : ?>
				<label class="red">Senhas diferentes</label>
			<?php endif; unset($_SESSION['passwords_different']); ?>
			<?php if (isset($_SESSION['email_exist'])) : ?>
				<label class="red">E-mail já existe</label>
			<?php endif; unset($_SESSION['email_exist']); ?>
				
			<form action="register2.php" method="POST">
				<label>Nome de usuário</label><br>
				<input type="text" name="username" required placeholder="Digite aqui"><br>
				<label>E-mail</label><br>
				<input type="text" name="email" required placeholder="Digite aqui"><br>
				<label>Senha</label><br>
				<input type="password" name="password1" required placeholder="Digite aqui"><br>
				<label>Confirme a senha</label><br>
				<input type="password" name="password2" required placeholder="Digite aqui"><br>
				<button type="submit">Cadastrar</button>	
			</form>
		</div>
	</center>
</body>
</html>