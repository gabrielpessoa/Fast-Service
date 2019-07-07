
<nav> 
    <a href="../index.php"><img src="../../img/3.png"></a>
    <ul>
        <li><a href="../../index.php"><i class="fas fa-home"></i>Início</a></li>
        <li><a href="ajuda_view.php"><i class="fas fa-question-circle"></i>Ajuda</a></li>
        <?php 
        	if(isLogged()){ ?>
                <li><a href="adiciona_servico_view.php"><i class="fas fa-ad"></i>Anunciar</a></li>
                <li><a href="#account" rel="account"><i class="fas fa-user-alt"></i>Minha conta</a></li>
        	   <?php 
                if ($_SESSION['userTipo'] > 0): ?>
            		<li><a href="add_categoria_view.php"><i class="fas fa-plus-circle"></i>Criar Categorias</a></li>
        <?php endif ?>
        	<li><a href="../controller/logout_controller.php" class="btn-login"><i class="fas fa-sign-out-alt"></i> Sair</a></li>
        <?php 
            }else{?>
            <li><a href="cadastro_usuario_view.php"><i class="fas fa-user-plus"></i>Registrar-se</a></li>
            <li><a href="#janela" rel="modal" class="btn-login"><i class="fas fa-user-alt"></i>Login</a></li>
                <?php }?>

    </ul>
    
</nav>