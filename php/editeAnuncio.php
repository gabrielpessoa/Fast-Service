<?php include("functions.php"); ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<title>Fast-Service</title>
	
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	<link rel="shortcut icon" type="image/x-png" href="img/3.png">
	<script src="../js/jquery.js"></script>
	<script src="../js/functions.js"></script>
	<script type="text/javascript" src="../js/jquery.cycle.all.js"></script>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
<body>
	<div>
		<nav>
			
			<a href="index.php"><img src="../img/3.png"></a>
			<ul>
				<li><a href="/">Início</a></li>
				<li><a href="ajuda.php">Ajuda</a></li>
				<?php if (isLogged() ){ ?>
					<li><a href="anuncios.php">Meus anúncios</a></li>
					<li><a href="perfil.php">Minha conta</a></li>
					<li><a href="servico.php">Anunciar</a></li>
					<li><a href="logout.php" class="btn-login"><i class="fas fa-sign-out-alt"></i> Sair</a></li>
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


		<div class="slide">
			<!-- <section class="botao">
				<a href="#" class="anterior">&laquo;</a>
				<a herf="#" class="proxima">&raquo;</a>
			</section> -->
			<a href="#" class="anterior" id="section">Anterior</a>
			<a href="#" class="proxima" id="section">Próxima</a>
			<ul>
				<a href="php/view.php?i=3653453"><li><img src="../img/1.jpeg"></li></a>
				<a href="php/view.php?i=4334553"><li><img src="../img/2.jpg"></li></a>
				<a href="php/view.php?i=3546346"><li><img src="../img/3.png"></li></a>
			</ul>
		</div>
	<div class="search">
		<form action="edit_anuncio_controler.php" method="POST" enctype="multipart/form-data">
			<p>Adicionar foto</p>
			<input type="file" name="img[]" multiple>
			<input type="submit">
		</form>
		
	</div>

	</center>
	<?php include("login.php");?>

	<footer class="rodape">©Copyright 2019</footer>
	

</body>
</html>