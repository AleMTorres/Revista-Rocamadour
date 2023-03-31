<?php

echo $this->extend('templatesFiles/templates') ?>

<?php echo $this->section('title') ?>
Revista Rocamadour
<?php echo $this->endSection() ?>

<?php echo $this->section('navbar') ?>
<?php echo $this->endSection() ?>

<?php echo $this->section('content') ?>

<!-- Banner principal -->
<div class="last-published " style="width:100%;">
    <div id="carousel-index" class="carousel slide" data-bs-ride="false">

        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carousel-index" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carousel-index" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carousel-index" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>

        <div class="carousel-inner d-flex justify-content-start align-items-start flex-column d-md-block title-container">

            <div class="carousel-item active">
                <?php foreach ($carruselActive as $active) : ?>
                    <div class="label" style="background-color: <?= $active->CategoryColor ?>"><a href="<?= base_url('category/' . $active->etiqueta) ?>"> <?= $active->nombreEtiqueta ?> </a></div>
                    <div class="front-page d-flex justify-content-center align-items-start">
                        <a href="<?= base_url('post/' . $active->slug) ?>"> <img src="<?= base_url('images/posts/' . $active->imagen) ?>" class="img-carrousel d-block" alt="..."> </a>
                        <div class="carousel-caption">
                            <a href="<?= base_url('post/' . $active->slug) ?>" style="text-decoration: none;">
                                <p><?= $active->volanta ?></p>
                                <?php if (strlen($active->titulo) > 40) : ?>
                                    <h3><?= substr($active->titulo, 0, 40) ?></h3>
                                    <p>...<?= strtolower("ver más") ?></p>
                                <?php else : ?>
                                    <h3><?= $active->titulo ?></h3>
                                <?php endif; ?>
                            </a>
                            <h5>Por: <b><?= $active->nombreAutor ?></b> </h5>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

            <div class="carousel-item ">

                <?php foreach ($carruselSecond as $second) : ?>
                    <div class="label" style="background-color: <?= $second->CategoryColor ?>"><a href="<?= base_url('category/' . $second->etiqueta) ?>"> <?= $second->nombreEtiqueta ?> </a></div>
                    <div class="front-page d-flex justify-content-center align-items-start title-container">
                        <a href="<?= base_url('post/' . $second->slug) ?>"> <img src="<?= base_url('images/posts/' . $second->imagen) ?>" class="img-carrousel d-block" alt="..."> </a>
                        <div class="carousel-caption">
                            <a href="<?= base_url('post/' . $second->slug) ?>" style="text-decoration: none;">
                                <p><?= $second->volanta ?></p>
                                <h3><?= $second->titulo ?></h3>
                            </a>
                            <h5>Por: <b><?= $second->nombreAutor ?></b> </h5>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

            <div class="carousel-item ">

                <?php foreach ($carruselThird as $third) : ?>
                    <div class="label" style="background-color: <?= $third->CategoryColor ?>"><a href="<?= base_url('category/' . $third->etiqueta) ?>"> <?= $third->nombreEtiqueta ?> </a></div>
                    <div class="front-page d-flex justify-content-center align-items-start title-container">
                        <a href="<?= base_url('post/' . $third->slug) ?>"> <img src="<?= base_url('images/posts/' . $third->imagen) ?>" class="img-carrousel d-block" alt="..."> </a>
                        <div class="carousel-caption">
                            <a href="<?= base_url('post/' . $third->slug) ?>" style="text-decoration: none;">
                                <p><?= $third->volanta ?></p>
                                <h3><?= $third->titulo ?></h3>
                            </a>
                            <h5>Por: <b><?= $third->nombreAutor ?></b> </h5>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

        </div>

        <button class="carousel-control-prev" type="button" data-bs-target="#carousel-index" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Anterior</span>
        </button>

        <button class="carousel-control-next" type="button" data-bs-target="#carousel-index" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Siguiente</span>
        </button>
    </div>

</div>

