<?php 
include('functions_controller.php');
$de=$_SESSION['userId'];
$conversa=$_POST['conversacom'];
$stmt=pdoExec("SELECT * FROM MENSAGENS WHERE (MSG_DE=? AND MSG_PARA=? OR MSG_DE=? AND MSG_PARA=?) AND (MSG_DE=? AND MSG_PARA=? OR MSG_DE=? AND MSG_PARA=?) ORDER BY MSG_ID ASC", [$de, $conversa, $conversa, $de, $conversa, $de, $de, $conversa]);
$resultado=$stmt->fetchAll();
	
	foreach ($resultado as $value) {
		if($de==$value['MSG_DE']){
			$janela_de=$value['MSG_PARA'];
		}
		elseif($de==$value['MSG_PARA']){
			$janela_de=$value['MSG_DE'];
		}

		$msg=$value['MSG_MENSAGEM'];
		$mensagens[]= array(
			'id' => $value['MSG_ID'],
			'mensagem' => utf8_encode($msg),
			'id_de' => $value['MSG_DE'],
			'id_para' => $value['MSG_PARA'],
			'janela_id' => $janela_de
		 );
	}

	echo json_encode($mensagens);



?>