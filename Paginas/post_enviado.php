﻿<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
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

$_SESSION['Pagina'] = $_SERVER['PHP_SELF'];

   ?>

  <img class="led" src="/Sitio/Paginas/led_random.php?id=enviado" />

  <div id="todo">
  <div id="contenido">

  <form method="post">
 

  <?php

    if (!isset($_SESSION["visits"])){

        $_SESSION["visits"] = 0;
	}

    $_SESSION["visits"] = $_SESSION["visits"] + 1;
    
    if ($_SESSION["visits"] < 2)
    {

   $titulo = $_SESSION['titulo'];

  $contenido = $_SESSION['contenido'];

  $categoria = $_SESSION['categoria'];

  $contenido = nl2br($contenido);

	if(isset($_SESSION['imagen'])){
  
  $imagen = $_SESSION['imagen'];

  $nombre_imagen = $_SESSION['nombre_imagen'];

  $texto = '<?php echo ';

  $texto .= "<<<PICO
<div class='post_$categoria'>
<h1 class='titulo'>
$titulo
</h1>
<p>
$contenido
</p>
<img class='maxImagen' src ='/Sitio/Paginas/mostrar_imagen.php?id=".'"'.$nombre_imagen.'"'."' />
</div>
PICO;";
  
  $texto .= "\r\n";

  $texto .= '$category = "'.$categoria.'";'."\r\n".'$title = "'.$titulo.'";'."\r\n".' ?>';

  }else{
  
  $texto = '<?php echo ';

  $texto .= "<<<PICO
<div class='post_$categoria'>
<h1 class='titulo'>
$titulo
</h1>
<p>
$contenido
</p>
</div>
PICO;";
  
  $texto .= "\r\n";

  $texto .= '$category = "'.$categoria.'";'."\r\n".'$title = "'.$titulo.'";'."\r\n".' ?>'."\r\n".'';
  }

  $nombre = str_replace(" ", "_", $titulo);
 
  $u = microtime();

  $u = explode(" ",$u);

   $u = round($u[0], 4);

	$carpeta = "../Posts_Recibidos/".date("Y")."/".date("m")."/";
    if (!file_exists($carpeta)) {
    mkdir($carpeta, 0777, true);
    }

	$ruta = "../Posts_Recibidos/".date("Y")."/".date("m")."/".date("d_H_i_s_").$u."-".$nombre.".php";

  $fd = fopen($ruta, 'x+');

  echo '<div style="margin-top:2%;">';
  echo "<font face='verdana'  color='#fff'>";
  if(fwrite($fd, $texto)){
   $_SESSION['post'] = "El post se envió correctamente.";
  }else{
  $_SESSION['post'] = $ruta ."no existe.";
  }

  echo $_SESSION['post']."<br />";

  fclose($fd);
  echo "<br /><a style='text-decoration:none;color:#fff;' href='/Sitio/'>Volver a la página principal.</a>";

  echo "</font>";

  echo '</div>';
  
  
    }
    else
    {
      echo '<div style="margin-top:2%;">';

  echo "<font face='verdana'>";

  echo "<font  color='#fff'>".$_SESSION['post']."</font><br />";

  echo "<br /><a style='text-decoration:none;color:#fff;' href='/Sitio/'>Volver a la página principal.</a>";

  echo "</font>";

  echo '</div>';

  
    }
unset($_SESSION['imagen']);
unset($_SESSION['nombre_imagen']);
  ?>

   </form>
   
   </div>
   </div>

  </body>

 </html>