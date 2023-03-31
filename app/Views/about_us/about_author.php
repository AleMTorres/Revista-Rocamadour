<?php

echo $this->extend('templatesFiles/templates') ?>

<?php echo $this->section('title') ?>
<?= $autor['nombre'] . " " . $autor['apellido'] ?>
<?php echo $this->endSection() ?>

<?php echo $this->section('navbar') ?>
<?php echo $this->endSection() ?>

<?php echo $this->section('content') ?>
<div class="author-info mt-2 pb-5 d-flex">
    <img src="<?= base_url('images/autores/' . $autor['imagen']) ?>" class="author-image" alt="">
    <div class="info">
        <h4><?= $autor['nombre'] . " " . $autor['apellido'] ?></h4>
        <h5><?= $autor['puesto'] ?></h5>
        <h6><?= count($posts) ?> artículos publicados </h6>
    </div>
    <div class="info-p d-flex align-items-center justify-content-center">
        <p><?= $autor['descripcion'] ?></p>
    </div>
</div>

<div class="row row-cols-1 row-cols-md-3 g-4 mt-5 mx-3 mb-5">

    <?php foreach ($posts as $post) : ?>

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
                        <p class="card-text"> <?= substr($post->bajada, 0, 100) ?> . <a href="<?= base_url('post/' . $post->slug) ?>"><?= '...ver más' ?></a> </p>
                    <?php else : ?>
                        <p class="card-text"> <?= substr($post->bajada, 0, 100)  ?> </p>
                    <?php endif; ?>
                </div>

                <div class="card-footer">
                    <?php if ($autor['id'] == $post->autor) : ?>
                        <span>Por:</span><small class="text-muted" style="color: #dad527"> <?= $autor['nombre'] . " " . $autor['apellido'] ?> </small>
                    <?php endif; ?>
                </div>

            </div>
        </div>
    <?php endforeach; ?>

</div>

<?php echo $this->endSection() ?>

<?php echo $this->section('footer') ?>
<?php echo $this->endSection() ?>