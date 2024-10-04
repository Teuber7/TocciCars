<?php
namespace Models;

class Clientes {
    private $id;
    private $nombre;
    private $apellido;
    private $documento;
    private $direccion;
    private $telefono;
    private $correo;
    private $fechaNacimiento;
    private $licenciaConducir;

    private $con;

    public function __construct() {
        $this->con = new Conexion();
    }

    public function set($atributo, $valor) {
        $this->$atributo = $valor;
    }

    public function get($atributo) {
        return $this->$atributo;
    }

    public function listar() {
        $sql = "SELECT * FROM Clientes";
        return $this->con->consultaRetorno($sql);
    }

    public function agregar() {
        $sql = "INSERT INTO Clientes (Nombre, Apellido, Documento, Direccion, Telefono, Correo, FechaNacimiento, LicenciaConducir) VALUES 
        ('{$this->nombre}', '{$this->apellido}', '{$this->documento}', '{$this->direccion}', '{$this->telefono}', '{$this->correo}', '{$this->fechaNacimiento}', '{$this->licenciaConducir}')";
        $this->con->consultaSimple($sql);
    }
    
}
?>
