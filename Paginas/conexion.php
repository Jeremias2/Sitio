<?php

$conexion = new mysqli ("localhost","root","","usuarios");

if($conexion -> connect_errno)
{
die ('Fall� la conexi�n');
}


?>