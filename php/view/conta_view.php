<div class="account" id="account">
		<center>
			<a href="#" class="fechar">X</a>
			<h3><i class="fas fa-user-alt"></i> Minha conta</h3>
			<hr>
			<p><a href="perfil_view.php" class="link"><i class="fas fa-user-circle"></i><br>Meu perfil</a></p><hr class="hr">
			<p><a href="anuncios_view.php" class="link"><i class="fas fa-ad"></i><br>Meus anúncios</a></p><hr class="hr">
			<p><a href="favoritos_view.php" class="link"><i class="fas fa-star"></i><br>Favoritos</a></p><hr class="hr">
			<p><a href="acessos_view.php" class="link"><i class="fas fa-eye"></i><br>Anúncios visitados</a></p>
			<?php if (isLogged() && $_SESSION['userTipo'] == 2 ): ?>
				<hr class="hr">
				<p><a href="gerenciaUser_view.php" class="link"><i class="fas fa-user-edit"></i><br>Gerenciamento de Usuarios</a></p>
			<?php endif ?>

		</center>
	</div>

<div id="mascara">
	
</div>