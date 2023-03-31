<?php

namespace App\Entities;

use App\Models\AutoresModel;
use App\Models\EtiquetasModel;
use App\Models\PostsModel;
use CodeIgniter\Entity\Entity;

class Posts extends Entity
{
    protected function getNombreEtiqueta()
    {
        $modelEtiquetas = new EtiquetasModel();

        $data = $modelEtiquetas->find($this->etiqueta);

        return $data['nombre'];
    }

    protected function getNombreAutor()
    {
        $modelAutores = new AutoresModel();

        $data = $modelAutores->find($this->autor);
        $autor = $data['nombre'] . " " . $data['apellido'];

        return $autor;
    }

    protected function getDescripcion()
    {
        $modelAutores = new AutoresModel();

        $data = $modelAutores->find($this->autor);

        return $data['descripcion'];
    }

    protected function getLinkRedSocial()
    {
        $modelAutores = new AutoresModel();

        $data = $modelAutores->find($this->autor);

        return $data['red_social'];
    }

    protected function getCategoryColor()
    {
        $modelEtiquetas = new EtiquetasModel();

        $data = $modelEtiquetas->find($this->etiqueta);

        return $data['color'];
    }
}
