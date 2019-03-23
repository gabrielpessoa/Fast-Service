<?php 
include("functions.php"); 
if (!isLogged()) {
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
                    <li><a href="../index.php">Início</a></li>
                    <li><a href="#">Sobre</a></li>
                    <li><a href="perfil.php">Minha conta</a></li>
                    <li><a href="servico.php">Anunciar</a></li>
                    <li><a href="logout.php" class="btn-login">Sair</a></li>
                </ul>
                
            </nav>
            <label>.</label>
            <div class="cadastro" style="width: 380px; height: 400px; border: solid 1px #babaca; margin-top: 120px;">
                
                <form id="tab">
                    <br><p>Nome</p>
                    <input type="text" value="<?=$_SESSION['userName']?>"disabled><br>
                    <br><p>Email</p>
                    <input type="email" value="<?=$_SESSION['userEmail']?>"disabled><br>
                    <br><p>Contato</p>
                    <input type="email" value="...."disabled><br>
                </form>
            </div>
        </div>
    </center>

	<footer class="rodape">©Copyright 2019</footer>
</body>
</html>