<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
 <head>
  <title>Mi página</title>
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
  <link rel="stylesheet" type="text/css" href="/Sitio/Hojas_css/hojas_css.css">

 </head>
 <body class="random" style="overflow-x:hidden">

<form method="post" action ="">

 <?php               
  
$_SESSION['Pagina'] = $_SERVER['PHP_SELF'];


if(isset($_SESSION['Logueado']))
{
require 'logueado.php';
}
else
{
require 'no_logueado.php';
} 


?>


<img class="led" src="/Sitio/Paginas/led_random.php?id=Consoladores">

<div id="todo">

<div id="contenido">

<?php

require 'conexion.php';

echo <<<USUARIO
<div style="position:absolute;top:10%;left:10%;text-align:left;font-family:Verdana;color:white;">
<img src="favicon.png" style="width:100px;height:100px;float:left" />
<table class="Tabla">
<tr><td><b>Prueba1</b></td></tr>
<tr><td><em>Me gusta cagar.</em></td></tr>
<tr><td><em>Sexo: Masculino</em></td></tr>
<tr><td><em>Edad: 28</em></td></tr>
</table>
<br>
<hr align="left">
<hr style="width: 1px; height: 15px; display: inline-block;">
<strong>Posts</strong>
<hr align="left">

USUARIO;

$sql = "SELECT * FROM posts WHERE Usuario = 'Prueba1'";

if($res = $conexion -> query($sql) or trigger_error($conexion->error)){

 while ($row = $res->fetch_assoc()) {
        printf("<hr style='width: 1px; height: 15px; display: inline-block;'><a class='href' href='visualizar_post.php?post=%s&cat=%s'>·%s(%s)</a>\n<hr>",$row["Ruta"], $row["Categoría"],$row["Título"], $row["Categoría"]);
    }

	$res->free();

}


$conexion->close();
?>

</div>

</div>

</div>

<?php require 'requerir.php' ?>

</body>
</html>