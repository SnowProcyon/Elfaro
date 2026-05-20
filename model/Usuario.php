<?php
/**
 * Clase Modelo: Usuario
 * Representa a un lector/suscriptor del periódico El Faro
 */
class Usuario {
    private $id;
    private $nombre;
    private $apellido;
    private $email;
    private $password;
    private $plan;
    private $fecha_registro;

    public function __construct($nombre = '', $apellido = '', $email = '', $password = '', $plan = 'gratis') {
        $this->nombre         = $nombre;
        $this->apellido       = $apellido;
        $this->email          = $email;
        $this->password       = $password;
        $this->plan           = $plan;
        $this->fecha_registro = date('Y-m-d H:i:s');
    }

    public function getId()             { return $this->id; }
    public function getNombre()         { return $this->nombre; }
    public function getApellido()       { return $this->apellido; }
    public function getEmail()          { return $this->email; }
    public function getPlan()           { return $this->plan; }
    public function getFechaRegistro()  { return $this->fecha_registro; }
    public function getNombreCompleto() { return $this->nombre . ' ' . $this->apellido; }

    public function setId($id)         { $this->id = $id; }
    public function setNombre($n)      { $this->nombre = trim($n); }
    public function setApellido($a)    { $this->apellido = trim($a); }
    public function setEmail($e)       { $this->email = strtolower(trim($e)); }
    public function setPassword($p)    { $this->password = password_hash($p, PASSWORD_DEFAULT); }
    public function setPlan($p)        { $this->plan = $p; }

    public function validar() {
        $errores = [];
        if (empty($this->nombre))   $errores[] = 'El nombre es requerido.';
        if (empty($this->apellido)) $errores[] = 'El apellido es requerido.';
        if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) $errores[] = 'El correo no es válido.';
        return $errores;
    }
}
?>
