<?php

namespace App\Controllers;

use App\Models\AutoresModel;
use App\Models\EtiquetasModel;
use App\Models\PostsModel;

class Post extends BaseController
{

    public function display_current_post($slug)
    {
        $modelPosts = new PostsModel();
        $modelAutores = new AutoresModel();

        $post = $modelPosts->where('slug', $slug)->first();

        if (!$post) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        $query = [
            'visitas' => $post->visitas + 1
        ];

        if (!session()->get('logueado')) {
            $modelPosts->update($post->id, $query);
        }

        $post = $modelPosts->find($post->id);
        $descripcion = $post->descripcion;
        $idAutor = $post->autor;
        $autor_nota = $modelAutores->find($idAutor);
        $palabras = explode(' ', $post->cuerpo);
        $tiempo_lectura = round(count($palabras) / 250);


        return view('postView/post', ['post' => $post, 'autor' => $idAutor, 'descripcion' => $descripcion, 'autor_nota' => $autor_nota, 'tiempo_lectura' => $tiempo_lectura]);
    }

    public function display()
    {
        return view('about_us/contact');
    }
}
