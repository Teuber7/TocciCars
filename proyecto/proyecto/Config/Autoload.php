<?php
namespace Config;

class Autoload {
    public static function run() {
        spl_autoload_register(function ($class) {
            $path = str_replace("\\", "/", $class) . ".php";
            if (file_exists($path)) {
                require_once $path;
            } else {
                echo "No se encontró la clase: " . $class . " en la ruta: " . $path;
            }
        });
    }
}
?>