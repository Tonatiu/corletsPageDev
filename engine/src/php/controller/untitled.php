
<?php
// abrimos la sesión cURL
$ch = curl_init();

// definimos la URL a la que hacemos la petición
curl_setopt($ch, CURLOPT_URL,"http://localhost/corlets/");
// indicamos el tipo de petición: POST
curl_setopt($ch, CURLOPT_POST, TRUE);
// definimos cada uno de los parámetros
curl_setopt($ch, CURLOPT_POSTFIELDS, "postvar1=value1&postvar2=value2&postvar3=value3");

// recibimos la respuesta y la guardamos en una variable
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$remote_server_output = curl_exec ($ch);

// cerramos la sesión cURL
curl_close ($ch);

// hacemos lo que queramos con los datos recibidos
// por ejemplo, los mostramos
print_r($remote_server_output);
?>


<?php
  
  // abrimos la sesión cURL
  $ch = curl_init();

  // definimos la URL a la que hacemos la petición
  curl_setopt($ch, CURLOPT_URL,"http://localhost/corlets/index.html");
  // indicamos el tipo de petición: POST
  curl_setopt($ch, CURLOPT_POST, TRUE);
  // definimos cada uno de los parámetros
  curl_setopt($ch, CURLOPT_POSTFIELDS, "$name=$_POST['name']&$mail=$_POST['mail']&$phone=$_POST['phone']                                   &$phone2=$_POST['phone2']&$comment=$_POST['comment']                                   &$para='pedro.lopez.darknes@gmail.com'&$headers=NULL&$msjCorreo=NULL");

  // recibimos la respuesta y la guardamos en una variable
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  $remote_server_output = curl_exec ($ch);

  //Reseteamos variables a 0.
  $name  = $mail = $phone = $phone2 = $comment = $para = $headers = $msjCorreo = NULL;
  echo "0";
  if (isset($_POST['send'])) {

    echo "1";
    //Obtenemos valores input formulario
    $name = $_POST['name'];
    $mail = $_POST['mail'];
    $phone = $_POST['phone'];
    $phone2 = $_POST['phone2'];
    $comment = $_POST['comment'];
    $para = 'pedro.lopez.darknes@gmail.com';
    
    echo "2";
    //Creamos cabecera.
    $headers = 'From' . " " . $mail . "\r\n";
    $headers .= "Content-type: text/html; charset=utf-8";
    $headers = wordwrap($headers, 70, "\r\n");
    
    //Componemos cuerpo correo.
    $msjCorreo = "Nombre: " . $name;
    $msjCorreo .= "\r\n";
    $msjCorreo .= "Teléfono Fijo: " . $phone;
    $msjCorreo .= "\r\n";
    $msjCorreo .= "Teléfono Celular: " . $phone2;
    $msjCorreo .= "\r\n";
    $msjCorreo .= "Mensaje: " . $comment;
    $msjCorreo .= "\r\n";
    $msjCorreo = wordwrap($msjCorreo, 70, "\r\n");
    echo "3";

    if (mail($para, "prueba", $msjCorreo, $headers)) {
        echo "4";
        echo "<script language='javascript'>
          alert('Mensaje enviado, muchas gracias.');
       </script>";
    } else {
      echo "<script language='javascript'>
        alert('fallado');
      </script>";
    }
  }

  // cerramos la sesión cURL
  curl_close ($ch);
?>
