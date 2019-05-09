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
	<script type="text/javascript" src="../js/jquery.cycle.all.js"></script>
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

				<center>
			<div class="anuncios" style="width: 100%;">
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
					<li><img src="../img/default.jpeg"></li>
				<?php } ?>
					</ul>
				</div>
					<?php if(isLogged()){
						$stmt = rowCount("SELECT * FROM FAVORITOS WHERE FVR_SRV_ID=?", [$id_servico]);
							if($stmt > 0){  ?>
								<br><p class="link"><a href="del_favoritos.php?i=<?=md5($value['SRV_ID']);?>">Remover favorito</a></p>
							<?php }else{  ?>
								<br><p class="link"><a href="add_favoritos.php?i=<?=$value['SRV_ID'];?>">Favoritos</a></p>
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
							<p>

								<a class="tet" href="mural.php?i=<?=md5($dados1['USER_ID']);?>" style="background: none; color: blue; padding-right: 15px;"> <?=$user;?> </a> <?=":  ".$comentario;?> 
								<?php if (isLogged() && $dados1['USER_ID']==$_SESSION['userId']) { ?>
	
									<a href="<?=$value['CMT_ID'];?>" id="<?=$value['CMT_ID'];?>:<?= $comentario; ?>" class="edit_comentario" style="background: none; color: blue;">editar</a>
									<a href="excluir_comentario.php?i=<?=md5($value['CMT_ID']);?>" style="background: none; color: blue;">excluir</a>
								<?php } ?>
							</p>
						<?php endforeach; ?>
					</div>

					<form action="add_comentario.php" method="POST">
						<p>Escrever comentário</p>
						<textarea name="comentario" placeholder="Digite aqui" required=""></textarea><br>
						<input type="hidden" name="id_servico" value=<?=$id_servico;?> >
						<button type="submit">Enviar comentário</button>
					</form>
			</div>
		<?php endforeach; ?>
				</center>	
	</div>
		<div class="coment" style="display: none; z-index: 10000;  position: fixed; top: 0; left: 0; overflow: hidden;">
			<form action="" method="POST" style="width: 450px; height: 215px;">
				<textarea name="" id="edit" style=" resize: none; width: 100%; height: 70%; padding: 8px;"></textarea><br>
				<button type="submit" class="btn-coment" style="padding: 8px; width: 130px; height: 40px; border-radius: 5px; border: none; cursor: pointer;">Salvar</button>
			</form>
		</div>
	</center>
	<!--</div>-->
	<?php 
	include("login.php");
	include("conta.php");
	?>


	<script>
		$("a.edit_comentario").on('click', function(e){
    	e.preventDefault();
    	
    	var div = $('div.coment');
		var alturaTela = $(document).height();
		var larguraTela = $(window).width();

		$("#mascara").css({'width': larguraTela, 'height': alturaTela});
		$("#mascara").fadeIn(1000);
		$("#mascara").fadeTo("slow", 0.8);

		var left = ($(window).width()/2) - ($(div).width()/2);
		var top = ($(window).height()/2) - ($(div).height()/2);

		$(div).css({'left': left, 'top': top});
		$(div).show();
    	var value = $('a.edit_comentario').attr('href');
    	//var split = value.split(':');
    	//var id = split[0];
    	//var comentario = split[1];
    	alert(value);
		$("#edit").val(comentario);
    	});

    	$("#mascara").click(function(){
		$(this).fadeOut("slow");
		$("div.coment").fadeOut();
		});

    	$("button.btn-coment").click(function(){
    		var value = $('.edit_comentario').attr('href');
			$.ajax({
				url: 'edita_comentario.php',
				type: 'POST',
				data: {id: value, comentario: 'fdfdfds'},
				success: function(){
					window.reload();
				}
			});
    	});

	</script>
	<footer class="rodape">©Copyright 2019</footer>

</body>
</html>