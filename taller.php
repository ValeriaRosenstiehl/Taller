<?php
$frase = $_POST['frase'];
$palabras = explode(" ", $frase);
$acronimo = null;
foreach($palabras as $valor){
$acronimo = $acronimo.$palabras;
}
echo $acronimo;
?>
