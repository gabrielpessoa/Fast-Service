<?php 
include("../controller/functions_controller.php"); 
if(isLogged()){
header("location: ../../index.php");
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<title>Fast-Service</title>	
	<link rel="stylesheet" type="text/css" href="../../css/style.css">
	<script src="../../js/jquery.js"></script>
	<script src="../../js/functions.js"></script>
	<link rel="shortcut icon" type="image/x-png" href="../../img/3.png">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
</head>
<body>
	<div>
		<?php include("menu_view.php"); ?>
	</div>

	<br>
	<center>
		<br>
            <div class="busca">
               <form action="search_view.php">
	                <input type="text" name="search" placeholder="  Estou procurando por..." required>
	                <button type="submit"><i class="fas fa-search" ></i></button>
            	</form>
	            <ul class="icons-busca">
	                <li class="icons"> <a href=search_view.php?search=<?=md5(4);?> > <i class="fas fa-tshirt"></i>Moda e Beleza </a></li>
	                <li class="icons"> <a href=search_view.php?search=<?=md5(7);?> > <i class="fas fa-volleyball-ball"></i>Esportes e Lazer </a></li>
	                <li class="icons"> <a href=search_view.php?search=<?=md5(8);?> > <i class="fas fa-mortar-pestle"></i>Culinária </a></li>
	                <li class="icons"> <a href=search_view.php?search=<?=md5(10);?> ><i class="fas fa-guitar"></i>Músicas e Hobbies </a></li>
	                <li class="icons"> <a href=search_view.php?search=todos><i class="fas fa-th-list"></i>Todas as Categorias </a></li>
	            </ul>
            </div>

			<div class="cadastro" style="min-height: 290px;">
				<center>
					<br>
					<h1>Recuperar minha senha</h1><br>
					<form action="" method="POST" class="send-email">
						<p>Digite seu e-mail</p>
						<input type="email" name="email" required=""><br>
						<button type="submit" class="btn-send-email">Enviar e-mail</button><br>
						<label class="sucesso">E-mail enviado com sucesso! Se o e-mail não estiver na sua caixa de entrada, verifique no "Spam".</label>
					</form>
				</center>
			</div>
	</center>

	<?php 
	include("login_view.php");
	?>

	<footer class="rodape">©Copyright 2019</footer>


</body>
</html>