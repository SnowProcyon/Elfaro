<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($pageTitle ?? 'El Faro - Periódico Digital Local') ?></title>
    <!-- Bulma CSS Framework -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">
    <!-- Estilos personalizados El Faro -->
    <link rel="stylesheet" href="public/css/elfaro.css">
</head>
<body>

<!-- Aviso superior sticky -->
<div class="notification avisos-top is-warning is-light has-text-centered" id="avisoTop">
    <strong>📢 AVISO:</strong> Suscríbete al newsletter diario y accede a contenido exclusivo.
    <a href="registro.php" class="has-text-weight-bold ml-2">Regístrate gratis →</a>
    <button class="delete" onclick="document.getElementById('avisoTop').style.display='none'"></button>
</div>

<!-- Navbar principal -->
<nav class="navbar is-dark" role="navigation" aria-label="main navigation">
    <div class="container">
        <div class="navbar-brand">
            <a class="navbar-item has-text-weight-bold is-size-4" href="index.php">
                <!-- MEJORA: logo local en lugar de URL externa de Wikimedia -->
                <span style="font-size:1.6rem; margin-right:.3rem;">🗼</span>
                <span class="ml-1 has-text-white faro-brand">El Faro</span>
            </a>
            <a role="button" class="navbar-burger" aria-label="menu" aria-expanded="false" data-target="navMenu">
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
            </a>
        </div>

        <div id="navMenu" class="navbar-menu">
            <div class="navbar-start">
                <!-- MEJORA 3: is-active extendido a todas las páginas -->
                <a class="navbar-item <?= ($activePage ?? '') === 'home'     ? 'is-active' : '' ?>"
                   href="index.php">Inicio</a>

                <a class="navbar-item <?= ($activePage ?? '') === 'deportes' ? 'is-active' : '' ?>"
                   href="#">Deportes</a>

                <a class="navbar-item <?= ($activePage ?? '') === 'negocios' ? 'is-active' : '' ?>"
                   href="#">Negocios</a>

                <div class="navbar-item has-dropdown is-hoverable">
                    <a class="navbar-link">Otras Secciones</a>
                    <div class="navbar-dropdown">
                        <a class="navbar-item" href="#">Cultura</a>
                        <a class="navbar-item" href="#">Tecnología</a>
                        <hr class="navbar-divider">
                        <a class="navbar-item" href="#">Archivo</a>
                    </div>
                </div>

                <!-- MEJORA 3: Contacto visible en navbar-start con estado activo -->
                <a class="navbar-item <?= ($activePage ?? '') === 'contacto' ? 'is-active' : '' ?>"
                   href="contacto.php">Contacto</a>
            </div>

            <div class="navbar-end">
                <div class="navbar-item">
                    <div class="buttons">
                        <a class="button is-warning is-small has-text-weight-bold
                           <?= ($activePage ?? '') === 'registro' ? 'is-focused' : '' ?>"
                           href="registro.php">Suscribirse</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>
