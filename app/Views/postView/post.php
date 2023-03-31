<?php echo $this->extend('templatesFiles/templates') ?>

<?php echo $this->section('title') ?>
Nota
<?php echo $this->endSection() ?>

<?php echo $this->section('navbar') ?>
<?php echo $this->endSection() ?>

<?php echo $this->section('content') ?>

<?php $session = session(); ?>


<div class="container-fluid d-flex justify-content-md-center align-items-md-center flex-column align-items-center justify-content-center mt-5 gap-3">
    <div class="row d-flex justify-content-md-center align-items-md-center flex-column align-items-center justify-content-center">
        <div class="col-12 col-sm-12 d-flex justify-content-md-center align-items-md-center flex-column align-items-center justify-content-center">

            <h3 style="font-size: 30px; font-weight: 900; text-transform: uppercase"> <?= $post->volanta ?> </h3>
            <div class="article-title col-12 col-sm-12 d-flex flex-md-column" style="width: 100%">
                <h1 align="center"> <?= $post->titulo ?> </h1>.
            </div>


            <?php if ($post->bajada != "") : ?>
                <hr>

                <span align="center" style="font-size: 30px; font-weight: 400;"> <?= $post->bajada ?> </span>

                <hr> <?php endif; ?>

            <h5 class="mt-3 mb-5">Por: <b><?= $post->nombreAutor ?></b> </h5>


            <?php if ($session->get('logueado')) : ?>
                <h5 class="mb-4">Nro de visitas: <?= $post->visitas ?></h5>
            <?php endif; ?>

            <div class="image-title d-flex justify-content-center align-items-start" style="width: 100%;">
                <img src="<?= base_url('images/posts/' . $post->imagen) ?>" alt="">
            </div>

            <div class="fecha">
                <span>Última vez editado:</span>
                <time class="entry-date ms-2"> <?= $post->fecha ?> </time>
                <span class="ms-5">Tiempo de lectura: </span>
                <time class="entry-date ms-2"> <?= $tiempo_lectura ?> minutos</time>
                <?php if ($session->get('logueado')) : ?>
                    <a class="ms-4" href="<?= base_url('edit/' . $post->id) ?>"><i class="button-edit fa-solid fa-pen-to-square" style="color: #dad527"></i></a>
                <?php endif; ?>
            </div>

            <div class="container article-content d-flex flex-column justify-content-center align-items-center gap-3">
                <?= $post->cuerpo ?>

                <hr>

                <div class="author-informacion-container d-flex justify-content-center align-items-center flex-column">
                    <div class="author-photo d-flex justify-content-center align-items-center mb-5">
                        <img src="<?= base_url('images/autores/' . $autor_nota['imagen']) ?>" alt="" class="me-3">
                        <div class="author d-flex justify-content-center align-items-center flex-column">
                            <div class="author-information d-flex justify-content-center align-items-center gap-3">

                                <div class="author-name d-flex justify-content-center align-items-center flex-column">
                                    <a href="<?= base_url('about_author/' . $autor_nota['slug']) ?>"> <?= $post->nombreAutor ?> </a>
                                    <h2 class="author-description"> <?= $autor_nota['puesto'] ?> </h2>
                                </div>

                                <div class="author-social-networks">
                                    <a href="<?= $post->linkRedSocial ?>"> <i class="icon fa-brands fa-instagram fa-2xl me-3" style="color: #dad527;"> </i></a>
                                </div>
                                <div class="home d-flex justify-content-center align-items-center flex-column">
                                    <a href="#" class="upside"><i class="fa-solid fa-arrow-up-wide-short"></i></a>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<?php echo $this->endSection() ?>

<?php echo $this->section('footer') ?>
<?php echo $this->endSection() ?>