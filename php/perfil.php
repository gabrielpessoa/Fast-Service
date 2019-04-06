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
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
</head>
<body>
    <center>
        <div>
            <?php include('menu.php'); ?>
            <br>
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
            <div class="cadastro" style="width: 380px; height: 400px; border: solid 1px #babaca; margin-top: 120px;">
                
                <form id="tab">
                    <br><p>Nome</p>
                    <input type="text" value="<?=$_SESSION['userName']?>"disabled><br>
                    <br><p>Usuário</p>
                    <input type="text" value="<?=$_SESSION['userLogin']?>"disabled><br>
                    <br><p>Email</p>
                    <input type="email" value="<?=$_SESSION['userEmail']?>"disabled><br>
                    <br><p>Contato</p>
                    <input type="email" value="<?=$_SESSION['userFone']?>"disabled><br>
                </form>
            </div>
        </div>
    </center>

	<footer class="rodape">©Copyright 2019</footer>
</body>
</html>