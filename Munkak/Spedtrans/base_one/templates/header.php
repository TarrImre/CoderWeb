<?php
$currentUrl = uri_string();
$urlArr = explode('/', $currentUrl);
if (isset($urlArr[0]) && !empty($urlArr[0])) {
    $controllerCallUrl = $urlArr[0];
} else {
    $controllerCallUrl = '';
}
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?= getActualLangCode() ?>" lang="<?= getActualLangCode() ?>">

<head>
    <script type="text/javascript">
        var base_url = "<?= base_url(); ?>";
        var act_lang_code = "<?= getActualLangCode() ?>";
    </script>

    <title><?= isset($title) && !empty($title) ? $title : getSettingsByKey('site_title') ?></title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="author" content="CoderWeb">
    <meta name="description" content="<?= isset($meta_desc) && !empty($meta_desc) ? $meta_desc : getSettingsByKey('site_description') ?>">
    <meta name="keywords" content="<?= isset($meta_keywords) && !empty($meta_keywords) ? $meta_keywords : getSettingsByKey('site_keywords') ?>">
    <meta name="revisit-after" content="1 days">
    <meta name="googlebot" content="<?= isset($meta_robots) && !empty($meta_robots) ? $meta_robots : getSettingsByKey('robots') ?>">
    <meta name="robots" content="<?= isset($meta_robots) && !empty($meta_robots) ? $meta_robots : getSettingsByKey('robots') ?>">
    <meta name="rating" content="Safe For Kids" />
    <meta property="og:type" content="website" />
    <meta property="og:image" content="<?= isset($og_image) && !empty($og_image) ? $og_image : base_url() . 'assets/images/logo.png' ?>" />
    <meta property="og:title" content="<?= isset($title) && !empty($title) ? $title : getSettingsByKey('site_title') ?>" />
    <meta property="og:url" content="<?= current_url() ?>" />
    <meta property="og:site_name" content="<?= isset($title) && !empty($title) ? $title : getSettingsByKey('site_title') ?>" />
    <meta property="og:description" content="<?= isset($meta_desc) && !empty($meta_desc) ? $meta_desc : getSettingsByKey('site_description') ?>" />

    <link rel="icon" type="image/png" href="<?= base_url() ?>assets/images/favicon-96x96.png" sizes="96x96" />
    <link rel="icon" type="image/svg+xml" href="<?= base_url() ?>assets/images/favicon.svg" />
    <link rel="shortcut icon" href="<?= base_url() ?>assets/images/favicon.ico" />
    <link rel="apple-touch-icon" sizes="180x180" href="<?= base_url() ?>assets/images/apple-touch-icon.png" />
    <link rel="manifest" href="<?= base_url() ?>assets/images/site.webmanifest" />

    <meta name="theme-color" content="#ffffff">


    <link rel="stylesheet" type="text/css" href="<?= theme_url('assets/css/bootstrap.min.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?= theme_url('assets/css/splide.min.css?v=1') ?>">
    <link rel="stylesheet" type="text/css" href="<?= theme_url('assets/css/lightgallery.min.css?v=1') ?>">

    <link rel="stylesheet" type="text/css" href="<?= theme_url('assets/css/style.css?v=13') ?>">
    <link rel="stylesheet" type="text/css" href="<?= theme_url('assets/css/mediaqueris.css?v=9') ?>">

    <script>
        document.addEventListener("click", function(event) {
            var navbar = document.getElementById("navbarNav");
            var navbarToggler = document.querySelector(".navbar-toggler");

            if (navbar.classList.contains("show") && !navbar.contains(event.target) && !navbarToggler.contains(event.target)) {
                new bootstrap.Collapse(navbar).toggle();
            }
        });
    </script>

    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);  
        }
        gtag('consent', 'default', {
            'ad_storage': 'denied',
            'ad_user_data': 'denied',
            'ad_personalization': 'denied',
            'analytics_storage': 'denied'
        });
    </script>

    <?= getSettingsByKey('custom_scripts_header') ?>
</head>

