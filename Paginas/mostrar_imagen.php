<?php
// Conexion a la base de datos
require 'conexion.php';
 
if (isset($_GET['id']))
{
    // Consulta de búsqueda de la imagen.
    $consulta = "SELECT imagen, tipo_imagen FROM imagenes WHERE nombre_imagen={$_GET['id']}";
    $resultado = $conexion -> query($consulta) or die($conexion -> error());
    $datos = $resultado -> fetch_assoc();
    $imagen = $datos['imagen']; // Datos binarios de la imagen.
    $tipo = $datos['tipo_imagen'];  // Mime Type de la imagen.
    // Mandamos las cabeceras al navegador indicando el tipo de datos que vamos a enviar.
    header("Content-type: $tipo");
    // A continuación enviamos el contenido binario de la imagen.
    echo $imagen;
}
?>