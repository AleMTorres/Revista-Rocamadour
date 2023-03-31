<?php

echo $this->extend('templatesFiles/templates') ?>

<?php echo $this->section('title') ?>
Contacto
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

<div class="container-contact d-flex align-items-center justify-content-center flex-column">
    <div class="mt-5 mb-5">
        <h1 style="font-size: 4rem;">Envianos un mensaje</h1>
        <p>Si deseas ponerte en contacto con nosotros, rellená los campos con tus datos y te contestaremos a la brevedad.</p>
    </div>
    <div class="form-message">
        <form action="<?= base_url('msg_contact') ?>" method="POST" class="d-flex align-items-start justify-content-center flex-column" style="width: 500px;">
            <label for="nombre" class="form-label">Nombre y apellido *</label>
            <input type="text" class="form-control mb-5" name="nombre">

            <label for="mail" class="form-label">Correo electrónico *</label>
            <input type="mail" class="form-control mb-5" name="mail">

            <label for="asunto" class="form-label">Asunto *</label>
            <input type="text" class="form-control mb-2" name="asunto">

            <label for="msg" class="form-label">Mensaje *</label>
            <textarea name="msg" id="" cols="30" rows="10" class="form-control mb-5" name="msg"></textarea>

            <button type="submit" class="btn btn-warning col-12 mb-5" style="background-color: #dad527">Enviar</button>
        </form>
    </div>
</div>


<?php echo $this->endSection() ?>

<?php echo $this->section('footer') ?>
<?php echo $this->endSection() ?>