<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <title>Mi p�gina</title>
  <link rel="shortcut icon" type="image/x-icon" href="/Sitio/favicon.ico" />
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
   <form method="post" action="">
  <?php

if(isset($_SESSION['Logueado']))
{
require './logueado.php';
}
else
{
require './no_logueado.php';
}

  ?>

<img class="led" src="/Sitio/Paginas/led_random.php?id=m|oderar" />

<div id="todo">

  <div id="contenido">

  <?php

set_error_handler("nuevoManejador");

function nuevoManejador($codigoError, $mensajeError){
throw new Exception("<h1 class='titulo'>No hay posts por el momento.</h1>");
}

try {

require 'cargar_post.php';


$ruta = "../Posts_Recibidos/";

$lista1 = listarArchivos($ruta, $array = array(), TRUE);

$max1 = max($lista1);

$ruta1 = $ruta.$max1."/";

$array1 = listarArchivos($ruta1, $array = array(), TRUE);

$lista2 = listarArchivos($ruta1, $array = array(), TRUE);

$max2 = max($lista2);

$ruta2 = $ruta1.$max2."/";

$array2 = listarArchivos($ruta2, $array = array(), TRUE);

while(count(listarArchivos($ruta2, $array = array(), FALSE)) == 0){
$max2--;
if($max2 > 0){
if($max2 >= 10 or $max2[0] == "0"){
$ruta2 = $ruta1.$max2."/";
if(file_exists($ruta2) && count(listarArchivos($ruta2, $array = array(), FALSE)) != 0){
break 1;
}
}else{
$ruta2 = $ruta1."0".$max2."/";
if(file_exists($ruta2) && count(listarArchivos($ruta2, $array = array(), FALSE)) != 0){
break 1;
}
}
}elseif($max2 == 0){
$max_1 = $max1 - 1;
if(file_exists($ruta.$max_1)){

--$max1;

$lista1 = listarArchivos($ruta, $array = array(), TRUE);

$ruta1 = $ruta.$max1."/";

$array1 = listarArchivos($ruta1, $array = array(), TRUE);

$lista2 = listarArchivos($ruta1, $array = array(), TRUE);

$max2 = max($lista2);

$ruta2 = $ruta1.$max2."/";

$array2 = listarArchivos($ruta2, $array = array(), TRUE);

}else{
$ruta2 = FALSE;
break 1;
}
}
}
}catch (Exception $error){
echo $error->getMessage();
}

restore_error_handler();

$max2 = max($lista2);

$max1 = max($lista1);

function CADENA($cadena){

$cadena = filemtime($cadena);

return $cadena;
   
}

if(file_exists($ruta2)){

$var = listarArchivos($ruta2, $arr = array(), FALSE);

$arr = array();

foreach($var as $c => $v){
$vv = CADENA($ruta2.$v);
$arr[$vv] = $v;
}

krsort($arr);

foreach($arr as $c => $v){
if(max(array_keys($arr)) == $c){
$post = file_get_contents($ruta2.$v);
$post = $ruta2.$v;
}
}


include $post;

$category = ucwords($category);

echo "<h1 class='titulo'>";
echo "Categor�a: ".$category."<br>";
echo "</h1>";

  ?>

  </div>




<?php

function Sip($ruta, $post){

$user = $_SESSION['Usuario'];

$fd = fopen($ruta, 'w+');

$text = '<?php echo ';

$text .= "<<<PICO\r\n
<div id='autor'>\r\n
<div id='autor_icon'>\r\n
 <div id='refloat'>\r\n
<img src='/Sitio/Paginas/perfil_profile.php?id=".'"'.$user.'"'."'>\r\n
 </div>\r\n               
<a target='_blank' href='/Sitio/Usuarios/".$user."/index.php'><div id='cover'></div></a>\r\n               
</div>\r\n               
<div id='nombre'>\r\n
".$user."\r\n         
</div>\r\n
</div>\r\n";
$text .= "PICO;\r\n ?>\r\n";

$text .= file_get_contents($post);

$text .= '<?php'."\r\n".' $user = "'.$user.'";'."\r\n".'';

$text .= '$rute = "'.$ruta.'";'."\r\n".' ?>' ;


if(fwrite($fd, $text)){
	require 'conexion.php';

include($post);

$ruta = "/" . str_replace($_SERVER['DOCUMENT_ROOT'], "", $ruta);

$query = "INSERT INTO posts(Categor�a, T�tulo, Ruta, Usuario) VALUES ('$category', '$title', '$ruta', '$user')";

$conexion->query($query);
if($query){
unlink($post);
}else{
die("Error...");
}

fclose($fd);

}

}

function Nop($ruta){
unlink($ruta);
}

$ruta = $_SERVER['DOCUMENT_ROOT']."Sitio/Posts/".$category."/";

$max_carpetas = listarArchivos($ruta, $array = array(), TRUE);

$ruta = $ruta.max($max_carpetas)."/";

$max_archivos = mostrarArchivos($ruta);

if(!$max_archivos){
$archivo = 1;
}else{
$archivo = max($max_archivos) + 1;
}

if($archivo > 10){
$max_carpetas = max($max_carpetas) + 1;
mkdir("../Posts/".$category."/".$max_carpetas."/");
$ruta = "../Posts/".$category."/".$max_carpetas."/";
$ruta = $ruta.$archivo.".php";
}else{
$ruta = $ruta.$archivo.".php";
}


 if(isset($_POST['nop'])){
Nop($post);
$url = $_SERVER['PHP_SELF'];
 header("Location: $url");
}

  if(isset($_POST['sip'])){
Sip($ruta, $post);
$url = $_SERVER['PHP_SELF'];
 header("Location: $url");
}

echo $ruta;

?>

<div id="indice">
<input class="no" type="submit" name="nop" value ="" >
<input class="si" type="submit" name="sip" value ="" >
</div>

<?php
}
?>

  </div>


<?php require './requerir.php';  ?>
  
  </form>
  </body>
  </html>