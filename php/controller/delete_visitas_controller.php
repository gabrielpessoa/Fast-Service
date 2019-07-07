<?php 
include("functions_controller.php");
pdoExec("DELETE FROM VISITAS WHERE VISI_USER_ID=?", [$_SESSION['userId']]);
?>