<?php

echo $this->extend('templatesFiles/templates') ?>

<?php echo $this->section('title') ?>
Revista Rocamadour
<?php echo $this->endSection() ?>

<?php echo $this->section('navbar') ?>
<?php echo $this->endSection() ?>

<?php echo $this->section('content') ?>

<!-- Slider mobile -->
<section class="d-md-none" id="container-slider">
    <a href="javascript: funcionEjecutar('anterior');" class="arrowPrev"><i class="fas fa-chevron-circle-left"></i></a>
    <a href="javascript: funcionEjecutar('siguiente');" class="arrowNext"><i class="fas fa-chevron-circle-right"></i></a>
    <ul class="listslider">
        <li><a itlist="itList_0" href="javascript: funcionEjecutar('siguiente');" class="item-select-slid"></a></li>
        <li><a itlist="itList_1" href="javascript: funcionEjecutar('siguiente');"></a></li>
        <li><a itlist="itList_2" href="javascript: funcionEjecutar('siguiente');"></a></li>
        <li><a itlist="itList_3" href="javascript: funcionEjecutar('siguiente');"></a></li>
        <li><a itlist="itList_4" href="javascript: funcionEjecutar('siguiente');"></a></li>
    </ul>

    <ul id="slider">
        <h1 align="center" class="slider-title">Recomendados de la semana</h1>
        <?php foreach ($recomendados as $recomendado) : ?>
            <li style="z-index:0; opacity: 1;">
                <div class="content_slider">
                    <div>
                        <a href="#" class="tarjeta">
                            <img class="img-transparent" src="<?= base_url('images/recomendados/' . $recomendado['foto_cuerpo']) ?>" alt="">
                            <p><?= $recomendado['titulo'] ?></p>
                            <img class="cor__cobertura" src="<?= base_url('images/recomendados/' . $recomendado['foto_cuerpo']) ?>" alt="">
                        </a>
                    </div>
                </div>
            </li>
        <?php endforeach; ?>
    </ul>
</section>


<!-- Modal body recomendados -->
<div id="recommended" class="container">
    <div class="row">
        <?php foreach ($recomendados as $recomendado) : ?>

            <div class="recommended" id="rec_<?= $recomendado['id'] ?>">
                <a href="" class="btn btn-danger recommended-close ms-2 mt-2" onclick="fade_modal(event);"><i class="fa-solid fa-x"></i></a>
                <div class="row align-items-start text-center">

                    <div class="offset-md-4 col-md-4 col-12 current-recommended d-flex justify-content-center align-items-center flex-column">
                        <h1><?= $recomendado['titulo'] ?></h1>
                        <img class="front" src="<?= base_url('images/recomendados/' . $recomendado['foto_portada']) ?>" alt="">
                        <p class="mt-3"><?= $recomendado['cuerpo'] ?></p>
                    </div>

                    <div class="recommended-author mb-3">
                        Por: <?= $recomendado['autor'] ?>
                    </div>

                </div>
            </div>
        <?php endforeach; ?>

    </div>
</div>


<!-- Recomendados tarjetas-->
<div class="d-none d-md-block">
    <div class="recomendados d-flex align-items-center flex-column justify-content-center ">

        <h2 align="center" style="font-weight: 900; color: #dad527; font-size: 3rem">Todos los recomendados por Rocamadour</h2>

        <div class="recomendados-container d-flex justify-content-around align-items-center flex-md-wrap flex-md-row flex-column gap-3">
            <?php foreach ($recomendados as $recomendado) : ?>
                <a href="" data-ref="rec_<?= $recomendado['id'] ?>" class="tarjeta" onclick="show_modal(event);">
                    <img class="img-transparent" src="<?= base_url('images/recomendados/' . $recomendado['foto_cuerpo']) ?>" alt="">
                    <div class="r-title">
                        <p align="center"><?= $recomendado['titulo'] ?></p>
                    </div>
                    <img class="cor__cobertura" src="<?= base_url('images/recomendados/' . $recomendado['foto_cuerpo']) ?>" alt="">
                </a>
            <?php endforeach; ?>
        </div>

    </div>
</div>

<script src="<?= base_url('js/modal_recomendados.js') ?>"></script>

<?php echo $this->endSection() ?>

<?php echo $this->section('footer') ?>
<?php echo $this->endSection() ?>