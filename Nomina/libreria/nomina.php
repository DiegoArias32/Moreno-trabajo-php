<?php
// Define la clase Nomina
class Nomina {
    // Propiedades privadas de la clase
    private $valorDia;
    private $diasTrabajados;
    private $edad;

    // Constructor de la clase, que inicializa las propiedades con los valores pasados como parámetros
    public function __construct($valorDia, $diasTrabajados, $edad) {
        $this->valorDia = $valorDia;
        $this->diasTrabajados = $diasTrabajados;
        $this->edad = $edad;
    }

    // Método que obtiene el valor del día
    public function getValorDia() {
        return $this->valorDia;
    }

    // Método que establece el valor del día
    public function setValorDia($valorDia) {
        $this->valorDia = $valorDia;
    }

    // Método que obtiene los días trabajados
    public function getDiasTrabajados() {
        return $this->diasTrabajados;
    }

    // Método que establece los días trabajados
    public function setDiasTrabajados($diasTrabajados) {
        $this->diasTrabajados = $diasTrabajados;
    }

    // Método que obtiene la edad
    public function getEdad() {
        return $this->edad;
    }

    // Método que establece la edad
    public function setEdad($edad) {
        $this->edad = $edad;
    }

    // Método que calcula el salario
    public function salario() {
        return $this->getValorDia() * $this->getDiasTrabajados();
    }

    // Método que calcula el valor de la salud
    public function salud() {
        return $this->salario() * 0.12;
    }

    // Método que calcula el valor de la pensión
    public function pension() {
        return $this->salario() * 0.16;
    }

    // Método que calcula el valor de la ARL
    public function arl() {
        return $this->salario() * 0.052;
    }

    // Método que calcula el valor del subsidio de transporte
    public function subTrans() {
        $salarioPer = $this->salario();
        $salarioMinimo = 1300000;

        if ($salarioPer <= 2 * $salarioMinimo) {
            return 114000;
        } else {
            return 0;
        }
    }

    // Método que calcula el valor de la retención
    public function retencion() {
        $salarioPer = $this->salario();
        $salarioMinimo = 1300000;

        if ($salarioPer >= 6 * $salarioMinimo) {
            return $salarioPer * 0.04;
        } elseif ($salarioPer >= 4 * $salarioMinimo) {
            return $salarioPer * 0.02;
        } else {
            return 0;
        }
    }

    // Método que calcula el valor extra
    public function extra() {
        $salarioPer = $this->salario();
        $salarioMinimo = 1300000;
        $pextra = 0;

        // Aplica un extra del 6% si la persona tiene más de 40 años
        if ($this->getEdad() > 40) {
            $pextra = $salarioPer * 1.06;
        }

        if ($this->getEdad() > 60) {
            $pextra = $salarioPer * 0.08;
        }

        return $pextra;
    }

    // Método que calcula el valor deducible
    public function deducible() {
        $saludPer = $this->salud();
        $pensionPer = $this->pension();
        $arlPer = $this->arl();
        $pretencion = $this->retencion();
        return $saludPer + $pensionPer + $arlPer + $pretencion;
    }

    // Método que calcula el valor total a pagar
    public function totalPagar() {
        $salarioPer = $this->salario();
        $psubTrans = $this->subTrans();
        $pextra = $this->extra();
        $descuento = $this->deducible();
        return $salarioPer + $psubTrans + $pextra - $descuento;
    }
}
?>