<?php
class ConvertidorBinario {
    public function convertirABinario($numero) {
        return decbin($numero);
    }
}
$resultado = null;
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $numero = intval($_POST['numero']);
    $convertidor = new ConvertidorBinario();
    $resultado = $convertidor->convertirABinario($numero);
}
?>

<!DOCTYPE html>
<html>
<body>
<h1>Punto 5</h1>
<a href="menu.html">VOLVER AL MENU</a><br>
    <form method="POST">
        <label>Ingrese un número entero:</label>
        <input type="number" name="numero" required>
        <input type="submit" value="Convertir a Binario">
    </form>
    
    <?php if ($resultado !== null): ?>
        <div>
            <h3>Resultado:</h3>
            <p>Binario: <?= $resultado ?></p>
        </div>
    <?php endif; ?>
</body>
</html>