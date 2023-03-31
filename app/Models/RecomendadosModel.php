<?php

namespace App\Models;

use CodeIgniter\Model;

class RecomendadosModel extends Model
{
    protected $table = "recomendados";
    protected $primaryKey = "id";
    protected $allowedFields = ["titulo", "subtitulo", "cuerpo", "foto_portada", "foto_cuerpo", "autor", "slug"];
}
