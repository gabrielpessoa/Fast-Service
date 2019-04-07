<?php
include("functions.php");
$dados['name'] = addslashes($_POST['name']);
$dados['description'] = addslashes($_POST['description']);
$dados['location'] = addslashes($_POST['location']);
$dados['price'] = addslashes($_POST['price']);
$dados['id_servico'] = addslashes($_POST['id_servico']);
$img = $_FILES['img'];
$caminho = "../produtos/img/";
$count = count(array_filter($img['name']));
$permite = ['image/jpeg', 'image/png', 'image/jpg'];
$id_servico= 0;
$usuario = $_SESSION['userId'];
$conn = conexao();
for($i=0; $i< $count; $i++){
	$name = $img['name'][$i];
	$tmp = $img['tmp_name'][$i];
	$ext = @end(explode('.', $name));
	$newname = rand().".$ext";
	$diretorio = $caminho.$newname;
	var_dump($diretorio);
	move_uploaded_file($tmp, $diretorio);
	
	$stmt = $conn -> prepare("INSERT INTO IMAGENS SET IMG_NOME=?, IMG_SRV_ID=?");
	$stmt -> execute([$diretorio, $dados['id_servico']]);


}
//updateServico($dados);
?>