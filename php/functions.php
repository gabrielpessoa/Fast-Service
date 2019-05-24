<?php 
session_start();
$conn = new PDO("mysql: host=localhost;dbname=FASTSERVICE", 'service', '049633');
//$conn = new PDO("mysql:host=sql108.epizy.com;dbname=epiz_23605681_FASTSERVICE",'epiz_23605681','2U0ZNu9aI1GhW');

function conexao(){
	global $conn;
	return $conn;
}

function pdoExec($prepare, $execute){
	$stmt = conexao()->prepare($prepare);
	$stmt -> execute($execute);
	return $stmt;
}
function rowCount($prepare, $execute = []){
	$stmt = pdoExec($prepare, $execute)->rowCount();
	return $stmt;
}

function addFavoritos($dados){
	$usuario = $_SESSION['userId'];
	$servico = $dados;
	$stmt = pdoExec("INSERT INTO FAVORITOS SET FVR_USER_ID=?, FVR_SRV_ID=? ", [$usuario, $servico]);
	header('location:'.$_SERVER['HTTP_REFERER']);
}

function delFavoritos($dados){
	$usuario = $_SESSION['userId'];
	$servico = $dados['id_servico'];
	pdoExec("DELETE FROM FAVORITOS WHERE FVR_USER_ID=? AND md5(FVR_SRV_ID)=?", [$usuario, $servico]);
	header('location:'.$_SERVER['HTTP_REFERER']);
}

function addServico($dados, $img){
	$nome = $dados['name'];
	$tipo = $dados['type'];
	$descricao = $dados['description'];
	$preco = $dados['price'];
	$usuario = $dados['user_id'];
	$subcategoria = $dados['subtype'];
	$cep = $dados["cep"];
	$numero = $dados["numero"];
	$logradouro = $dados["logradouro"];
	$bairro = $dados["bairro"];
	$cidade = $dados["cidade"];
	$estado = $dados["estado"];
	
	if(!empty($dados)){
		$stmt = pdoExec("INSERT INTO SERVICOS SET SRV_NOME=?, SRV_CATEGORIA=?, SRV_DESCRICAO=?, SRV_PRECO=?, SRV_USER_ID=?, SRV_SUBCATEGORIA=?, SRV_CEP=?, SRV_NUMERO=?, SRV_LOGRADOURO=?, SRV_BAIRRO=?, SRV_CIDADE=?, SRV_ESTADO=?", [$nome, $tipo, $descricao, $preco, $usuario, $subcategoria, $cep, $numero, $logradouro, $bairro, $cidade, $estado]);
			$id_servico= 0;
			$data = pdoExec("SELECT * FROM SERVICOS WHERE SRV_NOME=? AND SRV_USER_ID=?", [$nome, $usuario]);
			if ($data -> rowCount() >0) :
				$resultado = $data -> fetchAll();
				foreach ($resultado as $value) :
					$id_servico = $value['SRV_ID'];
				endforeach;
			endif;
		$stmt2 = pdoExec("INSERT INTO MEDIA_AVALIACOES SET MDAV_SRV_ID=?, MDAV_TOTAL_PESSOAS=?, MDAV_QTD_ESTRELAS=?, MDAV_MEDIA=?", [$id_servico, 0, 0, 0]);
		if($stmt->rowCount()>0 && $stmt2->rowCount()>0){
			$_SESSION['anuncio_sucesso'] = true;
		}
		if (!empty($img["name"])) :
        	$caminho = "../produtos/img/";
			$count = count(array_filter($img['name']));
			$permite = ['image/jpeg', 'image/png', 'image/jpg'];
			$conn = conexao();
			echo($count);
			for($i=0; $i< $count; $i++):
				$name = $img['name'][$i];
				$tmp = $img['tmp_name'][$i];
				$ext = @end(explode('.', $name));
				$newname = rand().".$ext";
				$diretorio = $caminho.$newname;
				move_uploaded_file($tmp, $diretorio);
				$stmt = $conn -> prepare("INSERT INTO IMAGENS SET IMG_NOME=?, IMG_SRV_ID=?");
				$stmt -> execute([$diretorio, $id_servico]);
			endfor;
		endif;
		$_SESSION['userIMG'] = $diretorio;
		header('location: anuncios.php');
	}else{
		header('location: servico.php');
	}
}

