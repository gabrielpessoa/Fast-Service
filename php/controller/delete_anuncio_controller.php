<?php 
include("functions_controller.php");
$data['id_servico'] = $_GET['i'];
deleteServico($data);
?>