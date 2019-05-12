<?php 
include("functions.php");
//$id = $_POST['id'];
pdoExec("DELETE FROM VISITAS WHERE VISI_USER_ID=?", [$_SESSION['userId']]);
?>