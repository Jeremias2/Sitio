<?php



function listarArchivos($path, $array = array(), $carpeta = FALSE){
    $dir = opendir($path);
    while ($elemento = readdir($dir)){
        if( $elemento != "." && $elemento != ".."){
            if($carpeta == TRUE){
			if(is_dir($path.$elemento)){
				if(is_array($array)){
                $nuevoArray = array_push($array, $elemento);
				}
				}	
			}elseif($carpeta == FALSE){
            	if(substr($elemento, -4) == ".txt" or substr($elemento, -4) == ".php"){
				if(is_array($array)){
                $nuevoArray = array_push($array, $elemento);
				}
			}
			}
		    
		}	
     }
		return $array;
  }
  

function mostrarArchivos($path){
	$posts = array();
    $dir = opendir($path);
    while ($elemento = readdir($dir)){
        if( $elemento != "." && $elemento != ".."){

					$a = substr($elemento, 0, -4);
					
   					if(is_numeric($a))
						{
                   array_push($posts, $a);
					    }
			}	
        }

arsort($posts);

return $posts;
    }

$array_categorias = array(
'Creepy',
'Random',
);

$numeros = array();

$url = $_SERVER['REQUEST_URI'];

foreach($array_categorias as $valor){
if($url == "/Sitio/Posts/".$valor."/" or $url == "/Sitio/Posts/".$valor."/index.php"){
$numeros = listarArchivos("./", $numeros, TRUE);
$comprobar = TRUE;
}
}

if(!isset($comprobar)){
$numeros = listarArchivos("../", $numeros, TRUE);
}

/*
if(($url == "/Sitio/Posts/Random/") || ($url == "/Sitio/Posts/Creepy/") || ($url == "/Sitio/Posts/Random/index.php") || ($url == "/Sitio/Posts/Creepy/index.php")){

$numeros = listarArchivos("./", $numeros, TRUE);
}else{
$numeros = listarArchivos("../", $numeros, TRUE);
}

*/
$max = max($numeros);

$posts = mostrarArchivos("./");

foreach($posts as $valor){
$ruta = "./".$valor.".php";
if(file_exists($ruta)){
include $ruta;
echo "<br>";
}
}


?>