<?php

namespace App\Models;

use CodeIgniter\Model;

class RevistasModel extends Model {
    protected $table = "revistas";
    protected $primaryKey = "id";
    protected $allowedFields = ["nombre_revista", "mes", "nombre_autor", "cuento"];
}
