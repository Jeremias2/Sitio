<?php

require 'conexion.php';

?>
<form method="post" action="?">
<div class="unlogin">

   <table padding="5px">
    <tr>
     <td>
      <input  size="10" type="text" class="inputs" placeholder="Nombre" name="User">
     </td>
     <td>
      <input  size="10" type="password" class="inputs" placeholder="Contrase�a" name="Pass">
     </td>
     <td>
      <input class="boton" type="submit" value="Ir" name="submit" style="font-size:10px;width:50px;height:20px;">
     </td>
    </tr>
    <tr>
     <td>
      <a class="a" href="/Sitio/Paginas/registrar.php"><h5>No te has registrado?<h5></a>
     </td>
    </tr>
   </table>
  </div>
  </form>
  
<?php

if(isset($_POST['submit'])){

$post_user = $_POST['User'];

$post_pass = $_POST['Pass'];

$self = $_SERVER['PHP_SELF'];

$comprobacion =  $conexion->query("select Nickname, Contrase�a from usuarios where Nickname='$post_user' and Contrase�a='$post_pass'");

if($comprobacion->num_rows == 1){
 $_SESSION['Usuario'] = $post_user;

     $_SESSION['Contrase�a'] = $post_pass;

	 $_SESSION['Logueado'] = TRUE;

     header("Location: $self");
}

}

?>