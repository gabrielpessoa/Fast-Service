<?php include("php/functions.php"); ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<title>Fast-Service</title>
	<link rel="stylesheet" href="../css/styleLogin.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<script src="js/jquery.js"></script>
	<script src="js/functions.js"></script>
	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
	
	<script src="bootstrap/js/bootstrap.min.js"></script>
</head>
<body>
	<div>
		<nav>
			
			<img src="img/1.jpeg">
			<ul>
				<li><a href="#">Início</a></li>
				<li><a href="#">Sobre</a></li>
				<li><a href="php/register.php">Registrar-se</a></li>
				<?php if (isLogged() ){ ?>
					<li><a href="php/perfil.php">Minha conta</a></li>
					<li><a href="php/logout.php" class="btn-login">Sair</a></li>
				<?php } else{ ?>
				<button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo" a href="php/login.php">Login</button>
			<?php } ?>
			</ul>
			
		</nav>

		<div class="header-bg">
			<h2><label>F</label>ast -</h2><br>
			<h3><label>S</label>ervice</h3>
		</div>

			<section>
			<h2>Fast-Service</h2>
			<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
			<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PcageMaker including versions of Lorem Ipsum.</p>
		</section>
	</div>
	
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
            <label for="recipient-name" class="col-form-label">Login</label>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
           	<div class="input-group flex-nowrap">
            	<label for="recipient-name" class="col-form-label">Usuário:</label><br>
			  	<input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="addon-wrapping">
			</div>
        </form>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Senha:</label>
            <input type="password" class="form-control" id="recipient-name">
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Entrar</button>
      </div>
    </div>
  </div>
</div>


	<footer class="rodape">©Copyright 2019</footer>

</body>
</html>