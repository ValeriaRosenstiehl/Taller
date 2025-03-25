<!DOCTYPE html>
<html>
<body>
    <form method="POST">
        <label>Ingrese números separados por coma:</label>
        <input type="text" name="numeros" required>
        <input type="submit" value="Calcular">
    </form>
    
    <?php if ($resultados):?>
        <div>
            <h3>Resultados:</h3>
            <p>Promedio: <?= $resultados['promedio'] ?></p>
            <p>Mediana: <?= $resultados['mediana'] ?></p>
            <p>Moda: <?= $resultados['moda'] ?></p>
        </div>
    <?php endif; ?>
</body>
</html>

<?php

class CalculadoraEstadistica {
    public function calcularPromedio($numeros) {
        return array_sum($numeros) / count($numeros);
    }
    
    public function calcularMediana($numeros) {
        sort($numeros);
        $total = count($numeros);
        $mitad = floor($total / 2);
        
        return $total % 2 == 0 
            ? ($numeros[$mitad-1] + $numeros[$mitad]) / 2 
            : $numeros[$mitad];
    }
    
    public function calcularModa($numeros) {
        $frecuencias = array_count_values($numeros);
        $moda = array_keys($frecuencias, max($frecuencias));
        return $moda[0];
    }
}


$resultados = null;
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $numeros = array_map('floatval', explode(',', $_POST['numeros']));
    $calculadora = new CalculadoraEstadistica();
    
    $resultados = [
        'promedio' => $calculadora->calcularPromedio($numeros),
        'mediana' => $calculadora->calcularMediana($numeros),
        'moda' => $calculadora->calcularModa($numeros)
    ];
}
?>


