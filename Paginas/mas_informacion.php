<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
   <title>Mi p�gina</title>
   <link rel="shortcut icon" type="image/x-icon" href="/Sitio/favicon.ico">
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

 <body class="random">

<div id="todo">
  <div id="contenido">

  <div style="position:absolute;top:10%;left:25%;text-align:left;font-family:Verdana;">
 
  <div class="Tabla">
  <table  cellspacing = "10">
  <tr>
  <td><h3 class="titulo">
  Informaci�n general de la p�gina
   </h3></td>
  </tr>
  <tr>
  <td><li>Es sin fines de lucro.</li></td>
  </tr>
  <tr>
  <td><li>No busca nada m�s que entretener.</li></td>
  </tr>
  <tr>
  <td><li>No busca ofender a nadie.</li></td>
  </tr>

  </table>
  </div>
  </div>
  </div>
  </div>
   <?php               
require 'requerir.php';               
 ?> 
 </body>
</html>