<?php function createMenu($list)
{
    $urlArr = explode('/', uri_string());
    $controllerCallUrl = isset($urlArr[0]) && !empty($urlArr[0]) ? $urlArr[0] : '';

    foreach ($list as $item) {
        $active = $controllerCallUrl == $item['url'] ? 'active-link' : '';

        if (!$item['only_on_footer']) {
            if (isset($item["children"])) {
                if ($item["parent_id"] == 0) {
                    echo '<div class="dropdown-center nav-item">';
                    echo '<a class="dropdown-toggle nav-link ' . $active . '" href="' . base_url($item["url"]) . '" id="navbarDropdownMenuLink-' . $item["url"] . '" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        ' . $item["name"] . ' <i class="fas fa-chevron-down"></i>
						</a>';
                    echo '<ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink-' . $item["url"] . '">';
                } else {
                    echo '<li class="dropdown-submenu">';
                    echo '<a class="dropdown-item dropdown-toggle" href="' . base_url($item["url"]) . '">' . $item["name"] . ' <i class="fas fa-chevron-down"></i></a>';
                    echo '<ul class="dropdown-menu">';
                }
                createMenu($item["children"]);
                echo '</ul>';
            } else {
                if ($item["parent_id"] == 0) {
                    echo '<li class="nav-item"><a class="nav-link ' . $active . '" href="' . base_url($item["url"]) . '">' . $item['name'] . '</a></li>';
                } else {
                    echo '<li><a class="dropdown-item text-first-capitalize ' . $active . '" href="' . base_url($item["url"]) . '">' . $item['name'] . '</a></li>';
                }
            }
        }
    }
} ?>



<ul class="dropdown-menu">
    <li><a class="dropdown-item text-first-capitalize" href="#">Teszt 1</a></li>
    <li><a class="dropdown-item text-first-capitalize" href="#">Teszt 2</a></li>
    <li><a class="dropdown-item text-first-capitalize" href="#">Teszt 3</a></li>
</ul>
</div>

<body class="no-debug-viewport no-debug-left">

    <section class="header">
        <div class="container-fluid top-fluid">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <div class="top-contacts d-flex justify-content-md-start justify-content-sm-center flex-wrap align-items-center">
                            <div class="me-3 mb-2 mb-md-0 header-text">
                                <a class="text-decoration-none" href="tel:<?= getSettingsByKey('default_phone') ?>">
                                    <img src="<?= base_url() ?>assets/images/icons/phone-call.svg" alt="Telefonszám" class="img-fluid img-size-18">
                                    <?= getSettingsByKey('default_phone') ?>
                                </a>
                            </div>
                            <div class="me-3 mb-2 mb-md-0">
                                <a class="text-decoration-none" href="mailto:<?= getSettingsByKey('default_email') ?>">
                                    <img src="<?= base_url() ?>assets/images/icons/mail.svg" alt="Email" class="img-fluid img-size-18">
                                    <?= getSettingsByKey('default_email') ?>
                                </a>
                            </div>
                            <div class="mb-2 mb-md-0">
                                <a class="text-decoration-none" target="_blank" href="https://www.google.com/maps/place/<?= getSettingsByKey('default_address') ?>">
                                    <img src="<?= base_url() ?>assets/images/icons/pin.svg" alt="Helyszín" class="img-fluid img-size-18">
                                    <?= getSettingsByKey('default_address') ?>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 d-flex justify-content-md-end justify-content-sm-center align-items-center">
                        <img src="<?= base_url() ?>assets/images/elmuemasz-new-og-img1.svg" alt="MVM logó" class="img-fluid me-3">
                        <img src="<?= base_url() ?>assets/images/eon1.svg" alt="E.ON logó" class="img-fluid">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="nav">
        <nav class="navbar navbar-expand-lg navbar-dark navbar-custom">
            <div class="container">
                <button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
                    aria-label="Navigáció váltó gomb">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                    <ul class="navbar-nav text-uppercase">
                        <?= createMenu(getAllMenusByLang()) ?>
                    </ul>
                </div>
            </div>
        </nav>
    </section>