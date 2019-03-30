<?php  
include('functions.php');
$data['comentario'] = $_POST['comentario'];
$data['id_servico'] = $_POST['id_servico'];
addComentario($data);
?>