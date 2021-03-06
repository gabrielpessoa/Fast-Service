<?php 
include("../controller/functions_controller.php"); 
if (!isset($_GET['i'])) {
	header('location: ../../index.php');
	exit();
}
$stmt = pdoExec("SELECT * FROM USUARIOS WHERE md5(USER_ID)=? AND USER_RESET_PW=?",[$_GET['i'], 1]);
if ($stmt->rowCount()<0) {
	header('location: ../../index.php');
	exit(); 
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
                        <li class="icons"> <a href=../controller/search_controller.php?search=<?=md5(4);?> > <i class="fas fa-tshirt"></i>Moda e Beleza </a></li>
                        <li class="icons"> <a href=../controller/search_controller.php?search=<?=md5(7);?> > <i class="fas fa-volleyball-ball"></i>Esportes e Lazer </a></li>
                        <li class="icons"> <a href=../controller/search_controller.php?search=<?=md5(8);?> > <i class="fas fa-mortar-pestle"></i>Culinária </a></li>
                        <li class="icons"> <a href=../controller/search_controller.php?search=<?=md5(10);?> ><i class="fas fa-guitar"></i>Músicas e Hobbies </a></li>
                        <li class="icons"> <a href=../controller/search_controller.php?search=todos><i class="fas fa-th-list"></i>Todas as Categorias </a></li>
                    </ul>
            </div>

			<div class="cadastro" style="min-height: 360px;">
				<center>
					<br>
					<h1>Recuperação de senha</h1><br>
					<form action="" method="POST" id="reset-pw">
						<p>Digite nova senha</p>
						<input type="password" id="senha1" name="senha" minlength="6" maxlength="8" required><br>
						<p>Confirmar nova senha</p>
						<input type="password" id="senha2" name="senha2" minlength="6" maxlength="8" required><br>
						<input type="hidden" value="<?= $_GET['i'];?>" name="id">
						<button type="submit" class="btn-reset-pw">Recuperar senha</button><br>
						<label class="passwords">Senhas não correspondem</label>
						<label class="link-usado">O link já foi usado</label>
						<label class="sucesso">Senha alterada com sucesso</label>
					</form>
					<br>
				</center>
			</div>
	</center>

	<?php 
	include("conta_view.php");
	include("login_view.php");
	?>

	<footer class="rodape">©Copyright 2019</footer>


</body>
</html>