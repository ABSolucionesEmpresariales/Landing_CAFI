<?php

namespace Models;

class Usuarios
{
    private $usuario;
    private $password;

    public function __construct()
    {
        $this->con = new Conexion();
    }

    public function setUsuario($usuario)
    {
        $this->usuario = $usuario;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function guardar(){
      $sql = "INSERT INTO usuarios (usuario, password) VALUES ('$usuario', '$password')";
      $result = mysqli_query($link, $sql) or die(mysqli_error($link));
    }

    public function __destruct()
    {
        $this->con->cerrarConexion();
    }
