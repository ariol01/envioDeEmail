<?php

require_once('src/PHPMailer.php');
require_once('src/SMTP.php');
require_once('src/Exception.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

$mail = new PHPMailer(true);

try {
  //code...

  $name = $_POST["nome"];
  $email = $_POST["email"];
  $assunto = $_POST["assunto"];
  $message = $_POST["mensagem"];
  
  if ($name == null) {
    echo "alert('preencha o campo obrigatório')";
  } else if ($email == null) {
    echo "alert('preencha o campo obrigatório')";
  } else if ($assunto) {
    echo "alert('preencha o campo obrigatório')";
  } else if ($message) {
    echo "alert('preencha o campo obrigatório')";
  }

  $mail->isSMTP();
  $mail->Host = 'smtp.gmail.com';
  $mail->SMTPAuth = true;
  $mail->Username = 'seuemail';
  $mail->Password = 'suasenha';
  $mail->Port = 587;

  $mail->setFrom($email);
  $mail->addAddress('seuemail');
  $mail->isHTML(true);
  $mail->Subject = $email . " - " . $assunto;
  $mail->Body = 'Email do cliente: '.$email.'<br/><br/>'.$message;
  $mail->AltBody = $message;

  if ($mail->send()) {
    
    echo '<script> alert("Mensagem enviada sucesso!"); 
    window.location.href = "index.html";</script>';

  } else {
    echo 'falha ao enviar email';
  }
} catch (Exception $e) {

  echo "Erro ao enviar mensagem: {$mail->ErrorInfo}";
}
