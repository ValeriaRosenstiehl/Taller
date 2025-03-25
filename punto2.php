<?php
include 'Calculator.php';

$result = '';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $number = intval($_POST['number']);
    $operation = $_POST['operation'];
    $calculator = new Calculator();

    if ($operation == 'fibonacci') {
        $result = $calculator->fibonacci($number);
    } elseif ($operation == 'factorial') {
        $result = $calculator->factorial($number);
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Calculadora de Fibonacci y Factorial</title>
</head>
<body>
    <div class="container">
        <h1>Calculadora de Fibonacci y Factorial</h1>
        <!-- <form method="post" action="">
            <label for="number">Ingrese un número:</label>
            <input type="number" id="number" name="number" required>
            <br>
            <label for="operation">Seleccione la operación:</label>
            <select id="operation" name="operation" required>
                <option value="fibonacci">Sucesión de Fibonacci</option>
                <option value="factorial">Factorial</option>
            </select>
            <br>
            <input type="submit" value="Calcular">
        </form> -->

            <h2>Resultado:</h2>
            <p>
                <?php
                if (is_array($result)) {
                    echo "Sucesión de Fibonacci: " . implode(", ", $result);
                } else {
                    echo "Factorial: " . $result;
                }
                ?>
            </p>
        <?php endif; ?>
    </div>
</body>
</html>