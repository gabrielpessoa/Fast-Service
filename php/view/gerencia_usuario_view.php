<?php include("../controller/functionscontroller_.php"); ?>
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
	<script type="text/javascript" src="../../js/jquery.cycle.all.js"></script>
</head>
<body>
	<div>
		<?php include("menu_view.php");?>
	</div>

	<br>
	<center>
		<div class="busca">
			<form action="search_view.php">
				<input type="text" placeholder="  Estou procurando por..." required>
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

	<div class="profile">
		<center>
			<div class="adm">
				<?php 
					$stmt = pdoExec("SELECT * FROM USUARIOS",[]);
					$dados = $stmt->fetchAll();
					?>
					<table>
						<tr>
							<th>Usuarios</th>
							<th>Tipo</th>
							<th>Cargo</th>
							<th>Cargo</th>
						</tr>
							<?php 		
							foreach ($dados as $value) : ?>
						<tr>
							<?php if ($_SESSION['userId'] === $value['USER_ID']){
								}else{ ?>
									<td><?=$value['USER_USUARIO'];?></td> 
									<td>
										<?php if ($value['USER_TIPO'] == 0): ?>
											Padrão
										<?php endif ?>
										<?php if ($value['USER_TIPO'] == 1): ?>
											Administrador
										<?php endif ?>
									</td>
									<td><a href="add_adm_controller.php?id=<?=md5($value['USER_ID']);?>">ADM</a></td>
									<?php if ($_SESSION['userTipo'] == 2): ?>
										<td><a href="remove_adm_controller.php?id=<?=md5($value['USER_ID']);?>">Padrão</a></td>
									<?php endif ?>
								<?php } ?>	
						</tr>	
							<?php endforeach ?>
					</table>
	        </div>	
       </center>
	</div>

	<?php 
	include("conta_view.php");
	include("../controller/chat_controller.php");
	
	?>

	<footer class="rodape">©Copyright 2019</footer>
	<script>
		

function tornarPadrao($id){
	$valor = 0;
	$stmt =pdoExec("UPDATE USUARIOS SET USER_TIPO WHERE USER_ID=?", [$valor, $id]);
	header('location: ../../index.php');
}
	</script>

</body>
</html>