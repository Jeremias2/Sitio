<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <title>Mi página</title>
  <link rel="shortcut icon" type="image/x-icon" href="/Sitio/favicon.ico" >
  <?php
session_start();
if(isset($_SESSION['Logueado'])){
?>
<link rel="stylesheet" type="text/css" href="/Sitio/Hojas_css/menu_colorido.css" >
<?php
}else{
?>
<link rel="stylesheet" type="text/css" href="/Sitio/Hojas_css/menu_normal.css">
<?php
}
?>
  <link rel="stylesheet" type="text/css" href="/Sitio/Hojas_css/hojas_css.css" >
 <script>
function isNumber(e)
{
k = (document.all) ? e.keyCode : e.which;
if (k==8 || k==0) return true;
patron = /[^_]/;
n = String.fromCharCode(k);
return patron.test(n);
}
</script>
  </head>
   <body class="random" style="overflow: hidden">

<?php

$_SESSION['Pagina'] = $_SERVER['PHP_SELF'];


if(isset($_SESSION['Logueado']))
{
require './logueado.php';
}
else
{
require './no_logueado.php';
}

?>

  <img class="led" src="/Sitio/Paginas/led_random.php?id=subir post" />

  <div id="todo">
  <div id="contenido">
  
  <div class="titulo">
  Subir post
  </div>

  <div style="position:absolute;top:17%;left:16%;">
  <form enctype="multipart/form-data" method="post" action =""  autocomplete="off">
  <table cellspacing="10" class="Tabla">
 
  <tr>
  <td>Título: </td><td><input class="Textarea" type="text" name="titulo" size="50" maxlength="30" value ="<?php if(isset($_POST['titulo'])) echo $_POST['titulo']; ?>" onkeypress="return isNumber(event);" /></td>
  </tr>
  <tr>
  <td>Contenido: </td><td><textarea class="Textarea" name="contenido" maxlength="225" rows="15" cols="52"><?php if(isset($_POST['contenido'])) echo $_POST['contenido']; ?></textarea></td>
  </tr>
   <tr>
  <td>Categoría: </td>
  <td>
  <select name="categoria">
     <option value="default" selected="selected">Seleccionar categoría...</option>
     <option value="Random">Random</option>
     <option value="Creepy">Creepy</option>
  </select>
  </td>
  </tr>
  <tr>
  <td>Subir Imagen: </td>
  <td>
  <input type="file" name="img" accept="image/*" />
  </td>
  </tr>
  <tr>
  <td></td>
  <td><input class="boton" type="submit" name="enviar" value="Enviar"></td>
  </tr>
  </table>
  </form>

  <?php
  
  error_reporting(0);

  if(isset($_POST['enviar'])){
  
  $_SESSION['titulo'] = $_POST['titulo'];

  $_SESSION['contenido'] = $_POST['contenido'];

  $_SESSION['categoria'] = $_POST['categoria'];


  if(isset($_POST['enviar'])){
  echo "<font color='#fff'>";
  if(!$_POST['titulo'] and !$_POST['contenido'] and !is_uploaded_file($_FILES['img']['tmp_name'])){
  echo "<h5>Debe ingresar algo!</h5>";
  }elseif(!$_POST['titulo'] and $_POST['contenido'] and !is_uploaded_file($_FILES['img']['tmp_name']) or $_POST['titulo'] and !$_POST['contenido'] and !is_uploaded_file($_FILES['img']['tmp_name'])){
  echo "<h5>Si no va a subir una imagen, debe rellenar el título y contenido!</h5>";
  }elseif($_POST['categoria'] == "default"){
  echo "<h5>Elija una categoría!</h5>";
  }elseif(is_uploaded_file($_FILES['img']['tmp_name'])){
require 'subir_imagen.php';
}else{
echo "</font>";

header("Location: post_enviado.php");

  }
  }
  }
  ?>

  </div>
  </div>
  </div>

  <?php
  require './requerir.php';
  ?>

  </body>

 </html>