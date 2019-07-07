<?php include("../controller/functions_controller.php"); ?>
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
		<?php 
		$search = $_GET['desc'];
		$dados = pdoExec("SELECT * FROM SERVICOS WHERE md5(SRV_ID)=?", [$search]);
		$resultado = $dados -> fetchAll();
		foreach($resultado as $value):?>
			<div class="anuncios">
			<center>
				<div class="slide">
					<div class="botao" style="width: 300px;">
						<a href="#" class="anterior" id="section"><</a>
						<a href="#" class="proxima" id="section">></a>
					</div>
					<ul>
					<?php
					$id_servico = $value['SRV_ID'];
					$stmt = pdoExec("SELECT * FROM IMAGENS WHERE IMG_SRV_ID=?", [$id_servico]);
					$data3 = $stmt -> fetchAll();
					foreach ($data3 as $val) {?>
						
					<li><img src="<?=$val['IMG_NOME'];?>"></li>
					<?php } if($stmt->rowCount()<=0){?>
					<li><img src="../../img/default.jpeg"></li>
				<?php } ?>
					</ul>
				</div>
					<?php if(isLogged()){
						$stmt = rowCount("SELECT * FROM FAVORITOS WHERE FVR_SRV_ID=?", [$id_servico]);
							if($stmt > 0){  ?>
								<br> <p><a style="background: black;" href="delete_favoritos_controller.php?i=<?=md5($value['SRV_ID']);?>"><i class="far fa-heart"></i></a></p>
							<?php }else{  ?>
								<br> <p><a style="background: black;" href="add_favoritos_controller.php?i=<?=$value['SRV_ID'];?>"><i class="fas fa-heart"></i></a></p>
						 <?php }
						}
					 ?>	
					<br><p style="margin-top: 80px;"><h2><?= $value['SRV_NOME'];?></h2></p>
					<h3>Preço</h3>
					<p><?= "R$: ".$value['SRV_PRECO'];?></p>
					<h3>Descrição</h3>
					<p><?= $value['SRV_DESCRICAO'];?></p>
					<h3>Localização</h3><br>
					<p>CEP: <?= $value['SRV_CEP']; ?></p>
					<p>Número: <?= $value['SRV_NUMERO']; ?></p>
					<p>Logradouro: <?= $value['SRV_LOGRADOURO']; ?></p>
					<p>Bairro: <?= $value['SRV_BAIRRO']; ?></p>
					<p>Cidade: <?= $value['SRV_CIDADE']; ?></p>
					<p>Estado: <?= $value['SRV_ESTADO']; ?></p>
						
					<?php
					$dt = pdoExec("SELECT * FROM MEDIA_AVALIACOES WHERE MDAV_SRV_ID=?", [$id_servico]);
					$dt2 = $dt -> fetchAll();
					
					foreach ($dt2 as $value) {?>
					
					<br><p><i class="fas fa-star"> </i> <?= $value['MDAV_MEDIA'];?></p>
					<p class="votos"><span><?= $value['MDAV_TOTAL_PESSOAS'];?></span> avaliações</p>
					<p style="margin-top: 40px;">Avaliar o serviço</p>
					<span class="ratingAverage" data-average=""></span>
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
					
					<h3>Comentários</h3>
					<div class="comentarios">
						<?php
						$stmt = pdoExec("SELECT * FROM COMENTARIOS WHERE CMT_SRV_ID=?", [$id_servico]);
						$dados = $stmt->fetchAll();
						foreach ($dados as $value) :
							$comentario = $value['CMT_COMENTARIO'];
							$id_comentario = $value['CMT_ID'];
							$data = pdoExec("SELECT * FROM USUARIOS WHERE USER_ID=?", [$value['CMT_USER_ID']]);
							$result = $data -> fetchAll();
							foreach($result as $dados1){
								$user = $dados1['USER_NOME'];
							}
							?>
							<p style="margin: 15px 0px;">

								<a href="mural_anuncio_view.php?i=<?=md5($dados1['USER_ID']);?>" style="background: none; color: blue; padding-right: 15px;"> <?=$user;?></a>:<?="ㅤ".$comentario."ㅤ";?> 
								<?php if (isLogged() && $dados1['USER_ID']==$_SESSION['userId']) { ?>
	
									<a href="<?=$value['CMT_ID'];?>:<?= $comentario; ?>" class="edit_comentario" style="background: none; color: blue;">editar</a>
									<a href="../controller/excluir_comentario_controller.php?i=<?=md5($value['CMT_ID']);?>" style="background: none; color: blue;">excluir</a>
								<?php } ?>
							</p>
						<?php endforeach; ?>
					</div>

					<form action="../controller/add_comentario_controller.php" method="POST">
						<p>Escrever comentário</p>
						<textarea name="comentario" placeholder="Digite aqui" required=""></textarea><br>
						<input type="hidden" name="id_servico" value=<?=$id_servico;?> >
						<button type="submit">Enviar comentário</button>
					</form>
					<hr class="hr">
					<h2>Sugestões baseadas no anuncio atual</h1>
			<?php 
			$checks = [];
				$dados = pdoExecReturn("SELECT SPC_PAC_ID FROM SERVICOS_PALAVRAS_CHAVE WHERE SPC_SRV_ID =? ",[$id_servico]);
				foreach ($dados as $dado) {
					$sugestao = pdoExec("SELECT * FROM SERVICOS INNER JOIN SERVICOS_PALAVRAS_CHAVE ON SERVICOS_PALAVRAS_CHAVE.SPC_SRV_ID = SERVICOS.SRV_ID INNER JOIN PALAVRAS_CHAVE ON PALAVRAS_CHAVE.PAC_ID = SERVICOS_PALAVRAS_CHAVE.SPC_PAC_ID WHERE SERVICOS_PALAVRAS_CHAVE.SPC_PAC_ID =? LIMIT 5",[$dado['SPC_PAC_ID']]);
				?>
					<div class="ads-sugestao">
						<?php 
						$resultado = $sugestao -> fetchAll(); 
						foreach($resultado as $value):
							if ($value['SRV_ID'] == $id_servico) {
								continue;
							}

							if (checar($checks,$value['SRV_ID'])) {
								continue;
							}
							


							$data = pdoExec("SELECT * FROM IMAGENS WHERE IMG_SRV_ID=? LIMIT 1", [$value['SRV_ID']]);
							$data3 = $data -> fetchAll();
						foreach ($data3 as $val) {
								$img = $val['IMG_NOME']; 
							}
							if($data->rowCount()<=0){
								$img = "../../img/default.jpeg";
							}
						?>
							<br>
						<div class="products" style="width: 140px; height: 220px;">
							<a href="desc_produto.php?desc=<?= md5($value['SRV_ID']);?>" id="<?=$value['SRV_ID'];?>">
								<img src="<?= $img;?>">
								<p><?= $value['SRV_NOME'];?><br>
								<?= "R$: ".$value['SRV_PRECO']; ?></p><br>
							</a>
						</div>
					<?php array_push($checks, $value['SRV_ID']); ?>
						<?php endforeach; ?> 
					</div>
						<?php } ?>
						<?php endforeach;?>
			</center>	
						<div class="coment">
							<form action="" method="POST">
								<input type="hidden" value="" name="id">
								<textarea name="comentario" id="edit"></textarea><br>
								<button type="submit" class="btn-coment">Salvar</button>
							</form>
						</div>

					</div>
	</center>
	<!--</div>-->
	<?php 
	include("login_view.php");
	include("conta_view.php");
	if(isLogged()){ include("../controller/chat_controller.php"); }
	?>

	<footer class="rodape">©Copyright 2019</footer>

</body>
</html>