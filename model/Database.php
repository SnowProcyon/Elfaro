<?php
/**
 * Clase Database
 * Conexión PDO singleton a MySQL
 * Arquitectura MVC - El Faro
 */
class Database {
    private static $conn = null;

    public static function conectar() {
        if (self::$conn === null) {
            $host    = 'localhost';
            $dbname  = 'elfaro';
            $usuario = 'root';
            $clave   = '';          // XAMPP por defecto no tiene contraseña

            try {
                self::$conn = new PDO(
                    "mysql:host={$host};dbname={$dbname};charset=utf8mb4",
                    $usuario,
                    $clave
                );
                self::$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                self::$conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            } catch (PDOException $e) {
                die("Error de conexión a la base de datos: " . $e->getMessage());
            }
        }
        return self::$conn;
    }
}
?>
