<?php

namespace App\Models;

use CodeIgniter\Model;
use App\Entities\Posts;

class BorradoresModel extends Model
{
    protected $table = "borradores";
    protected $primaryKey = "id";
    protected $allowedFields = ["volanta", "titulo", "bajada", "cuerpo", "etiqueta"];

    protected $returnType = Posts::class;
    protected $useSoftDeletes = false;
}
