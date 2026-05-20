<?php
/**
 * El Faro - Periódico Digital Local
 * Punto de entrada principal (index.php)
 * Arquitectura MVC sin framework
 */

require_once('./model/Articulo.php');
require_once('./model/Usuario.php');
require_once('./model/Contacto.php');

require_once('./controller/ArticuloController.php');
require_once('./controller/UsuarioController.php');
require_once('./controller/ContactoController.php');

$pagina = $_GET['pagina'] ?? 'home';

switch ($pagina) {
    case 'registro':
        $ctrl = new UsuarioController();
        $ctrl->procesarRegistro();
        break;

    case 'contacto':
        $ctrl = new ContactoController();
        $ctrl->procesar();
        break;

    case 'home':
    default:
        $ctrl = new ArticuloController();
        $ctrl->index();
        break;
}
?>
