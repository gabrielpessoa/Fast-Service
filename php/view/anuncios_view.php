<?php 
include("../controller/functions_controller.php");
if (!isLogged()) {
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
	<script type="text/javascript" src="../../js/jquery.cycle.all.js"></script>
</head>
<body>
	<div>
        <?php include("menu_view.php"); ?>
	</div>

	<br>
	<center>
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

	<div class="search">
		<center>
		<p style="margin: 20px; font-size: 20px;">Meus anúncios</p>
		<div class="ads-sugestao">
		<?php 
		$usuario = $_SESSION['userId']; 
		$dados = pdoExec("SELECT * FROM SERVICOS WHERE SRV_USER_ID=?", [$usuario]);
		$resultado = $dados -> fetchAll(); 
		foreach($resultado as $value):?>
			<br>
				<center>
					<div class="products">
                        <a href="desc_produto_view.php?desc=<?=md5($value['SRV_ID']);?>">

							<?php
							$id_img = $value['SRV_ID'];
							$img = 0;
							$data = pdoExec("SELECT * FROM IMAGENS WHERE IMG_SRV_ID=? LIMIT 1", [$id_img]);
							$dados2 = $data -> fetchAll();
							if ($data->rowCount() >0) { ?>
								<?php foreach ($dados2 as $data) : ?>
									<img src="<?= $data['IMG_NOME']; ?>"><br>
								<?php endforeach; 
							}
							else{?>
								<img src="../../img/default.jpeg"><br>
							<?php } ?>
							
							<p><?= $value['SRV_NOME'];?></br>
							R$: <?= $value['SRV_PRECO'];?><br>
								<?php
								$stmt = pdoExec("SELECT COUNT('VISI_SRV_ID') FROM VISITAS WHERE VISI_SRV_ID=?", [$value['SRV_ID']]);
								$visitas = $stmt->fetchAll();
								echo $visitas[0]["COUNT('VISI_SRV_ID')"]." visualizações"; ?>
						</a>
							<br>
								<a href="edita_anuncio_view.php?i=<?=md5($value['SRV_ID']);?>"> Editar</a>
								<a href=../controller/delete_anuncio_controller.php?i=<?=md5($value['SRV_ID']);?> > Excluir</a>
							</p>
						<p>
						</p><br>
					</div>
				</center>	
		<?php endforeach; ?>
			</div><br>

		</div>
		</center>
	
    <?php 
    include("conta_view.php");
	include("../controller/chat_controller.php");
    ?>

	<footer class="rodape">©Copyright 2019</footer>

</body>
</html>