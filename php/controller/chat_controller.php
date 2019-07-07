
<body>
	<div class="show_chat">Chat</div>
	<aside class="users_online">

		<ul>
		<?php
			$stmt=pdoExec("SELECT * FROM USUARIOS WHERE USER_ID!=?", [$_SESSION['userId']]);
			$resultado=$stmt->fetchAll();
			foreach ($resultado as $value) : ?>
			<li id="<?=$value['USER_ID'];?>">
				<div class="imgSmall"><img src="../../img/usuarios/profile-default.png"/></div>
				<a href="#" id="<?= $_SESSION['userId'].':'.$value['USER_ID'];?>" class="comecar"><?= $value['USER_NOME'];?></a>
				<span id="<?=$value['USER_ID'];?>" class="status off"></span>
			</li>
		<?php endforeach; ?>
		</ul>
	</aside>

	<aside class="chats">
	</aside>
	
		<script>
		$(".users_online ul li a").click(function(e){
			e.preventDefault();
		});
	</script>
	<script src="../../js/chat.js"></script>
	<!-- <link rel="stylesheet" type="text/css" href="../css/style.css"> -->
</body>