<?php
  require("class.phpmailer.php");
  $mail = new PHPMailer;

  //Reseteamos variables a 0.
  $name  = $mailer = $phone = $phone2 = $comment = $para = NULL;

  $name = $_POST['name'];
  $mailer = $_POST['mailer'];
  $phone = $_POST['phone'];
  $phone2 = $_POST['phone2'];
  $comment = $_POST['comment'];
    
  $mail->isSMTP();
  $mail->Host = 'stmp.gmail.com';
  $mail->STMPAuth = true;
  $mail->Username = 'pedro.lopez.darknes@gmail.com';
  $mail->Password = '/*2413Warrior*/';
  $mail->STMPSecure = 'tls';
  $mail->Port = 21;

  $mail->From = 'pedro.lopez.darknes@gmail.com';
  $mail->FromName = 'Pedro Lopez';
  $mail->addAddress('pedro.lopez.darknes@gmail.com', 'Pedro Lopez');

  $mail->AddAddress("$mailer"); // Esta es la dirección a donde enviamos
  $mail->IsHTML(true); // El correo se envía como HTML
  $mail->Subject = “Información”; // Este es el titulo del email.
  $body = “Hola mis datos son los siguientes:<br />”;
  $body .= “Nombre: <strong> $name</strong><br>”;
  $body .= “Teléfono Fijo: <strong> $phone</strong><br>”;
  $body .= “Teléfono Celular: <strong> $phone2</strong><br>”;
  $body .= “Mensaje: <strong> $comment</strong><br>”;
  
  $mail->Body = $body; // Mensaje a enviar
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
  }
?>
