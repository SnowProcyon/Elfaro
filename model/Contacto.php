<?php
/**
 * Clase Modelo: Contacto
 * Representa un mensaje de contacto enviado al periódico
 */
class Contacto {
    private $nombre;
    private $email;
    private $asunto;
    private $mensaje;
    private $fecha;

    public function __construct($nombre = '', $email = '', $asunto = '', $mensaje = '') {
        $this->nombre  = trim($nombre);
        $this->email   = strtolower(trim($email));
        $this->asunto  = trim($asunto);
        $this->mensaje = trim($mensaje);
        $this->fecha   = date('Y-m-d H:i:s');
    }

    public function getNombre()  { return $this->nombre; }
    public function getEmail()   { return $this->email; }
    public function getAsunto()  { return $this->asunto; }
    public function getMensaje() { return $this->mensaje; }
    public function getFecha()   { return $this->fecha; }

    public function setNombre($n)  { $this->nombre  = trim($n); }
    public function setEmail($e)   { $this->email   = strtolower(trim($e)); }
    public function setAsunto($a)  { $this->asunto  = trim($a); }
    public function setMensaje($m) { $this->mensaje = trim($m); }

    public function validar() {
        $errores = [];
        if (empty($this->nombre))            $errores[] = 'El nombre es requerido.';
        if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) $errores[] = 'El correo no es válido.';
        if (empty($this->asunto))            $errores[] = 'El asunto es requerido.';
        if (strlen($this->mensaje) < 10)     $errores[] = 'El mensaje debe tener al menos 10 caracteres.';
        return $errores;
    }

    public function sanitizar() {
        $this->nombre  = htmlspecialchars($this->nombre,  ENT_QUOTES, 'UTF-8');
        $this->asunto  = htmlspecialchars($this->asunto,  ENT_QUOTES, 'UTF-8');
        $this->mensaje = htmlspecialchars($this->mensaje, ENT_QUOTES, 'UTF-8');
    }
}
?>
