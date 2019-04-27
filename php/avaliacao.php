<?php 
include("functions.php");
if(!isLogged()){
	header('location: index.php');
	exit();
}
$estrela = $_POST['estrela'];
$codigo = $_POST['codigo'];
$usuario = $_SESSION['userId'];
$pessoas = 1;
$qtd_estrela = 0;
$stmt = pdoExec("SELECT * FROM AVALIACOES WHERE AVL_USER_ID=? AND AVL_SRV_ID=?", [$usuario, $codigo]);
if ($stmt ->rowCount() >0) {
	$data = $stmt ->fetchAll();
	foreach ($data as $value) :
		$star = $value['AVL_QTD_ESTRELAS'];
		if($estrela == $value['AVL_QTD_ESTRELAS']){
			exit();
		}

		elseif($estrela < $value['AVL_QTD_ESTRELAS']){
			$stmt = pdoExec("SELECT * FROM MEDIA_AVALIACOES WHERE MDAV_SRV_ID=?", [$codigo]);
			$dados = $stmt -> fetchAll();
			foreach ($dados as $value) {
				$qtd_estrela = $value['MDAV_QTD_ESTRELAS']-$star;
				$pessoas = $value['MDAV_TOTAL_PESSOAS'];
				$_SESSION['teste'] = $qtd_estrela;
				$_SESSION['teste2'] = $media;
				pdoExec("UPDATE MEDIA_AVALIACOES SET MDAV_QTD_ESTRELAS=?, WHERE MDAV_SRV_ID=?", [$qtd_estrela, $codigo]);
			}
			pdoExec('UPDATE AVALIACOES SET AVL_QTD_ESTRELAS=? WHERE AVL_USER_ID=? AND AVL_SRV_ID=?', [$estrela, $usuario, $codigo]);
			$qtd_estrela+=$estrela;
			$media = $qtd_estrela/$pessoas;
			pdoExec("UPDATE MEDIA_AVALIACOES SET MDAV_QTD_ESTRELAS=?, MDAV_MEDIA=? WHERE MDAV_SRV_ID=?", [$qtd_estrela , $media, $codigo]);
		}

		else{
			$stmt = pdoExec("SELECT * FROM MEDIA_AVALIACOES WHERE MDAV_SRV_ID=?", [$codigo]);
			$dados = $stmt -> fetchAll();
			foreach ($dados as $value) {
				$qtd_estrela = $value['MDAV_QTD_ESTRELAS']-$star;
				$media = $qtd_estrela/$value['MDAV_TOTAL_PESSOAS'];
				$pessoas = $value['MDAV_TOTAL_PESSOAS'];
				pdoExec("UPDATE MEDIA_AVALIACOES SET MDAV_QTD_ESTRELAS=?, WHERE MDAV_SRV_ID=?", [$qtd_estrela, $codigo]);
			}
		
			pdoExec('UPDATE AVALIACOES SET AVL_QTD_ESTRELAS=? WHERE AVL_USER_ID=? AND AVL_SRV_ID=?', [$estrela, $usuario, $codigo]);
			$qtd_estrela += $estrela;
			$media = $qtd_estrela/$pessoas;
			pdoExec("UPDATE MEDIA_AVALIACOES SET MDAV_QTD_ESTRELAS=?, MDAV_MEDIA=? WHERE MDAV_SRV_ID=?", [$qtd_estrela, $media, $codigo]);
		}
	endforeach;
}

else{
	pdoExec("INSERT INTO AVALIACOES SET AVL_USER_ID=?, AVL_SRV_ID=?, AVL_QTD_ESTRELAS=?", [$usuario, $codigo, $estrela]);
	$stmt = pdoExec("SELECT * FROM MEDIA_AVALIACOES WHERE MDAV_SRV_ID=?", [$codigo]);
	$dados = $stmt -> fetchAll();
	$md = 0;
	foreach ($dados as $value) {
		$pessoas+=$value['MDAV_TOTAL_PESSOAS'];
		$qtd_estrela+=$value['MDAV_QTD_ESTRELAS'];
		$md+=$qtd_estrela/$pessoas;
	}
	$estrela+=$qtd_estrela;
	$media = $estrela/$pessoas;
	$stmt = pdoExec("UPDATE MEDIA_AVALIACOES SET MDAV_TOTAL_PESSOAS=?, MDAV_QTD_ESTRELAS=?, MDAV_MEDIA=? WHERE MDAV_SRV_ID=?", [$pessoas, $estrela, $media, $codigo]);
	}
?>