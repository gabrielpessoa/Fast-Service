<?php 
include("functions.php");
if (!isLogged()) {
	header('location: ../index.php');
	exit();
}
?>
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
				<li><a href="/"><i class="fas fa-home"></i>Início</a></li>
                <li><a href="ajuda.php"><i class="fas fa-question-circle"></i>Ajuda</a></li>
                <li><a href="servico.php"><i class="fas fa-ad"></i>Anunciar</a></li>
                <li><a href="#account" rel="account"><i class="fas fa-user-alt"></i>Minha conta</a></li>
                <li><a href="logout.php" class="btn-login"><i class="fas fa-sign-out-alt"></i> Sair</a></li>
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
				     <li class="icons"> <a href=search.php?search=<?=md5(4);?> > <i class="fas fa-tshirt"></i>Moda e Beleza </a></li>
				    <li class="icons"> <a href=search.php?search=<?=md5(7);?> > <i class="fas fa-volleyball-ball"></i>Esportes e Lazer </a></li>
				    <li class="icons"> <a href=search.php?search=<?=md5(8);?> > <i class="fas fa-mortar-pestle"></i>Culinária </a></li>
				    <li class="icons"> <a href=search.php?search=<?=md5(10);?> ><i class="fas fa-guitar"></i>Músicas e Hobbies </a></li>
				    <li class="icons"> <a href=search.php?search=todos><i class="fas fa-th-list"></i>Todas as Categorias </a></li>
				</ul>
			</form>
		</div>

	<div class="search">
		<center>
			<?php if (isset($_SESSION["anuncio_sucesso"])) : ?>
				<p class="blue">Salvo com sucesso</p>
			<?php endif; unset($_SESSION["anuncio_sucesso"]); ?>
		</center>
		<?php 
		$usuario = $_SESSION['userId']; 
		$dados = pdoExec("SELECT * FROM SERVICOS WHERE SRV_USER_ID=?", [$usuario]);
		$resultado = $dados -> fetchAll(); 
		foreach($resultado as $value):?>
			<div class="anuncios" style="">
				<center>
					<br><h3 style="margin-top: 20px;">Imagens do anúncio</h3>
					<div class="imgs" style=" display: flex; flex-wrap: wrap; border: solid 1px #babaca;  align-items: center; overflow: hidden;">
					<?php
					$id_img = $value['SRV_ID'];
					$data = pdoExec("SELECT * FROM IMAGENS WHERE IMG_SRV_ID=?", [$id_img]);
					$dados2 = $data -> fetchAll();
					foreach ($dados2 as $data) :?>
						
						<div style="text-align: center; padding: 15px;">
							<img src="<?=$data['IMG_NOME'];?>" style="margin: 10px auto; width: 190px; height: 160px;"><br>
							<p><a href="delete_img.php?i=<?=$data['IMG_NOME'];?>">Excluir</a></p>
							
						</div>

					<?php endforeach; ?>
					</div>
					<br><p style="margin-top: 80px;"><h2><?= $value['SRV_NOME'];?></h2></p><hr><br>
					<h3>Preço</h3>
					<p><?= "R$: ".$value['SRV_PRECO'];?></p><hr><br>
					<h3>Descrição</h3>
					<p><?= $value['SRV_DESCRICAO'];?></p><hr><br>
					<h3>Localização</h3>
					<p><?= $value['SRV_LOCALIZACAO'];?></p><hr><br>
					<a href="editeAnuncio.php?i=<?=md5($value['SRV_ID']);?>"> Editar</a>
					<a href=deleteAnuncio.php?i=<?=md5($value['SRV_ID']);?> > Excluir</a><br><br><br>
					
				</center>	
			</div>
		<?php endforeach; ?>
	</div>
	
    <?php include("conta.php");?>

	<footer class="rodape">©Copyright 2019</footer>

</body>
</html>