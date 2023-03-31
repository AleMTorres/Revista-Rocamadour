<?php

namespace App\Models;

use CodeIgniter\Model;

class AutoresModel extends Model
{
    protected $table = "autores";
    protected $primaryKey = "id";
    protected $allowedFields = ["nombre", "apellido", "usuario", "contraseña", "red_social", "puesto", "descripcion", "slug"];
}
