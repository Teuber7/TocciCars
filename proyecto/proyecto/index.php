<?php
// Define constantes para las rutas
define('DS', DIRECTORY_SEPARATOR);
define('ROOT', realpath(dirname(__FILE__)) . DS);
define('URL', "http://localhost/proyecto"); // Cambia "TocciCars" por el nombre correcto de tu proyecto si es diferente

// Incluye el archivo Autoload
require_once "Config/Autoload.php";

// Ejecuta el autoload para cargar las clases automáticamente
use Config\Autoload;
use Config\Request;
use Config\Enrutador;

Autoload::run(); // Llama al método estático de la clase Autoload

// Crea la instancia de Request con los valores adecuados
$request = new Request('clientes', 'listarClientes', [1]); // Ajusta estos valores según tu lógica

// Ejecuta el enrutador con la solicitud creada
Enrutador::run($request);

// Incluye la plantilla principal
require_once "Views/_template/template.php";
?>
