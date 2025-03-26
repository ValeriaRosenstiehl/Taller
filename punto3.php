<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Punto3</title>
</head>
<body>
    <h1>Punto 3</h1>
    <a href="menu.html">VOLVER AL MENU</a><br>
    <form method="post">
        <label for="numeros">Ingresa los números separados por comas:</label><br>
        <input type="text" id="numeros" name="numeros" required><br><br>
        <input type="submit" value="Calcular">
    </form>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $input = $_POST['numeros'];
        $numeros = array_map('trim', explode(',', $input));
        
        
        $numeros = array_filter($numeros, function($value) {
            return is_numeric($value);
        });
        // Convert to float
        $numeros = array_map('intval', $numeros);
        if (count($numeros) > 0) {
            //Promedio
            $promedio = array_sum($numeros) / count($numeros);
            //Mediana
            sort($numeros);
            $count = count($numeros);
            $media = ($count % 2 == 0) ? ($numeros[$count / 2 - 1] + $numeros[$count / 2]) / 2 : $numeros[floor($count / 2)];
            //Moda
            $valores = array_count_values($numeros);
			
            if (!empty($valores)) {
                $maxCount = max($valores); 
                $moda = array_keys($valores, $maxCount); 
            } else {
                $moda = []; 
            }
            echo "<h2>Resultados:</h2>";
            echo "Promedio: " . number_format($promedio, 2) . "<br>";
            echo "Media: " . number_format($media, 2) . "<br>";
            echo "Moda: " . (count($moda) > 0 ? implode(', ', $moda) : 'No hay moda') . "<br>";
        } else {
            echo "<p>No se ingresaron números válidos.</p>";
        }
    }
    ?>
</body>
</html>