function updateUsuario($dados){
	$id = $dados['userId'];
	$nome = $dados['name'];
	$email = $dados['email'];
	$telefone = $dados['fone'];

	if(!empty($dados)){
		$stmt =pdoExec("UPDATE USUARIOS SET USER_NOME=?, USER_EMAIL=?, USER_TELEFONE=? WHERE USER_ID=?", [$nome, $email, $telefone, $id]);
	}
}

function updateServico($dados, $img){
	$nome = $dados['name'];
	$descricao = $dados['description'];
	$localizacao = $dados['location'];
	$preco = $dados['price'];
	$id = $dados['id_servico'];
	$usuario = $_SESSION['userId'];
	$type = $dados['type'];
	$subtype = $dados['subtype'];
	$cep = $dados['cep'];
	$numero = $dados['numero'];
	$logradouro = $dados['logradouro'];
	$bairro = $dados['bairro'];
	$cidade = $dados['cidade'];
	$estado = $dados['estado'];
	if(!empty($dados)){
		$stmt =pdoExec("UPDATE SERVICOS SET SRV_NOME=?, SRV_CATEGORIA=?, SRV_DESCRICAO=?, SRV_LOCALIZACAO=?, SRV_PRECO=?, SRV_SUBCATEGORIA=?, SRV_CEP=?, SRV_NUMERO=?, SRV_LOGRADOURO=?, SRV_BAIRRO=?, SRV_CIDADE=?, SRV_ESTADO=? WHERE SRV_ID=? AND SRV_USER_ID=?", [$nome, $type, $descricao, $localizacao, $preco, $subtype, $cep, $numero, $logradouro, $bairro, $cidade, $estado, $id, $usuario]);
		$caminho = "../produtos/img/";
		$count = count(array_filter($img['name']));
		$permite = ['image/jpeg', 'image/png', 'image/jpg'];
		$id_servico= 0;
		$conn = conexao();
		for($i=0; $i< $count; $i++){
			$name = $img['name'][$i];
			$tmp = $img['tmp_name'][$i];
			$ext = @end(explode('.', $name));
			$newname = rand().".$ext";
			$diretorio = $caminho.$newname;
			move_uploaded_file($tmp, $diretorio);
			if (!empty($_FILES['img'])) {
				$stmt = $conn -> prepare("INSERT INTO IMAGENS SET IMG_NOME=?, IMG_SRV_ID=?");
				$stmt -> execute([$diretorio, $dados['id_servico']]);
			}

		}
		$_SESSION["anuncio_edite"]=1;
		header('location: anuncios.php');
	}else{
		header('location:'.$_SERVER['HTTP_REFERER']);
	}
}
function deleteServico($dados){
	$id = $dados['id_servico'];
	$usuario = $_SESSION['userId'];
	pdoExec("DELETE FROM COMENTARIOS WHERE md5(CMT_SRV_ID)=?", [$id]);
	$stmt = pdoExec("SELECT * FROM IMAGENS WHERE md5(IMG_SRV_ID)=?", [$id]);
	$delete = $stmt -> fetchAll();
	foreach ($delete as $value) {
		unlink($value['IMG_NOME']);
	}
	pdoExec("DELETE FROM IMAGENS WHERE md5(IMG_SRV_ID)=?", [$id]);
	pdoExec("DELETE FROM SERVICOS WHERE md5(SRV_ID)=?",[$id]);
	pdoExec("DELETE FROM MEDIA_AVALIACOES WHERE md5(MDAV_SRV_ID)=?", [$id]);
	pdoExec("DELETE FROM AVALIACOES WHERE md5(AVL_SRV_ID)=?", [$id]);
	header('location: anuncios.php');
}

function addUser($data){
	$name = $data['name'];
	$username = $data['username'];
	$password = $data['password1'];
	$email = $data['email'];
	$fone = $data['fone'];
	$stmt = rowCount("SELECT * FROM USUARIOS WHERE USER_USUARIO=?", [$username]) > 0;

	if ($stmt) {
		echo "usuario ja existe";
 		exit();
	}
	$stmt = rowCount("SELECT * FROM USUARIOS WHERE USER_EMAIL=?", [$email]) > 0;
	if ($stmt) {
		echo "email ja existe";
		exit();
	}
	else{
	    echo "cadastrado com sucesso";
		pdoExec("INSERT INTO USUARIOS SET USER_NOME = ?, USER_USUARIO =?, USER_SENHA=?, USER_EMAIL=?, USER_TELEFONE=?", [$name, $username, $password, $email, $fone]);
	}
}

