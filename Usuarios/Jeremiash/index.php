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
require $_SERVER['DOCUMENT_ROOT'].'Sitio/Paginas/logueado.php';
}
else
{
require $_SERVER['DOCUMENT_ROOT'].'Sitio/Paginas/no_logueado.php';
} 


?>


<img class="led" src="/Sitio/Paginas/led_random.php?id=Consoladores">

<div id="todo">

<div id="contenido">

<?php

require $_SERVER['DOCUMENT_ROOT'].'Sitio/Paginas/conexion.php';

$var = "Jeremiash";

$sql = $conexion->query("SELECT Fecha_Nacimiento FROM usuarios WHERE Nickname = '$var'");

while($row = $sql -> fetch_assoc()){
$fn = implode("", $row);
}

$fn = new DateTime($fn);
$fa = new DateTime(date("Y-m-d"));

$edad = $fn->diff($fa);

$sexo1 = $conexion->query("SELECT Sexo FROM usuarios WHERE Nickname = '$var'");

while($row = $sexo1 -> fetch_assoc()){
$sexo = implode("", $row);
}

$descripcion1 = $conexion->query("SELECT Descripcion FROM usuarios WHERE Nickname = '$var'");

while($row = $descripcion1 -> fetch_assoc()){
$descripcion = implode("", $row);
}

echo <<<USUARIO
<div style="position:absolute;top:10%;left:10%;text-align:left;font-family:Verdana;color:white;">
<img src='/Sitio/Paginas/perfil_profile.php?id="$var"' class="minImagen" />
<table class="Tabla" style="float:left;">
<tr><td><b>$var</b></td></tr>
<tr><td><em>$descripcion</em></td></tr>
<tr><td><em>Sexo: $sexo</em></td></tr>
<tr><td><em>Edad: $edad->y</em></td></tr>
</table>
<br>
<table bordercolor = "gray" style="width:265%;border-style: outset;">
<tr><td><strong>Posts</strong></td></tr>
USUARIO;

$sql = "SELECT * FROM posts WHERE Usuario = '$var'";

if($res = $conexion -> query($sql) or trigger_error($conexion->error)){

 while ($row = $res->fetch_assoc()) {
        printf("<tr><td><a target='_blank' class='href' href='/Sitio/Paginas/visualizar_post.php?post=%s&cat=%s'>·%s(%s)</a></td></tr>\n",$row["Ruta"], $row["Categoría"],$row["Título"], $row["Categoría"]);
    }
echo "</table>";
	$res->free();

}


$conexion->close();
?>

</div>

</div>

</div>

<?php require $_SERVER['DOCUMENT_ROOT'].'Sitio/Paginas/requerir.php' ?>

</body>
</html>