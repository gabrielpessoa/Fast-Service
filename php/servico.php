<?php 
include("functions.php"); 
if(!isLogged()){
    header('location: /');
    exit();
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<title>Cadastro de servico</title>
	<link rel="stylesheet" href="../css/style.css">
	<script src="../js/jquery.js"></script>	
	<script src="../js/functions.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
</head>
<body>
	<center>
		<div>
            <nav>	
                <a href="../index.php"><img src="../img/3.png"></a>
                <ul>
                    <li><a href="/"><i class="fas fa-home"></i>Início</a></li>
                    <li><a href="ajuda.php"><i class="fas fa-question-circle"></i>Ajuda</a></li>
                    <li><a href="servico.php"><i class="fas fa-ad"></i>Anunciar</a></li>
                    <li><a href="#account" rel="account"><i class="fas fa-user-alt"></i>Minha conta</a></li>
                    <li><a href="logout.php" class="btn-login"><i class="fas fa-sign-out-alt"></i> Sair</a></li>
                </ul>
            </nav>

    		<br>
            <div class="busca">
                <form action="search.php">
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

			<div class="cadastro">		
                <form action="servico_proc.php" method="POST" enctype="multipart/form-data">
                    <p class="primary">Nome do Serviço</p><br>
                    <input type="text" name="name" placeholder="Digite aqui"><br>
                    <br><p>Tipo</p>
                    <select name="type">
                        <option disabled>Selecione</option>
                        <?php 
                        $dados = pdoExec("SELECT * FROM CATEGORIAS",[]);
                        $resultado = $dados -> fetchAll();
                        foreach ($resultado as $value) : ?>                            
                        <option value=<?=$value['CTG_ID'];?> > <?= utf8_encode($value['CTG_NOME']);?> </option>
                    <?php endforeach; ?>
                    </select>
                    <br><p>Descrição</p>
                    <textarea name="description" placeholder="Digite aqui"></textarea><br>
                    <br><p>Cidade</p><br>
                    <input type="text" name="location" required placeholder="Digite aqui"><br>
                    <br><p>Preço</p>
                    <input type="number" name="price" required placeholder="Digite aqui"><br>
                    <br><p>Anexar Imagem</p><br>
                    <input type="file" name="foto[]" multiple><br>
                    <button type="submit" name="cadastrar">Cadastrar</button>
                </form>
			</div>
		</div>
	</center>
    <?php include("conta.php");?>
	<footer class="rodape">©Copyright 2019</footer>
</body>
</html>