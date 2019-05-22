<?php 
include("functions.php"); 
if (!isLogged()) {
    header('location: ../index.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Perfil do usuário</title>
    <link rel="stylesheet" href="../css/style.css">
    <script src="../js/jquery.js"></script> 
    <script src="../js/functions.js"></script> 
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
</head>
<body>
        <div>
            <nav> 
                <a href="../index.php"><img src="../img/3.png"></a>
                <ul>
                    <li><a href="/"><i class="fas fa-home"></i>Início</a></li>
                    <li><a href="ajuda.php"><i class="fas fa-question-circle"></i>Ajuda</a></li>
                    <li><a href="servico.php"><i class="fas fa-ad"></i>Anunciar</a></li>
                    <li><a href="#account" rel="account"><i class="fas fa-user-alt"></i>Minha conta</a></li>
                    <?php if ($_SESSION['userTipo'] > 0): ?>
                        <li><a href="addCategoria.php"><i class="fas fa-plus-circle"></i>Criar Categorias</a></li>
                    <?php endif ?>
                    <li><a href="logout.php" class="btn-login"><i class="fas fa-sign-out-alt"></i> Sair</a></li>
                </ul>
                
            </nav>
            <br>
    <center>
            <div class="busca">
                <form action="search.php" name="search" method="GET">
                    <input type="text" placeholder="  Estou procurando por..." required>
                    <button type="submit"><i class="fas fa-search" ></i></button>
                </form>
                    <ul class="icons-busca">
                        <li class="icons"> <a href=search.php?search=<?=md5(4);?> > <i class="fas fa-tshirt"></i>Moda e Beleza </a></li>
                        <li class="icons"> <a href=search.php?search=<?=md5(7);?> > <i class="fas fa-volleyball-ball"></i>Esportes e Lazer </a></li>
                        <li class="icons"> <a href=search.php?search=<?=md5(8);?> > <i class="fas fa-mortar-pestle"></i>Culinária </a></li>
                        <li class="icons"> <a href=search.php?search=<?=md5(10);?> ><i class="fas fa-guitar"></i>Músicas e Hobbies </a></li>
                        <li class="icons"> <a href=search.php?search=todos><i class="fas fa-th-list"></i>Todas as Categorias </a></li>
                    </ul>
            </div>
            <div class="profile">
                <?php if(isset($_SESSION['senha_sucesso'])){ ?>
                    <p class="blue">Senha alterada com sucesso</p>
                    <?php } unset($_SESSION['senha_sucesso']);?>
                <center>
                    <div class="info">
                        <?php
                        $contador = 0; $media = 0; $mediaUsuario=0;
                        $id = $_SESSION['userId'];
                        $stmt = pdoExec("SELECT * FROM USUARIOS WHERE md5(USER_ID)=?", [md5($id)]);
                        $dados = $stmt -> fetchAll();
                        foreach ($dados as $value) : ?>
                            <img src="<?=$value['USER_IMAGEM'];?>">
                            
                            <div class="dados">
                                <label>Nome: </label><br>
                                <p><?=$value['USER_NOME'];?></p><br>
                                <label>E-mail: </label><br>
                                <p><?=$value['USER_EMAIL'];?></p><br>
                                <label>Telefone para contato: </label><br>
                                <p><?=$value['USER_TELEFONE'];?></p><br>
                                <?php 
                                    $stmt = pdoExec("SELECT * FROM SERVICOS WHERE md5(SRV_USER_ID)=?", [md5($id)]);
                                    $data = $stmt -> fetchAll();
                                    foreach ($data as $contar) {
                                        $contador++;
                                    $md = pdoExec("SELECT * FROM MEDIA_AVALIACOES WHERE MDAV_SRV_ID=?", [$contar['SRV_ID']]);
                                    $mdr = $md -> fetchAll();
                                    foreach ($mdr as $resultado) {
                                        $media = $media + $resultado['MDAV_MEDIA'];
                                        }
                                    } 
                                    if ($contador > 0 || $media > 0) {
                                        $mediaUsuario = $media/$contador; 
                                    }
                                ?>
                                <label>Média de serviço do usuário</label>
                        <?php endforeach; ?>
                                <span class="ratingAverage" data-average="<?= $mediaUsuario;?>"></span>
                                
                                <br><div class="barra" style="width: 150px;">
                                    <span class="bg"></span>
                                    <span class="stars">
                                        <?php for($i=1; $i<=5; $i++):?>
                                            <span class="estrela" >
                                            <span class="starAbsolute"></span>
                                        </span>
                                        <?php 
                                            endfor;?>
                                    </span>
                                </div>
                                 
                            </div><!-- div.dados -->
                            <div class="link">
                                <p>Links</p><br> 
                                <a href="alterar_dados.php">Alterar meus dados</a><br>
                                <a href="#" class="visit">Quem acessou meus anúncios?</a><br>
                            </div>
                    </div>
                    <div class="adverts"  style="justify-content: center;">
                        <?php
                            $ser = pdoExec("SELECT * FROM SERVICOS WHERE md5(SRV_USER_ID)=?", [md5($id)]);
                                $valor = $ser -> fetchAll();
                            foreach ($valor as $value1) {?>
                            <a href="desc_produto.php?desc=<?=md5($value1['SRV_ID']);?>">
                                <div>
                                <?php 
                                $dt = pdoExec("SELECT * FROM IMAGENS WHERE IMG_SRV_ID=? LIMIT 1", [$value1['SRV_ID']]);
                                $dados2 = $dt -> fetchAll();
                                if($dt->rowCount()<=0){ ?>
                                        <img src="../img/default.jpeg">
                                <?php }
                                foreach($dados2 as $val){?>
                                    <img src="<?=$val['IMG_NOME'];?>">
                                <?php } ?>
                                <br><p style="margin-top: 20px;"><h2><?= $value1['SRV_NOME'];?></h2></p>
                                <h3>Preço</h3>
                                <p><?= "R$: ".$value1['SRV_PRECO'];?></p>
                                <p>
                                    <?php 
                                    $stmt = pdoExec("SELECT COUNT('VISI_SRV_ID') FROM VISITAS WHERE VISI_SRV_ID=?", [$value1['SRV_ID']]);
                                    $visitas = $stmt->fetchAll();
                                    echo $visitas[0]["COUNT('VISI_SRV_ID')"]." visualizações"; 
                                ?>
                                </p>
                                </div>
                            </a>
                       <?php }?>  
                    </div>
                    <p class="topo"><a href="#" class="top">Início da página</a></p><br>
            </div>
        <div class="visitas">
            <a href="#" class="fechar">X</a>

            <h2>Pessoas que acessaram meus anúncios</h2><br>
           <?php 
                $stmt = pdoExec("SELECT* FROM SERVICOS WHERE SRV_USER_ID=?", [$_SESSION['userId']]);
                $result = $stmt -> fetchAll();
                foreach ($result as $value) {
                    $stmt2 = pdoExec("SELECT * FROM VISITAS WHERE VISI_SRV_ID=?", [$value['SRV_ID']]);
                    $result2 = $stmt2->fetchAll();
                    foreach ($result2 as $value2) {
                        $stmt3 = pdoExec("SELECT * FROM USUARIOS WHERE USER_ID=?", [$value2['VISI_USER_ID']]);
                        $result3 = $stmt3 -> fetchAll();
                        foreach ($result3 as $dado) {
                            $username = $dado['USER_NOME']; ?>
                <p><?=$username;?>  acessou seu anúncio  <?=$value['SRV_NOME'];?>  <label><?=$value2['VISI_DATA'];?></label></p><br>
                        <?php }
                    }
                ?>
            <?php }
            ?>
            <center>
            <!-- <p class="limpa"><a href="">Limpar</a></p> -->
        </center>
        </div>
                </center>
    <?php include("conta.php");?>
	<footer class="rodape">©Copyright 2019</footer>
</body>
</html>