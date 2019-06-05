<?php 
include("functions.php");
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="../css/style.css">
	<script src="../js/jquery.js"></script>
	<script src="../js/chat.js"></script>
</head>
<body>
	<aside class="users_online">

		<ul>
		<?php
			$stmt=pdoExec("SELECT * FROM USUARIOS WHERE USER_ID!=?", [$_SESSION['userId']]);
			$resultado=$stmt->fetchAll();
			foreach ($resultado as $value) : ?>
			<li id="<?=$value['USER_ID'];?>">
				<div class="imgSmall"><img src="../img/usuarios/profile-default.png"/></div>
				<a href="#" id="<?= $_SESSION['userId'].':'.$value['USER_ID'];?>" class="comecar"><?= $value['USER_NOME'];?></a>
				<span id="<?=$value['USER_ID'];?>" class="status off"></span>
			</li>
		<?php endforeach; ?>
		</ul>
	</aside>

	<aside class="chats">

	</aside>
	
</body>
</html>