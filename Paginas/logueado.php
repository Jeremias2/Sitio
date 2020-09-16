<?php

$Usuario = $_SESSION['Usuario'];

$rutaUsuario2 = $_SERVER['DOCUMENT_ROOT']."Sitio/Usuarios/".$Usuario."/imagen.jpg";

$rutaUsuario = "/Sitio/Usuarios/".$Usuario."/imagen.jpg";

/*
if(!file_exists($rutaUsuario2))
{
$ruta = "/Sitio/default.png";
}
*/

echo <<<LOGUEADO

<div class="login">
<div class="sesion">
<table cellpadding="0" cellspacing="0">
<tr>
<td class="left"><a href="" class="margin"><img  src="/Sitio/Paginas/perfil_profile.php?id='$Usuario'" align="center" alt="imagen" width="25" height="25" border="0" />&nbsp
Mi perfil</td></a>
<td><a href="">Amigos</a></td>
<td><a href="/Sitio/Paginas/cerrar_sesion.php">Salir</a></td>
</tr>
</table>
</div>
</div>
LOGUEADO;
?>