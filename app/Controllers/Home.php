<?php

namespace App\Controllers;

use App\Models\AutoresModel;
use App\Models\EtiquetasModel;
use App\Models\PostsModel;
use App\Models\RecomendadosModel;
use App\Models\BlogModel;

use PhpParser\Node\Expr\FuncCall;


class Home extends BaseController
{

    public function index()
    {

        $modelAutores = new AutoresModel();
        $modelEtiquetas = new EtiquetasModel();
        $modelPosts = new PostsModel();
        $modelRecomendados = new RecomendadosModel();

        $recomendados = $modelRecomendados->orderBy('id', 'DESC')->findall(5);
        $carruselActive = $modelPosts->orderBy('id', 'DESC')->findall(1);
        $carruselSecond = $modelPosts->orderBy('id', 'DESC')->findall(1, 1);
        $carruselThird = $modelPosts->orderBy('id', 'DESC')->findall(1, 2);
        $posts = $modelPosts->orderBy('id', 'DESC')->findall(12, 3);
        $autores = $modelAutores->findAll();
        $etiquetas = $modelEtiquetas->findAll();

        return view('index', ['posts' => $posts, 'autores' => $autores, 'etiquetas' => $etiquetas, 'carruselSecond' => $carruselSecond, 'carruselActive' => $carruselActive, 'carruselThird' => $carruselThird, 'recomendados' => $recomendados]);
    }

    public function index_see_more()
    {

        $modelAutores = new AutoresModel();
        $modelEtiquetas = new EtiquetasModel();
        $modelPosts = new PostsModel();
        $modelRecomendados = new RecomendadosModel();

        $recomendados = $modelRecomendados->orderBy('id', 'DESC')->findall(5);
        $carruselActive = $modelPosts->orderBy('id', 'DESC')->findall(1);
        $carruselSecond = $modelPosts->orderBy('id', 'DESC')->findall(1, 1);
        $carruselThird = $modelPosts->orderBy('id', 'DESC')->findall(1, 2);
        $posts_count = $modelPosts->findAll();
        $posts = $modelPosts->orderBy('id', 'DESC')->findall(count($posts_count), 3);
        $autores = $modelAutores->findAll();
        $etiquetas = $modelEtiquetas->findAll();

        return view('index', ['posts' => $posts, 'autores' => $autores, 'etiquetas' => $etiquetas, 'carruselSecond' => $carruselSecond, 'carruselActive' => $carruselActive, 'carruselThird' => $carruselThird, 'recomendados' => $recomendados]);
    }


    public function login()
    {
        if (session()->get('logueado')) {
            return redirect()->route('panel_control');
        }
        return view('users/login');
    }

    public function form_login()
    {
        $modelAutores = new AutoresModel();

        $usuario = $this->request->getVar('usuario');
        $password = $this->request->getVar('contraseña');

        $userData = $modelAutores->where('usuario', $usuario)->first();


        if (isset($userData)) {
            if ($password == $userData['contraseña']) {
                $sessionData = [
                    'id_autor'       => $userData['id'],
                    'nombre_autor'   => $userData['nombre'],
                    'apellido_autor' => $userData['apellido'],
                    'usuario'        => $userData['usuario'],
                    'contraseña'     => $userData['contraseña'],
                    'red_social'     => $userData['red_social'],
                    'puesto'         => $userData['puesto'],
                    'imagen'         => $userData['imagen'],
                    'logueado'       => true,
                ];

                session()->set($sessionData);

                return redirect()->to('panel_control');
            } else {
                return redirect()->to('login')->with('msg', ['type' => 'danger', 'body' => 'El usuario o la contraseña están mal']);
            }
        } else {
            return redirect()->to('login')->with('msg', ['type' => 'danger', 'body' => 'El usuario o la contraseña están mal']);
        }
    }

    public function signUp()
    {
        return view('users/signup');
    }

    public function form_signup()
    {

        $modelAutores = new AutoresModel();
        $nombre = $this->request->getVar('nombre');
        $apellido = $this->request->getVar('apellido');
        $usuario = $this->request->getVar('usuario');
        $redSocial = $this->request->getVar('red_social');
        $puesto = $this->request->getVar('puesto');
        $descripcion = $this->request->getVar('descripcion');
        $contraseña = $this->request->getVar('contraseña');
        $confirmContraseña = $this->request->getVar('confirm_contraseña');
        $nombreYapellido = $nombre . " " . $apellido;
        $slug = mb_url_title($nombreYapellido, '_');


        if ($contraseña != $confirmContraseña) {
            return redirect()->to('users/signup')->with('msg', ['type' => 'danger', 'body' => 'Mmm las contraseñas no coinciden']);
        }

        $userData = $modelAutores->where('usuario', $usuario)->first();

        if (!isset($userData)) {
            $query = [
                'nombre'      => $nombre,
                'apellido'    => $apellido,
                'usuario'     => $usuario,
                'contraseña'  => $contraseña,
                'red_social'  => $redSocial,
                'puesto'      => $puesto,
                'descripcion' => $descripcion,
                'slug'        => strtolower($slug)
            ];

            $modelAutores->insert($query);

            session()->set('usuario', '');
            session()->set('nombre', '');
            session()->set('apellido', '');
            session()->set('usuario', '');
            session()->set('redSocial', '');
            session()->set('descripcion', '');

            return redirect()->to('signup')->with('msg', ['type' => 'success', 'body' => 'Bienvenido a bordo, colega!']);
        } else {
            return redirect()->to('signup')->with('msg', ['type' => 'danger', 'body' => 'Oops! Esos datos ya existen']);
        }
    }

    public function search()
    {
        $modelPosts = new PostsModel();
        $modelAutores = new AutoresModel();

        $autores = $modelAutores->findAll();

        $search = $this->request->getVar('search');
        $searchResult = $modelPosts->like('titulo', $search)->findAll();

        // if (!isset($searchResult)) {
        //     return redirect()->to('search')->with('msg', ['type' => 'danger', 'body' => 'No se encontraron resultados para la búsqueda']);
        // } else {
        return view('search', ['search' => $searchResult, 'autores' => $autores]);
        // }
    }

    public function display_recommendeds()
    {

        $modelRecomendados = new RecomendadosModel();

        $recomendados = $modelRecomendados->findall();

        return view('postView/recommendeds', ["recomendados" => $recomendados]);
    }

    public function get_recommended()
    {
        $modelRecomendados = new RecomendadosModel();

        $recomendados = $modelRecomendados->findall();
        $current_recommended = array();

        foreach ($recomendados as $recomendado) {
            array_push($current_recommended, array(
                'titulo'      => $recomendado['titulo'],
                'cuerpo'      => $recomendado['cuerpo'],
                'foto_cuerpo' => $recomendado['foto_cuerpo'],
                'autor'       => $recomendado['autor']
            ));
        }

        return json_encode($current_recommended);
    }

    public function blog()
    {
        $modelBlog = new BlogModel();

        $blog = $modelBlog->findAll();

        return view('postView/blog', ["blog" => $blog]);
    }
}
