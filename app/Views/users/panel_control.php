<?php echo $this->extend('templatesFiles/templates') ?>

<?php echo $this->section('title') ?>
Panel de control
<?php echo $this->endSection() ?>

<?php echo $this->section('navbar') ?>
<?php echo $this->endSection() ?>

<?php echo $this->section('content') ?>

<?php foreach ($posts as $post) : ?>
    <div class="confirm d-flex justify-content-center align-items-center">
        <div class="confirm-contenedor d-flex justify-content-center align-items-center flex-column">
            <p>¿Está seguro que quiere eliminar este post?</p>
            <div class="btns-confirm d-flex justify-content-center align-items-center gap-3">
                <a href="<?= base_url('delete/' . $post->id) ?>" class="btn btn-success confirm-button"><i class="fa-solid fa-check"></i></i></a>
                <a href="" class="btn btn-danger confirm-close"><i class="fa-solid fa-x"></i></a>
            </div>
        </div>
    </div>
<?php endforeach; ?>


<?php if (session('msg')) : ?>
    <div class="alert alert-<?= session('msg.type') ?> alert-dismissible fade show" role="alert">
        <small> <?= session('msg.body') ?> </small>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php endif; ?>

<?php $session = session(); ?>

<div class="mt-4 author-photo d-flex justify-content-center align-items-center flex-column">
    <img src="<?= base_url('images/autores/' . $session->get('imagen')) ?>" alt="">
    <h4><?= $session->get('nombre_autor') . ' ' . $session->get('apellido_autor') ?></h4>
</div>

<div class="d-flex justify-content-center align-items-center gap-3 mb-4 mt-4">
    <a href="<?= base_url('upload_recommended') ?>" class="btn btn-primary">Crear recomendado</a>
    <a href="<?= base_url('upload') ?>" class="btn" style="background-color: #dad527; border-color:#dad527">Crear post</a>
    <a href="<?= base_url('cerrar_sesion') ?>" class="btn" style="background-color: #da4227; border-color:#da4227">Cerrar sesión</a>
</div>

<caption>
    <h1 class="ms-2" align="center">Posts creados</h1>
</caption>

<!-- Tabla de posts -->
<table class="table table-striped-columns mb-5">

    <thead class="table-dark">
        <tr>
            <th scope="col">Título</th>
            <th scope="col">Creado</th>
            <th scope="col">Categoría</th>
            <th scope="col">Acción</th>
            <th scope="col">Visitas</th>
        </tr>
    </thead>

    <tbody>
        <?php foreach ($posts as $post) : ?>

            <tr>
                <td><a href="<?= base_url('post/' . $post->slug) ?>"><?= $post->titulo ?></a></td>
                <td><?= $post->fecha ?></td>
                <td><?= $post->nombreEtiqueta ?></td>
                <td class="d-flex justify-content-around">
                    <a href="<?= base_url('edit/' . $post->id) ?>"><i class="button-edit fa-solid fa-pen-to-square" style="color: #dad527"></i></a>
                    <a href="<?= base_url('delete/' . $post->id) ?>"><i class="btn-delete fa-solid fa-trash" style="color: #da4227"></i></a>
                </td>
                <td><?= $post->visitas ?></td>

            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<!-- Tabla de notas por categoría -->
<!-- <?php if ($session->get('puesto') == "Editor") : ?>
    <table class="table table-striped-columns">
        <thead class="table-dark">
            <tr>
                <th scope="col">Categoría</th>
                <th scope="col">Cantidad</th>
            </tr>
        </thead>

        <tbody>
            <?php foreach ($etiquetas as $etiqueta) : ?>
                <tr>
                    <td><?= $etiqueta['nombre'] ?></td>
                    <td><?= count($etiquetas) ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php endif; ?> -->







<?php echo $this->endSection() ?>

<?php echo $this->section('footer') ?>
<script src="<?= base_url('js/modal_confirm_delete.js') ?>"></script>
<?php echo $this->endSection() ?>