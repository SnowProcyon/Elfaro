<?php
/**
 * Clase Modelo: Articulo
 * Representa una noticia/artículo publicado en El Faro
 */
class Articulo {
    private $id;
    private $titulo;
    private $resumen;
    private $contenido;
    private $categoria;
    private $imagen_url;
    private $autor;
    private $fecha_publicacion;
    private $destacado;

    public function __construct($titulo = '', $resumen = '', $categoria = 'general',
                                $imagen_url = '', $autor = 'Redacción El Faro', $destacado = false) {
        $this->titulo            = $titulo;
        $this->resumen           = $resumen;
        $this->categoria         = $categoria;
        $this->imagen_url        = $imagen_url;
        $this->autor             = $autor;
        $this->destacado         = $destacado;
        $this->fecha_publicacion = date('Y-m-d H:i:s');
    }

    public function getId()               { return $this->id; }
    public function getTitulo()           { return $this->titulo; }
    public function getResumen()          { return $this->resumen; }
    public function getContenido()        { return $this->contenido; }
    public function getCategoria()        { return $this->categoria; }
    public function getImagenUrl()        { return $this->imagen_url; }
    public function getAutor()            { return $this->autor; }
    public function getFechaPublicacion() { return $this->fecha_publicacion; }
    public function isDestacado()         { return $this->destacado; }

    public function setId($id)           { $this->id = $id; }
    public function setTitulo($t)        { $this->titulo = $t; }
    public function setResumen($r)       { $this->resumen = $r; }
    public function setContenido($c)     { $this->contenido = $c; }
    public function setCategoria($c)     { $this->categoria = $c; }
    public function setImagenUrl($u)     { $this->imagen_url = $u; }
    public function setAutor($a)         { $this->autor = $a; }
    public function setDestacado($d)     { $this->destacado = (bool)$d; }

    public function getCategoriaLabel() {
        $labels = [
            'tecnologia' => 'Tecnología', 'deportes' => 'Deportes',
            'negocios'   => 'Negocios',   'cultura'  => 'Cultura',
            'general'    => 'General',    'finanzas' => 'Finanzas',
        ];
        return $labels[$this->categoria] ?? ucfirst($this->categoria);
    }

    public function getCategoriaBulmaColor() {
        $colors = [
            'tecnologia' => 'is-info',    'deportes' => 'is-danger',
            'negocios'   => 'is-link',    'cultura'  => 'is-success',
            'general'    => 'is-dark',    'finanzas' => 'is-warning',
        ];
        return $colors[$this->categoria] ?? 'is-light';
    }
}
?>
