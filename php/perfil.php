<?php include("php/functions.php"); ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<title>Fast-Service</title>
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	<script src="../js/jquery.js"></script>
	<script src="../js/functions.js"></script>
</head>
<body>
	<div>
		<nav>
			
			<img src="../img/1.jpeg">
			<ul>
				<li><a href="#">Início</a></li>
				<li><a href="#">Sobre</a></li>
				<li><a href="perfil.php">Perfil</a></li>
				<li><a href="#" class="btn-login">Sair</a></li>
			</ul>
			
		</nav>

        <div class="header-bg">
			<h2><label>F</label>ast</h2><br>
			<h3>Service</h3>
		</div>

		<div class="body_perfil">
            <div class="perfil">
                Nome: <input type="text" name="nome" value="<?=$linha['Nome']?>" disabled><br>
                Email: <input type="email" name="nome" value="<?=$linha['Email']?>" disabled ><br>
                Contato: <input type="text" name="nome" value="<?=$linha['Contato']?>" disabled><br>
                Sexo: <br>

                <a href="">Alterar Dados</a>
            </div>
        </div>

	<footer class="rodape">©Copyright 2019</footer>
	<script>
		$(document).ready(function(){
			$(window).scroll(function(){
				$('.header-bg').css('opacity', 1 -
					$(window).scrollTop()/700)
			})
		})
	</script>
</body>
</html>