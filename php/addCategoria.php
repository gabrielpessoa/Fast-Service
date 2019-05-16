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
	<script type="text/javascript" src="../js/jquery.cycle.all.js"></script>
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
                <?php if ($_SESSION['userTipo'] > 0): ?>
					<li><a href="addCategoria.php"><i class="fas fa-plus-circle"></i>Criar Categorias</a></li>
				<?php endif ?>
                <li><a href="logout.php" class="btn-login"><i class="fas fa-sign-out-alt"></i> Sair</a></li>
			</ul>
			
		</nav>
	</div>

	<br>
	<center>
		<div class="busca">
			<form action="search.php" name="search" method="GET">
				<input type="text" placeholder="Estou procurando por..." required>
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

	<div class="profile">
		<div class="novaCategoria">
			<form method="GET" action="novaCategoria.php">
				<fieldset>
					<legend style="font-size: 20px">Nova categoria</legend>
					<input type="text" name="categoria" placeholder="Nome da categoria"><br>
					<button type="submit">Enviar</button>
				</fieldset>
			</form>
			<form method="POST" action="novaCategoria.php">
				<fieldset>
					<legend style="font-size: 20px;">Nova subcategoria</legend>
					<p>Categoria</p>
					<select style="width: 50%;height: 35px;border-radius: 5px;outline: none;" name="type" class="type" required="">
	                    <option value="null" class='null' readonly >Selecione</option>
	                    <?php 
	                    $dados = pdoExec("SELECT * FROM CATEGORIAS",[]);
	                    $resultado = $dados -> fetchAll();
	                    foreach ($resultado as $value) : ?>                            
	                    <option value=<?=$value['CTG_ID'];?> > <?= utf8_encode($value['CTG_NOME']);?> </option>
	                    <?php endforeach; ?>
	                </select>
	                <p>Nova subcategoria</p>
	                <input type="text" name="subCategoria" placeholder="Nome da subcategoria"><br>
	                <button name="enviar" type="submit">Enviar</button>
				</fieldset>
			</form>
		</div>
	</div>

    <?php include("conta.php");?>

	<footer class="rodape">©Copyright 2019</footer>

</body>
</html>