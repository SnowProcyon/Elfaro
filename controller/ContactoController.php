<?php
require_once('./model/Contacto.php');
require_once('./model/Database.php');

/**
 * Controlador: ContactoController
 * Gestiona el formulario de contacto y guarda en MySQL
 */
class ContactoController {

    public function mostrar() {
        $errores  = [];
        $exito    = false;
        $contacto = new Contacto();
        require('./view/contacto.php');
    }

    public function procesar() {
        $errores = [];
        $exito   = false;

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $contacto = new Contacto(
                $_POST['nombre']  ?? '',
                $_POST['email']   ?? '',
                $_POST['asunto']  ?? '',
                $_POST['mensaje'] ?? ''
            );

            $errores = $contacto->validar();

            if (empty($errores)) {
                $contacto->sanitizar();

                try {
                    $db   = Database::conectar();
                    $stmt = $db->prepare(
                        "INSERT INTO contactos (nombre, email, asunto, mensaje, fecha)
                         VALUES (:nombre, :email, :asunto, :mensaje, NOW())"
                    );
                    $stmt->execute([
                        ':nombre'  => $contacto->getNombre(),
                        ':email'   => $contacto->getEmail(),
                        ':asunto'  => $contacto->getAsunto(),
                        ':mensaje' => $contacto->getMensaje(),
                    ]);

                    $exito    = true;
                    $contacto = new Contacto();

                } catch (PDOException $e) {
                    $errores[] = 'Error al guardar el mensaje. Intenta nuevamente.';
                    // En desarrollo puedes descomentar la siguiente línea para ver el error:
                    $errores[] = $e->getMessage();
                }
            }
        } else {
            $contacto = new Contacto();
        }

        require('./view/contacto.php');
    }
}
?>
