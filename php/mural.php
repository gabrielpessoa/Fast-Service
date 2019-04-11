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
			
			<a href="index.php"><img src="../img/3.png"></a>
			<ul>
				<li><a href="/">Início</a></li>
				<li><a href="ajuda.php">Ajuda</a></li>
				<?php if (isLogged() ){ ?>
				<li><a href="favoritos.php">Meus favoritos</a></li>
					<li><a href="anuncios.php">Meus anúncios</a></li>
					<li><a href="perfil.php">Minha conta</a></li>
					<li><a href="servico.php">Anunciar</a></li>
					<li><a href="logout.php" class="btn-login">Sair</a></li>
				<?php } else{ ?>
				<li><a href="register.php">Registrar-se</a></li>
				<li><a href="#janela" rel="modal" class="btn-login">Login</a></li>
			<?php } ?>
			</ul>
			
		</nav>
	</div>

	<br>
	<center>
		<div class="busca">
			<form action="">
				<input type="text" placeholder="  Estou procurando por..." required>
				<button type="submit"><i class="fas fa-search" ></i></button>
			</form>
				<ul class="icons-busca">
				    <li class="icons"> <a href=search.php?search=<?=md5(4);?> > <i class="fas fa-tshirt"></i>Moda e Beleza </a></li>
				    <li class="icons"> <a href=search.php?search=<?=md5(7);?> > <i class="fas fa-volleyball-ball"></i>Esportes e Lazer </a></li>
				    <li class="icons"> <a href=search.php?search=<?=md5(8);?> > <i class="fas fa-mortar-pestle"></i>Culinária </a></li>
				    <li class="icons"> <a href=search.php?search=<?=md5(10);?> ><i class="fas fa-guitar"></i>Músicas e Hobbies </a></li>
				    <li class="icons"> <a href=search.php?search=todos><i class="fas fa-th-list"></i>Todas as Categorias </a></li>
				</ul>
		</div>

		<br>
		<div class="profile" >
			<center>
				<div style="display: flex; margin-top: 50px;">
			<?php
				$id = $_GET['i'];
                $stmt = pdoExec("SELECT * FROM USUARIOS WHERE md5(USER_ID)=?", [$id]);
                $dados = $stmt -> fetchAll();
                foreach ($dados as $value) : ?>
                	<img src="<?=$_SESSION['userIMG'];?>">
                	<div style=" margin: 0 auto; border-radius: 5px; width: 40%;">
                	<label>Nome: </label><br>
                	<p><?=$value['USER_NOME'];?></p><br>
                	<label>E-mail: </label><br>
                	<p><?=$value['USER_EMAIL'];?></p><br>
                	<label>Telefone para contato: </label><br>
                	<p><?=$value['USER_TELEFONE'];?></p><br>
                		
                	</div>
                <?php endforeach; ?>
                </div>
                <div style="display: flex; margin-top: 20px; padding: 15px; ">
                	
              
                <?php
                $stmt = pdoExec("SELECT * FROM SERVICOS WHERE md5(SRV_USER_ID)=?", [$id]);
                $data = $stmt -> fetchAll();
                foreach ($data as $value) {?>
                	<a href="desc_produto.php?desc=<?=md5($value['SRV_ID']);?>" style="width: 60%;"><div style="width: 90%; border: solid 1px #babaca; border-radius: 5px; margin-bottom: 10px; padding: 15px;">
                	<?php 
                	$dt = pdoExec("SELECT * FROM IMAGENS WHERE IMG_SRV_ID=? LIMIT 1", [$value['SRV_ID']]);
                	$dados2 = $dt -> fetchAll();
                	foreach($dados2 as $val){?>
                		<img src="<?=$val['IMG_NOME'];?>">
                	<?php }?>
                		<br><p style="margin-top: 20px;"><h2><?= $value['SRV_NOME'];?></h2></p><hr>
					<h3>Preço</h3>
					<p><?= "R$: ".$value['SRV_PRECO'];?></p><hr>
					<h3>Descrição</h3>
					<p><?= $value['SRV_DESCRICAO'];?></p>
					<hr>
					<h3>Localização</h3>
					<p><?= $value['SRV_LOCALIZACAO'];?></p>
                	</div></a>
               <?php }
                ?>  </div>
    		</center>
		</div>

		<div class="window" id="janela">
		<center>
			<a href="#" class="fechar">X</a>
			<h4>Login</h4>
			<hr>
			<form action="login2.php" method="POST">
				<p>Usuário</p><br>
				<input type="text" name="username" placeholder="Digite aqui"><br>
				<p>Senha</p><br>
				<input type="password" name="password" placeholder="Digite aqui"><br>
				<button type="submit">Entrar</button><br>
				<a href="#">Esqueceu sua senha?</a>
			</form>
		</center>
	</div>

	<div id="mascara">
		
	</div>

	<footer class="rodape">©Copyright 2019</footer>

</body>
</html>