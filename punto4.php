?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Operaciones con Conjuntos</title>
</head>
<body>
    <h1>Operaciones con Conjuntos</h1>
        <a href="menu.html">VOLVER AL MENU</a><br>
    <form method="post" action="">
        <label for="conjuntoA">Conjunto A (separar números con comas):</label><br>
        <input type="text" id="conjuntoA" name="conjuntoA" required><br><br>
        
        <label for="conjuntoB">Conjunto B (separar números con comas):</label><br>
        <input type="text" id="conjuntoB" name="conjuntoB" required><br><br>
        
        <input type="submit" value="Calcular">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        include 'Conjunto.php'; // Asegúrate de que la ruta sea correcta

        $conjuntoA = new Conjunto($_POST['conjuntoA']);
        $conjuntoB = new Conjunto($_POST['conjuntoB']);

        echo "<h2>Resultados:</h2>";
        echo "<strong>Conjunto A:</strong> " . implode(", ", $conjuntoA->getElementos()) . "<br>";
        echo "<strong>Conjunto B:</strong> " . implode(", ", $conjuntoB->getElementos()) . "<br>";

        echo "<strong>Unión:</strong> " . implode(", ", $conjuntoA->union($conjuntoB)) . "<br>";
        echo "<strong>Intersección:</strong> " . implode(", ", $conjuntoA->interseccion($conjuntoB)) . "<br>";
        echo "<strong>Diferencia A - B:</strong> " . implode(", ", $conjuntoA->diferencia($conjuntoB)) . "<br>";
        echo "<strong>Diferencia B - A:</strong> " . implode(", ", $conjuntoB->diferencia($conjuntoA)) . "<br>";
    }
    ?>
</body>
</html>