<?php include("functions.php"); ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<title>Fast-Service</title>	
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	<script src="../js/jquery.js"></script>
	<script src="../js/functions.js"></script>
	<link rel="shortcut icon" type="image/x-png" href="../img/3.png">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
</head>
<body>
	<div>
		<nav>
			<a href="../index.php"><img src="../img/3.png"></a>
			<ul>
				<li><a href="../index.php"><i class="fas fa-home"></i>Início</a></li>
				<li><a href="ajuda.php"><i class="fas fa-question-circle"></i>Ajuda</a></li>
				<?php if (isLogged() ){ ?>
					<li><a href="servico.php"><i class="fas fa-ad"></i>Anunciar</a></li>
					<li><a href="#account" rel="account"><i class="fas fa-user-alt"></i>Minha conta</a></li>
					<?php if ($_SESSION['userTipo'] > 0): ?>
						<li><a href="addCategoria.php"><i class="fas fa-plus-circle"></i>Criar Categorias</a></li>
					<?php endif ?>
					<li><a href="logout.php" class="btn-login"><i class="fas fa-sign-out-alt"></i> Sair</a></li>
				<?php } else{ ?>
				<li><a href="register.php"><i class="fas fa-user-plus"></i>Registrar-se</a></li>
				<li><a href="#janela" rel="modal" class="btn-login"><i class="fas fa-user-alt"></i>Login</a></li>
			<?php } ?>
			</ul>
		</nav>
	</div>

	<br>
	<center>
		<br>
            <div class="busca">
                <form action="search.php">
                    <input type="text" name="search" placeholder="  Estou procurando por..." required>
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
			<div class="ajuda">
				<center>
					<br><h1>Ajuda</h1>
 				<br><ul>		 		
			 		    <li><a href="#" id="duvi-user">Como faço para me cadastrar ?</a></li>
			 		    <div class="duvida-cadastro-user">
				 		  	<p><h3>Passo 1</h3></p>
				 		  	<p>Navege até o menu e clique em "REGISTRAR-SE"</p>
				 		  	<p><img src="../img/cadastro1.png"></p>
				 		  	<p><h3>Passo 2</h3></p>
				 		  	<p>Preencha corretamente todos os campos do formulário. OBS: o campo "Usuário" será usado para fazer login</p>
				 		  	<p><img src="../img/cadastro2.png"></p>
			 		    </div>
			 			<li><a href="#" id="duvi-ads">Como cadastrar um anúncio?</a></li>
			 			<div class="duvida-cadastro-ads">
				 		  	<p><h3>Passo 1</h3></p>
				 		  	<p>Navege até o menu e clique em "Anunciar"</p>
				 		  	<p><img src="../img/cadastro3.png"></p>
				 		  	<p><h3>Passo 2</h3></p>
				 				<!-- Continuem o resto -->
				 			<p><img src=""></p>
			 		    </div>
			 			<li><a href="#" id="duvi-dados">Como posso alterar meus dados?</a></li>
			 			<div class="duvida-alterar-dados">
				 		  	<p><h3>Passo 1</h3></p>
			 				<!-- Continuem o resto -->
				 		  	<p><img src=""></p>
			 		    </div>
			 		    <li><a href="#" id="duvi-login">Como faço login?</a></li>
			 		    <div class="duvida-login">
			 		  		<p><h3>Passo 1</h3></p>
			 				<!-- Continuem o resto -->
				 		  	<p><img src=""></p>
			 		    </div>
			 		    <li><a href="#" id="duvi-my-ads">Como posso ver meus anúncios</a></li>
			 		    <div class="duvida-my-ads">
			 		  		<p><h3>Passo 1</h3></p>
			 				<!-- Continuem o resto -->
				 		  	<p><img src=""></p>
			 		    </div>
			 		<br>
 				</ul>  
				</center>
			</div>
	</center>

	<?php 
	include("conta.php");
	include("login.php");
	?>

	<footer class="rodape">©Copyright 2019</footer>


</body>
</html>
