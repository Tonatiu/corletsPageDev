<?php
  //Reseteamos variables a 0.
  $name  = $mail = $phone = $phone2 = $comment = $para = $headers = $msjCorreo = NULL;

  if (isset($_POST['submit'])) {
    //Obtenemos valores input formulario
    $name = $_GET['name'];
    $mail = $_GET['mail'];
    $phone = $_GET['phone'];
    $phone2 = $_GET['phone2'];
    $comment = $_GET['comment'];
    $para = 'pedro.lopez.darknes@gmail.com';
  
    //Creamos cabecera.
    $headers = 'From' . " " . $mail . "\r\n";
    $headers .= "Content-type: text/html; charset=utf-8";

    //Componemos cuerpo correo.
    $msjCorreo = "Nombre: " . $name;
    $msjCorreo .= "\r\n";
    $msjCorreo .= "Teléfono Fijo: " . $phone " , Teléfono Celular: " . $phone2;
    $msjCorreo .= "\r\n";
    $msjCorreo .= "Mensaje: " . $comment;
    $msjCorreo .= "\r\n";

    if (mail($para, "prueba", $msjCorreo, $headers)) {
         echo "<script language='javascript'>
            alert('Mensaje enviado, muchas gracias.');
         </script>";
    } else {
      //Creamos cabecera.
      $headers = 'From' . " " . $email . "\r\n";
      $headers .= "Content-type: text/html; charset=utf-8";

      //Componemos cuerpo correo.
      $msjCorreo = "Nombre: " . $nombre;
      $msjCorreo .= "\r\n";
      $msjCorreo .= "Teléfono Fijo: " . $telFijo " , Teléfono Celular: " . $movil;
      $msjCorreo .= "\r\n";
      $msjCorreo .= "Asunto: " . $subject;
      $msjCorreo .= "\r\n";
      $msjCorreo .= "Mensaje: " . $mensaje;
      $msjCorreo .= "\r\n";

      if (mail($para, $subject, $msjCorreo, $headers)) {
        echo "<script language='javascript'>
        alert('Mensaje enviado, muchas gracias.');
        </script>";
      } else {
        echo "<script language='javascript'>
        alert('fallado');
        </script>";
      }
    }
  }
?>
