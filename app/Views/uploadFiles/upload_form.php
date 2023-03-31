<?php echo $this->extend('templatesFiles/templates') ?>

<?php echo $this->section('title') ?>
Cargar post
<?php echo $this->endSection() ?>

<?php echo $this->section('navbar') ?>
<?php echo $this->endSection() ?>

<?php echo $this->section('content') ?>

<div class="container">

    <?php $session = session(); ?>

    <?php if ($session->get('logueado')) : ?>
        <div class="head d-flex align-items-baseline justify-content-start flex-row">
            <div class="d-flex justify-content-start align-items-baseline">
                <input type="text" name="autor" class="form-control mt-3" style="width: 80%;" value="<?= $session->get('usuario') ?>" readonly>
            </div>

            <div class="form-check form-switch d-flex justify-content-start align-items-baseline flex-row">
                <input class="form-check-input" type="checkbox" role="switch" id="drafts" checked>
                <label class="form-check-label ms-2" for="flexSwitchCheckDefault">Guardar en borradores</label>
            </div>
        </div>
    <?php else : ?>
        <input type="text" class="form-control mt-3" style="width: 30%;" value="<?= 'Tiene que loguearse' ?>" readonly>
    <?php endif; ?>


    <?php foreach ($errors as $error) : ?>
        <li><?= esc($error) ?></li>
    <?php endforeach ?>

    <?= form_open_multipart('upload/upload') ?>

    <div class="mb-4 mt-4 d-flex justify-content-baseline align-items-baseline flex-column">
        <label for="volanta" class="form-label me-2" style="color:#dad527; background-color: #212529; padding: 4px 8px; border-radius: 10px">Volanta</label>
        <input type="text" id="volanta" name="volanta" class="form-control" style="width: 100%;" id="" aria-describedby="" placeholder="Volanta">
    </div>

    <div class="mb-4 d-flex justify-content-baseline align-items-baseline flex-column">
        <label for="titulo" class="form-label me-2" style="color:#dad527; background-color: #212529; padding: 4px 8px; border-radius: 10px">Título</label>
        <input type="text" id="titulo" name="titulo" class="form-control" style="width: 100%;" id="" aria-describedby="" placeholder="Título">
    </div>

    <div class="mb-4 d-flex justify-content-baseline align-items-baseline flex-column">
        <label for="bajada" class="form-label" style="color:#dad527; background-color: #212529; padding: 4px 8px; border-radius: 10px">Bajada</label>
        <textarea class="form-control" id="bajada" name="bajada" id="exampleFormControlTextarea1" style="width: 100%; height: 20%" placeholder="Bajada"></textarea>
    </div>

    <div class="editor mb-4 d-flex justify-content-baseline align-items-baseline flex-column">
        <label for="exampleFormControlTextarea1" class="form-label" style="color:#dad527; background-color: #212529; padding: 4px 8px; border-radius: 10px">Cuerpo</label>
        <textarea name="cuerpo" id="editor" class="text-editor"></textarea>
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
        <label for="" class="form-label me-3">Etiqueta</label>
        <select name="etiqueta" id="" class="form-control" style="width: 50%">

            <?php foreach ($etiquetas as $etiqueta) : ?>
                <option value="<?= $etiqueta['id'] ?>"><?= $etiqueta['nombre'] ?></option>
            <?php endforeach; ?>

        </select>
    </div>

    <ul class="especificaciones_imagenes mt-3">
        <li>Se tienen que subir únicamente 1 imagen</li>
        <li>La imagen tiene que ser lo más grande posible y apaisada</li>
        <li>Se puede arrastrar la imagen a la zona punteada</li>
        <li>El formato de la imagen tiene que ser .jpg .jpeg .gif .png .webp</li>
        <li>El tamaño de la imagen tiene que ser hasta 5MB</li>
        <li>Las dimensiones de la imagen puede ser hasta 2400px X 2400px</li>
    </ul>

    <!-- subir imagen -->
    <div class="upload-image d-flex justify-content-baseline align-items-baseline mb-5">
        <input type="file" id="imagenes" name="userfile" size="20" />
        <input type="submit" value="Subir post" id="upload-button" class="btn btn-success ms-3" />
        <a href="<?= base_url() ?>" type="submit" class="btn btn-dark ms-3">Cerrar sin guardar</a>
    </div>


    </form>

</div>

<?php echo $this->endSection() ?>

<?php echo $this->section('footer') ?>
<?php echo $this->endSection() ?>