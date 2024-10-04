<?php
define('DS', DIRECTORY_SEPARATOR);
define('ROOT', realpath(dirname(__FILE__)) . DS);

define('URL', "http://localhost/TocciCars");

require_once "Config/Autoload.php";
Config\Autoload::run();

// Crea la instancia de Request con los argumentos necesarios
$request = new Config\Request('clientes', 'listarClientes', [1]); // Cambia estos valores según sea necesario

// El enrutador se encarga de ejecutar el controlador y método correspondientes
Config\Enrutador::run($request);
require_once "Views/_template/template.php";
?>