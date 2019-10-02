<?php
if(isset($_POST['email'])) {

    // EDIT THE 2 LINES BELOW AS REQUIRED
    $email_to = "ventas@cafionline.com";
    $email_subject = "Formulario de contacto";

    function died($error) {
        // your error code can go here
        echo "We are very sorry, but there were error(s) found with the form you submitted. ";
        echo "These errors appear below.<br /><br />";
        echo $error."<br /><br />";
        echo "Please go back and fix these errors.<br /><br />";
        die();
    }


    // validation expected data exists
    if(!isset($_POST['TNombre']) ||
        !isset($_POST['TEmail']) ||
        !isset($_POST['TTelefono']) ||
        died('We are sorry, but there appears to be a problem with the form you submitted.');
    }



    $nombre = $_POST['TNombre'];
    $email = $_POST['TEmail'];
    $telefono = $_POST['TTelefono'];
    foreach($_POST['deseo'] as $deseo){
        echo $deseo."</br>";
    }

    $error_message = "";
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';

  if(!preg_match($email_exp,$email)) {
    $error_message .= 'La direccion de e-mail no es valida.<br />';
  }

    $string_exp = "/^[A-Za-z .'-]+$/";

  if(!preg_match($string_exp,$nombre)) {
    $error_message .= 'El nombre que ingresaste no es valido.<br />';
  }


  if(strlen($error_message) > 0) {
    died($error_message);
  }

    $email_message = "Detalles del formulario de www.vyde.mx.\n\n";


    function clean_string($string) {
      $bad = array("content-type","bcc:","to:","cc:","href");
      return str_replace($bad,"",$string);
    }

    $email_message .= "Nombre: ".clean_string($nombre)."\n";
    $email_message .= "E-mail: ".clean_string($email)."\n";
    $email_message .= "Telefono: ".clean_string($telefono)."\n";


// create email headers
$headers = 'From: '.$email."\r\n".
'Reply-To: '.$email."\r\n" .
'X-Mailer: PHP/' . phpversion();
@mail($email_to, $email_subject, $email_message, $headers);
?>

<!-- include your own success html here -->

Gracias por contactarnos. Nos pondremos en contacto contigo lo mas pronto posible.

<?php

}
header("contact.html");
?>
