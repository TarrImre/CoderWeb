document.addEventListener("DOMContentLoaded", function () {
    const headerHTML = `
            <section class="guarantee">
                <div class="container-fluid px-0">
                    <div class="row g-0">
                        <div class="col-lg-5">
                            <img src="assets/images/ac-technician.webp" alt="Villanyszerelő munka közben"
                                class="img-fluid w-100" />
                        </div>
                        <div class="col-lg-7 d-flex flex-column justify-content-center px-5 py-5"
                            style="background-color: #f7a828;">
                            <h3 class="title mb-4 text-white">VILLANYSZERELÉS GARANCIÁVAL?</h3>
                            <p class="default-text weight-700 size-18 line-height-160 mb-4 text-white" style="max-width: 775px;">
                                Szakértő csapatunk minden munkára garanciát vállal. Legyen szó új
                                kiépítésről, felújításról vagy hibaelhárításról, minőségi megoldást
                                kínálunk! Kérjen most árajánlatot, és tapasztalja meg a különbséget!
                            </p>
                            <a href="#"
                                class="btn bg-dark-blue text-white weight-600 size-16 line-height-130 border-2-s-dark-blue border-radius-5 padding-16-24 gap8 btn-lg text-uppercase align-self-start">
                                Ajánlatot kérek
                            </a>
                        </div>
                    </div>
                </div>
            </section>
    `;

    document.getElementById("guarantee-placeholder").innerHTML = headerHTML;
});
