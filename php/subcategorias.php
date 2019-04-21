<?php 
include("functions.php");
$consulta = $_POST['type'];
$stmt = pdoExec("SELECT * FROM SUBCATEGORIAS WHERE SCTG_CTG_ID=?", [$consulta]);
$dados = $stmt -> fetchAll();
foreach ($dados as $value) { ?>
	<option value="<?=$value['SCTG_ID'];?>" ><?= utf8_encode($value['SCTG_NOME']);?></option>
	
<?php } ?>