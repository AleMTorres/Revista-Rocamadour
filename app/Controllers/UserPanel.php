<?php

namespace App\Controllers;

use App\Models\AutoresModel;
use App\Models\EtiquetasModel;
use App\Models\PostsModel;

class UserPanel extends BaseController
{

    public function load_panel()
    {
        $modelAutores = new AutoresModel();
        $modelEtiquetas = new EtiquetasModel();
        $modelPosts = new PostsModel();

        $idAutor = session()->get('id_autor');

        $posts = $modelPosts->where('autor', $idAutor)->findAll();
        $autores = $modelAutores->findAll();
        $etiquetas = $modelEtiquetas->findAll();

        return view('users/panel_control', ['posts' => $posts, 'autores' => $autores, 'etiquetas' => $etiquetas]);
    }

    public function borrar_post($id)
    {
        $modelPosts = new PostsModel();

        $modelPosts->delete(['id', $id]);

        if ($modelPosts->where('id', $id)->first()) {
            return redirect()->route('panel_control')->with('msg', ['type' => 'danger', 'body' => 'No se pudo borrar el post']);
        } else {
            return redirect()->route('panel_control')->with('msg', ['type' => 'warning', 'body' => 'Post borrado con éxito!']);
        }
    }

    public function open_edit_window($id)
    {
        $modelEtiquetas = new EtiquetasModel();
        $etiquetas = $modelEtiquetas->findAll();
        $modelPosts = new PostsModel();
        $userData = $modelPosts->where('id', $id)->first();

        // if (isset($userData)) {
        //     $sessionData = [
        //         'id'            => $userData->id,
        //         'volanta'       => $userData->volanta,
        //         'titulo'        => $userData->titulo,
        //         'bajada'        => $userData->bajada,
        //         'imagen'        => $userData->imagen,
        //         'cuerpo'        => $userData->cuerpo,
        //         'etiqueta'      => $userData->etiqueta,
        //         'fecha'         => $userData->fecha,

        //     ];

        //     session()->set($sessionData);
        // }
        return view('edit/edit_window', ['etiquetas' => $etiquetas, 'data' => $userData]);
    }

    public function editar_post($id)
    {
        $modelPosts = new PostsModel();

        $titulo = mb_url_title($this->request->getVar('titulo'), '-');
        $slug = strtolower($titulo);

        $query = [
            'volanta'  =>   $this->request->getVar('volanta'),
            'titulo'   =>   $this->request->getVar('titulo'),
            'bajada'   =>   $this->request->getVar('bajada'),
            'cuerpo'   =>   $_POST['content'],
            'etiqueta' =>   $this->request->getVar('etiqueta'),
            'fecha'    =>   date('d/m/y'),
            'slug'       => $slug
        ];

        if (isset($query)) {
            $modelPosts->update($id, $query);
            return redirect()->route('post', [$slug]);
            // return redirect()->route('panel_control')->with('msg', ['type' => 'success', 'body' => 'Post editado con éxito']);;
        } else {
            return redirect()->route('panel_control')->with('msg', ['type' => 'danger', 'body' => 'No se pudo editar el post']);
        }
    }

    public function cerrar_sesion()
    {

        session()->destroy();
        return redirect()->to(base_url());
    }
}
