<?php include("php/functions.php"); ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<title>Fast-Service</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<script src="js/jquery.js"></script>
	<script src="js/functions.js"></script>
	<link rel="shortcut icon" type="image/x-png" href="img/3.png">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
</head>
<body>
	<div>
		<nav>
			
			<a href="index.php"><img src="img/3.png"></a>
			<ul>
				<li><a href="index.php"><i class="fas fa-home"></i>Início</a></li>
				<li><a href="php/ajuda.php"><i class="fas fa-question-circle"></i>Ajuda</a></li>
				<?php if (isLogged() ){ ?>
					<li><a href="php/servico.php"><i class="fas fa-ad"></i>Anunciar</a></li>
					<li><a href="#account" rel="account"><i class="fas fa-user-alt"></i>Minha conta</a></li>
					<?php if ($_SESSION['userTipo'] > 0): ?>
						<li><a href="addCategoria.php"><i class="fas fa-plus-circle"></i>Criar Categorias</a></li>
					<?php endif ?>
					<li><a href="php/logout.php" class="btn-login"><i class="fas fa-sign-out-alt"></i> Sair</a></li>
				<?php } else{ ?>
				<li><a href="php/register.php"><i class="fas fa-user-plus"></i>Registrar-se</a></li>
				<li><a href="#janela" rel="modal" class="btn-login"><i class="fas fa-user-alt"></i>Login</a></li>
			<?php } ?>
			</ul>
			
		</nav>
	</div>

		<center>
			<br><div class="busca">
				<form action="php/search.php" method="GET">
					<input type="text" name="search" placeholder="  Estou procurando por..." required>
					<button type="submit"><i class="fas fa-search"></i></button>

				</form>
					<ul class="icons-busca">
				    <li class="icons"> <a href=php/search.php?search=<?=md5(4);?> > <i class="fas fa-tshirt"></i>Moda e Beleza </a></li>
				    <li class="icons"> <a href=php/search.php?search=<?=md5(7);?> > <i class="fas fa-volleyball-ball"></i>Esportes e Lazer </a></li>
				    <li class="icons"> <a href=php/search.php?search=<?=md5(8);?> > <i class="fas fa-mortar-pestle"></i>Culinária </a></li>
				    <li class="icons"> <a href=php/search.php?search=<?=md5(10);?> ><i class="fas fa-guitar"></i>Músicas e Hobbies </a></li>
				    <li class="icons"> <a href=php/search.php?search=todos><i class="fas fa-th-list"></i>Todas as Categorias </a></li>
       				</ul>
			</div><br>

			<div class="search">
			<center>
				<br><p style="top: 40px; font-size: 20px;">Anúncios</p>
				<?php 
					$dados = pdoExec("SELECT * FROM SERVICOS", []);
					$resultado = $dados -> fetchAll(); 
					foreach($resultado as $value):
						$data = pdoExec("SELECT * FROM IMAGENS WHERE IMG_SRV_ID=? LIMIT 1", [$value['SRV_ID']]);
						$data3 = $data -> fetchAll();
						foreach ($data3 as $val) {
							$img = $val['IMG_NOME']; 
						}
						if($data->rowCount()<=0){
							$img = "img/default.jpeg";
						}
						?>
					<br>
					<div class="products">
						<a href="php/desc_produto.php?desc=<?= md5($value['SRV_ID']);?>" id="<?=$value['SRV_ID'];?>">
						<div class="foto"><img src="<?= $img;?>" style="width: 100%; height: 100%;"></div>
							<p><?= $value['SRV_NOME'];?><br>
							<?= "R$: ".$value['SRV_PRECO']; ?></p><br>
							
						</a>
					</div>
				<?php endforeach; ?> 
			</center>
		</div>
		</center><br>
				
	<div class="window" id="janela">
		<center>
			<a href="#" class="fechar">X</a>
			<h4>Login</h4>
			<hr>
			<form action="" method="POST">
				<p>Usuário</p><br>
				<input type="text" name="username" id="user" placeholder="Digite aqui"><br>
				<div class="alerts usuario"></div>
				<p>Senha</p><br>
				<input type="password" name="password" id="password" placeholder="Digite aqui"><br>
				<div class="alerts senha"></div>
				<button type="submit" id="entrar">Entrar</button><br>
				<a href="#">Esqueceu sua senha?</a>
			</form>
		</center>
	</div>

	<div id="mascara">
		
	</div>

	<div class="account" id="account">
		<center>
			<a href="#" class="fechar">X</a>
			<h3><i class="fas fa-user-alt"></i> Minha conta</h3>
			<hr>
			<p><a href="php/perfil.php" class="link"><i class="fas fa-user-circle"></i><br>Meu perfil</a></p><hr class="hr">
			<p><a href="php/anuncios.php" class="link"><i class="fas fa-ad"></i><br>Meus anúncios</a></p><hr class="hr">
			<p><a href="php/favoritos.php" class="link"><i class="fas fa-star"></i></i><br>Favoritos</a></p><hr class="hr">
			<p><a href="php/views.php" class="link"><i class="fas fa-eye"></i><br>Anúncios visitados</a></p>
			<?php if ($_SESSION['userTipo'] == 2 ): ?>
				<hr class="hr">
				<p><a href="php/gerenciaUser.php" class="link"><i class="fas fa-user-edit"></i><br>Gerenciamento de Usuarios</a></p>
			<?php endif ?>
		</center>
	</div>
	<footer class="rodape">©Copyright 2019</footer>
	<script>
		$(document).ready(function() {
			$("button#entrar").click(function(e){
			e.preventDefault();
			var user = $("input#user").val();
			var pw = $("input#password").val();
			$.ajax({
				url: "php/login2.php",
				type: "POST",
				data: {username: user, password: pw},
				success: function(retorno){
					if (retorno=='senha incorreta') {
						$(".usuario").fadeOut();
						$("input#user").removeClass("red");
						$(".senha").show();
						$(".senha").html("Senha incorreta");
						$("input#password").addClass("red");
					}
					else if(retorno=='logado'){
						location.reload();
					}
					else{
						$(".senha").fadeOut();
						$("input#password").removeClass("red");	
						$(".usuario").show();
						$(".usuario").html("Usuário não existe");
						$("input#user").addClass("red");	
						}
					}
				});
			});

		});
	</script>
</body>
</html>