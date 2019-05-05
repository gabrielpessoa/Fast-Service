<?php 
include("functions.php"); 
if(!isLogged()){
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
	<link rel="shortcut icon" type="image/x-png" href="../img/3.png">
	<script src="../js/jquery.js"></script>
	<script src="../js/functions.js"></script>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
<body>
	<div>
		<nav>
			
			<a href="index.php"><img src="../img/3.png"></a>
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
		$servico = $_GET['i']; 
		$dados = pdoExec("SELECT * FROM SERVICOS WHERE md5(SRV_ID)=?", [$servico]);
		$resultado = $dados -> fetchAll(); 
		foreach($resultado as $value):?>
			<div class="anuncios" style="width: 100%;">
				<center>
				<form action="edit_anuncio_controler.php" method="POST" enctype="multipart/form-data">
					<img src="<?=$value['SRV_IMAGEM'];?>">
					<p>Adicionar foto</p>
					<input type="file" name="img[]" multiple style="height: 20px;">
					<br><p style="margin-top: 80px;"><h2>Nome do servico / Produto</h2></p> <input type="text" name="name" value="<?= $value['SRV_NOME'];?>"><hr><br>
					<h3>Preço</h3>
					<input type="text" name="price" value="<?=$value['SRV_PRECO'];?>"><hr><br>
					<h3>Descrição</h3>
					<textarea name="description"><?= $value['SRV_DESCRICAO'];?></textarea><hr><br>
					<h3>Localização</h3>
					<p></p> <input type="text" name="location" value="<?= $value['SRV_LOCALIZACAO'];?>" ><hr><br>
					<input type="hidden" name="id_servico" value="<?=$value['SRV_ID'];?>">
					<button type="submit" name="enviar">Salvar alterações</button>
				</form>
					
				</center>	
			</div>
		<?php endforeach; ?>

	</div>

	</center>
	<?php include("login.php");?>
	<?php include("conta.php");?>

	<footer class="rodape">©Copyright 2019</footer>

	

</body>
</html>