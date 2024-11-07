<?php namespace Views;

$template = new Template();

class Template {

    public function __construct() {
?>
    <!DOCTYPE html>
    <html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Administración de Autos</title>
        <link rel="stylesheet" href="<?php echo URL; ?>Views/_template/css/bootstrap.css">
        <link rel="stylesheet" href="<?php echo URL; ?>Views/_template/css/general.css">
    </head>
    <body>
        <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-2">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">Administración de Autos</a>
            </div>

            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-2">
                <ul class="nav navbar-nav">
                    <li><a href="<?php echo URL; ?>">Inicio</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Autos <span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="<?php echo URL; ?>autos">Listado</a></li>
                            <li><a href="<?php echo URL; ?>autos/agregar">Agregar Auto</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Marcas <span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="<?php echo URL; ?>marcas">Listado de Marcas</a></li>
                            <li><a href="<?php echo URL; ?>marcas/agregar">Agregar Marca</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
        </nav>
<?php
    }

    public function __destruct() {
?>
    <footer class="navbar-fixed-bottom">
        © Administración de Autos
    </footer>
    <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
    <script src="<?php echo URL; ?>Views/_template/js/bootstrap.js"></script>
    </body>
    </html>
<?php
    }

}
?>
