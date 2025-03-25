<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Punto6</title>
</head>
<body>
    <h1>Punto 6</h1>
    <form action="index.php" method="post">
        <label for="recorrido1">Selecciona el primer recorrido:</label>
        <select id="recorrido1" name="recorrido1">
            <option value="preorden">Preorden</option>
            <option value="inorden">Inorden</option>
            <option value="postorden">Postorden</option>
        </select><br><br>

        <label for="recorrido2">Selecciona el segundo recorrido:</label>
        <select id="recorrido2" name="recorrido2">
            <option value="preorden">Preorden</option>
            <option value="inorden">Inorden</option>
            <option value="postorden">Postorden</option>
        </select><br><br>

        <label for="datos1">Introduce los valores del primer recorrido (separados por comas):</label>
        <input type="text" id="datos1" name="datos1" required><br><br>
        
        <label for="datos2">Introduce los valores del segundo recorrido (separados por comas):</label>
        <input type="text" id="datos2" name="datos2" required><br><br>
        
        <input type="submit" value="Construir Árbol">
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        
        $recorrido1 = $_POST['recorrido1'];
        $recorrido2 = $_POST['recorrido2'];
        $datos1 = explode(',', $_POST['datos1']);
        $datos2 = explode(',', $_POST['datos2']);
        
        
        $datos1 = array_map('trim', $datos1);
        $datos2 = array_map('trim', $datos2);
        
        
        $preorden = $inorden = $postorden = [];
      
        if ($recorrido1 === 'preorden' && $recorrido2 === 'inorden') {
            $preorden = $datos1;
            $inorden = $datos2;
        } elseif ($recorrido1 === 'preorden' && $recorrido2 === 'postorden') {
            $preorden = $datos1;
            $postorden = $datos2;
            $inorden = generarInordenDesdePreordenYPostorden($preorden, $postorden);
        } elseif ($recorrido1 === 'inorden' && $recorrido2 === 'preorden') {
            $inorden = $datos1;
            $preorden = $datos2;
        } elseif ($recorrido1 === 'inorden' && $recorrido2 === 'postorden') {
            $inorden = $datos1;
            $postorden = $datos2;
            $preorden = generarPreordenDesdeInordenYPostorden($inorden, $postorden);
        } elseif ($recorrido1 === 'postorden' && $recorrido2 === 'preorden') {
            $postorden = $datos1;
            $preorden = $datos2;
            $inorden = generarInordenDesdePreordenYPostorden($preorden, $postorden);
        } elseif ($recorrido1 === 'postorden' && $recorrido2 === 'inorden') {
            $postorden = $datos1;
            $inorden = $datos2;
            $preorden = generarPreordenDesdeInordenYPostorden($inorden, $postorden);
        }

       
        $arbol = new ArbolBinario();
        $raiz = $arbol->construirArbol($preorden, $inorden);

        
        $postordenResultado = $arbol->recorridoPostorden($raiz);
        
        
        echo "<h2>Recorrido Postorden:</h2>";
        echo "<p>" . implode(", ", $postordenResultado) . "</p>";
    }
    
   
    function generarPreordenDesdeInordenYPostorden($inorden, $postorden) {
        $preorden = [];
        return $preorden;
    }

    function generarInordenDesdePreordenYPostorden($preorden, $postorden) {
        $inorden = [];
        return $inorden;
    }
    ?>
</body>
</html>