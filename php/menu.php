	<nav>
		<a href="index.php"><img src="../img/3.png"></a>
		<ul>
			<li><a href="../">Início</a></li>
			<li><a href="sobre.php">Sobre</a></li>
			<li><a href="ajuda.php">Ajuda</a></li>
			<?php if (isLogged() ){ ?>
				<li><a href="anuncios.php">Meus anúncios</a></li>
				<li><a href="perfil.php">Minha conta</a></li>
				<li><a href="servico.php">Anunciar</a></li>
				<?php if ($_SESSION['userTipo'] > 0): ?>
					<li><a href="addCategoria.php">Criar Categorias</a></li>
				<?php endif ?>
				<li><a href="logout.php" class="btn-login">Sair</a></li>
			<?php } else{ ?>
				<li><a href="register.php">Registrar-se</a></li>
				<li><a href="#janela" rel="modal" class="btn-login">Login</a></li>
			<?php } ?>
		</ul>	
	</nav>