<!-- <div class="modo-oscuro d-flex align-items-center justify-content-start m-4">
    <span class="me-3" style="font-size: 1.5rem;">Invertir colores</span>
    <input type="checkbox" name="" id="dark-mode" onclick="document.documentElement.classList.toggle('dark-mode')">
</div> -->

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
        <a href="<?= base_url('recommendeds') ?>" style="text-decoration: none;" class="d-flex justify-content-center align-items-center">
            <h1 align="center" class="slider-title mt-4">Recomendados de la semana</h1>
        </a>
        <?php foreach ($recomendados as $recomendado) : ?>
            <li style="z-index:0; opacity: 1;">
                <div class="content_slider">
                    <div>
                        <a href="#" data-ref="rec_<?= $recomendado['id'] ?>" class="tarjeta" onclick="show_modal(event);">
                            <img class="img-transparent" src="<?= base_url('images/recomendados/' . $recomendado['foto_cuerpo']) ?>" alt="">
                            <p><?= $recomendado['subtitulo'] ?></p>
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
                <a href="#" class="btn btn-danger recommended-close ms-2 mt-2" onclick="fade_modal(event);"><i class="fa-solid fa-x"></i></a>
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

        <a href="<?= base_url('recommendeds') ?>" style="text-decoration: none;" class="d-flex justify-content-center align-items-center">
            <h2 align="center" style="font-weight: 900; color: #dad527; font-size: 3rem">Recomendados de la semana</h2>
            <i class="fa-solid fa-arrow-right fa-2xl ms-3" style="color: #dad527;"></i>
        </a>

        <div class="recomendados-container d-flex justify-content-around align-items-center flex-md-wrap flex-md-row flex-column gap-3">
            <?php foreach ($recomendados as $recomendado) : ?>
                <a href="#" data-ref="rec_<?= $recomendado['id'] ?>" class="tarjeta" onclick="show_modal(event);">
                    <img class="img-transparent" src="<?= base_url('images/recomendados/' . $recomendado['foto_cuerpo']) ?>" alt="">
                    <div class="r-title">
                        <p align="center"><?= $recomendado['subtitulo'] ?></p>
                    </div>
                    <img class="cor__cobertura" src="<?= base_url('images/recomendados/' . $recomendado['foto_cuerpo']) ?>" alt="">
                </a>
            <?php endforeach; ?>
        </div>

    </div>
</div>

<!-- Notas recientes -->
<div class="recents-posts row row-cols-1 row-cols-md-3 g-4 mx-3">

    <?php foreach ($posts as $post) : ?>

        <div class="col">

            <div class="card h-100">
                <div class="label" style="background-color: <?= $post->CategoryColor ?>">
                    <a href=" <?= base_url('category/' . $post->etiqueta) ?>"><?= $post->nombreEtiqueta; ?></a>
                </div>

                <div class="card-image">
                    <a href="<?= base_url('post/' . $post->slug) ?>"><img src="<?= base_url('images/posts/' . $post->imagen) ?>" class="card-img-top" alt="..."></a>
                </div>

                <div class="card-body" style="width: 100%">
                    <h5 class="card-title" style="font-size: 1.5rem" align="center"><b> <?= $post->titulo ?> </b></h5>
                    <?php if ($post->bajada != '') : ?>
                        <p class="card-text"> <?= substr($post->bajada, 0, 100) ?> . <a href="<?= base_url('post/' . $post->slug) ?>"><?= '...ver más' ?></a> </p>
                    <?php else : ?>
                        <p class="card-text"> <?= substr($post->bajada, 0, 100)  ?> </p>
                    <?php endif; ?>
                </div>
                <div class="card-footer ">
                    <?php foreach ($autores as $autor) : ?>
                        <?php if ($autor['id'] == $post->autor) : ?>

                            <small>
                                <span style="color: #dad527">
                                    Por:
                                </span>
                                <span class="text-muted">
                                    <a style="text-decoration: none; color: #000000" href="<?= base_url('about_author/' . $autor['slug']) ?>"> <?= $autor['nombre'] . " " . $autor['apellido'] ?> </a> <b> / </b>
                                </span>

                                <span style="color: #dad527">
                                    Posteado el:
                                </span>
                                <span style="color: #000000">
                                    <?= $post->fecha ?>
                                </span>
                            </small>

                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>

            </div>
        </div>
    <?php endforeach; ?>

    <script src="<?= base_url('js/modal_recomendados.js') ?>"></script>

