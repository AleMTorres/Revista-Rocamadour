<?php echo $this->extend('templatesFiles/templates') ?>

<?php echo $this->section('title') ?>
Cargar recomendado
<?php echo $this->endSection() ?>

<?php echo $this->section('navbar') ?>
<?php echo $this->endSection() ?>

<?php echo $this->section('content') ?>

<div class="container">

    <?php if (session('msg')) : ?>
        <div class="alert alert-<?= session('msg.type') ?> alert-dismissible fade show" role="alert">
            <small> <?= session('msg.body') ?> </small>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>

    <?php foreach ($errors as $error) : ?>
        <li><?= esc($error) ?></li>
    <?php endforeach ?>

    <?php $session = session(); ?>


    <div class="d-flex justify-content-start align-items-baseline">
        <input type="text" name="autor" class="form-control mt-3" style="width: 30%;" value="<?= $session->get('usuario') ?>" readonly>
    </div>

    <form action="<?= base_url('upload/recommended') ?>" method="POST" enctype="multipart/form-data">

        <div class="mb-4 mt-3 d-flex justify-content-baseline align-items-baseline flex-column">
            <label for="titulo" class="form-label me-2" style="color:#dad527; background-color: #212529; padding: 4px 8px; border-radius: 10px">Título</label>
            <input type="text" id="titulo" name="titulo" class="form-control" style="width: 100%;" id="" aria-describedby="" placeholder="Formato: nombre película (año)">
        </div>

        <div class="mb-4 mt-3 d-flex justify-content-baseline align-items-baseline flex-column">
            <label for="subtitulo" class="form-label me-2" style="color:#dad527; background-color: #212529; padding: 4px 8px; border-radius: 10px">Subtítulo</label>
            <input type="text" id="subtitulo" name="subtitulo" class="form-control" style="width: 100%;" id="" aria-describedby="" placeholder="Máximo de caractéres: 40">
        </div>


        <div class="mb-4 d-flex justify-content-baseline align-items-baseline flex-column">
            <label for="bajada" class="form-label" style="color:#dad527; background-color: #212529; padding: 4px 8px; border-radius: 10px">Cuerpo</label>
            <textarea class="form-control" id="cuerpo" maxlength="1000" name="cuerpo" id="exampleFormControlTextarea1" style="width: 100%; height: 20%" placeholder="Hasta 500 caractéres"></textarea>
        </div>

        <ul class="especificaciones_imagenes mt-3">
            <li>Se tienen que subir únicamente 2 imágenes: una póster de película y otra apaisada</li>
            <li>Asegurarse que la primer imagen de las dos sea la portada de la película, de ser necesario renombrar los archivos</li>
            <li>El formato de las imágenes tiene que ser .jpg .jpeg .gif .png .webp</li>
            <li>El tamaño de las imágenes tiene que ser hasta 5MB</li>
            <li>Las dimensiones de las imágenes puede ser hasta 2400px X 2400px</li>
        </ul>

        <!-- subir imagenes -->
        <div class="upload-image d-flex justify-content-baseline align-items-baseline">
            <label for="imagenes" class="form-label me-2" style="color:#dad527; background-color: #212529; padding: 4px 8px; border-radius: 10px">Foto cuerpo</label>
            <input type="file" name="imagenes[]" id="imagenes" multiple />
        </div>

        <div class="buttons-upload mb-4">
            <input type="submit" value="Subir recomendado" id="upload-button" class="btn btn-success ms-3" />
            <button type="submit" class="btn btn-dark ms-3">Cerrar sin guardar</button>
        </div>
    </form>



</div>

<?php echo $this->endSection() ?>

<?php echo $this->section('footer') ?>
<?php echo $this->endSection() ?>