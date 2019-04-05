<?php include("functions.php"); ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<title>Fast-Service</title>
	
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	<script src="../js/jquery.js"></script>
	<script src="../js/functions.js"></script>
	<link rel="shortcut icon" type="image/x-png" href="img/3.png">
	<link rel="stylesheet" href="../fontawesome/css/all.css">
</head>
<body>
	<div>
		<nav>
			
			<a href="index.php"><img src="../img/3.png"></a>
			<ul>
				<li><a href="/">Início</a></li>
				<li><a href="sobre.php">Sobre</a></li>
				<li><a href="ajuda.php">Ajuda</a></li>
				<?php if (isLogged() ){ ?>
					<li><a href="anuncios.php">Meus anúncios</a></li>
					<li><a href="perfil.php">Minha conta</a></li>
					<li><a href="servico.php">Anunciar</a></li>
					<li><a href="logout.php" class="btn-login">Sair</a></li>
				<?php } else{ ?>
				<li><a href="register.php">Registrar-se</a></li>
				<li><a href="#janela" rel="modal" class="btn-login">Login</a></li>
			<?php } ?>
			</ul>
			
		</nav>
	</div>

	<br>
	<center>
		<div class="busca">
			<form action="search.php" method="GET">
				<input type="text" placeholder="  Estou procurando por..." required>
				<button type="submit"><i class="fas fa-search" ></i></button>

				<ul class="icons-busca">
				    <li class="icons"> <a href=""><i class="fas fa-tshirt"></i>Moda e Beleza </a></li>
				    <li class="icons"> <a href=""><i class="fas fa-volleyball-ball"></i>Esportes e Lazer </a></li>
				    <li class="icons"> <a href=""><i class="fas fa-mortar-pestle"></i>Culinária </a></li>
				    <li class="icons"> <a href=""><i class="fas fa-guitar"></i>Músicas e Hobbies </a></li>
				    <li class="icons"> <a href=""><i class="fas fa-th-list"></i>Todas as Categorias </a></li>
				</ul>
			</form>
		</div>

	<div class="search">
		<?php 
		$usuario = $_SESSION['userId']; 
		$dados = pdoExec("SELECT * FROM SERVICOS WHERE SRV_USER_ID=?", [$usuario]);
		$resultado = $dados -> fetchAll(); 
		foreach($resultado as $value):?>
			<div class="anuncios">
				<center>
				<form action="edit_anuncio_controler.php" method="POST">
					<img src="../produtos/img/<?=$value['SRV_IMAGEM'];?>">
					<br><p style="margin-top: 80px;"><h2>Nome do servico / Produto</h2></p> <input type="text" name="name" value="<?= $value['SRV_NOME'];?>"><hr><br>
					<h3>Preço</h3>
					<input type="text" name="price" value="<?=$value['SRV_PRECO'];?>"><hr><br>
					<h3>Descrição</h3>
					<textarea name="description"><?= $value['SRV_DESCRICAO'];?></textarea><hr><br>
					<h3>Localização</h3>
					<p></p> <input type="text" name="location" value="<?= $value['SRV_LOCALIZACAO'];?>" ><hr><br>
					<button style="width:10%;" type="submit" name="enviar">Enviar</button>
				</form>
					
				</center>	
			</div>
		<?php endforeach; ?>
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