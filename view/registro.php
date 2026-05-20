<?php
$pageTitle  = 'Crear cuenta - El Faro';
$activePage = 'registro';
require('./view/partials/header.php');
?>

<section class="section">
    <div class="container">
        <div class="columns is-centered">
            <div class="column is-6-desktop is-9-tablet">

                <!-- Breadcrumb -->
                <nav class="breadcrumb is-small mb-4" aria-label="breadcrumbs">
                    <ul>
                        <li><a href="index.php">Inicio</a></li>
                        <li class="is-active"><a href="#" aria-current="page">Crear cuenta</a></li>
                    </ul>
                </nav>

                <div class="has-text-centered mb-5">
                    <h1 class="title is-2">📰 Únete a El Faro</h1>
                    <p class="subtitle is-5">Crea tu cuenta gratuita y accede a contenido exclusivo.</p>
                </div>

                <!-- Planes disponibles — MEJORA: con lista de beneficios -->
                <div class="columns is-mobile mb-5" id="planes-container">

                    <div class="column">
                        <div class="box has-text-centered plan-card" data-plan="gratis"
                             style="cursor:pointer;" onclick="seleccionarPlan('gratis')">
                            <p class="is-size-3 mb-1">🆓</p>
                            <p class="has-text-weight-bold is-size-6">Gratis</p>
                            <p class="is-size-7 has-text-grey mb-2">$0 / mes</p>
                            <ul class="is-size-7 has-text-left" style="list-style:none; padding:0;">
                                <li>✓ Noticias generales</li>
                                <li>✓ Acceso web</li>
                                <li style="color:#bbb;">✗ Sin newsletter</li>
                            </ul>
                        </div>
                    </div>

                    <div class="column">
                        <div class="box has-text-centered plan-card plan-destacado" data-plan="basico"
                             style="cursor:pointer;" onclick="seleccionarPlan('basico')">
                            <p class="is-size-3 mb-1">⭐</p>
                            <p class="has-text-weight-bold is-size-6">Básico</p>
                            <p class="is-size-7 mb-2" style="color:var(--faro-accent);">$2.990 / mes</p>
                            <ul class="is-size-7 has-text-left" style="list-style:none; padding:0;">
                                <li>✓ Todo lo de Gratis</li>
                                <li>✓ Sin publicidad</li>
                                <li>✓ Newsletter diario</li>
                            </ul>
                        </div>
                    </div>

                    <div class="column">
                        <div class="box has-text-centered plan-card" data-plan="premium"
                             style="cursor:pointer;" onclick="seleccionarPlan('premium')">
                            <p class="is-size-3 mb-1">👑</p>
                            <p class="has-text-weight-bold is-size-6">Premium</p>
                            <p class="is-size-7 has-text-grey mb-2">$5.990 / mes</p>
                            <ul class="is-size-7 has-text-left" style="list-style:none; padding:0;">
                                <li>✓ Todo lo de Básico</li>
                                <li>✓ Artículos exclusivos</li>
                                <li>✓ Acceso anticipado</li>
                            </ul>
                        </div>
                    </div>

                </div>

                <!-- Mensaje de éxito -->
                <?php if ($exito): ?>
                <div class="notification is-success is-light">
                    <button class="delete" onclick="this.parentElement.style.display='none'"></button>
                    <strong>🎉 ¡Cuenta creada exitosamente!</strong>
                    Tu suscripción ya está activa. <a href="index.php">Volver al inicio →</a>
                </div>
                <?php endif; ?>

                <!-- Errores -->
                <?php if (!empty($errores)): ?>
                <div class="notification is-danger is-light">
                    <button class="delete" onclick="this.parentElement.style.display='none'"></button>
                    <strong>Corrige los siguientes errores:</strong>
                    <ul>
                        <?php foreach ($errores as $e): ?>
                        <li>• <?= htmlspecialchars($e) ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
                <?php endif; ?>

                <!-- Formulario de registro -->
                <form method="POST" action="<?= htmlspecialchars($_SERVER['PHP_SELF']) ?>" novalidate>

                    <div class="columns">
                        <div class="column">
                            <div class="field">
                                <label class="label" for="nombre">
                                    Nombre <span class="has-text-danger">*</span>
                                </label>
                                <div class="control">
                                    <input class="input" type="text" id="nombre" name="nombre"
                                           placeholder="Pedro"
                                           value="<?= htmlspecialchars($usuario->getNombre()) ?>"
                                           autocomplete="given-name"
                                           required minlength="2">
                                </div>
                            </div>
                        </div>
                        <div class="column">
                            <div class="field">
                                <label class="label" for="apellido">
                                    Apellido <span class="has-text-danger">*</span>
                                </label>
                                <div class="control">
                                    <input class="input" type="text" id="apellido" name="apellido"
                                           placeholder="González"
                                           value="<?= htmlspecialchars($usuario->getApellido()) ?>"
                                           autocomplete="family-name"
                                           required minlength="2">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="field">
                        <label class="label" for="email">
                            Correo electrónico <span class="has-text-danger">*</span>
                        </label>
                        <div class="control has-icons-left">
                            <input class="input" type="email" id="email" name="email"
                                   placeholder="tu@correo.com"
                                   value="<?= htmlspecialchars($usuario->getEmail()) ?>"
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

                    <div class="columns">
                        <div class="column">
                            <div class="field">
                                <label class="label" for="password">
                                    Contraseña <span class="has-text-danger">*</span>
                                </label>
                                <!-- MEJORA: toggle show/hide password -->
                                <div class="control has-icons-right">
                                    <input class="input" type="password" id="password" name="password"
                                           placeholder="Mínimo 6 caracteres"
                                           autocomplete="new-password"
                                           minlength="6" required>
                                    <span class="icon is-right" style="pointer-events:all; cursor:pointer;"
                                          onclick="togglePass('password', this)" title="Mostrar/ocultar contraseña"
                                          aria-label="Mostrar u ocultar contraseña">
                                        👁
                                    </span>
                                </div>
                                <!-- Indicador de fortaleza -->
                                <progress id="passStrength" class="progress is-small mt-1"
                                          value="0" max="4" style="height:4px;"></progress>
                                <p id="passMsg" class="help"></p>
                            </div>
                        </div>
                        <div class="column">
                            <div class="field">
                                <label class="label" for="confirm_password">
                                    Confirmar contraseña <span class="has-text-danger">*</span>
                                </label>
                                <div class="control has-icons-right">
                                    <input class="input" type="password" id="confirm_password" name="confirm_password"
                                           placeholder="Repite tu contraseña"
                                           autocomplete="new-password"
                                           required>
                                    <span class="icon is-right" style="pointer-events:all; cursor:pointer;"
                                          onclick="togglePass('confirm_password', this)" title="Mostrar/ocultar"
                                          aria-label="Mostrar u ocultar confirmación">
                                        👁
                                    </span>
                                </div>
                                <p id="matchMsg" class="help"></p>
                            </div>
                        </div>
                    </div>

                    <!-- Plan oculto sincronizado con las tarjetas -->
                    <div class="field">
                        <label class="label">Plan de suscripción</label>
                        <div class="control" style="display:flex; gap:1.5rem; flex-wrap:wrap;">
                            <label class="radio" style="display:flex; align-items:center; gap:.3rem;">
                                <input type="radio" name="plan" id="plan-gratis"   value="gratis"   checked> Gratis
                            </label>
                            <label class="radio" style="display:flex; align-items:center; gap:.3rem;">
                                <input type="radio" name="plan" id="plan-basico"   value="basico"> Básico
                            </label>
                            <label class="radio" style="display:flex; align-items:center; gap:.3rem;">
                                <input type="radio" name="plan" id="plan-premium"  value="premium"> Premium
                            </label>
                        </div>
                        <p class="help">Haz clic en la tarjeta superior para seleccionar tu plan.</p>
                    </div>

                    <!-- MEJORA 4: botón faro-btn (color de marca unificado) -->
                    <div class="field mt-5">
                        <div class="control">
                            <button class="button faro-btn is-fullwidth is-medium" type="submit">
                                🚀 &nbsp; Crear mi cuenta
                            </button>
                        </div>
                    </div>

                    <p class="is-size-7 has-text-grey has-text-centered mt-3">
                        Al registrarte aceptas nuestros
                        <a href="#" style="color:var(--faro-accent);">Términos y condiciones</a>
                        y <a href="#" style="color:var(--faro-accent);">Política de privacidad</a>.
                    </p>
                </form>

            </div>
        </div>
    </div>
