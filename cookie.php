
<?
//Veo si recibo datos del formulario
if(isset($_POST["estilo"])){
   //es que estoy recibiendo un estilo nuevo, lo tengo que meter en las cookies
   $estilo = $_POST["estilo"];
   //meto el estilo en una cookie
   setcookie("estilo", $estilo, time() + (60 * 60 * 24 * 90));
}else{
   //si no he recibido el estilo que desea el usuario en la página, miro si hay una cookie creada
   if (isset($_COOKIE["estilo"])){
      //es que tengo la cookie
      $estilo = $_COOKIE["estilo"];
   }
}
?>
<html>
<head>
   <title>Cookies en PHP</title>
<?
//miro si he tengo un estilo definido, porque entonces tengo que cargar la correspondiente hoja de estilos
if (isset($estilo)){
   echo '<link rel="STYLESHEET" type="text/css" href="' . $estilo . '.css">';
}
?>
</head>

<body>
Ejemplo de uso de cookies en PHP para almacenar la hoja de estilos css que queremos utilizar para definir el aspecto de la página.
<p>
<form action="taller-cookies-php.php" method="post">
Aquí puedes seleccionar el estilo que prefieres en la página:
<br>
<select name="estilo">
<option value="verde">Verde
<option value="rosa">Rosa
<option value="negro">Negro
</select>
<input type="submit" value="Actualizar el estilo">
</form>

</body>
</html>
