<?php include("functions.php"); ?>
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
                <a href="../index.php"><img src="../img/1.jpeg"></a>
                <ul>
                    <li><a href="../index.php">Início</a></li>
                    <li><a href="#">Sobre</a></li>
                    <li><a href="register.php">Registrar-se</a></li>
                    <?php if (isLogged() ){ ?>
                        <li><a href="perfil.php">Minha conta</a></li>
                        <li><a href="servico.php">Anuciar</a></li>
                        <li><a href="logout.php" class="btn-login">Sair</a></li>
                    <?php } else{ ?>
                    <li><a href="#janela" rel="modal" class="btn-login">Login</a></li>
                <?php } ?>
                </ul>
                
            </nav>

			<label>.</label>
			<div class="cadastro" style="border: solid 1px #babaca; margin-top: 120px;">		
                <form action="servico_proc.php" method="POST">
                    <p class="primary">Nome do Serviço/Produto</p><br>
                    <input type="text" name="nome" class="fadeIn second" placeholder="Digite aqui"><br>
                    <br><p>Tipo</p>
                    <input type="text" name="tipo" class="fadeIn second" required placeholder="Digite aqui"><br>
                    <br><p>Descrição</p>
                    <textarea style=" width:365px ; height: 50px; resize: none;" name="descricao" placeholder="Digite aqui" cols="30" rows="10"></textarea><br>
                    <br><p>Localização</p><br>
                    <input type="text" name="localizacao" class="fadeIn second" required placeholder="Digite aqui"><br>
                    <br><p>Preço</p>
                    <input type="text" name="preco" class="fadeIn second" required placeholder="Digite aqui"><br>
                    <button type="submit">Cadastrar</button>
                </form>
			</div>
		</div>
	</center>
	<footer class="rodape">©Copyright 2019</footer>
</body>
</html>