<?php
$frase = $_POST['frase'];
$palabras = explode(" ", $frase);
$acronimo = null;
foreach($palabras as $valor){   
$acronimo = substr($valor, 0, 1).$acronimo;
}
echo strrev($acronimo);
?>
