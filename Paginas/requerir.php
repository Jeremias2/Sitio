 <?php

 echo '
 <div class="header">
   <ul class="nav">
    <li><a href="/Sitio/index.php">Inicio</a></li>
     <li><a href="">Categor�as</a>
      <ul>
	   <li><a href="">Juegos</a>
	    <ul>
	     <a href="" class="right_top">Acci�n</a>
	     <li><a href="">Autos</a></li>
	     <li><a href="">Aventura</a></li>
	     <li><a href="">Deportes</a></li>
	     <li><a href="">Estrategia</a></li>
         <li><a href="" class="right_bot">Plataformas</a></li>
	    </ul>
	   </li>
	   <li><a href="/Sitio/Posts/Creepy">Creepy</a></li>
	   <li><a href="/Sitio/Posts/Random">Random</a></li>  
	   <li><a href="" class="right_bot">M�s...</a></li>
      </ul>
     </li>
	  <li><a href="/Sitio/Paginas/subir_post.php">Envia tu post</a></li>
	  ';

if(isset($_SESSION['Logueado'])){

include 'conexion.php';

$post_user = $_SESSION['Usuario'];

$query =  $conexion->query("select Rango from usuarios where Nickname='$post_user'");

while ($row = $query->fetch_row()){ 

if ($row[0] == "Moderador"){
echo '<li><a href="/Sitio/Paginas/moderar.php">Moderar</a></li>';
}

}

}

echo '<li><a href="/Sitio/Paginas/mas_informacion.php" class="right">Mas informaci�n...</a></li>
   </ul>
  </div>

';
  ?>