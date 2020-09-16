<?php
require 'conexion.php';
session_start();
session_destroy();
session_unset();
$conexion->close;
$url=$_SERVER['HTTP_REFERER'];
if($url == "http://localhost/Sitio/Paginas/moderar.php"){
header("Location: /Sitio/index.php");
}else{
header("Location: ".$url);
}
?>