<?php
class Conjunto {
    private $elementos;

    public function __construct($elementos) {
        $this->elementos = array_unique(array_map('intval', explode(',', $elementos)));
    }

    public function union($otroConjunto) {
        return array_unique(array_merge($this->elementos, $otroConjunto->elementos));
    }

    public function interseccion($otroConjunto) {
        return array_intersect($this->elementos, $otroConjunto->elementos);
    }

    public function diferencia($otroConjunto) {
        return array_diff($this->elementos, $otroConjunto->elementos);
    }

    public function getElementos() {
        return $this->elementos;
    }
}