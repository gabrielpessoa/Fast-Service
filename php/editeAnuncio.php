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
    <script type="text/javascript" src="../js/jquery.maskedinput-1.1.4.pack.js"/></script>
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
		$dados = pdoExec("SELECT * FROM SERVICOS WHERE md5(SRV_ID)=? LIMIT 1", [$servico]);
		$resultado = $dados -> fetchAll(); 
		foreach($resultado as $value):?>
			<div class="anuncios" style="width: 100%;">
				<center>
				<form action="edit_anuncio_controler.php" method="POST" enctype="multipart/form-data">
					<?php
					$stmt = pdoExec("SELECT * FROM IMAGENS WHERE IMG_SRV_ID=?", [$value['SRV_ID']]);
					$data = $stmt -> fetchAll();
					foreach ($data as $value2) {
						$img = $value2['IMG_NOME'];
					}
					if($stmt->rowCount() <= 0){
						$img = "../img/default.jpeg";
					}
					?>
					<img src="<?=$img;?>">
					<p>Adicionar foto</p>
					<input type="file" name="img[]" multiple style="height: 20px;">
					<br><p style="margin-top: 80px;"><h2>Nome do servico / Produto</h2></p> <input type="text" name="name" value="<?= $value['SRV_NOME'];?>"><br>
	                <br><p>Categoria <span>*</span></p>
	                <select name="type" class="type" required="">
	                    <option value="null" class='null' readonly >Selecione</option>
	                    <?php 
	                    $dados = pdoExec("SELECT * FROM CATEGORIAS",[]);
	                    $resultado = $dados -> fetchAll();
	                    foreach ($resultado as $subcategoria) : ?>                            
	                    <option value=<?=$subcategoria['CTG_ID'];?> > <?= utf8_encode($subcategoria['CTG_NOME']);?> </option>
	                    <?php endforeach; ?>
	                </select>
                <br><p class="subtype">Subcategoria <span>*</span></p>
                <select name="subtype" class="subtype" required="">
                </select>
					<h3>Preço</h3>
					<input type="text" name="price" value="<?=$value['SRV_PRECO'];?>"><br>
					<h3>Descrição</h3>
					<textarea name="description"><?= $value['SRV_DESCRICAO'];?></textarea><br>
					<input type="hidden" name="id_servico" value="<?=$value['SRV_ID'];?>">
					<br><p>CEP <span>*</span></p>
	                <input  type="text" name="cep" id="cep" minlength="9" maxlength="10" value="<?=$value['SRV_CEP'];?>" required>

	                <br><p>Número do estabelecimento<span>*</span></p>     
	                <input type="text" name="numero" id="numero" value="<?=$value['SRV_NUMERO'];?>" required>

	                <br><p>Logradouro <span>*</span></p>
	                <input type="text" name="logradouro" id="rua" value="<?=$value['SRV_LOGRADOURO'];?>" required  maxlength="45"/>

	                <br><p>Bairro <span>*</span></p>
	                <input type="text" name="bairro" id="bairro" value="<?=$value['SRV_BAIRRO'];?>" required>

	                <br><p>Cidade <span>*</span></p>
	                <input type="text" name="cidade" id="cidade" value="<?=$value['SRV_CIDADE'];?>" required  maxlength="25" />

	                <br><p>Estado <span>*</span></p>
	                <input type="text" name="estado" id="uf" value="<?=$value['SRV_ESTADO'];?>" required><br>	
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