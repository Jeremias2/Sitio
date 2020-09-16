<?php

include '../jpgraph/src/jpgraph.php';
include '../jpgraph/src/jpgraph_led.php';

if(isset($_GET['id'])){

$led = new DigitalLED74();

$mensaje = $_GET['id'];

$led -> StrokeNumber(" " . $mensaje . " ", LEDC_GRAY); //LEDC_TEAL, GRAY

}

?>