<?php
namespace Controllers;

class clientesController {
    public function listarClientes($id = null) {
        if ($id) {
            echo "Cliente con ID: " . $id;
        } else {
            echo "Listado de todos los clientes";
        }
    }
}
?>