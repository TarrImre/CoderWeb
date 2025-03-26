document.addEventListener("DOMContentLoaded", function () {
    const headerHTML = `
            <section class="header">
                    <div class="container-fluid">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">      
                                    <div class="d-flex justify-content-md-end justify-content-sm-center flex-wrap align-items-center font-weight-300 font-size-13 line-height-130">
                                        <div class="me-3">
                                            <a class="text-decoration-none" href="tel:+36302749590">
                                                <img src="assets/images/icons/phone.svg" alt="Telefonszám" class="img-fluid me-2">
                                                +36 70 931 8788
                                            </a>
                                        </div>
                                        <div class="me-3">
                                            <a class="text-decoration-none" href="mailto:spedtrans@spedtrans.hu">
                                                <img src="assets/images/icons/envelope.svg" alt="Email" class="img-fluid me-2">
                                                spedtrans@spedtrans.hu
                                            </a>
                                        </div>
                                        <div class="me-3">
                                            <a class="text-decoration-none" href="#">
                                                <img src="assets/images/icons/pin.svg" alt="Helyszín" class="img-fluid me-2">
                                                1143 Budapest, Hungária krt. 67
                                            </a>
                                        </div>
                                        <div class="ms-4">
                                            <a class="text-decoration-none" href="#">
                                                <img src="assets/images/icons/uk-flag.svg" alt="Helyszín" class="img-fluid">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </section>
    `;

    document.getElementById("header-placeholder").innerHTML = headerHTML;
});
