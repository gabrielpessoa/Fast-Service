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
	<title>Cadastro de usuários</title>
	<link rel="stylesheet" href="../css/style.css">
	<script src="../js/jquery.js"></script>	
	<script src="../js/functions.js"></script>	
</head>
<body>
	<center>
		<div>
            <nav class="black">	
                <a href="../index.php"><img src="../img/3.png"></a>
                <ul>
                    <li><a href="../">Início</a></li>
                    <li><a href="sobre.php">Sobre</a></li>
                    <li><a href="ajuda.php">Ajuda</a></li>
                    <li><a href="anuncios.php">Meus anúncios</a></li>
                    <li><a href="perfil.php">Minha conta</a></li>
                    <li><a href="servico.php">Anunciar</a></li>
                    <li><a href="logout.php" class="btn-login">Sair</a></li>
                </ul>
                
            </nav>

			<label>.</label>
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
                    <input type="file" name="foto" required><br>
                    <button type="submit" name="cadastrar">Cadastrar</button>
                </form>
			</div>
		</div>
	</center>
	<footer class="rodape">©Copyright 2019</footer>
</body>
</html>