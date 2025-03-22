<?php
session_start();
if (!isset($_SESSION['numeros'])) {
    $_SESSION['numeros'] = [];
}
if (isset($_POST['numero'])) {
    $numero = $_POST['numero'];
    $_SESSION['numeros'][] = $numero;
}
$numero_ingresado = count($_SESSION['numeros']) + 1;
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Taller</title>
</head>
<body>

<h2>Punto 3</h2>

<form method="POST">
    <label for="numero">Ingrese el número:</label>
    <input type="number" name="numero" id="numero" required>

    <br><br>

    <label for="agregar_otro">¿Desea añadir otro número?</label>
    <select name="agregar_otro" id="agregar_otro">
        <option value="si">Sí</option>
        <option value="no">No</option>
    </select>

    <br><br>

    <button type="submit">Enviar</button>
</form>

<?php
if (isset($_POST['agregar_otro']) && $_POST['agregar_otro'] == 'no') {
    echo "<h3>Números ingresados:</h3>";
    echo "<pre>";
    print_r($_SESSION['numeros']);
    echo "</pre>";
    session_unset();
}
// Promedio
    $suma = 0;
    $cont = 0;
    foreach ($_SESSION['numeros'] as $numero){
        $suma = $numero+$numero;
        $cont = $cont+1;
    }
    $promedio = $suma/$cont;
//Mediana
    $orden = sort($_SESSION['numeros']);
    if($cont%2 == 0){
        $mediana1=$orden[($cont/2+1)];
        $mediana2=$orden[($cont/2-1)];

    }else{
        $mediana=$orden[($cont/2+1)];
    }
//Moda
    


?>