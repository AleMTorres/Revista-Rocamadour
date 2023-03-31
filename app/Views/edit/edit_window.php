<?php

echo $this->extend('templatesFiles/templates') ?>

<?php echo $this->section('title') ?>
Revista Rocamadour
<?php echo $this->endSection() ?>

<?php echo $this->section('navbar') ?>
<?php echo $this->endSection() ?>

<?php echo $this->section('content') ?>

<div class="container">

    <?php $session = session(); ?>

    <?php if ($session->get('logueado')) : ?>
        <div class="d-flex justify-content-start align-items-baseline">
            <input type="text" name="autor" class="form-control mt-3" style="width: 30%;" value="<?= $session->get('usuario') ?>" readonly>
        </div>
    <?php else : ?>
        <input type="text" class="form-control mt-3" style="width: 30%;" value="<?= 'Tiene que loguearse' ?>" readonly>
    <?php endif; ?>



    <form action="" method="POST">
        <div class="mb-4 mt-4 d-flex justify-content-baseline align-items-baseline     flex-column">
            <label for="volanta" class="form-label me-2" style="color:#dad527; background-color: #212529; padding: 4px 8px; border-radius: 10px">Volanta</label>
            <input type="text" id="volanta" name="volanta" class="form-control" style="width: 100%;" id="" aria-describedby="" value="<?= $data->volanta ?>">
        </div>
        <div class="mb-4 d-flex justify-content-baseline align-items-baseline     flex-column">
            <label for="titulo" class="form-label me-2" style="color:#dad527; background-color: #212529; padding: 4px 8px; border-radius: 10px">Título</label>
            <input type="text" id="titulo" name="titulo" class="form-control" style="width: 100%;" id="" aria-describedby="" value="<?= $data->titulo  ?>">
        </div>
        <div class="mb-4 d-flex justify-content-baseline align-items-baseline     flex-column">
            <label for="bajada" class="form-label" style="color:#dad527; background-color: #212529; padding: 4px 8px; border-radius: 10px">Bajada</label>
            <textarea class="form-control" id="bajada" name="bajada" id="exampleFormControlTextarea1" style="width: 100%; height: 20%"><?= $data->bajada  ?></textarea>
        </div>

        <!-- Cuerpo CKEditor -->
        <div class="editor mb-4 d-flex justify-content-baseline align-items-baseline flex-column">
            <label for="exampleFormControlTextarea1" class="form-label" style="color:#dad527; background-color: #212529; padding: 4px 8px; border-radius: 10px">Cuerpo</label>
            <textarea name="content" id="editor"> <?= $data->cuerpo  ?> </textarea>
        </div>

        <!-- CKEditor -->
        <script>
            ClassicEditor
                .create(document.querySelector('#editor'))
                .catch(error => {
                    console.error(error);
                });
        </script>

        <!-- seleccion de etiqueta -->
        <div class="mb-3 mt-4 d-flex justify-content-baseline align-items-baseline">
            <label for="" class="form-label me-3">Etiquetas</label>
            <select name="etiqueta" id="" class="form-control" style="width: 50%">

                <?php foreach ($etiquetas as $etiqueta) : ?>
                    <option value="<?= $etiqueta['id'] ?>"><?= $etiqueta['nombre'] ?></option>
                <?php endforeach; ?>

            </select>
        </div>

        <div class="update_button d-flex justify-content-baseline align-items-baseline">
            <button type="submit" class="btn btn-success">Actualizar post</button>
            <a href="<?= base_url('panel_control') ?>" class="btn btn-dark ms-3">Cerrar sin guardar</a>
        </div>

    </form>


</div>

<?php echo $this->endSection() ?>

<?php echo $this->section('footer') ?>
<?php echo $this->endSection() ?>