<?php
namespace Config;

class Request {
    private $controlador;
    private $metodo;
    private $argumento;

    public function __construct($controlador, $metodo, $argumento = []) {
        $this->controlador = $controlador;
        $this->metodo = $metodo;
        $this->argumento = $argumento;
    }

    public function getControlador() {
        return $this->controlador;
    }

    public function getMetodo() {
        return $this->metodo;
    }

    public function getArgumento() {
        return $this->argumento;
    }
}
?>