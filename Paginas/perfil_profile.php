<?php

require 'conexion.php';
 
if (isset($_GET['id']))
{
    $consulta = "SELECT Perfil_imagen, Tipo_imagen FROM usuarios WHERE Nickname={$_GET['id']}";
    $resultado = $conexion->query($consulta) or die($conexion->error());
    $datos = $resultado->fetch_assoc();
 
      $imagen = $datos['Perfil_imagen']; // Datos binarios de la imagen.
    $tipo = $datos['Tipo_imagen'];  // Mime Type de la imagen.
    header("Content-type: $tipo");

   
    echo $imagen;
}

?>