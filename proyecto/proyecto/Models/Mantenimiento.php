<?php
namespace Models;

class Mantenimiento {
    private $id;
    private $idAuto;
    private $idEmpleado;
    private $fechaMantenimiento;
    private $descripcion;
    private $costo;
    private $tipo;
    
    private $con;

    public function __construct() {
        $this->con = new Conexion();
    }

    public function listar() {
        $sql = "SELECT * FROM Mantenimiento";
        return $this->con->consultaRetorno($sql);
    }

    public function agregar() {
        $sql = "INSERT INTO Mantenimiento (IDAuto, IDEmpleado, FechaMantenimiento, Descripcion, Costo, Tipo) 
        VALUES ('{$this->idAuto}', '{$this->idEmpleado}', '{$this->fechaMantenimiento}', '{$this->descripcion}', '{$this->costo}', '{$this->tipo}')";
        $this->con->consultaSimple($sql);
    }
}
?>
