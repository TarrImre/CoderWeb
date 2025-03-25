document.addEventListener("DOMContentLoaded", function () {
    const headerHTML = `
        <section class="header">
            <div class="container-fluid top-fluid">
                <div class="container">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="top-contacts d-flex justify-content-md-start justify-content-sm-center flex-wrap align-items-center">
                                <div class="me-3 mb-2 mb-md-0 header-text">
                                    <a class="text-decoration-none" href="tel:+36302749590">
                                        <img src="assets/images/icons/phone-call.svg" alt="Telefonszám" class="img-fluid img-size-18">
                                        +36 30 274 9590
                                    </a>
                                </div>
                                <div class="me-3 mb-2 mb-md-0">
                                    <a class="text-decoration-none" href="mailto:info@sziraczkivill.hu">
                                        <img src="assets/images/icons/mail.svg" alt="Email" class="img-fluid img-size-18">
                                        info@sziraczkivill.hu
                                    </a>
                                </div>
                                <div class="mb-2 mb-md-0">
                                    <a class="text-decoration-none" href="#">
                                        <img src="assets/images/icons/pin.svg" alt="Helyszín" class="img-fluid img-size-18">
                                        Kazincbarcika-Budapest
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 d-flex justify-content-md-end justify-content-sm-center align-items-center">
                            <img src="assets/images/elmuemasz-new-og-img1.svg" alt="MVM logó" class="img-fluid me-3">
                            <img src="assets/images/eon1.svg" alt="E.ON logó" class="img-fluid">
                        </div>
                    </div>
                </div>
            </div>
        </section>
    `;

    document.getElementById("header-placeholder").innerHTML = headerHTML;
});
