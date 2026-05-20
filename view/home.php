<?php
$pageTitle  = 'El Faro - Últimas Noticias';
$activePage = 'home';
require('./view/partials/header.php');
?>

<main class="section">
    <div class="container">

        <div class="level mb-3">
            <div class="level-left">
                <h1 class="title is-2 mb-0">Últimas Noticias</h1>
            </div>
            <div class="level-right">
                <p class="subtitle is-6 has-text-grey mb-0">
                    <?= date('d \d\e F, Y') ?>
                </p>
            </div>
        </div>

        <!-- Filtro por categoría (JS del lado cliente) -->
        <div class="faro-filtros" id="filtros" role="group" aria-label="Filtrar por categoría">
            <span class="tag is-selected" data-cat="" tabindex="0">🗞 Todas</span>
            <span class="tag is-info"    data-cat="tecnologia" tabindex="0">💻 Tecnología</span>
            <span class="tag is-danger"  data-cat="deportes"   tabindex="0">⚽ Deportes</span>
            <span class="tag is-link"    data-cat="negocios"   tabindex="0">💼 Negocios</span>
            <span class="tag is-success" data-cat="cultura"    tabindex="0">🎭 Cultura</span>
            <span class="tag is-warning" data-cat="finanzas"   tabindex="0">📈 Finanzas</span>
            <span class="tag is-dark"    data-cat="general"    tabindex="0">📰 General</span>
        </div>

        <div class="columns is-multiline is-variable is-4" id="grid-articulos">

            <!-- Artículo DESTACADO -->
            <?php if ($destacado): ?>
            <div class="column is-8-desktop is-12-tablet articulo-col"
                 data-cat="<?= htmlspecialchars($destacado->getCategoria()) ?>">
                <article class="card articulo-destacado">

                    <!-- MEJORA 1: placeholder si no hay imagen -->
                    <?php if ($destacado->getImagenUrl()): ?>
                    <div class="card-image">
                        <figure class="image is-4by3">
                            <img src="<?= htmlspecialchars($destacado->getImagenUrl()) ?>"
                                 alt="<?= htmlspecialchars($destacado->getTitulo()) ?>">
                        </figure>
                    </div>
                    <?php else: ?>
                    <div class="card-image faro-placeholder"
                         data-cat="<?= htmlspecialchars($destacado->getCategoria()) ?>"
                         aria-label="Sin imagen - <?= htmlspecialchars($destacado->getCategoriaLabel()) ?>">
                        <div class="placeholder-inner">
                            <span class="placeholder-icon">📰</span>
                            <span class="placeholder-cat"><?= htmlspecialchars($destacado->getCategoriaLabel()) ?></span>
                        </div>
                    </div>
                    <?php endif; ?>

                    <div class="card-content">
                        <div class="tags mb-2">
                            <span class="tag <?= $destacado->getCategoriaBulmaColor() ?>">
                                <?= $destacado->getCategoriaLabel() ?>
                            </span>
                            <span class="tag is-light">⭐ Destacado</span>
                        </div>
                        <h2 class="title is-3"><?= htmlspecialchars($destacado->getTitulo()) ?></h2>
                        <p class="subtitle is-6 has-text-grey">
                            <?= htmlspecialchars($destacado->getAutor()) ?> &middot;
                            <?= date('d/m/Y H:i', strtotime($destacado->getFechaPublicacion())) ?>
                        </p>
                        <div class="content">
                            <?= htmlspecialchars($destacado->getResumen()) ?>
                        </div>
                        <a href="#" class="button faro-btn is-small mt-2">Leer más →</a>
                    </div>
                </article>
            </div>
            <?php endif; ?>

            <!-- Artículos SECUNDARIOS -->
            <div class="column is-4-desktop is-12-tablet">
                <div class="columns is-multiline is-variable is-2">
                    <?php foreach ($secundarios as $art): ?>
                    <div class="column is-12 articulo-col"
                         data-cat="<?= htmlspecialchars($art->getCategoria()) ?>">
                        <article class="card card-mini">

                            <!-- MEJORA 1: placeholder si no hay imagen -->
                            <?php if ($art->getImagenUrl()): ?>
                            <div class="card-image">
                                <figure class="image is-16by9">
                                    <img src="<?= htmlspecialchars($art->getImagenUrl()) ?>"
                                         alt="<?= htmlspecialchars($art->getTitulo()) ?>">
                                </figure>
                            </div>
                            <?php else: ?>
                            <div class="card-image faro-placeholder"
                                 data-cat="<?= htmlspecialchars($art->getCategoria()) ?>"
                                 aria-label="Sin imagen - <?= htmlspecialchars($art->getCategoriaLabel()) ?>">
                                <div class="placeholder-inner">
                                    <span class="placeholder-icon" style="font-size:1.4rem;">📰</span>
                                    <span class="placeholder-cat"><?= htmlspecialchars($art->getCategoriaLabel()) ?></span>
                                </div>
                            </div>
                            <?php endif; ?>

                            <div class="card-content">
                                <span class="tag <?= $art->getCategoriaBulmaColor() ?> is-small mb-2">
                                    <?= strtoupper($art->getCategoriaLabel()) ?>
                                </span>
                                <h3 class="title is-5"><?= htmlspecialchars($art->getTitulo()) ?></h3>
                                <p class="content is-small"><?= htmlspecialchars($art->getResumen()) ?></p>
                                <a href="#" class="is-size-7 has-text-weight-bold"
                                   style="color:var(--faro-accent);">Leer más →</a>
                            </div>
                        </article>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>

        </div><!-- /columns destacado -->

        <!-- Fila extra de artículos -->
        <?php if (!empty($extra)): ?>
        <hr style="background-color:var(--faro-accent); height:2px; border:none; margin:2rem 0 1.5rem;">
        <h2 class="title is-4 mb-4">Más noticias</h2>
        <div class="columns is-multiline is-variable is-3" id="grid-extra">
            <?php foreach ($extra as $art): ?>
            <div class="column is-4-desktop is-6-tablet articulo-col"
                 data-cat="<?= htmlspecialchars($art->getCategoria()) ?>">
                <article class="card card-mini">

                    <!-- MEJORA 1: placeholder -->
                    <?php if ($art->getImagenUrl()): ?>
                    <div class="card-image">
                        <figure class="image is-16by9">
                            <img src="<?= htmlspecialchars($art->getImagenUrl()) ?>"
                                 alt="<?= htmlspecialchars($art->getTitulo()) ?>">
                        </figure>
                    </div>
                    <?php else: ?>
                    <div class="card-image faro-placeholder"
                         data-cat="<?= htmlspecialchars($art->getCategoria()) ?>"
                         aria-label="Sin imagen - <?= htmlspecialchars($art->getCategoriaLabel()) ?>">
                        <div class="placeholder-inner">
                            <span class="placeholder-icon" style="font-size:1.4rem;">📰</span>
                            <span class="placeholder-cat"><?= htmlspecialchars($art->getCategoriaLabel()) ?></span>
                        </div>
                    </div>
                    <?php endif; ?>

                    <div class="card-content">
                        <span class="tag <?= $art->getCategoriaBulmaColor() ?> is-small mb-2">
                            <?= strtoupper($art->getCategoriaLabel()) ?>
                        </span>
                        <h3 class="title is-5"><?= htmlspecialchars($art->getTitulo()) ?></h3>
                        <p class="content is-small"><?= htmlspecialchars($art->getResumen()) ?></p>
                        <a href="#" class="is-size-7 has-text-weight-bold"
                           style="color:var(--faro-accent);">Leer más →</a>
                    </div>
                </article>
            </div>
            <?php endforeach; ?>
        </div>
        <?php endif; ?>

    </div><!-- /container -->
</main>

<!-- Script filtro por categoría (JS puro, sin dependencias) -->
<script>
(function () {
    const filtros   = document.querySelectorAll('#filtros .tag');
    const columnas  = document.querySelectorAll('.articulo-col');

    filtros.forEach(tag => {
        tag.addEventListener('click', () => {
            const cat = tag.dataset.cat;

            // Actualizar estado visual de filtros
            filtros.forEach(t => t.classList.remove('is-selected'));
            tag.classList.add('is-selected');

            // Mostrar u ocultar columnas
            columnas.forEach(col => {
                if (cat === '' || col.dataset.cat === cat) {
                    col.removeAttribute('hidden');
                } else {
                    col.setAttribute('hidden', '');
                }
            });
        });

        // Accesibilidad: activar con Enter/Espacio
        tag.addEventListener('keydown', e => {
            if (e.key === 'Enter' || e.key === ' ') { e.preventDefault(); tag.click(); }
        });
    });
})();
</script>

<?php require('./view/partials/footer.php'); ?>
