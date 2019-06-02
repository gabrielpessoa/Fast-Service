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
	<meta charset="UTF-8">
	<title>Cadastro de servico</title>
	<link rel="stylesheet" href="../css/style.css">
    <link rel="shortcut icon" type="image/x-png" href="../img/3.png">
	<script src="../js/jquery.js"></script>	
	<script src="../js/functions.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <script type="text/javascript" src="../js/jquery.maskedinput-1.1.4.pack.js"/></script>
</head>
<body>
	<center>
		<div>
            <nav>	
                <a href="../index.php"><img src="../img/3.png"></a>
                <ul>
                    <li><a href="../index.php"><i class="fas fa-home"></i>Início</a></li>
                    <li><a href="ajuda.php"><i class="fas fa-question-circle"></i>Ajuda</a></li>
                    <li><a href="servico.php"><i class="fas fa-ad"></i>Anunciar</a></li>
                    <li><a href="#account" rel="account"><i class="fas fa-user-alt"></i>Minha conta</a></li>
                    <?php if ($_SESSION['userTipo'] > 0): ?>
                        <li><a href="addCategoria.php"><i class="fas fa-plus-circle"></i>Criar Categorias</a></li>
                    <?php endif ?>
                    <li><a href="logout.php" class="btn-login"><i class="fas fa-sign-out-alt"></i> Sair</a></li>
                </ul>
            </nav>
        </div>
		<br>
        <div class="busca">
            <form action="search.php">
                <input type="text" name="search" placeholder="  Estou procurando por..." required>
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
            <h2>Cadastro de serviço</h2>		
            <form action="servico_proc.php" method="POST" enctype="multipart/form-data">
                <p class="primary">Nome do Serviço <span>*</span></p><br>
                <input type="text" name="name" placeholder="Digite aqui"><br>
                <br><p>Categoria <span>*</span></p>
                <select style="border: solid 1px #babaca;" name="type" class="type" required="">
                    <option value="null" class='null' readonly >Selecione</option>
                    <?php 
                    $dados = pdoExec("SELECT * FROM CATEGORIAS",[]);
                    $resultado = $dados -> fetchAll();
                    foreach ($resultado as $value) : ?>                            
                    <option value=<?=$value['CTG_ID'];?> > <?= utf8_encode($value['CTG_NOME']);?> </option>
                    <?php endforeach; ?>
                </select>
                <br><p class="subtype">Subcategoria <span>*</span></p>
                <select style="border: solid 1px #babaca;" name="subtype" class="subtype" required="">
                </select>
                <br><p>Descrição</p>
                <textarea style="border: solid 1px #babaca;" name="description" placeholder="Digite aqui"></textarea><br>

                <br><p>Tags</p>

                <input style="width:15.5%;" class="tags" placeholder="1° tag" type="text" name="tag1" id="tag1" maxlength="15" required>
                <input style="width:15.5%;" class="tags" placeholder="2° tag" type="text" name="tag2" id="tag2" maxlength="15">
                <input style="width:15.5%;" class="tags" placeholder="3° tag" type="text" name="tag3" id="tag3" maxlength="15">

                <br><br><p>CEP <span>*</span></p>
                <input  type="text" name="cep" id="cep" minlength="9" maxlength="10" required><br>

                <br><p>Número do estabelecimento<span>*</span></p>     
                <input type="text" name="numero" id="numero" required><br>

                <br><p>Logradouro <span>*</span></p>
                <input type="text" name="logradouro" id="rua" required  maxlength="45"/><br>

                <br><p>Bairro <span>*</span></p>
                <input type="text" name="bairro" id="bairro" required><br>

                <br><p>Cidade <span>*</span></p>
                <input type="text" name="cidade" id="cidade" required  maxlength="25" /><br>

                <br><p>Estado <span>*</span></p>
                <input type="text" name="estado" id="uf" required><br>
                <br><p>Preço</p>
                <input type="number" name="price" placeholder="Digite aqui" min="0" max="500000"><br>
                <br><p>Fotos para o anúncio</p><br>
                <!-- <div class='input-wrapper'>
                    <label for="seleciona-foto">Selecionar foto</label><br> -->
                <input type="file" name="foto[]" id="seleciona-foto" multiple><br>
                    <!-- <p id='file-name'></p>
                </div> -->
                <button type="submit" name="cadastrar">Cadastrar</button>
            </form>
		</div>
	</center>
    <?php include("conta.php");?>
	<footer class="rodape">©Copyright 2019</footer>
</body>
</html>