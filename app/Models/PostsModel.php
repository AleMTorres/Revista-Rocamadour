<?php

namespace App\Models;

use CodeIgniter\Model;
use App\Entities\Posts;

class PostsModel extends Model {
    protected $table = "posts";
    protected $primaryKey = "id";
    protected $allowedFields = ["volanta", "titulo", "bajada", "imagen", "cuerpo", "etiqueta", "autor", "fecha", "visitas", "slug"];

    protected $returnType = Posts::class;
    protected $useSoftDeletes = false;
}
