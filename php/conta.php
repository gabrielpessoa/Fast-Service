<div class="account" id="account">
		<center>
			<a href="#" class="fechar">X</a>
			<h3><i class="fas fa-user-alt"></i> Minha conta</h3>
			<hr>
			<p><a href="perfil.php" class="link"><i class="fas fa-user-circle"></i><br>Meu perfil</a></p><hr class="hr">
			<p><a href="anuncios.php" class="link"><i class="fas fa-ad"></i><br>Meus anúncios</a></p><hr class="hr">
			<p><a href="favoritos.php" class="link"><i class="fas fa-star"></i></i><br>Favoritos</a></p><hr class="hr"><hr class="hr">
			<p><a href="views.php" class="link"><i class="fas fa-eye"></i><br>Anúncios visitados</a></p>
			<?php if ($_SESSION['userTipo'] == 2 ): ?>
				<hr class="hr">
				<p><a href="gerenciaUser.php" class="link"><i class="fas fa-eye"></i><br>Gerenciamento de Usuarios</a></p>
			<?php endif ?>

		</center>
	</div>

<div id="mascara">
	
</div>