</section>

<script>
// Toggle mostrar/ocultar contraseña
function togglePass(fieldId, iconEl) {
    const input = document.getElementById(fieldId);
    if (!input) return;
    input.type = input.type === 'password' ? 'text' : 'password';
    iconEl.style.opacity = input.type === 'text' ? '1' : '.5';
}

// Indicador de fortaleza de contraseña
(function () {
    const passInput   = document.getElementById('password');
    const confirmInput= document.getElementById('confirm_password');
    const progress    = document.getElementById('passStrength');
    const passMsg     = document.getElementById('passMsg');
    const matchMsg    = document.getElementById('matchMsg');

    if (!passInput) return;

    passInput.addEventListener('input', function () {
        const val = this.value;
        let score = 0;
        if (val.length >= 6)  score++;
        if (val.length >= 10) score++;
        if (/[A-Z]/.test(val)) score++;
        if (/[0-9!@#$%]/.test(val)) score++;

        progress.value = score;
        const colors  = ['#C0392B','#E67E22','#F1C40F','#1E8449'];
        const labels  = ['Muy débil','Débil','Aceptable','Fuerte'];
        progress.style.accentColor = colors[score - 1] || '#ccc';
        passMsg.textContent   = score > 0 ? labels[score - 1] : '';
        passMsg.style.color   = colors[score - 1] || '#ccc';
    });

    function checkMatch() {
        if (!confirmInput.value) { matchMsg.textContent = ''; return; }
        if (passInput.value === confirmInput.value) {
            matchMsg.textContent = '✓ Las contraseñas coinciden';
            matchMsg.style.color = '#1E8449';
        } else {
            matchMsg.textContent = '✗ Las contraseñas no coinciden';
            matchMsg.style.color = '#C0392B';
        }
    }
    confirmInput.addEventListener('input', checkMatch);
    passInput.addEventListener('input', checkMatch);
})();

// Sincronizar tarjetas de plan con radio buttons
function seleccionarPlan(plan) {
    // Radio
    const radio = document.getElementById('plan-' + plan);
    if (radio) radio.checked = true;

    // Destacar tarjeta seleccionada
    document.querySelectorAll('.plan-card').forEach(card => {
        const esSel = card.dataset.plan === plan;
        card.style.outline = esSel ? '3px solid var(--faro-accent)' : 'none';
        card.style.transform = esSel ? 'translateY(-4px)' : '';
    });
}

// Marcar gratis por defecto al cargar
seleccionarPlan('gratis');
</script>

<?php require('./view/partials/footer.php'); ?>
