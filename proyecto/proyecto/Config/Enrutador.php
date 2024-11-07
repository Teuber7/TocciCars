<?php
namespace Config;

class Enrutador {
    public static function run(Request $request) {
        $controlador = $request->getControlador() . "Controller";
        $rutaControlador = "Controllers/" . $controlador . ".php";

        if (is_readable($rutaControlador)) {
            require_once $rutaControlador;
            $controlador = "Controllers\\" . $controlador;
            $objControlador = new $controlador;

            $metodo = $request->getMetodo();
            $argumentos = $request->getArgumentos();

            if (method_exists($objControlador, $metodo)) {
                if (!empty($argumentos)) {
                    call_user_func_array([$objControlador, $metodo], $argumentos);
                } else {
                    call_user_func([$objControlador, $metodo]);
                }
            } else {
                echo "Método <strong>$metodo</strong> no encontrado.";
            }
        } else {
            echo "Controlador <strong>$controlador</strong> no encontrado.";
        }
    }
}
?>
