<?php
require_once('./model/Database.php');
require_once('./model/Usuario.php');

/**
 * Controlador: UsuarioController
 * Gestiona el registro de lectores
 */
class UsuarioController {

    public function mostrarRegistro() {
        $errores = [];
        $exito   = false;
        $usuario = new Usuario();
        require('./view/registro.php');
    }

    public function procesarRegistro() {
        $errores = [];
        $exito   = false;

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $usuario = new Usuario(
                $_POST['nombre']   ?? '',
                $_POST['apellido'] ?? '',
                $_POST['email']    ?? '',
                $_POST['password'] ?? '',
                $_POST['plan']     ?? 'gratis'
            );

            $pass    = $_POST['password']         ?? '';
            $confirm = $_POST['confirm_password']  ?? '';

            if (strlen($pass) < 6) {
                $errores[] = 'La contraseña debe tener al menos 6 caracteres.';
            }
            if ($pass !== $confirm) {
                $errores[] = 'Las contraseñas no coinciden.';
            }

            $errores = array_merge($errores, $usuario->validar());

            if (empty($errores)) {
                $usuario->setPassword($pass);
                $db = Database::conectar();
                $stmt = $db->prepare(
                    "INSERT INTO usuarios (nombre, apellido, email, password_hash, plan) VALUES (?, ?, ?, ?, ?)"
                );
                $stmt->execute([
                    $usuario->getNombre(), $usuario->getApellido(),
                    $usuario->getEmail(), password_hash($pass, PASSWORD_DEFAULT),
                    $_POST['plan'] ?? 'gratis'
                ]);
            }
        } else {
            $usuario = new Usuario();
        }

        require('./view/registro.php');
    }
}
?>
