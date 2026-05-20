<?php
require_once('./model/Articulo.php');

/**
 * Controlador: ArticuloController
 * Gestiona la lógica de artículos y la vista principal (home)
 */
class ArticuloController {

    private $articulos = [];

    public function __construct() {
        $this->articulos = $this->cargarArticulos();
    }

    public function index() {
        $articulos   = $this->articulos;
        $destacado   = $this->getDestacado();
        $secundarios = $this->getSecundarios();
        $extra       = $this->getExtra();
        require('./view/home.php');
    }

    public function getDestacado() {
        foreach ($this->articulos as $a) {
            if ($a->isDestacado()) return $a;
        }
        return $this->articulos[0] ?? null;
    }

    public function getSecundarios() {
        $result = [];
        foreach ($this->articulos as $a) {
            if (!$a->isDestacado()) $result[] = $a;
            if (count($result) >= 3) break;
        }
        return $result;
    }

    public function getExtra() {
        $all = array_values(array_filter($this->articulos, fn($a) => !$a->isDestacado()));
        return array_slice($all, 3, 3);
    }

    private function cargarArticulos() {
        $data = [
            [
                'titulo'    => 'Google dice que su próxima IA será una bestia',
                'resumen'   => 'Google prepara unificar sus herramientas de IA para programación bajo la marca Antigravity para competir con Claude Code y Codex. El lanzamiento está previsto para las próximas semanas.',
                'categoria' => 'tecnologia',
                'imagen'    => 'https://i0.wp.com/imgs.hipertextual.com/wp-content/uploads/2026/04/google-antigravity.jpg?resize=1500%2C893&quality=70&strip=all&ssl=1',
                'destacado' => true,
            ],
            [
                'titulo'    => 'Récord histórico en Ahora Caigo',
                'resumen'   => 'Natalia hizo historia en Ahora Caigo de TVN: ganó $4.860.000, el premio mayor en la historia del programa.',
                'categoria' => 'general',
                'imagen'    => 'https://www.tvn.cl/tvn/site/artic/20260317/imag/foto_0000002320260317205736/Ahora-caigo-premio.webp',
                'destacado' => false,
            ],
            [
                'titulo'    => 'Troleo de South Park al despido de la fiscal de Trump',
                'resumen'   => 'South Park trolea a Pam Bondi tras su despido. Referencia a episodio que la retrató como personaje polémico.',
                'categoria' => 'general',
                'imagen'    => 'https://s.yimg.com/ny/api/res/1.2/XQh4jkSPQsa3SNLlBbLKaw--/YXBwaWQ9aGlnaGxhbmRlcjt3PTEyNDI7aD02OTk7Y2Y9d2VicA--/https://media.zenfs.com/es/animal_pol_tico_619/baff0f1a8ae64d684baa00f6715411cf',
                'destacado' => false,
            ],
            [
                'titulo'    => 'Lev Yashin y su historia',
                'resumen'   => 'Lev Yashin, el "Araña Negra", es el único arquero que ganó el Balón de Oro. Brilló en los 50-60 con el Dinamo Moscú.',
                'categoria' => 'deportes',
                'imagen'    => 'https://footballmakeshistory.eu/wp-content/uploads/2022/12/Lev-Yashin-770x1020.jpg',
                'destacado' => false,
            ],
            [
                'titulo'    => 'Palantir y su manifiesto: "Tecnofascismo"',
                'resumen'   => 'Palantir genera debate con manifiesto: defiende IA militar y vigilancia. Críticos lo llaman "tecnofascismo".',
                'categoria' => 'tecnologia',
                'imagen'    => '',
                'destacado' => false,
            ],
            [
                'titulo'    => 'Ethereum promete cambiar las finanzas',
                'resumen'   => 'OCBC estrena GOLDX: fondo de oro tokenizado en Ethereum para instituciones. Gestiona $525M y acepta stablecoins.',
                'categoria' => 'finanzas',
                'imagen'    => '',
                'destacado' => false,
            ],
            [
                'titulo'    => 'Postulación para emprendimiento femenino abre',
                'resumen'   => 'Indespa lanza programa de emprendimiento femenino en pesca artesanal: 600 mujeres, capacitación y hasta $2,5M.',
                'categoria' => 'negocios',
                'imagen'    => '',
                'destacado' => false,
            ],
        ];

        $articulos = [];
        foreach ($data as $i => $d) {
            $a = new Articulo($d['titulo'], $d['resumen'], $d['categoria'], $d['imagen'], 'Redacción El Faro', $d['destacado']);
            $a->setId($i + 1);
            $articulos[] = $a;
        }
        return $articulos;
    }
}
?>
