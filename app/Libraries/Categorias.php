<?php

namespace App\Libraries;

use App\Models\EtiquetasModel;


class Categorias
{

    public function getMenu_categories()
    {
        $modelEtiquetas = new EtiquetasModel();

        $categorias = $modelEtiquetas->findAll();

        return $categorias;
    }
}
