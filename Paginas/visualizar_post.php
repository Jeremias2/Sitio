<?php

if(isset($_GET['post']) and isset($_GET['cat'])){
$post = $_SERVER["DOCUMENT_ROOT"].$_GET['post'];
$cat = $_GET['cat'];
echo <<<HTML
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Mi p�gina</title>
<link rel="shortcut icon" type="image/x-icon" href="/Sitio/favicon.ico">
HTML;
session_start();
if(isset($_SESSION['Logueado'])){
echo '<link rel="stylesheet" type="text/css" href="/Sitio/Hojas_css/menu_colorido.css">';
}else{
echo '<link rel="stylesheet" type="text/css" href="/Sitio/Hojas_css/menu_normal.css">';
}
$categoria = strtolower($cat);
echo <<<HTML
	<link rel="stylesheet" type="text/css" href="/Sitio/Hojas_css/hojas_css.css">
		 </head>
		<body class="$categoria" style="overflow-x:hidden">
		 <form method="post" action ="">
HTML;
$_SESSION['Pagina'] = $_SERVER['PHP_SELF'];


if(isset($_SESSION['Logueado']))
{
require 'logueado.php';
}
else
{
require 'no_logueado.php';
} 
echo <<<HTML
<img class="led" src="/Sitio/Paginas/led_$cat.php?id=Consoladores">

<div id="todo">

  <div id="contenido">
HTML;



if(file_exists($post)){
require $post;
}else{
echo "<font color='#fff'>Ha ocurrido un error al cargar el post.".$_SERVER["DOCUMENT_ROOT"]."</font>";
}
}

echo <<<HTML

</div> 
HTML;
if(isset($_GET['com'])){
include $_GET['com'];
}
echo <<<HTML
   </form>
</div>

HTML;
require 'requerir.php';
ECHO <<<HTML
   </body>
</html>
HTML;


?>