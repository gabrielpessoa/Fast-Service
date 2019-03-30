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
            <nav>
                
                <a href="../index.php"><img src="../img/3.png"></a>
                <ul>
                    <li><a href="../index.php">Início</a></li>
                    <li><a href="sobre.php">Sobre</a></li>
                    <li><a href="ajuda.php">Ajuda</a></li>
                    <li><a href="perfil.php">Minha conta</a></li>
                    <li><a href="servico.php">Anunciar</a></li>
                    <li><a href="logout.php" class="btn-login">Sair</a></li>
                </ul>
                
            </nav>


        <div class="window" id="janela">
            <center>
                <a href="#" class="fechar">X</a>
                <h4>Login</h4>
                <hr>
                <form action="php/login2.php" method="POST">
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