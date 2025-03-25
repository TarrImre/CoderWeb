    <section class="hero">
        <div id="carouselExampleIndicators" class="carousel slide">
            <div class="carousel-inner">
                <?php $i = 0 ?>
                <?php foreach ($slideshowImages as $slide):?>
                <div class="carousel-item <?= $i == 0 ? 'active' : '' ?>">
                    <div class="container-fluid">
                        <div class="container hero-content">
                            <div class="row align-items-center">
                                <div class="context col-md-7">
                                    <h1 class="title pb-3 text-uppercase"><?=$slide['name']?></h1>
                                    <a href="<?=base_url('kapcsolat')?>"
                                        class="btn bg-yellow weight-600 size-16 line-height-130 border-radius-5 padding-16-24 gap8 btn-lg text-white text-uppercase">
                                        Ajánlatot kérek
                                    </a>
                                </div>
                                <div class="col-md-5 d-flex justify-content-end align-items-center">
                                    <img src="<?=base_url('assets/uploads/slideshow/'.$slide['filename'])?>" alt="<?=$slide['name']?>"
                                        class="img-fluid image-radius-15">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php $i++; ?>
                <?php endforeach;?>
            </div>
            <div class="carousel-indicators">
                <?php if (count($slideshowImages) > 1): ?>
                    <?php $i=0?>
                    <?php foreach($slideshowImages as $slide):?>
                        <button type="button" class="<?=$i==0?'active':''?>" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="<?=$i;?>"
                        aria-label="Slide <?=$i;?>"></button>
                        <?php $i++;?>
                    <?php endforeach;?>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <section class="features">
        <div class="container py-5">
            <div class="row g-4 align-items-start">
                <?php foreach ($underHeroRow as $item):?>
                    <div class="col-md-4 d-flex align-items-start justify-content-center text-md-start">
                        <img src="<?=base_url('assets/uploads/slideshow/').$item['filename'];?>" alt="<?=$item['name'];?>"
                            class="me-4 mb-4 img-fluid align-self-center">
                        <div style="max-width: 302px;">
                            <h5 class="title mb-1"><?=$item['name'];?></h5>
                            <p class="default-text weight-500 size-16 line-height-180 mb-0"><?=$item['desc'];?></p>
                        </div>
                    </div>
                <?php endforeach;?>
            </div>
        </div>
    </section>

    <?php $content_6 = getContentByID(6); ?>
    <section class="featured-services py-5">
        <div class="container py-3">
            <div class="row mb-4 text-center">
                <div class="col">
                    <h2 class="title text-uppercase pb-3"><?=$content_6['title'];?></h2>
                    <div class="default-text weight-500 size-18 line-height-160 pb-3 text-justify"><?=$content_6['content'];?></div>
                </div>
            </div>

            <div class="row g-4 align-items-stretch">
                <?php foreach ($servicelist as $item):?>
                    <div class="col-lg-4 col-md-12 d-flex justify-content-center">
                        <div class="d-flex flex-column justify-content-between h-100 align-items-center">
                            <div class="d-flex flex-column align-items-lg-start align-items-center">
                                <div class="image-bg mb-3 d-flex justify-content-center align-items-center">
                                    <a href="<?=base_url('szolgaltatas/').$item['url'] ?>">
                                        <img src="<?=base_url('assets/uploads/services/').$item['indexImage']['filename'];?>" alt="Fogyasztásmérőhely szabványosítás"
                                        class="img-fluid">
                                    </a>
                                </div>
                                <h4 class="text-lg-start text-center title mb-3"><?=$item['name'];?></h4>
                            </div>
                            
                            <div class="text-lg-start text-center w-100">
                                <a href="<?=base_url('kapcsolat')?>"
                                    class="btn text-blue bg-white border-1-s-blue ff-Open-Sans size-16 weight-600 line-height-130 border-radius-5 padding-16-24 gap8 text-uppercase d-inline-flex align-items-center">
                                    Ajánlatot kérek
                                    <img src="assets/images/icons/arrow-right.svg" alt="Jobbra mutató nyíl"
                                        class="img-size-17 ms-2">
                                </a>
                            </div>
                        </div>
                    </div>
                <?php endforeach;?>
            </div>
        </div>
    </section>

    <?php $content_7 = getContentByID(7); ?>
    <section class="goal">
        <div class="container goal-content">
            <div class="row">
                <div class="col-lg-6 col-md-12">
                    <h3 class="title pb-3 text-uppercase"><?=$content_7['title'];?></h3>
                    <div class="default-text weight-400 size-18 line-height-160 pb-3"><?=$content_7['content'];?></div>
                    <a href="<?=base_url('kapcsolat')?>"
                        class="btn bg-yellow border-2-s-yellow ff-Open-Sans weight-600 size-16 line-height-130 border-radius-5 padding-16-24 gap8 text-white text-uppercase btn-lg">
                        Ajánlatot kérek
                    </a>
                </div>

                <div
                    class="col-lg-4 offset-lg-2 col-md-12 d-flex justify-content-center align-items-center pt-md-4 pt-lg-0">
                    <img src="assets/images/sziraczkivill-logo.svg" alt="Sziraczkivill logo" class="img-fluid">
                </div>
            </div>
        </div>
    </section>

    <?php $content_8 = getContentByID(8); ?>
    <section class="crusial py-5 flex-column text-center pb-5 mb-5 overflow-hidden">
        <div class="container text-center">
            <h2 class="title pb-3 text-uppercase"><?=$content_8['title'];?></h2>
            <div class="default-text weight-500 size-20 line-height-160 mb-5 text-center"><?=$content_8['content'];?></div>
        </div>
            <div class="col-sm-12 pb-5 mb-5 w-100 mobileslider">
                <div class="splide" id="splide" role="region" aria-roledescription="carousel">
                    <div class="splide__track" id="splide-track" aria-live="polite" aria-atomic="true">
                        <ul class="splide__list" id="splide-list">
                            <?php foreach ($opinionsList as $item):?>
                                <li class="splide__slide" id="splide-slide01">
                                    <div class="one-opinion">
                                        <img src="assets/images/icons/quote-icon.svg" alt="Idézőjel ikon" class="img-fluid">
                                        <p class="default-text weight-400 size-32 line-height-100 w-100 mb-3 text-center"><?=$item['name'];?></p>
                                        <div class="default-text weight-400 italic size-16 line-height-180 w-100 text-center"><?=$item['desc'];?></div>
                                    </div>
                                </li>
                            <?php endforeach;?>
                        </ul>
                    </div>
                </div>
            </div>
            <script>
                document.addEventListener('DOMContentLoaded', function () {
                    var splide = new Splide('#splide', {
                        type: 'loop',
                        perPage: 3,
                        perMove: 1,
                        focus: 'center',
                        arrows: false,
                        pagination: true,
                        breakpoints: {
                            991: {
                                perPage: 1,
                            },
                        } 
                    });

                    splide.on('mounted move', function () {
                        document.querySelectorAll('.splide__slide.is-center').forEach(function (slide) {
                            slide.classList.remove('is-center');
                        });
                        var centerSlide = splide.Components.Slides.getAt(splide.index);
                        if (centerSlide) {
                            centerSlide.slide.classList.add('is-center');
                        }
                    });

                    splide.mount();
                });
            </script>
    </section>

    <?php $content_9 = getContentByID(9); ?>
    <section class="quality">
        <div class="container">
            <div class="row g-4 align-items-stretch pt-0 pt-md-4">
                <div class="col-md-5 d-flex align-items-center justify-content-center pe-lg-5">
                    <img src="assets/images/electrician.webp" alt="Villanyszerelő munka közben"
                        class="img-fluid image-radius-15">
                </div>
                <div class="col-md-7">
                    <div>
                        <h3 class="title mb-4 text-uppercase"><?=$content_9['title'];?></h3>
                        <div class="default-text weight-400 size-18 line-height-160"><?=$content_9['content'];?></div>
                    </div>
                    <div class="pt-4 d-flex flex-wrap">
                        <a href="<?=base_url('minosegi-villanyszereles-garanciaval')?>"
                            class="btn text-blue bg-white ff-Open-Sans weight-600 size-16 line-height-130 border-radius-5 padding-16-24 gap8 border-1-s-blue me-4 text-uppercase d-inline-flex align-items-center">
                            Tovább olvasom
                            <img src="assets/images/icons/arrow-right.svg" alt="Jobbra mutató nyíl"
                                class="img-size-17 ms-2">
                        </a>
                        <a href="<?=base_url('kapcsolat')?>"
                            class="btn text-white bg-yellow ff-Open-Sans weight-600 size-16 line-height-130 border-radius-5 padding-16-24 gap8 border-2-s-yellow text-uppercase">
                            Ajánlatot kérek</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php $content_11 = getContentByID(11); ?>
    <section class="references">
        <div class="container">
            <div class="text-left mb-4">
                <h3 class="title text-uppercase"><?=$content_11['title'];?></h3>
                <div class="default-text weight-400 size-18 line-height-160"><?=$content_11['content'];?></div>
            </div>

            <div class="row g-4">
                <?php foreach ($referenceList as $item):?>
                    <?php if (isset($item['imageList']) && !empty($item['imageList'])): ?>
                    <div class="col-lg-4 col-md-12">
                        <div class="card h-100 text-left d-flex flex-column">
                            <a href="<?= base_url('referencia/') . $item['id']?>">
                            <img src="<?= base_url('assets/uploads/gallery/') . $item['indexImage']['filename']?>" alt="<?=$item['name'];?>" class="img-fluid index image-radius-15" />
                            </a>
                            <div class="card-body d-flex flex-column justify-content-between w-100">
                                <div>
                                    <a href="<?= base_url('referencia/') . $item['id']?>" class="text-decoration-none"><h4 class="title py-2"><?=$item['name'];?></h4></a>
                                    <div class="default-text weight-400  size-16 line-height-180"><?=$item['short_desc'];?></div>
                                </div>
                                <div class="pt-2">
                                    <a href="<?= base_url('referencia/') . $item['id']?>"
                                        class="btn weight-600 text-yellow size-16 line-height-180 gap4 d-inline-flex align-items-center">
                                        Tovább olvasom
                                        <img src="assets/images/icons/orange-arrow-right.svg" alt="Jobbra mutató nyíl"
                                            class="img-size-19" />
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endif; ?>
                <?php endforeach;?>
            </div>

            <div class="text-center mt-5 d-flex justify-content-center">
                <a href="<?=base_url('referenciak')?>"
                    class="btn text-dark-blue bg-white weight-600 size-18 padding-17-30 line-height-100 gap10 border-1-5-s-dark-blue border-radius-5">
                    Összes megtekintése</a>
            </div>
        </div>
    </section>

    <?=$this->load->view('templates/villanyszereles-garanciaval', true, true, true);?>

    <?php $content_13 = getContentByID(13); ?>
    <section class="articles">
        <div class="container">
            <div class="text-left mb-5">
                <h3 class="title text-uppercase"><?=$content_13['title'];?></h3>
                <div class="default-text weight-400 size-18 line-height-160"><?=$content_13['content'];?><div>
            </div>

            <div class="row g-4">
                <?php foreach ($blogList as $blog):?>
                    <div class="col-lg-4 col-md-12">
                        <div class="card h-100">
                            <a href="<?=base_url()?>blog/<?=$blog['url']?>">
                                <?php if (isset($blog['indexImage']) && !empty($blog['indexImage'])):?>
                                    <img class="image-radius-15" src="<?=base_url('assets/uploads/blog/')?><?=$blog['indexImage']['filename']?>" alt="<?=$blog['indexImage']['name']?>">
                                <?php else: ?>
                                    <img class="image-radius-15" src="<?=base_url('assets/images/')?>product-img.jpg" alt="No image">
                                <?php endif; ?>
                            </a>
                            <div class="card-body d-flex flex-column w-100">
                                <a class="text-decoration-none w-100" href="?=base_url()?>blog/<?=$blog['url']?>"><h4 class="title"><?=$blog['title']?></h4></a>
                                <div class="default-text weight-400 size-16 line-height-180"><?=$blog['short_desc']?></div>
                                <div class="text-start mt-auto pt-2">
                                    <a href="<?=base_url()?>blog/<?=$blog['url']?>""
                                        class="btn text-blue weight-600 size-16 line-height-180 gap4 d-inline-flex align-items-center">
                                        Tovább olvasom
                                        <img src="assets/images/icons/arrow-right.svg" alt="Jobbra mutató nyíl"
                                            class="img-size-19" />
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach;?>
            </div>

            <div class="text-center mt-5 d-flex justify-content-center">
                <a href="<?=base_url('blog')?>»"
                    class="btn text-dark-blue weight-600 size-18 line-height-100 border-radius-5 padding-17-30 border-1-5-s-dark-blue gap10">Összes
                    megtekintése</a>
            </div>
        </div>
    </section>
