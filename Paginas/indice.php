<?php

class �ndice{

public $arr = array();

public function mostrar($ruta, $cat, $indice, $url, $max){

if(file_exists($ruta)){
$contenido = scandir($ruta);

foreach($contenido as $valor){
if (is_dir($ruta.$valor) && $valor != "." && $valor != ".." && is_numeric($valor)){

array_push($this->arr, $valor);
}

}

$carpetas = count($this->arr);

if($carpetas >= 5 && $url != "/Sitio/Posts/".$cat."/" && $url != "/Sitio/Posts/".$cat."/index.php"){
for($i=1;$i<$indice;$i++){
$av = $indice - $i;

$i1 = $i + 1;
$i2 = $i + 2;
$ii1 = $i - 1;
$ii2 = $i - 2;

$av1 = $av + 1;
$av2 = $av + 2;
$av3 = $av + 3;
$av4 = $av + 4;
$av5 = $av + 5;

$ab1 = $av - 1;
$ab2 = $av - 2;
$ab3 = $av - 3;
$ab4 = $av - 4;
$ab5 = $av - 5;

$maxx1 = $max - 1;
$maxx2 = $max - 2;
$maxx3 = $max - 3;
$maxx4 = $max - 4;

if($url == "/Sitio/Posts/".$cat."/".$av."/" or $url == "/Sitio/Posts/".$cat."/".$av."/index.php"){

if($url == "/Sitio/Posts/".$cat."/".$max."/" or $url == "/Sitio/Posts/".$cat."/".$max."/index.php"){

echo "<td><font class='selected_".$cat."'>1</font><font class ='caracter_".$cat."'> | </font></td>";

echo '<td><a class="href_'.$cat.'" href="../'.$ab1.'">2</a><font class ="caracter_'.$cat.'"> | </font></td>';

echo '<td><a class="href_'.$cat.'" href="../'.$ab2.'">3</a><font class ="caracter_'.$cat.'"> | </font></td>';

echo '<td><a class="href_'.$cat.'" href="../'.$ab3.'">4</a><font class ="caracter_'.$cat.'"> | </font></td>';

echo '<td><a class="href_'.$cat.'" href="../'.$ab4.'">5</a><font class ="caracter_'.$cat.'"> | </font></td>';
}

elseif($av == 1){

echo '<td><a class="href_'.$cat.'" href="../'.$av4.'">'.$maxx4.'</a><font class ="caracter_'.$cat.'"> | </font></td>';
echo '<td><a class="href_'.$cat.'" href="../'.$av3.'">'.$maxx3.'</a><font class ="caracter_'.$cat.'"> | </font></td>';

echo '<td><a class="href_'.$cat.'" href="../'.$av2.'">'.$maxx2.'</a><font class ="caracter_'.$cat.'"> | </font></td>';

echo '<td><a class="href_'.$cat.'" href="../'.$av1.'">'.$maxx1.'</a><font class ="caracter_'.$cat.'"> | </font></td>';

echo "<td><font class='selected_".$cat."'>".$max."</font><font class ='caracter_".$cat."'> | </font></td>";
echo $ab1." ".$ab5;
}

elseif(!file_exists("../".$av2) && file_exists("../".$ab1)){

echo '<td><a class="href_'.$cat.'" href="../'.$av1.'">1</a><font class ="caracter_'.$cat.'"> | </font></td>';

echo "<td><font class='selected_".$cat."'>2</font><font class ='caracter_".$cat."'> | </font></td>";

echo '<td><a class="href_'.$cat.'" href="../'.$ab1.'">3</a><font class ="caracter_'.$cat.'"> | </font></td>';

echo '<td><a class="href_'.$cat.'" href="../'.$ab2.'">4</a><font class ="caracter_'.$cat.'"> | </font></td>';

echo '<td><a class="href_'.$cat.'" href="../'.$ab3.'">5</a><font class ="caracter_'.$cat.'"> | </font></td>';

}

elseif(!file_exists("../".$ab2) && file_exists("../".$av1)){

echo '<td><a class="href_'.$cat.'" href="../'.$av3.'">'.$maxx4.'</a><font class ="caracter_'.$cat.'"> | </font></td>';

echo '<td><a class="href_'.$cat.'" href="../'.$av2.'">'.$maxx3.'</a><font class ="caracter_'.$cat.'"> | </font></td>';

echo '<td><a class="href_'.$cat.'" href="../'.$av1.'">'.$maxx2.'</a><font class ="caracter_'.$cat.'"> | </font></td>';

echo "<td><font class='selected_".$cat."'>".$maxx1."</font><font class ='caracter_".$cat."'> | </font></td>";

echo '<td><a class="href_'.$cat.'" href="../'.$ab1.'">'.$max.'</a><font class ="caracter_'.$cat.'"> | </font></td>';

}else{

echo '<td><a class="href_'.$cat.'" href="../'.$av2.'">'.$ii2.'</a><font class ="caracter_'.$cat.'"> | </font></td>';
echo '<td><a class="href_'.$cat.'" href="../'.$av1.'">'.$ii1.'</a><font class ="caracter_'.$cat.'"> | </font></td>';

echo "<td><font class='selected_".$cat."'>".$i."</font><font class ='caracter_".$cat."'> | </font></td>";

echo '<td><a class="href_'.$cat.'" href="../'.$ab1.'">'.$i1.'</a><font class ="caracter_'.$cat.'"> | </font></td>';
echo '<td><a class="href_'.$cat.'" href="../'.$ab2.'">'.$i2.'</a><font class ="caracter_'.$cat.'"> | </font></td>';

}


}

} 

}elseif($url == "/Sitio/Posts/".$cat."/" or $url == "/Sitio/Posts/".$cat."/index.php"){
for($i=1, $v=1, $ut=1;$i<$indice, $ut<6;$i++, $v++,$ut++){
$av = $indice - $i;
if($av == 0){
    break;
	}
if($v == 1){
echo "<td><font class='selected_".$cat."'>".$i."</font><font class ='caracter_".$cat."'> | </font></td>";
}else{
echo '<td><a class="href_'.$cat.'" href="./'.$av.'">'.$i.'</a><font class ="caracter_'.$cat.'"> | </font></td>';
}
}
}else{

for($i=1, $v=1;$i<$indice;$i++, $v++){
$av = $indice - $i;
if($url == "/Sitio/Posts/".$cat."/".$av."/" or $url == "/Sitio/Posts/".$cat."/".$av."/index.php"){
echo "<td><font class='selected_".$cat."'>".$i."</font><font class ='caracter_".$cat."'> | </font></td>";
}else{
echo '<td><a class="href_'.$cat.'" href="../'.$av.'">'.$i.'</a><font class ="caracter_'.$cat.'"> | </font></td>';

}

}

}

}

}


}

?>