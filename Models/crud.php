<?php
require_once "config.php";

// Submitted form data
$pagina = $_POST['pagina'];
$nombre = $_POST['nombre'];
$email = $_POST['email'];
$telefono = $_POST['telefono'];
$domicilio = $_POST['domicilio'];
$ciudad = $_POST['ciudad'];
$estado = $_POST['estado'];
$pais = $_POST['pais'];
$paquete = $_POST['paquete'];
$carrera = $_POST['carrera'];
$experiencia = $_POST['experiencia'];


if(isset($pagina) && !empty($nombre) && !empty($email) && !empty($telefono) && !empty($domicilio) && !empty($ciudad) && !empty($estado) && !empty($pais)){

  if($pagina === "paquetes"){
    $email_to = "ventas@cafionline.com";
    $email_subject = "Formulario web paquete CAFI ".$paquete;
  }else{
    $email_to = "bolsadetrabajo@cafionline.com";
    $email_subject = "Formulario de capacitador CAFI";
  }

  function died($error) {
      // your error code can go here
      echo "We are very sorry, but there were error(s) found with the form you submitted. ";
      echo "These errors appear below.<br /><br />";
      echo $error."<br /><br />";
      echo "Please go back and fix these errors.<br /><br />";
      die();
  }

  $email_message = "Detalles del formulario del sitio web CAFI\n\n";

  function clean_string($string) {
    $bad = array("content-type","bcc:","to:","cc:","href");
    return str_replace($bad,"",$string);
  }

  $email_message .= "Nombre: ".clean_string($nombre)."\n";
  $email_message .= "E-mail: ".clean_string($email)."\n";
  $email_message .= "Telefono: ".clean_string($telefono)."\n";
  $email_message .= "Domicilio: ".clean_string($domicilio)."\n";
  $email_message .= "Ciudad: ".clean_string($ciudad)."\n";
  $email_message .= "Estado: ".clean_string($estado)."\n";
  $email_message .= "Pais: ".clean_string($pais)."\n";
  $email_message .= "Paquete: ".clean_string($paquete)."\n";

  // create email headers
  $headers = 'From: '.$email."\r\n".
  'Reply-To: '.$email."\r\n" .
  'X-Mailer: PHP/' . phpversion();
  @mail($email_to, $email_subject, $email_message, $headers);

if(!empty($paquete) && $pagina === "paquetes"){
  $sql = "INSERT INTO contacto_landing (nombre, email, telefono, domicilio, ciudad, estado, pais, paquete) VALUES ('$nombre', '$email', '$telefono', '$domicilio', '$ciudad', '$estado', '$pais', '$paquete')";
  $result = mysqli_query($link, $sql);

  //Send status
  if($result==1){
      $status = "insertado";
  }else {
      $status = "error";
  }

  // Output status
  echo $result;
  die;

}else if(!empty($carrera) && !empty($experiencia) && $pagina === "capacitadores"){

  $sql = "INSERT INTO registros (nombre, email, telefono, carrera, experiencia) VALUES ('$nombre', '$email', '$telefono', '$carrera', '$experiencia')";
  $result = mysqli_query($link, $sql);

  if ($result==1){
    $status = "insertado";
  }else {
    $status = "error";
  }

  // Output status
  echo $result;
  die;

}
}
