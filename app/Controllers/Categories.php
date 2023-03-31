<?php

namespace App\Controllers;

use App\Models\AutoresModel;
use App\Models\EtiquetasModel;
use App\Models\PostsModel;

class Categories extends BaseController {

    public function display_category($idEtiqueta) {
        $modelPosts = new PostsModel();
        $modelAutores = new AutoresModel();
        $modelEtiquetas = new EtiquetasModel();

        if (isset($idEtiqueta)) {
            $currentPosts = $modelPosts->where('etiqueta', $idEtiqueta)->findAll();
            $autores = $modelAutores->findAll();
            $etiquetas = $modelEtiquetas->findAll();

            return view('categories/category', ['currentPosts' => $currentPosts, 'autores' => $autores, 'etiquetas' => $etiquetas]);
        } else {
            return redirect()->route('category')->with('msg', ['type' => 'danger', 'body' => 'No se pudo cargar la información']);
        }
    }
}
