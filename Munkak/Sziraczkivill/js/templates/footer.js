document.addEventListener("DOMContentLoaded", function () {
    const headerHTML = `
            <footer class="pt-lg-5 pb-3">
                <div class="container">
                    <div class="row">
                        <div class="col-md-3 mb-4 mb-md-0 text-center text-md-start">
                            <a href="#">
                                <img src="assets/images/sziraczkivill-logo2.svg" alt="Sziráczki Vill logó"
                                    class="img-fluid mb-3" />
                            </a>
                        </div>

                        <div class="pages col-md-2 offset-md-4 mb-5 mb-md-0">
                            <ul class="list-unstyled">
                                <li class="mb-2">
                                    <a href="index.html" class="pages text-decoration-none">Főoldal</a>
                                </li>
                                <li class="mb-2">
                                    <a href="bemutatkozas.html" class="pages text-decoration-none">Bemutatkozás</a>
                                </li>
                                <li class="mb-2">
                                    <a href="szolgaltatasok.html" class="pages text-decoration-none">Szolgáltatások</a>
                                </li>
                                <li class="mb-2">
                                    <a href="kapcsolat.html" class="pages text-decoration-none">Kapcsolat</a>
                                </li>
                            </ul>
                        </div>

                        <div class="contact col-md-3">
                            <h6 class="title mb-2">Kapcsolat</h6>
                            <ul class="list-unstyled">
                                <li class="mb-2">
                                    <a href="tel:+36302749590" class="contact text-decoration-none">+36 30 274 9590</a>
                                </li>
                                <li class="mb-2">
                                    <a href="mailto:info@sziraczkivill.hu"
                                        class="contact text-decoration-none">info@sziraczkivill.hu</a>
                                </li>
                                <li class="mb-2">
                                    <a href="#" class="contact text-decoration-none">Kazincbarcika-Budapest</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="row align-items-center">
                        <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                            <p class="copyright mb-0">
                                &copy; 2025 Minden jog fenntartva.
                            </p>
                        </div>

                        <div class="col-md-6 text-center text-md-end">
                            <a href="#" class="terms me-3">Adatvédelmi Szabályzat</a>
                            <a href="#" class="terms me-3">Szolgáltatási Feltételek</a>
                            <a href="#" class="terms" style="white-space: nowrap;">Süti Beállítások</a>
                        </div>
                    </div>
                    <hr class="my-4" />

                    <span>
                        Honalpkészítés, webáruház készítés: <a href="#" class="text-decoration-none">CoderWeb</a>
                    </span>
                </div>
            </footer>
    `;

    document.getElementById("footer-placeholder").innerHTML = headerHTML;
});
