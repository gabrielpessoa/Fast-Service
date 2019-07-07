<?php  
include("functions_controller.php");
$id = $_POST['id'];
if(isLogged()){
	addVisualizacao($id);
}
?> 