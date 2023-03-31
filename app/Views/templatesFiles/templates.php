<?php

use App\Libraries\Categorias;

$libreriaCategories = new Categorias();
$menuCategories = $libreriaCategories->getMenu_categories();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="<?= base_url('images/favicon.png') ?>">
    <meta name="author" content="Alejandro Torres" />
    <meta name="description" content="Medio digital periodístico" />
    <meta name="keywords" content="literatura, cine, series, gaming, periodismo" />
    <meta name=”robots” content=”index, follow” />

    <title><?php echo $this->renderSection('title') ?></title>
    <script src="https://kit.fontawesome.com/9bae38f407.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:ital,wght@0,300;0,400;0,700;1,300;1,400;1,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url('css/styles.css') ?>">
    <!-- CKEditor -->
    <script async charset="utf-8" src="//cdn.embedly.com/widgets/platform.js"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/35.3.2/classic/ckeditor.js"></script>
    <!-- Slider recomendados -->
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/gh/kenwheeler/slick@1.8.1/slick/slick-theme.css" />
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
</head>

<body>

    <?php echo $this->renderSection('navbar') ?>
    <nav class="navbar navbar-dark bg-dark navbar-expand-lg me-5 d-flex justify-content-md-between px-4">

        <a href="<?= base_url('index.php') ?>">
            <div class="logo">
                <img src="<?= base_url('images/logo-rocamadour.png') ?>" alt="logo-rocamadour" style="width: 350px">
            </div>
        </a>


        <?php $session = session(); ?>

        <?php if ($session->get('logueado')) : ?>
            <div class="d-flex justify-content-start align-items-baseline">
                <a href="<?= base_url('panel_control') ?>" type="submit" class="btn btn-success ms-2">Ir al panel</a>
                <?php if ($session->get('puesto') == "Editor") : ?>
                    <a href="<?= base_url('signup') ?>" type="submit" class="btn btn-warning ms-2">Crear replicante</a>
                <?php endif; ?>
            </div>
        <?php else : ?>
            <a href="<?= base_url('panel_control') ?>" type="submit" class="btn btn-success ms-2" style="visibility: hidden;">Panel</a>
        <?php endif; ?>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" style="flex:inherit;" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 d-flex justify-content-md-center">

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Categorías
                    </a>
                    <ul class="dropdown-menu">
                        <?php foreach ($menuCategories as $category) : ?>
                            <li class="nav-item">
                                <a class="dropdown-item nava" aria-current="page" href="<?= base_url('category/' . $category['id']) ?>"><?= $category['nombre'] ?></a>
                            </li>
                        <?php endforeach ?>
                    </ul>
                </li>

                <li class="nav-item">
                    <a class="nava nav-link active" aria-current="page" href="<?= base_url('downloads') ?>">Descargas</a>
                </li>
                <li class="nav-item">
                    <a class="nava nav-link active" aria-current="page" href="<?= base_url('about_us') ?>">Nosotros</a>
                </li>
                <li class="nav-item">
                    <a class="nava nav-link active" aria-current="page" href="<?= base_url('contact') ?>">Contacto</a>
                </li>

            </ul>

        </div>

        <div class="container-nav d-flex align-items-center justify-content-center flex-row">
            <div class="social-networks-up d-flex justify-content-center align-items-center flex-row">
                <a target="_blank" href=" https://www.instagram.com/revistarocamadour/?hl=es-la"><i class="icon fa-brands fa-instagram fa-2xl me-3 zoom" style="color: #dad527;"></i></a>
                <a target="_blank" href="https://www.facebook.com/revistarocamadour/"><i class="icon fa-brands fa-facebook fa-2xl me-3 zoom" style="color: #dad527;"></i></a>
                <a target="_blank" href="https://www.youtube.com/@edicionesrocamadour5571"><i class="icon fa-brands fa-youtube fa-2xl zoom" style="color: #dad527;"></i></a>
            </div>

            <!-- búqueda -->
            <form action="<?= base_url('search') ?>" method="POST" class="d-flex" role="search">
                <button class="btn btn-search ms-4" id="btn-search" style="color: #fff" type="submit"><i class="fa-solid fa-magnifying-glass zoom"></i></button>
            </form>
        </div>

    </nav>

    <?php echo $this->renderSection('content') ?>

    <!-- Search modal -->
    <div class="busqueda">
        <div class="busqueda-contenedor d-flex">
            <a href="#" class="busqueda-close" style="position: absolute; top: 5px; right:5px">X</a>
            <form action="<?= base_url('search') ?>" method="POST" class="search-form mb-4 d-flex justify-content-between search-form; gap:3" role="search">
                <button class="btn btn-search mb-3 me-3" id="btn-search" style="color: #fff" type="submit"><i class="fa-solid fa-magnifying-glass fa-2xl zoom"></i></button>
                <input class="" name="search" type="text" placeholder="Buscar" autofocus autocomplete="off">
            </form>
        </div>
    </div>



    <?php echo $this->renderSection('footer') ?>
    <footer>
        <nav class="navbar navbar-dark bg-dark navbar-expand-lg me-5 d-flex justify-content-md-between flex-column px-4">

            <a href="<?= base_url('index.php') ?>">
                <div class="logo">
                    <img src="<?= base_url('images/logo-rocamadour.png') ?>" alt="logo-rocamadour" style="width: 350px">
                </div>
            </a>

            <div class="dropup-center dropup" style="flex:inherit;" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 d-flex justify-content-md-center">

                    <?php foreach ($menuCategories as $category) : ?>
                        <li class="nav-item footer d-flex align-items-center justify-content-center flex-row">
                            <a class="nava nav-link active" aria-current="page" href="<?= base_url('category/' . $category['id']) ?>"><?= $category['nombre'] ?></a>
                        </li>
                    <?php endforeach ?>

                    <?php if ($session->get('logueado')) : ?>
                        <div class="d-flex justify-content-start align-items-baseline">
                        </div>
                    <?php else : ?>
                        <li class="nav-item">
                            <a class="nava nav-link active" aria-current="page" href="<?= base_url('login') ?>"> <i class="ms-4 fa-solid fa-user-large fa-xl"></i> </a>
                        </li>
                    <?php endif; ?>


                </ul>
            </div>

            <div class="social-networks d-flex justify-content-center align-items-center flex-row mt-4">
                <a target="_blank" href="https://www.instagram.com/revistarocamadour/?hl=es-la"><i class="icon fa-brands fa-instagram fa-2xl me-3 zoom" style="color: #dad527;"></i></a>
                <a target="_blank" href="https://www.facebook.com/revistarocamadour/"><i class="icon fa-brands fa-facebook fa-2xl me-3 zoom" style="color: #dad527;"></i></a>
                <a target="_blank" href="https://www.youtube.com/@edicionesrocamadour5571"><i class="icon fa-brands fa-youtube fa-2xl zoom" style="color: #dad527;"></i></a>
            </div>

            <div class="copyright">
                <span>Copyright © 2022 Revista Rocamadour</span>
            </div>

        </nav>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <script src="<?= base_url('js/modal_search.js') ?>"></script>
    <script src="<?= base_url('js/carrusel.js') ?>"></script>
    <script>
        document.querySelectorAll('oembed[url]').forEach(element => {
            const anchor = document.createElement('a');
            anchor.setAttribute('href', element.getAttribute('url'));
            anchor.className = 'embedly-card';
            element.appendChild(anchor);
        })
    </script>
</body>

</html>