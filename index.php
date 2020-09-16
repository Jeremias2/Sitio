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
      
  </head>
  <body class="random" style="overflow: hidden">
  
  <?php

if(isset($_SESSION['Logueado']))
{
require './Paginas/logueado.php';
}
else
{
require './Paginas/no_logueado.php';
}

  ?>


  <img  class="tortuga" src="Imagenes/TORTUGA.gif" />
  <img class="dross" src="Imagenes/dross_sensual.png" />
  <img class="soad" src="Imagenes/SOAD_LOQUILLO.png" />
  <img class="choche1" src="Imagenes/choche.png" />
   <img class="choche2" src="Imagenes/choche.png" />


   <img style=" position:absolute;top:100px;left:37%;" src="/Sitio/Paginas/led_random.php?id=CACA" />
   <p class="bienvenido">Bienvenido!</p>

<?php
  require 'Paginas/requerir.php';
  unset($_SESSION["visits"]);
  ?>

  </body>
  </html>