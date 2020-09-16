
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
 <head>
 <script>
 function isNumber(e) {
k = (document.all) ? e.keyCode : e.which;
if (k==8 || k==0) return true;
patron = /\w/;
n = String.fromCharCode(k);
return patron.test(n);
}
 </script>
  <title>Mi página</title>
  <link rel="shortcut icon" type="image/x-icon" href="/Sitio/favicon.ico">
<?php
session_start();
if(isset($_SESSION['Logueado'])){
header("Location: ../");
}else{
?>
<link rel="stylesheet" type="text/css" href="/Sitio/Hojas_css/menu_normal.css">
<?php
}
?>
  <link rel="stylesheet" type="text/css" href="/Sitio/Hojas_css/hojas_css.css" >
  </head>
  <body class="random">
  <form method="post" action="" autocomplete="off">

  <div id="todo">
     <div id="contenido">
     
	 <h1 class="titulo" style="margin-top:4%;">
      Registrarse
     </h1>
       <div style="position:absolute;top:20%;left:25%;text-align:left;font-family:Verdana;">
	 <br><br>
     
	 <div class="Tabla">
     <table cellspacing="10">
	 <tr>
	 <td>Nombre Real: </td>
	 <td><input type="text" name="Nombre" maxlength="15"></td>
	 </tr>
	 <tr>
	 <td>Nickname: </td>
	 <td><input onkeypress="return isNumber(event);" type="text" name="Nickname" maxlength="20"></td>
	 </tr>
	 <tr>
	 <td>Contraseña: </td>
	 <td><input type="password" name="Contraseña"></td>
	 </tr>
	 <tr>
	 <td>Repetir contraseña: </td>
	 <td><input type="password" name="ReContraseña"></td>
	 </tr>
	 <tr>
	 <td>Sexo: </td>
	 <td><input type="radio" name="Sexo" value="Hombre" checked="checked" />Hombre
	 <input type="radio" name="Sexo" value="Mujer" />Mujer</td>
	 </tr>
	 <tr>
	 <td>Edad: </td>
	 <td> <select name="Día">
     <option value="default" selected="selected">Día</option>
     <option value="1">1</option>
	 <option value="2">2</option>
	 <option value="3">3</option>
	 <option value="4">4</option>
	 <option value="5">5</option>
	 <option value="6">6</option>
	 <option value="7">7</option>
	 <option value="8">8</option>
	 <option value="9">9</option>
	 <option value="10">10</option>
	 <option value="11">11</option>
	 <option value="12">12</option>
	 <option value="13">13</option>
	 <option value="14">14</option>
	 <option value="15">15</option>
	 <option value="16">16</option>
	 <option value="17">17</option>
	 <option value="18">18</option>
	 <option value="19">19</option>
	 <option value="20">20</option>
	 <option value="21">21</option>
	 <option value="22">22</option>
	 <option value="23">23</option>
	 <option value="24">24</option>
	 <option value="25">25</option>
	 <option value="26">26</option>
	 <option value="27">27</option>
	 <option value="28">28</option>
	 <option value="29">29</option>
	 <option value="30">30</option>
	 <option value="31">31</option>
  </select>
  <select name="Mes">
     <option value="default" selected="selected">Mes</option>
	 <option value="1">1</option>
	 <option value="2">2</option>
	 <option value="3">3</option>
	 <option value="4">4</option>
	 <option value="5">5</option>
	 <option value="6">6</option>
	 <option value="7">7</option>
	 <option value="8">8</option>
	 <option value="9">9</option>
	 <option value="10">10</option>
	 <option value="11">11</option>
	 <option value="12">12</option>
	 </select>
<select name="Año">
     <option value="default" selected="selected">Año</option>
<?php

$num = "2015";

while($num > "1904"){
echo <<<OPTION
<option value="$num">$num</option><br>
OPTION;
$num--;
}

?>
	 </select>
  </td>
	 </tr>
	 <tr>
	 <td></td>
	 <td><input class="boton" type="submit" name="enviar" value="Enviar"></td>
	 </tr>
      </table>
     <br><br>


	 <?php

    

     if(isset($_POST['enviar']))
	 {

     require 'conexion.php';
   
     $Nombre = $_POST['Nombre'];

	 $Nickname = $_POST['Nickname'];

	 $Contraseña = $_POST['Contraseña'];

	 $ReContraseña = $_POST['ReContraseña'];
 
	 $Sexo = $_POST['Sexo'] ;

	 $Fecha_nacimiento = $_POST['Mes']."/".$_POST['Día']."/".$_POST['Año'];

	 $perfil_imagen = file_get_contents("../default.png");

     $perfil_imagen = $conexion -> real_escape_string($perfil_imagen);

	 $tipo_imagen = "image/png";

     $suma = strlen($Nombre) * strlen($Nickname) * strlen($Contraseña) * strlen($Contraseña) * strlen($ReContraseña);
  
     if ($suma == NULL)
     {
     echo '<h5>Por favor rellene todos los campos!</h5>';
     }
	 elseif ($Contraseña != $ReContraseña)
     {
     echo "<h5>Las contraseñas no coinciden!</h5>";
	 }
	 elseif (strlen($Contraseña) <= 6)
     {
     echo '<h5>Haga una contraseña que supere los 6 caracteres!</h5>';
     }
	 elseif($_POST['Día'] == "default" or $_POST['Mes'] == "default" or $_POST['Año'] == "default"){
	 echo "<h5>Ponga su fecha de nacimiento!</h5>";
     }
	 else
     {
	 $buscar = $conexion -> query ("select * from usuarios where Nickname = '$Nickname'");
	 if ($buscar -> num_rows != 0)
     {
     echo '<h5>El nombre de usuario ya existe!</h5>';
     }
     else
     {

     $query = $conexion -> query ("INSERT INTO usuarios (Nombre,Nickname,Contraseña, Sexo, Fecha_nacimiento, Rango, Perfil_imagen, Tipo_imagen) VALUES ('$Nombre','$Nickname','$Contraseña','$Sexo', '$Fecha_nacimiento', 'Novato', '$perfil_imagen', '$tipo_imagen')")or die ($conexion -> error) ;
     
     if($query)
	 {
     
	 $ruta="../Usuarios/".$Nickname;

     mkdir($ruta);

	 $fd = fopen($ruta."/index.php", "w+");

	 $texto = file_get_contents("usuario.php");

	 $texto = str_replace("1234567890ABCDEFG", $Nickname, $texto);
	 
     fwrite($fd, $texto);

	 fclose($fd);

     $_SESSION['Usuario'] = $Nickname;

     $_SESSION['Contraseña'] = $Contraseña;

	 $_SESSION['Logueado'] = TRUE;

     

     echo '<script language="javascript">window.location="te_has_registrado.php"</script>';

	 
     
     }
	 }
	 }
	 }

	 ?>


	 </div>
	 </div>
	 </div>
	 </div>
	 </form>
 <?php                             
require './requerir.php';                                  
?>
  </body>
  </html>