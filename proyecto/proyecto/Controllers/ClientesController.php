<?php
namespace Controllers;

use Models\Clientes;

class ClientesController {
    private $cliente;

    public function __construct() {
        $this->cliente = new Clientes();
    }

    public function listarClientes() {
        $datos = $this->cliente->listar();
        return $datos;
    }

    public function agregar() {
        if ($_POST) {
            $this->cliente->set("nombre", $_POST['nombre']);
            $this->cliente->set("apellido", $_POST['apellido']);
            $this->cliente->set("documento", $_POST['documento']);
            $this->cliente->set("direccion", $_POST['direccion']);
            $this->cliente->set("telefono", $_POST['telefono']);
            $this->cliente->set("correo", $_POST['correo']);
            $this->cliente->set("fechaNacimiento", $_POST['fechaNacimiento']);
            $this->cliente->set("licenciaConducir", $_POST['licenciaConducir']);
            $this->cliente->agregar();
            header("Location: " . URL . "clientes");
        }
    }
}
?>
