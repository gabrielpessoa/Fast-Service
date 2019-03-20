<?php include "functions.php"; ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<title>Fast-Service - Minha conta</title>
  <link rel="stylesheet" type="text/css" href="../css/styleLogin.css">
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	<script src="../js/jquery.js"></script>
	<script src="../js/functions.js"></script>
	
</head>
<body>
<div class="well">
    <ul class="nav nav-tabs">
      <li class="active"><a href="#home" data-toggle="tab">Profile</a></li>
      <!--<li><a href="#profile" data-toggle="tab">Password</a></li>-->
    </ul>
    <div id="myTabContent" class="tab-content">
      <div class="tab-pane active in" id="home">
        <form id="tab">
            <label>Nome</label>
            <input type="text" value="<?=$_SESSION['username']?>" class="input-xlarge" disabled>
            <label>Email</label>
            <input type="email" value="<?=$_SESSION['userEmail']?>" class="input-xlarge" disabled>
            <label>Contato</label>
            <input type="text" value="..." class="input-xlarge" disabled>
          	<div>
        	    <button class="btn btn-primary">Alterar Dados</button>
        	</div>
        </form>
	  </div>

  </div>

	<footer class="rodape">©Copyright 2019</footer>
	<script>
		
	</script>
</body>
</html>