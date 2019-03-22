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
                    <?php if (isLogged() ){ ?>
                        <li><a href="perfil.php">Minha conta</a></li>
                        <li><a href="logout.php" class="btn-login">Sair</a></li>
                    <?php } else{ ?>
                    <li><a href="register.php">Registrar-se</a></li>
                    <li><a href="#janela" rel="modal" class="btn-login">Login</a></li>
                <?php } ?>
                </ul>
                
            </nav>
            <label>.</label>
            <div class="cadastro" style="width: 380px; height: 400px; border: solid 1px #babaca; margin-top: 120px;">
                
                <form id="tab">
                    <br><p>Nome</p>
                    <input type="text" value="<?=$_SESSION['username']?>"disabled><br>
                    <br><p>Email</p>
                    <input type="email" value="<?=$_SESSION['userEmail']?>"disabled><br>
                    <br><p>Contato</p>
                    <input type="email" value="...."disabled><br>
                </form>
            </div>
        </div>
    </center>
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

    <script>
        $("a[rel=modal]").click(function(e){
            e.preventDefault();
            var id = $(this).attr("href");
            var alturaTela = $(document).height();
            var larguraTela = $(window).width();

            $("#mascara").css({'width': larguraTela, 'height': alturaTela});
            $("#mascara").fadeIn(1000);
            $("#mascara").fadeTo("slow", 0.8);

            var left = ($(window).width()/2) - ($(id).width()/2);
            var top = ($(window).height()/2) - ($(id).height()/2);

            $(id).css({'left': left, 'top': top});
            $(id).show();

        });

        $("#mascara").click(function(){
            $(this).fadeOut("slow");
            $(".window").fadeOut("slow");
        });
        $(".fechar").click(function(e){
            e.preventDefault();
            $("#mascara").fadeOut(1000, "linear");
            $(".window").fadeOut(1000, "linear");
        });
    </script>
	<footer class="rodape">©Copyright 2019</footer>
</body>
</html>