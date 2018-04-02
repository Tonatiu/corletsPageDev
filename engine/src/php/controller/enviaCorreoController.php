<?php
  //Reseteamos variables a 0.
  $nombre = $apell = $email = $email2 = $telFijo = $movil = $subject = $mensaje = $para = $headers = $msjCorreo = NULL;

  if (isset($_POST['submit'])) {
    //Obtenemos valores input formulario
    $nombre = $_GET['nombre'];
    $apell = $_GET['apell'];
    $email = $_GET['email1'];
    $telFijo = $_GET['email'];
    $movil = $_GET['email'];
    $subject = $_GET['subject'];   
    $mensaje = $_GET['mensaje'];
    $para = 'matrescom@hotmail.com';

    if ($email != $email2) {
     echo "El correo no coincide";
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
