<?php
class Calculator {
    public function fibonacci($n) {
        $fib = [];
        for ($i = 0; $i < $n; $i++) {
            if ($i == 0) {
                $fib[] = 0;
            } elseif ($i == 1) {
                $fib[] = 1;
            } else {
                $fib[] = $fib[$i - 1] + $fib[$i - 2];
            }
        }
        return $fib;
    }

    public function factorial($n) {
        if ($n < 0) {
            return "No se puede calcular el factorial de un número negativo.";
        }
        if ($n == 0) {
            return 1;
        }
        $fact = 1;
        for ($i = 1; $i <= $n; $i++) {
            $fact *= $i;
        }
        return $fact;
    }
}
?>