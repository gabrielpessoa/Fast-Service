<?php 
include("functions.php");
if(!isLogged()){
	header('location: index.php');
}
$estrela = $_POST['estrela'];
$codigo = $_POST['codigo'];
$usuario = $_SESSION['userId'];
$pessoas = 1;
$qtd_estrela = 0;
// $stmt = pdoExec("SELECT * FROM AVALIACOES WHERE AVL_USER_ID=? AND AVL_SRV_ID=?", [$usuario, $codigo]);
// if ($stmt ->rowCount() >0) {
// 	$data = $stmt ->fetchAll();
// 	foreach ($data as $value) {
// 		if($estrela == $$value['AVL_QTD_ESTRELAS']){
// 			exit();
// 		}
// 		elseif($estrela < $value['AVL_QTD_ESTRELAS']){
// 			$qtd_estrela = $value['AVL_QTD_ESTRELAS']-$estrela;
// 		}
// 		else{
// 			$qtd_estrela = $estrela;
// 		}
// 	}
// 	pdoExec("UPDATE AVALIACOES SET AVL_QTD_ESTRELAS=? WHERE AVL_USER_ID=? AND AVL_SRV_ID=?", [$qtd_estrela, $usuario, $codigo]);
// 	$stmt = pdoExec("SELECT * FROM MEDIA_AVALIACOES WHERE MDAV_SRV_ID=?", [$codigo]);
// 	$dados = $stmt -> fetchAll();
// 	foreach($dados as $val){
// 		$star = $val['MDAV_QTD_ESTRELAS']-$qtd_estrela;
// 		$media = $qtd_estrela/$val['MDAV_TOTAL_PESSOAS'];
// 	}
// 	pdoExec("UPDATE MEDIA_AVALIACOES SET MDAV_QTD_ESTRELAS=?, MDAV_MEDIA=? WHERE MDAV_SRV_ID=?", [$qtd_estrela, $media, $codigo]);
// }

else{
	pdoExec("INSERT INTO AVALIACOES SET AVL_USER_ID=?, AVL_SRV_ID=?, AVL_QTD_ESTRELAS=?", [$usuario, $codigo, $estrela]);
$stmt = pdoExec("SELECT * FROM MEDIA_AVALIACOES WHERE MDAV_SRV_ID=?", [$codigo]);
$dados = $stmt -> fetchAll();
foreach ($dados as $value) {
	$pessoas+=$value['MDAV_TOTAL_PESSOAS'];
	$estrela+=$value['MDAV_QTD_ESTRELAS'];
}
$media=$estrela/$pessoas;
$stmt = pdoExec("UPDATE MEDIA_AVALIACOES SET MDAV_TOTAL_PESSOAS=?, MDAV_QTD_ESTRELAS=?, MDAV_MEDIA=? WHERE MDAV_SRV_ID=?", [$pessoas, $estrela, $media, $codigo]);
}
?>