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
			
			<a href="index.php"><img src="../img/3.png"></a>
			<ul>
				<li><a href="/"><i class="fas fa-home"></i>Início</a></li>
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
		<div class="busca">
			<form action="">
				<input type="text" name="search" placeholder="Estou procurando por..." required>
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

		<div class="search">
			<center>
				<p style="margin: 40px; font-size: 20px;">Anúncios</p>
				<div class="ads-sugestao">
				<?php
				$search = $_GET['search'];
				$dados = pdoExec("SELECT * FROM SERVICOS WHERE SRV_NOME LIKE '%$search%' ", [$search]);
				$resultado = $dados -> fetchAll(); 
				foreach($resultado as $value):?>
				<br>
					<?php $data = pdoExec("SELECT * FROM IMAGENS WHERE IMG_SRV_ID=? LIMIT 1", [$value['SRV_ID']]);
						$data3 = $data -> fetchAll();
						foreach ($data3 as $val) {
							$img = $val['IMG_NOME']; 
						}
						if($data->rowCount()<=0){
							$img = "../img/default.jpeg";
						}
						?>
					<div class="products">
						<a href="desc_produto.php?desc=<?= md5($value['SRV_ID']);?>" id="<?=$value['SRV_ID'];?>">
						<img src="<?=$img;?>">
							<p><?= $value['SRV_NOME'];?><br>
							<?= "R$: ".$value['SRV_PRECO']; ?></p><br>
						</a>
					</div>
				<?php endforeach; ?>
				</div>
				
				<?php if(!$dados->rowCount() > 0  ){ ?>
				<div class="ads-sugestao">
					<?php
					$row = 1;
					$dados = pdoExec("SELECT * FROM SERVICOS WHERE md5(SRV_CATEGORIA)=?", [$search]);
					$resultado = $dados -> fetchAll(); 
					foreach($resultado as $value):
						$data = pdoExec("SELECT * FROM IMAGENS WHERE IMG_SRV_ID=? LIMIT 1", [$value['SRV_ID']]);
						$data3 = $data -> fetchAll();
						foreach ($data3 as $val) {
							$img = $val['IMG_NOME']; 
						}
						if($data->rowCount()<=0){
							$img = "../img/default.jpeg";
						}
						?>
					<br>
						<div class="products">
						<a href="desc_produto.php?desc=<?= md5($value['SRV_ID']);?>" id="<?=$value['SRV_ID'];?>">
							<img src="<?=$img;?>">
								<p><?= $value['SRV_NOME'];?><br>
								<?= "R$: ".$value['SRV_PRECO']; ?></p><br>
							</a>
						</div>
				<?php endforeach; ?>
				</div>
				<?php } ?>
				<?php if($search=="todos"){ ?>
					<div class="ads-sugestao">
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
							$img = "../img/default.jpeg";
						}
						?>
					<br>
						<div class="products">
							<a href="desc_produto.php?desc=<?= md5($value['SRV_ID']);?>" id="<?=$value['SRV_ID'];?>">
							<img src="<?= $img;?>">
								<p><?= $value['SRV_NOME'];?><br>
								<?= "R$: ".$value['SRV_PRECO']; ?></p><br>
							</a>
						</div>
				<?php endforeach; ?>
				</div>
			<?php } ?>
			</center>
		</div>
	</center>

	<?php 
	include("login.php");
	include("conta.php");
	if(isLogged()){include("chat.php");}
	?>

	<footer class="rodape">©Copyright 2019</footer>

</body>
</html>