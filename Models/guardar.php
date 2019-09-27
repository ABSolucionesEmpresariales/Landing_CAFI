<?php
    require_once "config.php";

    if (
        isset($_POST['TNombre']) && isset($_POST['TEmail'])
        && isset($_POST['TTelefono']) && isset($_GET['TPaquete'])
    ) {
        $nombre = $_POST['TNombre'];
        $email = $_POST['TEmail'];
        $telefono = $_POST['TTelefono'];
        $paquete = $_GET['TPaquete'];

        $sql = "INSERT INTO contacto_landing (nombre, email, telefono, paquete) VALUES ('$nombre', '$email', '$telefono', '$paquete')";
        $result = mysqli_query($link, $sql) or die(mysqli_error($link));

        if($result){
          echo "registro realizado";
        }else{
          echo $result;
        }

        mysqli_close($link);

        if ($_GET['TPaquete'] === "basic") {
          
             header('Location: ../basic.html');
        }else if($_GET['TPaquete'] == 2){
             header('Location: standard.html');
        } else {
             header('Location: enterprise.html');
        }
    }
