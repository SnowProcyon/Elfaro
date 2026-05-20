<?php
$pageTitle  = 'Contacto - El Faro';
$activePage = 'contacto';
require('./view/partials/header.php');
?>

<section class="section">
    <div class="container">
        <div class="columns is-centered">
            <div class="column is-7-desktop is-10-tablet">

                <!-- Breadcrumb -->
                <nav class="breadcrumb is-small mb-4" aria-label="breadcrumbs">
                    <ul>
                        <li><a href="index.php">Inicio</a></li>
                        <li class="is-active"><a href="#" aria-current="page">Contacto</a></li>
                    </ul>
                </nav>

                <h1 class="title is-2">✉ Contáctanos</h1>
                <p class="subtitle is-5 mb-5">
                    ¿Tienes una historia, corrección o consulta? Escríbenos y te responderemos a la brevedad.
                </p>

                <!-- Mensaje de éxito -->
                <?php if ($exito): ?>
                <div class="notification is-success is-light">
                    <button class="delete" onclick="this.parentElement.style.display='none'"></button>
                    <strong>✓ Mensaje enviado.</strong> Nos comunicaremos contigo pronto. ¡Gracias por escribirnos!
                </div>
                <?php endif; ?>

                <!-- Errores de validación -->
                <?php if (!empty($errores)): ?>
                <div class="notification is-danger is-light">
                    <button class="delete" onclick="this.parentElement.style.display='none'"></button>
                    <strong>Por favor corrige los siguientes errores:</strong>
                    <ul>
                        <?php foreach ($errores as $e): ?>
                        <li>• <?= htmlspecialchars($e) ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
                <?php endif; ?>

                <!-- Formulario de contacto -->
                <form method="POST" action="<?= htmlspecialchars($_SERVER['PHP_SELF']) ?>" novalidate>

                    <div class="field">
                        <label class="label" for="nombre">
                            Nombre <span class="has-text-danger" aria-hidden="true">*</span>
                        </label>
                        <div class="control has-icons-left">
                            <input class="input"
                                   type="text"
                                   id="nombre"
                                   name="nombre"
                                   placeholder="Tu nombre completo"
                                   value="<?= htmlspecialchars($contacto->getNombre()) ?>"
                                   autocomplete="name"
                                   required
                                   minlength="2">
                            <!-- MEJORA: ícono SVG inline en lugar de emoji -->
                            <span class="icon is-left" aria-hidden="true">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"
                                     fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/>
                                    <circle cx="12" cy="7" r="4"/>
                                </svg>
                            </span>
                        </div>
                        <p class="help">Mínimo 2 caracteres.</p>
                    </div>

                    <div class="field">
                        <label class="label" for="email">
                            Correo electrónico <span class="has-text-danger" aria-hidden="true">*</span>
                        </label>
                        <div class="control has-icons-left">
                            <input class="input"
                                   type="email"
                                   id="email"
                                   name="email"
                                   placeholder="tu@correo.com"
                                   value="<?= htmlspecialchars($contacto->getEmail()) ?>"
                                   autocomplete="email"
                                   required>
                            <span class="icon is-left" aria-hidden="true">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"
                                     fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/>
                                    <polyline points="22,6 12,13 2,6"/>
                                </svg>
                            </span>
                        </div>
                    </div>

                    <div class="field">
                        <label class="label" for="asunto">
                            Asunto <span class="has-text-danger" aria-hidden="true">*</span>
                        </label>
                        <div class="control">
                            <div class="select is-fullwidth">
                                <select name="asunto" id="asunto" required>
                                    <!-- MEJORA: primera opción deshabilitada -->
                                    <option value="" disabled selected>Selecciona un asunto...</option>
                                    <option value="Consulta general"      <?= $contacto->getAsunto() === 'Consulta general'      ? 'selected' : '' ?>>Consulta general</option>
                                    <option value="Corrección de noticia" <?= $contacto->getAsunto() === 'Corrección de noticia' ? 'selected' : '' ?>>Corrección de noticia</option>
                                    <option value="Envío de historia"     <?= $contacto->getAsunto() === 'Envío de historia'     ? 'selected' : '' ?>>Envío de historia</option>
                                    <option value="Publicidad"            <?= $contacto->getAsunto() === 'Publicidad'            ? 'selected' : '' ?>>Publicidad</option>
                                    <option value="Soporte técnico"       <?= $contacto->getAsunto() === 'Soporte técnico'       ? 'selected' : '' ?>>Soporte técnico</option>
                                    <option value="Otro"                  <?= $contacto->getAsunto() === 'Otro'                  ? 'selected' : '' ?>>Otro</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="field">
                        <label class="label" for="mensaje">
                            Mensaje <span class="has-text-danger" aria-hidden="true">*</span>
                        </label>
                        <div class="control">
                            <textarea class="textarea"
                                      id="mensaje"
                                      name="mensaje"
                                      rows="6"
                                      placeholder="Escribe tu mensaje aquí..."
                                      minlength="10"
                                      required><?= htmlspecialchars($contacto->getMensaje()) ?></textarea>
                        </div>
                        <!-- MEJORA: contador de caracteres en tiempo real -->
                        <p class="help">
                            Mínimo 10 caracteres.
                            <span id="charCount" style="float:right; font-weight:bold;"></span>
                        </p>
                    </div>

                    <!-- MEJORA 4: botón con faro-btn (color de marca unificado) -->
                    <div class="field mt-5">
                        <div class="control">
                            <button class="button faro-btn is-fullwidth is-medium" type="submit">
                                ✉ &nbsp; Enviar mensaje
                            </button>
                        </div>
                    </div>

                    <p class="is-size-7 has-text-grey mt-3">
                        Los campos marcados con <span class="has-text-danger">*</span> son obligatorios.
                        Tu información no será compartida con terceros.
                    </p>

                </form>

                <!-- Info de contacto directo -->
                <div class="box mt-6" style="border-left:4px solid var(--faro-accent);">
                    <p class="has-text-weight-bold mb-2">También puedes escribirnos directamente:</p>
                    <p class="is-size-7">✉ info@elfaro.cl &nbsp;|&nbsp; 🕐 Respondemos en menos de 24 horas hábiles</p>
                </div>

            </div>
        </div>
    </div>
</section>

<script>
// Contador de caracteres del textarea
(function () {
    const textarea  = document.getElementById('mensaje');
    const charCount = document.getElementById('charCount');
    if (!textarea || !charCount) return;

    function actualizar() {
        const n = textarea.value.length;
        charCount.textContent = n + ' car.';
        charCount.style.color = n >= 10 ? '#1E8449' : '#C0392B';
    }
    textarea.addEventListener('input', actualizar);
    actualizar();
})();
</script>

<?php require('./view/partials/footer.php'); ?>
