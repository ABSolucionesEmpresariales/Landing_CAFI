<?php
require_once "config.php";

// Submitted form data
$form = $_POST['contactFrmSubmit'];
$nombre = $_POST['nombre'];
$email = $_POST['email'];
$telefono = $_POST['telefono'];
$paquete = $_POST['paquete'];


if((isset($form) && !empty($nombre) && !empty($email) && !empty($telefono) && !empty($paquete)){

    $sql = "INSERT INTO contacto_landing (nombre, email, telefono, paquete) VALUES ('$nombre', '$email', '$telefono', '$paquete')";
    $result = mysqli_query($link, $sql);

    //Send status
    if($result){
        $status = "insertado";
    }else{
        $status = "error insertando";
    }
    // Output status
    echo $status;
    die;
}
