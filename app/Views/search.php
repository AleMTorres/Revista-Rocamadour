<?php

echo $this->extend('templatesFiles/templates') ?>

<?php echo $this->section('title') ?>
Resultados de la búsqueda
<?php echo $this->endSection() ?>

<?php echo $this->section('navbar') ?>
<?php echo $this->endSection() ?>

<?php echo $this->section('content') ?>

<?php if (session('msg')) : ?>
    <div class="alert alert-<?= session('msg.type') ?> alert-dismissible fade show" role="alert">
        <small> <?= session('msg.body') ?> </small>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php endif; ?>

<div class="row row-cols-1 row-cols-md-3 g-4 mt-5 mx-3">

    <?php foreach ($search as $post) : ?>

        <div class="col">

            <div class="card h-100">
                <div class="label" style="background-color: <?= $post->CategoryColor ?>">
                    <a href="<?= base_url('category/' . $post->etiqueta) ?>"><?= $post->nombreEtiqueta; ?></a>
                </div>

                <div class="card-image">
                    <a href="<?= base_url('post/' . $post->slug) ?>"><img src="<?= base_url('images/posts/' . $post->imagen) ?>" style="width:400; height:320px; object-fit: cover" class="card-img-top" alt="..."></a>
                </div>

                <div class="card-body" style="width: 100%">
                    <h5 class="card-title" style="font-size: 1.5rem" align="center"><b> <?= $post->titulo ?> </b></h5>
                    <?php if ($post->bajada != '') : ?>
                        <p class="card-text"> <?= substr($post->bajada, 0, 160) ?> . <a href="<?= base_url('post/' . $post->slug) ?>"><?= '...ver más' ?></a> </p>
                    <?php else : ?>
                        <p class="card-text"> <?= substr($post->bajada, 0, 160)  ?> </p>
                    <?php endif; ?>
                </div>

                <div class="card-footer">
                    <?php foreach ($autores as $autor) : ?>
                        <?php if ($autor['id'] == $post->autor) : ?>
                            <span>Por:</span><small class="text-muted"> <a style="text-decoration: none; color: #242424" href="<?= base_url('about_author/' . $autor['slug']) ?>"> <?= $autor['nombre'] . " " . $autor['apellido'] ?> </a> </small> <?php endif; ?>
                    <?php endforeach; ?>
                </div>

            </div>
        </div>
    <?php endforeach; ?>

    <?php if (count($search) == 0) : ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <small> No se encontraron resultados para la busqueda </small>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>

</div>

<?php echo $this->endSection() ?>

<?php echo $this->section('footer') ?>
<?php echo $this->endSection() ?>