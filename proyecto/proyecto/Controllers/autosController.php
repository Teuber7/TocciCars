<?php namespace Controllers;

use Models\Autos;

class autosController {
    private $auto;

    public function __construct() {
        $this->auto = new Autos();
    }

    // Método index para listar autos
    public function index() {
        $datos = $this->auto->listar();
        return $datos;
    }

    // Método agregar con validaciones mejoradas
    public function agregar() {
        // Si no hay datos POST, muestra el formulario
        if (!$_POST) {
            return null;
        } 

        // Validaciones de campos
        $errores = $this->validarCampos($_POST);
        
        // Si hay errores, retorna los errores
        if (!empty($errores)) {
            return $errores;
        }

        // Validación de imagen
        if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] === UPLOAD_ERR_OK) {
            $imagen = $this->procesarImagen($_FILES['imagen']);
            
            if ($imagen === false) {
                // Manejar error de imagen
                return ['error' => 'Error al procesar la imagen'];
            }
        } else {
            // Manejar error de carga de imagen
            return ['error' => 'Error al cargar la imagen'];
        }

        // Preparar datos para guardar
        $datosAuto = [
            'marca' => $_POST['marca'],
            'modelo' => $_POST['modelo'],
            'anio' => $_POST['anio'],
            'matricula' => $_POST['matricula'],
            'color' => $_POST['color'],
            'tipo' => $_POST['tipo'],
            'kilometraje' => $_POST['kilometraje'],
            'precioPorDia' => $_POST['precioPorDia'],
            'precioVenta' => $_POST['precioVenta'],
            'categoria' => $_POST['categoria'],
            'disponibilidad' => $_POST['disponibilidad'],
            'estado' => $_POST['estado'],
            'nombreImagen' => $imagen,
            'tipoOperacion' => $_POST['tipoOperacion']
        ];

        // Guardar auto
        try {
            $this->auto->agregar($datosAuto);
            header("Location: " . URL . "autos");
            exit();
        } catch (Exception $e) {
            // Manejar errores de base de datos
            return ['error' => 'Error al guardar el auto: ' . $e->getMessage()];
        }
    }

    // Método para validar campos
    private function validarCampos($datos) {
        $errores = [];

        // Validaciones de campos obligatorios
        $camposObligatorios = [
            'marca', 'modelo', 'anio', 'matricula', 
            'color', 'tipo', 'kilometraje', 
            'precioPorDia', 'precioVenta'
        ];

        foreach ($camposObligatorios as $campo) {
            if (empty($datos[$campo])) {
                $errores[$campo] = "El campo $campo es obligatorio";
            }
        }

        // Validaciones adicionales
        if (!is_numeric($datos['anio']) || $datos['anio'] < 1900 || $datos['anio'] > date('Y')) {
            $errores['anio'] = "Año inválido";
        }

        if (!is_numeric($datos['precioPorDia']) || $datos['precioPorDia'] < 0) {
            $errores['precioPorDia'] = "Precio por día inválido";
        }

        return $errores;
    }

    // Método para procesar imagen
    private function procesarImagen($imagen) {
        $permitidos = ["image/jpeg", "image/png", "image/gif", "image/jpg"];
        $limite = 2000 * 1024; // 2MB

        // Validar tipo y tamaño de imagen
        if (!in_array($imagen['type'], $permitidos)) {
            return false;
        }

        if ($imagen['size'] > $limite) {
            return false;
        }

        // Generar nombre único para la imagen
        $nombreImagen = uniqid() . '_' . $imagen['name'];
        $rutaDestino = "Views/_template/imagenes/autos/" . $nombreImagen;

        // Mover imagen
        if (move_uploaded_file($imagen['tmp_name'], $rutaDestino)) {
            return $nombreImagen;
        }

        return false;
    }

    // Método editar con validaciones
    public function editar($id) {
        if (!$_POST) {
            $this->auto->set("id", $id);
            $datos = $this->auto->view();
            return $datos;
        } else {
            // Validaciones similares al método agregar
            $errores = $this->validarCampos($_POST);
            
            if (!empty($errores)) {
                return $errores;
            }

            // Procesar datos de edición
            $this->auto->set("id", $_POST['id']);
            $this->auto->set("marca", $_POST['marca']);
            // ... otros campos ...
            
            $this->auto->edit();
            header("Location: " . URL . "autos");
        }
    }

    // Método ver
    public function ver($id) {
        $this->auto->set("id", $id);
        $datos = $this->auto->view();
        return $datos;
    }

    // Método eliminar
    public function eliminar($id) {
        try {
            $this->auto->set("id", $id);
            $this->auto->delete();
            header("Location: " . URL . "autos");
        } catch (Exception $e) {
            // Manejar error de eliminación
            return ['error' => 'Error al eliminar el auto'];
        }
    }
}