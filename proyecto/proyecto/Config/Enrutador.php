<?php
namespace Config;

class Enrutador {
    public static function run(Request $request) {
        $controlador = ucfirst($request->getControlador()) . "Controller"; 
        $ruta = ROOT . "Controllers" . DS . $controlador . ".php"; 
        $metodo = $request->getMetodo();
        $argumento = $request->getArgumento();

        if (is_readable($ruta)) {
            require_once $ruta;
            $mostrar = "Controllers\\" . $controlador;
            $controlador = new $mostrar;

            if (empty($argumento)) {
                call_user_func([$controlador, $metodo]);
            } else {
                call_user_func_array([$controlador, $metodo], $argumento);
            }
        } else {
            echo "Error 404: Controlador no encontrado.";
        }
    }
}
?>
