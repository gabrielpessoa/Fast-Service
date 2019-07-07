<?php include("../controller/functions_controller.php"); ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<title>Fast-Service</title>
	<link rel="stylesheet" type="text/css" href="../../css/style.css">
	<script src="../../js/jquery.js"></script>
	<script src="../../js/functions.js"></script>
	<link rel="shortcut icon" type="image/x-png" href="../../img/3.png">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
	<script type="text/javascript" src="../js/jquery.cycle.all.js"></script>
</head>
<body>
	<div>
		<?php include("menu_view.php");?>
	</div>

	<br>
	<center>
		<div class="busca">
			<form action="search_view.php">
                <input type="text" name="search" placeholder="  Estou procurando por..." required>
                <button type="submit"><i class="fas fa-search" ></i></button>
        	</form>
            <ul class="icons-busca">
                <li class="icons"> <a href=search_view.php?search=<?=md5(4);?> > <i class="fas fa-tshirt"></i>Moda e Beleza </a></li>
                <li class="icons"> <a href=search_view.php?search=<?=md5(7);?> > <i class="fas fa-volleyball-ball"></i>Esportes e Lazer </a></li>
                <li class="icons"> <a href=search_view.php?search=<?=md5(8);?> > <i class="fas fa-mortar-pestle"></i>Culinária </a></li>
                <li class="icons"> <a href=search_view.php?search=<?=md5(10);?> ><i class="fas fa-guitar"></i>Músicas e Hobbies </a></li>
                <li class="icons"> <a href=search_view.php?search=todos><i class="fas fa-th-list"></i>Todas as Categorias </a></li>
            </ul>
		</div>

	<div class="profile">
		 	<center>
		<div class="adverts" style="justify-content: center;">
			 		
			<?php 
			$id= 0;
			$stmt = pdoExec("SELECT * FROM VISUALIZACOES WHERE VISU_USER_ID=?", [$_SESSION['userId']]);
			$result = $stmt->fetchAll();

			foreach ($result as $val) {
				$id = $val['VISU_SRV_ID']; 
                $ser = pdoExec("SELECT * FROM SERVICOS WHERE SRV_ID=?", [$id]);
                $valor = $ser -> fetchAll();
                foreach ($valor as $value1) {?>
                <a href="desc_produto_view.php?desc=<?=md5($value1['SRV_ID']);?>">
                    <div>
                    <?php 
                    $dt = pdoExec("SELECT * FROM IMAGENS WHERE IMG_SRV_ID=? LIMIT 1", [$value1['SRV_ID']]);
                    $dados2 = $dt -> fetchAll();
                    if($dt->rowCount()<=0){ ?>
                            <img src="../../img/default.jpeg">
                    <?php }
                    foreach($dados2 as $val){?>
                        <img src="<?=$val['IMG_NOME'];?>">
                    <?php } ?>
                    <br><p style="margin-top: 20px;"><h2><?= $value1['SRV_NOME'];?></h2></p><hr>
                    <h3>Preço</h3>
                    <p><?= "R$: ".$value1['SRV_PRECO'];?></p>
                    </div>
                </a>
           <?php } }?>  
        </div>	
       </center>
	</div>
			
		
	<?php 
	include("conta_views.php");
	include("../controller/chat_controller.php");
	?>

	<footer class="rodape">©Copyright 2019</footer>

</body>
</html>