</div>

<div class="ver-mas d-flex align-items-center justify-content-center flex-row">
    <a href="<?= base_url('index_see_more') ?>" style="text-decoration: none; font-weight: 700; color: #dad527; font-size: 32px">VER MÁS</a>
</div>



<?php echo $this->endSection() ?>

<?php echo $this->section('footer') ?>
<?php echo $this->endSection() ?>

<!-- 

        aca la primera vez, $post va a ser la primer lectura, $post->etiqueta va a ser 6
        $post no es un row de la base, es una instancia de la entidad
        entonces, $post es una clase, peudo acceder a los metodos, por ejemplo
        $post->getNombreEtiqueta()
        que lee el $this->etiqueta, porque internamente, extiende del modelo, y el modelo tiene todos los campos
        del registro que esta leyendo. Entonces c uando hace $this->un campo tengo el valor de esa fila

        se entiende?
        mas que antes

        Ahora, la entidad me permite que, cuando una funcion empiueza con get sabe que la puedo usar al llamarla, porque es un get
        entonces basicamente la puedo usaar sin el get, con forma de campo y no de funcion

        $post->getNombreEtiqueta(); //Asi no
        $post->nombreEtiqueta;      //ASi Si

        igualmente, podes llamarlo de las 2 maneras, es lo mismo
        Bueno en este caso no porque la declaraste como protected, si fuera public si

        me seguis
        sips
        dudas
        creo que no, seria un repaso de como funcionan las entidades nada mas

        pensa esto

        modelo normal, en cada iteracion tenes una fila
        [
            'id' => 1,
            'nombre' => 'nota 1',
            'etiqueta' => '1'   
        ],
        [
            'id' => 2,
            'nombre' => 'nota 2',
            'etiqueta' => '2'   
        ]
        
        instancia. Es lo mismo, pero con funcionesd agregadas que definis vos. que te permiten haceer cosas
        como por ej. acceder a otro modelo para obtener un dato, y que eso se aplique para todos
        fijate que sigo teniendo los campos, como es una clase, para acceder a un atributo uso $this (self en python)
        por eso si mi funcion 1 me devuelve el nobre de etiqueta
        {
            [
            'id' => 1,
            'nombre' => 'nota 1',
            'etiqueta' => '1'   
            ],
            funciones => [
                funcion1(){
                    $model = modelEtiquetas()
                    $data = $model->find($this->etiqueta) //Este this etiqueta hace referencia a mi campo etiqueta
                    return $data['nombre']
                },
                funcion2()
            ]
        },
        {
            [
            'id' => 2,
            'nombre' => 'nota 2',
            'etiqueta' => '2'   
            ],
            funciones => [
                funcion1(){
                    $model = modelEtiquetas()
                    $data = $model->find($this->etiqueta) //Este this etiqueta hace referencia a mi campo etiqueta
                    return $data['nombre']
                },
                funcion2()
            ]
        }

        entonces esa funcion queda ahi esperando que la ejecute
        cuando la llame, va a realizar la operación, teniendo en cuenta sus propios datos, segun en que fila este consultando

        me seguis
        sip. eso nomas jaja.
        no digo que sea una pavada, pero una vez que los entendes, te das cuenta. Exacto

        es como los modelos y los controladores, una vez que lo entendes, no es complicado. 
        Con eso me pasó lo mismo, sin embargo cuando los entendí, pude hacer solo lo que hice hasta ahora de la pagina
        
        Basicamente, tenes que pensar que lo va a retornar el modelo, y podes acceder a las funciones.
        me voydale
        gracias wey
        no tengas miedo a tener dudas. chau
         -->