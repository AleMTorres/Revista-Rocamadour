<?php

echo $this->extend('templatesFiles/templates') ?>

<?php echo $this->section('title') ?>
Nosotros
<?php echo $this->endSection() ?>

<?php echo $this->section('navbar') ?>
<?php echo $this->endSection() ?>

<?php echo $this->section('content') ?>

<div class="container">
    <h1 class="mt-5 mb-5" style="font-size: 4rem;">Nosotros</h1>
    <p>Rocamadour, se creó en 2019 como una revista literaria impresa en Marcos Paz, pcia. de Buenos Aires. Rápidamente fue declarada de interés cultural por el Honorable Consejo Deliberante de la ciudad y se mantuvo activa durante casi 3 años, llegando a 22 publicaciones, que podes descargar <a href="<?= base_url('downloads') ?>">acá.</a> <br>
        Nuestro objetivo es convertirnos en un medio digital que sea de confianza e interés de los lectores, brindándole una experiencia única en actualidad.</p>

    <p align="center" class="mt-4" style="font-size: 40px; font-weight: 500">Nuestro equipo</p>

    <div class="staff d-flex justify-content-center align-items-center flex-md-row flex-column">
        <?php foreach ($autores as $autor) : ?>

            <div class="staff-card d-flex flex-column align-items-center justify-content-center flex-column" style="width: 18rem;">
                <img src="<?= base_url('images/autores/' . $autor['imagen']) ?>" class="staff-image mt-3" alt="...">
                <div class="card-body d-flex flex-column align-items-center justify-content-center">
                    <h5 class="staff-card-title"><?= $autor['nombre'] ?></h5>
                    <span><?= $autor['puesto'] ?></span>
                    <a href="<?= base_url('about_author/' . $autor['slug']) ?>" class="mb-3" style="font-size: 13px;">Ver más</a>
                </div>
            </div>
        <?php endforeach; ?>


    </div>

</div>

<?php echo $this->endSection() ?>

<?php echo $this->section('footer') ?>
<?php echo $this->endSection() ?>