<?php
namespace Config;

class Request {
    private $controlador;
    private $metodo;
    private $argumentos;

    public function __construct($controlador = 'autos', $metodo = 'index', $argumentos = []) {
        $this->controlador = $controlador;
        $this->metodo = $metodo;
        $this->argumentos = $argumentos;
    }

    public function getControlador() {
        return $this->controlador;
    }

    public function getMetodo() {
        return $this->metodo;
    }

    public function getArgumentos() {
        return $this->argumentos;
    }
}
?>
