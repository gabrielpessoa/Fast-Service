<?php
include('../controller/functions_controller.php');
use PHPMailer\PHPMailer\PHPMailer;
require '../../Mail/vendor/autoload.php';

$email = $_POST['email'];
$stmt = pdoExec("SELECT * FROM USUARIOS WHERE USER_EMAIL=?", [$email]);

if ($stmt->rowCount() >0) {
	$data = $stmt -> fetchAll();
	$username = $data[0]['USER_NOME'];
	$id = $data[0]['USER_ID'];
	$md5=md5($id);
	$update = pdoExec("UPDATE USUARIOS SET USER_RESET_PW=? WHERE USER_ID=?", [1, $id]);
	$link= "https://fastservices.epizy.com/php/update_password.php?i=".$md5;
	$mensagem=' <div class="recuperar_senha" style="margin:  auto; text-align: center; width: 400px; background: #D8D8D8; height: 380px; border-radius: 19px; padding: 15px;">
	<p><h1 style="color: red; font-size: 45px;">Fast-Service</h1></p>
	<h3 style="margin-bottom: 10px;">Esqueci minha senha</h3>
	<p>Ocorreu uma solicitação com seu e-mail para recuperar a sua senha no Fast-Service, caso não tenha sido você desconsidere esta mensagem.</p>
	<p style="margin: 15px;"><a href="'.$link.'" class="recuperar" style="background: blue; border-radius: 10px; color: white; padding: 10px; 
text-decoration: none;">Recuperar senha</a></p>
	<p>ou clique no link <br><a href="'.$link.'">'.$link.'</a></p>
</div> ';

	$mail = new PHPMailer;
	$mail->isSMTP();
	$mail->Host = 'smtp.gmail.com';
	$mail->Port = 587;
	$mail->SMTPSecure = 'tls';
	$mail->SMTPAuth = true;
	$mail->Username = "fastservice0818@gmail.com";
	$mail->Password = "Fast0386";
	$mail->setFrom('fastservice0818@gmail.com', 'Fast-service');
	$mail->addAddress($email, $username);
	$mail->Subject = 'Recupere sua senha no Fast-service';
	$mail->IsHTML(true);
	$mail->Body = $mensagem;
	$mail->AltBody = $mensagem;
	if(!$mail->send()) {
	    echo "Mailer Error: " . $mail->ErrorInfo;
	}
}
?>