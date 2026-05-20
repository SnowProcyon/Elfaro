<!-- Footer El Faro -->
<footer class="footer has-background-dark has-text-white-ter mt-6">
    <div class="container">
        <div class="columns is-mobile is-multiline">

            <div class="column is-4-desktop is-12-mobile">
                <h4 class="title is-5 has-text-white">El Faro</h4>
                <p class="is-size-7">Periódico Digital Local. Informando con rigor desde 2020.</p>
                <!-- MEJORA: íconos de redes sociales -->
                <div class="mt-3" style="display:flex; gap:.8rem; font-size:1.2rem;">
                    <a href="#" title="Facebook" aria-label="Facebook">📘</a>
                    <a href="#" title="Twitter/X" aria-label="Twitter">🐦</a>
                    <a href="#" title="Instagram" aria-label="Instagram">📸</a>
                    <a href="#" title="YouTube" aria-label="YouTube">▶️</a>
                </div>
            </div>

            <div class="column is-4-desktop is-6-mobile">
                <h4 class="title is-5 has-text-white">Secciones</h4>
                <ul class="is-size-7">
                    <li><a href="index.php">Inicio</a></li>
                    <li><a href="#">Deportes</a></li>
                    <li><a href="#">Negocios</a></li>
                    <li><a href="#">Cultura &amp; Tecnología</a></li>
                    <li><a href="#">Archivo</a></li>
                </ul>
            </div>

            <div class="column is-4-desktop is-6-mobile">
                <h4 class="title is-5 has-text-white">Contacto &amp; Legal</h4>
                <ul class="is-size-7">
                    <!-- MEJORA: teléfono placeholder eliminado, datos reales -->
                    <li>✉ <a href="contacto.php">info@elfaro.cl</a></li>
                    <li><a href="contacto.php">Formulario de contacto</a></li>
                    <li><a href="#">Términos y condiciones</a></li>
                    <li><a href="#">Política de privacidad</a></li>
                </ul>

                <!-- MEJORA: suscripción al newsletter en el footer -->
                <div class="mt-4">
                    <p class="is-size-7 has-text-weight-bold mb-2">Newsletter diario:</p>
                    <div class="field has-addons">
                        <div class="control is-expanded">
                            <input class="input is-small" type="email"
                                   placeholder="tu@correo.com" aria-label="Email para newsletter">
                        </div>
                        <div class="control">
                            <a class="button is-small faro-btn">OK</a>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <hr style="background-color:#4a4a6a; height:1px; border:none; margin:1rem 0;">
        <div class="has-text-centered is-size-7">
            &copy; <?= date('Y') ?> El Faro - Periódico Digital Local. Todos los derechos reservados.
        </div>
    </div>
</footer>

<!-- Script Bulma navbar burger -->
<script>
document.addEventListener('DOMContentLoaded', () => {
    // Menú hamburguesa
    document.querySelectorAll('.navbar-burger').forEach(el => {
        el.addEventListener('click', () => {
            const target = document.getElementById(el.dataset.target);
            el.classList.toggle('is-active');
            target.classList.toggle('is-active');
        });
    });
});
</script>
</body>
</html>
