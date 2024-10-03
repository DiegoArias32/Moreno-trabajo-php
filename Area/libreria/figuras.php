<?php
class Figuras {
    private $lado;
    private $base;
    private $altura;
    private $radio;

    public function __construct($lado, $base, $altura, $radio) {
        $this->setLado($lado);
        $this->setBase($base);
        $this->setAltura($altura);
        $this->setRadio($radio);
    }

    public function getLado() {
        return $this->lado;
    }

    public function setLado($lado) {
        $this->lado = $lado;
    }

    public function getBase() {
        return $this->base;
    }

    public function setBase($base) {
        $this->base = $base;
    }

    public function getAltura() {
        return $this->altura;
    }

    public function setAltura($altura) {
        $this->altura = $altura;
    }

    public function getRadio() {
        return $this->radio;
    }

    public function setRadio($radio) {
        $this->radio = $radio;
    }

    public function areaCuadrado() {
        return $this->lado * $this->lado;
    }

    public function areaTriangulo() {
        return ($this->base * $this->altura) / 2;
    }

    public function areaCirculo() {
        return M_PI * $this->radio * $this->radio;
    }
}
?>