<?php

namespace App\Models;

use CodeIgniter\Model;

class EtiquetasModel extends Model
{
    protected $table = "etiquetas";
    protected $primaryKey = "id";
    protected $allowedFields = ["nombre", "slug_url", "color"];
}
