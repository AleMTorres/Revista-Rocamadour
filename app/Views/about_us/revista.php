<?php

echo $this->extend('templatesFiles/templates') ?>

<?php echo $this->section('title') ?>
Descargas
<?php echo $this->endSection() ?>

<?php echo $this->section('navbar') ?>
<?php echo $this->endSection() ?>

<?php echo $this->section('content') ?>

<div class="revista m-5 d-flex align-items-center justify-content-center">

    <img src="<?= base_url('images/revistas/' . $revista['nombre_revista']) ?>" class="revista-portada zoom" alt="..." style="object-fit: contain;">

    <div class="" style="width: 18rem;">
        <div class="card-body d-flex justify-content-center align-items-center flex-column" style="width:100%">
            <h2 style="color:#dad527"><b> Rocamadour N° <?= $revista['numero'] ?> </b></h2>
            <h5 class="card-title mb-5"><b> <?= $revista['mes'] ?> </b></h5>

            <span>Autor del mes:</span>
            <p class="card-text"><?= $revista['nombre_autor'] ?></p>

            <span>Cuento del mes:</span>
            <p class="card-text"><?= $revista['cuento'] ?></p>
            <a href="#" class="btn btn-primary" style="background-color: #dad527; border-color: #dad527; color: #242424">Descargar PDF</a>
        </div>
    </div>

</div>


<?php echo $this->endSection() ?>

<?php echo $this->section('footer') ?>
<?php echo $this->endSection() ?>