<?php

$conexion = new mysqli ("localhost","root","","usuarios");

if($conexion -> connect_errno)
{
die ('Falló la conexión');
}


?>