<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require "../vendor/autoload.php";

function enviarEmail($dir, $palestra, $destinatario){
  $mail = new PHPMailer();

  try{
    // CONFIGURÇÕES
    $mail->IsSMTP();
    $mail->Host = "smtp.gmail.com";
    $mail->SMTPAuth = true;
    $mail->Username = "etim@etecpaulistano.com.br";
    $mail->Password = "10leandro09";
    $mail->SMTPSecure = "tls";
    $mail->Port = 587;

    // REMENTENTE E DESTINATARIO
    $mail->setFrom("etim@etecpaulistano.com", "Etec Paulistano");
    $mail->AddAddress($destinatario);

    // MENSAGEM
    $mail->Subject = "Semana Venha nos Conhecer";
    $mail->isHTML(true);
    $mail->Body = "
              <style>
                @import url('https://fonts.googleapis.com/css?family=Raleway:400&display=swap');
              </style>

              <h1 style=\"font-family: Raleway; font-weight: 400; color: #3369c8\">Certificado da $palestra</h1>
              <p style=\"font-family: Raleway; font-size: 1rem;\">A Etec agradece pelo seu comparecimento! Segue anexo o seu certificado como comprovante.</p>";

    // ANEXOS
    $mail->addAttachment($dir);  
    
    if ($mail->Send()) {
      echo "Email enviado com sucesso";
  } else {
      echo $mail->ErrorInfo;
  }
  }catch(Exception $e){
    echo "Erro ao enviar os certificados({$mail->ErrorInfo})";
  }
}
?>