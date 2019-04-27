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
				<li><a href="/"><i class="fas fa-home"></i>Início</a></li>
				<li><a href="ajuda.php"><i class="fas fa-question-circle"></i>Ajuda</a></li>
				<?php if (isLogged() ){ ?>
					<li><a href="servico.php"><i class="fas fa-ad"></i>Anunciar</a></li>
					<li><a href="#account" rel="account"><i class="fas fa-user-alt"></i>Minha conta</a></li>
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
			<form action="search.php">
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
		<?php 
		$search = $_GET['desc'];
		$dados = pdoExec("SELECT * FROM SERVICOS WHERE md5(SRV_ID)=?", [$search]);
		$resultado = $dados -> fetchAll();
		foreach($resultado as $value):?>
			<div class="anuncios">
				<center>
				<?php
					$id_servico = $value['SRV_ID'];

					$stmt = pdoExec("SELECT * FROM IMAGENS WHERE IMG_SRV_ID=? LIMIT 1", [$id_servico]);
					$data3 = $stmt -> fetchAll();
					foreach ($data3 as $val) {?>
						
					<img src="<?=$val['IMG_NOME'];?>" style="margin-bottom: 40px; width: 40%; height: 40%;">
					<?php }
					if(isLogged()){
						$stmt = rowCount("SELECT * FROM FAVORITOS WHERE FVR_SRV_ID=?", [$id_servico]);
							if($stmt > 0){  ?>
								<br><p><a href="del_favoritos.php?i=<?=md5($value['SRV_ID']);?>">Remover favorito</a></p>
							<?php }else{  ?>
								<br><p><a href="add_favoritos.php?i=<?=$value['SRV_ID'];?>">Favoritos</a></p>
						 <?php }
						}
					 ?>	
					<br><p style="margin-top: 80px;"><h2><?= $value['SRV_NOME'];?></h2></p><hr>
					<h3>Preço</h3>
					<p><?= "R$: ".$value['SRV_PRECO'];?></p><hr>
					<h3>Descrição</h3>
					<p><?= $value['SRV_DESCRICAO'];?></p>
					<hr>
					<h3>Localização</h3>
					<p><?= $value['SRV_LOCALIZACAO'];?></p><hr>
						<h3>Comentários</h3>
					<div class="comentarios">
						<?php
						$id = $value['SRV_ID'];
						$stmt = pdoExec("SELECT * FROM COMENTARIOS WHERE CMT_SRV_ID=?", [$id]);
						$dados = $stmt->fetchAll();
						foreach ($dados as $value) :
							$comentario = $value['CMT_COMENTARIO'];
							$data = pdoExec("SELECT * FROM USUARIOS WHERE USER_ID=?", [$value['CMT_USER_ID']]);
							$result = $data -> fetchAll();
							foreach($result as $dados1){
								$user = $dados1['USER_NOME'];
							}
							?>
							<p><a href="mural.php?i=<?=md5($dados1['USER_ID']);?>" style="background: none; color: blue; padding-right: 15px;"><?=$user;?></a><?=":  ".$comentario;?></p>
						<?php endforeach; ?>
					</div>
					<?php
					$dt = pdoExec("SELECT * FROM MEDIA_AVALIACOES WHERE MDAV_SRV_ID=?", [$id_servico]);
					$dt2 = $dt -> fetchAll();
					
					foreach ($dt2 as $value) {?>
					<p style="margin-top: 40px;">Avaliar o serviço</p>
					<span class="ratingAverage" data-average="<?= $value['MDAV_MEDIA'];?>"></span>
					<span class="article" data-id="<?= $id_servico;?>"></span>
					<br><div class="barra">
						<span class="bg"></span>
						<span class="stars">
							<?php for($i=1; $i<=5; $i++):?>

							<span class="star" data-vote="<?= $i;?>">
								<span class="starAbsolute"></span>
							</span>
							<?php 
								endfor;?>
						</span>
					</div>
					<br><p class="votos"><span><?= $value['MDAV_TOTAL_PESSOAS'];?></span> votos</p>
					<?php }?>
					<?php if (isLogged()): 
						$data = pdoExec("SELECT * FROM AVALIACOES WHERE AVL_USER_ID=? AND AVL_SRV_ID=?", [$_SESSION['userId'], $id_servico]);
						$dados = $data -> fetchAll();
						if ($data -> rowCount()<=0) {
							$voto_usuario = 0;
						}
						foreach ($dados as $value) {
							$voto_usuario = $value['AVL_QTD_ESTRELAS'];
						}
						?>
						<p style="margin-top: 40px">Minha avaliação</p>
						<span class="Average" data-average="<?= $voto_usuario;?>"></span><br>
						<div class="bar" style="width: 150px;">
							<span class="bt"></span>
							<span class="stars">
								<?php for($i=1; $i<=5; $i++):?>
									<span class="estrela">
									<span class="starAbsolute"></span>
									</span>
								<?php endfor;?>
							</span>
						</div>
					<?php endif ?>

					<form action="add_comentario.php" method="POST">
						<p>Escrever comentário</p>
						<textarea name="comentario" placeholder="Digite aqui" required=""></textarea><br>
						<input type="hidden" name="id_servico" value=<?=$id;?> >
						<button type="submit">Enviar comentário</button>
					</form>
				</center>	
			</div>
		<?php endforeach; ?>
	</div>

	</center>
	<?php 
	include("login.php");
	include("conta.php");
	?>

	<footer class="rodape">©Copyright 2019</footer>

</body>
</html>