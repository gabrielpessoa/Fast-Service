<?php  
include("functions_controller.php");
$id = $_POST['id'];
if(isLogged()){
    addVisitas($id);
}
?>