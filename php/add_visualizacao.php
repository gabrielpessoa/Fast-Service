<?php  
include("functions.php");
$id = $_POST['id'];
if(isLogged()){
	addVisualizacao($id);
}
?>