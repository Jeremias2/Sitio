<?php

include '../jpgraph/src/jpgraph.php';
include '../jpgraph/src/jpgraph_led.php';

if(isset($_GET['id'])){

$led = new DigitalLED74();

$led -> StrokeNumber(" best page eva ! ", LEDC_RED); //LEDC_CHOCOLATE, PERU

}

?>