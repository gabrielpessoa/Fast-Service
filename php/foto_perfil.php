<?php  
include("functions.php");
$img = $_FILES['img'];
$permite = ['image/jpeg', 'image/png', 'image/jpg'];
$tmp = $img['tmp_name'];
$name = $img['name'];
$ext = @end(explode('.', $name));
$newname = rand().".$ext";
$caminho = "../img/usuarios/";
$diretorio = $caminho.$newname;
$usuario = $_SESSION['userId'];
move_uploaded_file($tmp, $diretorio);
$data = pdoExec("UPDATE USUARIOS SET USER_IMAGEM=? WHERE USER_ID=?", [$diretorio, $usuario]);
header("location: perfil.php");
?>