function login($data){
	$username = $data['username'];
	$password = md5($data['password']);
	$stmt = pdoExec("SELECT * FROM USUARIOS WHERE USER_USUARIO=?", [$username]);

	if ($stmt->rowCount() > 0) {
		$dados = $stmt -> fetch();
		if ($dados['USER_USUARIO']==$username && $dados['USER_SENHA']!=$password) {
			echo 'senha incorreta';
			exit();
		}
		else{
			$_SESSION['userId'] = $dados['USER_ID'];
			$_SESSION['userName'] = $dados['USER_NOME'];
			$_SESSION['userEmail'] = $dados['USER_EMAIL'];
			$_SESSION['userFone'] = $dados['USER_TELEFONE'];
			$_SESSION['userLogin'] = $dados['USER_USUARIO'];
			$_SESSION['userIMG'] = $dados['USER_IMAGEM'];
			$_SESSION['userTipo'] = $dados['USER_TIPO'];
			echo 'logado';
		}
	}
	else{
		$_SESSION['user_invalid'] = 1;
		header('location: ../index.php');
		exit();
	}
}

function isLogged(){
	if (isset($_SESSION['userName'])) {
		return true;
	}
	else{
		return false;
	}
}

function logout(){
	session_destroy();
	header('location:'.$_SERVER['HTTP_REFERER']);
}

function addComentario($data){
	$comentario = $data['comentario'];
	$usuario = $_SESSION['userId'];
	$servico = $data['id_servico'];
	$stmt = pdoExec("INSERT INTO COMENTARIOS SET CMT_COMENTARIO = ?, CMT_USER_ID = ?, CMT_SRV_ID=? ", [$comentario, $usuario, $servico]);
	header('location:'.$_SERVER['HTTP_REFERER']);

}
function addVisualizacao($data){
	$stmt = pdoExec("SELECT * FROM VISUALIZACOES WHERE VISU_USER_ID=? AND VISU_SRV_ID=?", [$_SESSION['userId'], $data]);
	if ($stmt->rowCount()>0) {
		exit();
	}
	pdoExec("INSERT INTO VISUALIZACOES SET VISU_SRV_ID=?, VISU_USER_ID=?", [$data, $_SESSION['userId']]);
} 
function addVisitas($data){
	$now=date('Y-m-d H:i:s');
	$stmt = pdoExec("SELECT * FROM SERVICOS WHERE SRV_ID=?",[$data]);
	$resultado = $stmt->fetchAll();
	$user = null;
	foreach ($resultado as $value) {
		$user = $value['SRV_USER_ID'];
	}
	$stmt = pdoExec("SELECT * FROM VISITAS WHERE VISI_USER_ID=? AND VISI_SRV_ID=? AND VISI_DATA=?",[$user, $_SESSION['userId'], $data, $now]);
	if ($stmt->rowCount()>0) {
		exit();
	}
	pdoExec("INSERT INTO VISITAS SET VISI_USER_ID=?, VISI_SRV_ID=?, VISI_DATA=?",[$_SESSION['userId'], $data, $now]);
}
function tornarAdm($id){
	$valor = 1;
	$stmt =pdoExec("UPDATE USUARIOS SET USER_TIPO WHERE USER_ID=?", [$valor, $id]);
	header('location: ../index.php');
}
function tornarPadrao($id){
	$valor = 0;
	$stmt =pdoExec("UPDATE USUARIOS SET USER_TIPO WHERE USER_ID=?", [$valor, $id]);
	header('location: ../index.php');
}
function sugestaoServicos(){
	$stmt = pdoExec("SELECT C.CTG_ID, COUNT(C.CTG_ID) AS QUANTIDADE FROM VISITAS T JOIN SERVICOS S ON T.VISI_SRV_ID = S.SRV_ID JOIN CATEGORIAS C ON S.SRV_CATEGORIA = C.CTG_ID WHERE VISI_USER_ID = ? GROUP BY C.CTG_ID", [$_SESSION['userId']]);
	$resultado = $stmt->fetchAll();
	$quantidade=0;
	$categoria = 0;
	foreach ($resultado as $value) {
		if ($value['QUANTIDADE'] > $quantidade) {
			$quantidade = $value['QUANTIDADE'];
			$categoria = $value['CTG_ID'];
		}
	}
		return $categoria;
}