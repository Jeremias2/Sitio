<?php

$cadena = file_get_contents("archivo.php");

    $dir = opendir("./");
    while ($elemento = readdir($dir)){
        if( $elemento != "." && $elemento != ".."){
            if( is_dir("./".$elemento) ){
				if(is_numeric($elemento)){

				$ruta = "./".$elemento."/index.php";

				$fd =fopen($ruta, 'w+');

				fwrite($fd, $cadena);

				fclose($fd);
                
				     }
				 }
				
			}
	}	
    

?>

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
require '../../Paginas/logueado.php';
}
else
{
require '../../Paginas/no_logueado.php';
} 


?>


<img class="led" src="/Sitio/Paginas/led_random.php?id=Consoladores">

<div id="todo">

  <div id="contenido">

<?php

require '../../Paginas/cargar_post.php'; 

$carpetas = listarArchivos("./", $arr=array(), "./");

$maxCarpetas = max($carpetas);

$pposts = mostrarArchivos("./".$maxCarpetas);

foreach($pposts as $valor){
$ruta = "./".$max."/".$valor.".php";
if(file_exists($ruta)){
include $ruta;
echo "<br>";
}
}

?>

  </div> 
  
   </form>
   

 <?php

$indice = $max + 1;

$sig = $maxCarpetas - 1;

echo "<div id='indice'>";
echo '<table>';
echo "<tr>";

require '../../Paginas/indice.php';

$ind = new Índice;

$ind -> mostrar("./","Random" , $indice, $url, $max);

if(file_exists("./".$sig))
{
echo '<td><a class="href_Random" href="./'.$sig.'">>></a></td>';
}
echo "</tr>";
echo '</table>';

?>

</div>
</div>

<?php require '../../Paginas/requerir.php';  ?>

 </body>
</html>