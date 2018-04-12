<?php

  require("SMTP.php");
  require("Exception.php");
  require("OAuth.php");
  require("POP3.php");
  require("PHPMailer.php");
  use PHPMailer\PHPMailer\PHPMailer;
  
  $mail = new PHPMailer(true);

  //Reseteamos variables a 0.
  $success = $name  = $mailer = $phone = $phone2 = $comment = $para = NULL;

  $name = $_POST['name'];
  $mailer = $_POST['mailer'];
  $phone = $_POST['phone'];
  $phone2 = $_POST['phone2'];
  $comment = $_POST['comment'];
    
  $mail->isSMTP();
  //$mail->SMTPDebug = 4;
  $mail->CharSet="UTF-8";
  $mail->SMTPSecure = 'tls';
  $mail->Host = 'smtp.gmail.com';
  $mail->Port = 587;
  $mail->Username = 'sitewebcf@gmail.com';
  $mail->SMTPAuth = true;
  $mail->Password = "240617WEBCF";
    
  $mail->From = $mailer;
  $mail->FromName = $name;
  $mail->AddAddress('mastermonse30@gmail.com','Corlets_Page');

  $mail->IsHTML(true);
  $mail->Subject = 'Información';
  $body = 'Hola mis datos son los siguientes:<br />';
  $body .= 'Nombre: <strong>'. $name .'</strong><br>';
  $body .= 'Correo: <strong>'. $mailer .'</strong><br>';
  $body .= 'Teléfono Fijo: <strong>'. $phone .'</strong><br>';
  $body .= 'Teléfono Celular: <strong>'. $phone2 .'</strong><br>';
  $body .= 'Mensaje: <strong>'. $comment .'</strong><br>';
  
  $mail->Body = $body;
  $success = $mail->Send();
    
  if ($success) {
     echo "<script language='javascript'>
        alert('Mensaje enviado, muchas gracias.');
     </script>";
  } else {
    echo "<script language='javascript'>
      alert('Algo a fallado');
    </script>";
  }
  echo "<script language='javascript'>
        window.location = 'http://corletts-figueroa.com/';
     </script>";
?>
