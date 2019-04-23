<?php 
include("functions.php"); 
if (!isLogged()) {
    header('location: ../index.php');
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
                <form action="search.php" method="GET">
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

            <div class="search"> 
                <?php 
                    if(isset($_SESSION['erro_senha'])){ ?>
                    <p class="red">Senha atual incorreta</p>
                    <?php } unset($_SESSION['erro_senha']);?>
                  
                  <?php if(isset($_SESSION['erro_senha_diferente'])){ ?>
                    <p class="red">Senhas não correspondem</p>
                    <?php } unset($_SESSION['erro_senha_diferente']);?>

                

                <form method="POST" action="alterar_senha_control.php">
                    <p>Senha atual</p>
                    <input type="password" name="password" required> 
                    <p>Nova senha</p>
                    <input type="password" name="newpassword" required>
                    <p>Confirmar nova senha</p>
                    <input type="password" name="newpassword2" required>
                    <br>
                    <button type="submit">Alterar senha</button>

                </form>

            </div>
             </center>
    <?php include("conta.php");?>
    <footer class="rodape">©Copyright 2019</footer>
</body>
</html>