<?php  
include("functions.php");
$id = $_POST['id'];
if(isLogged()){
	$stmt = pdoExec("SELECT * FROM VISUALIZACOES WHERE VISU_SRV_ID=?, VISU_USER_ID=?", [$id, $_SESSION['useId']]);
	$dados = $stmt -> fetchAll();
	foreach ($dados as $value) {
	}
		if($stmt->rowCount()>=1){
			pdoExec("INSERT INTO VISUALIZACOES SET VISU_SRV_ID=?, VISU_USER_ID=?", [$id, $_SESSION['userId']]);
		}
		else{
			exit();
		}
}
?>