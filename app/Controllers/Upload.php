<?php

namespace App\Controllers;

use CodeIgniter\Files\File;
use App\Models\AutoresModel;
use App\Models\EtiquetasModel;
use App\Models\RecomendadosModel;
use App\Models\PostsModel;
use App\Models\BorradoresModel;
use Error;
use Kint\Zval\Value;

class Upload extends BaseController
{
    protected $helpers = ['form'];

    public function index()
    {
        $modelEtiquetas = new EtiquetasModel();

        $etiquetas = $modelEtiquetas->findAll();

        return view('uploadFiles/upload_form', ['errors' => [], 'etiquetas' => $etiquetas]);
    }

    public function index_recommended()
    {
        $modelEtiquetas = new EtiquetasModel();

        $etiquetas = $modelEtiquetas->findAll();

        return view('uploadFiles/upload_recommended', ['errors' => [], 'etiquetas' => $etiquetas]);
    }

    public function upload()
    {
        $modelEtiquetas = new EtiquetasModel();
        $etiquetas = $modelEtiquetas->findAll();

        $volanta = $this->request->getVar('volanta');
        $titulo = $this->request->getVar('titulo');
        $bajada = $this->request->getVar('bajada');
        $etiqueta = $this->request->getVar('etiqueta');
        $id_autor = session()->get('id_autor');
        $fecha = date('d/m/y');
        $editor_data = $_POST['cuerpo'];



        $validationRule = [
            'userfile' => [
                'label' => 'El archivo seleccionado',
                'rules' => 'uploaded[userfile]'
                    . '|is_image[userfile]'
                    . '|mime_in[userfile,image/jpg,image/jpeg,image/gif,image/png,image/webp]'
                    . '|max_size[userfile,2000]'
                    . '|max_dims[userfile,2400,2400]',
            ],
        ];

        if (!$this->validate($validationRule)) {
            $data = ['errors' => $this->validator->getErrors(), 'etiquetas' => $etiquetas];

            return view('uploadFiles/upload_form', $data);
        }

        $img = $this->request->getFile('userfile');

        if (!$img->hasMoved()) {

            $extension = explode('.', $img->getName());
            $fileName = uniqid() . '.' . $extension[count($extension) - 1];

            $modelPosts = new PostsModel();

            $slug = mb_url_title($titulo, '-');


            $query = [
                'volanta'    => $volanta,
                'titulo'     => $titulo,
                'bajada'     => $bajada,
                'imagen'     => $fileName,
                'etiqueta'   => $etiqueta,
                'cuerpo'     => $editor_data,
                'autor'      => $id_autor,
                'fecha'      => $fecha,
                'slug'       => strtolower($slug)
            ];

            $modelPosts->insert($query);

            $img->move(ROOTPATH . 'public\images\posts', $fileName);

            return view('uploadFiles/upload_success');
        }

        $data = ['errors' => 'The file has already been moved.', 'etiquetas' => $etiquetas];

        return view('uploadFiles/upload_form', $data);
    }


    public function upload_recommended()
    {

        $validateImages = [
            'imagenes' => [
                'label' => 'Los archivos seleccionados',
                'rules' => 'uploaded[imagenes]'
                    . '|is_image[imagenes]'
                    . '|mime_in[imagenes,image/jpg,image/jpeg,image/gif,image/png,image/webp]'
                    . '|max_size[imagenes,5000]'
                    . '|max_dims[imagenes,2400,2400]',
            ],
        ];

        if (!$this->validate($validateImages)) {
            $data = ['errors' => $this->validator->getErrors()];
            return view('uploadFiles/upload_recommended', $data);
        }

        if ($this->request->getFileMultiple('imagenes')) {
            $images = $this->request->getFileMultiple('imagenes');
            if (count($images) === 2) {
                $imagen_cuerpo = $images[0];
                $imagen_portada = $images[1];

                $nombreCuerpo = $images[0]->getRandomName();
                $nombrePortada = $images[1]->getRandomName();

                $imagen_cuerpo->move(ROOTPATH . 'public\images\recomendados', $nombreCuerpo);
                $imagen_portada->move(ROOTPATH . 'public\images\recomendados', $nombrePortada);

                $modelRecomendados = new RecomendadosModel();
                $query = [
                    'foto_portada'       => $nombrePortada,
                    'foto_cuerpo'        => $nombreCuerpo,
                    'titulo'             => $this->request->getVar('titulo'),
                    'subtitulo'          => $this->request->getVar('subtitulo'),
                    'cuerpo'             => $this->request->getVar('cuerpo'),
                    'autor'              => session('nombre_autor') . " " . session('apellido_autor'),
                    'slug'               => strtolower(mb_url_title($this->request->getVar('titulo'), '-'))
                ];
                $modelRecomendados->insert($query);
                return view('uploadFiles/upload_success_recommended');
            }
            return redirect()->to('upload_recommended')->with('msg', ['type' => 'danger', 'body' => 'Solo se pueden subir dos imágenes']);
        }

        return redirect()->to('upload_recommended')->with('msg', ['type' => 'danger', 'body' => 'Debe subir dos imágenes']);
    }

    public function save_to_drafts()
    {
        $volanta = $this->request->getVar('volanta');
        $titulo = $this->request->getVar('titulo');
        $bajada = $this->request->getVar('bajada');
        $etiqueta = $this->request->getVar('etiqueta');
        $editor_data = $_POST['cuerpo'];


        $modelBorradores = new BorradoresModel();

        $query = [
            'volanta'    => $volanta,
            'titulo'     => $titulo,
            'bajada'     => $bajada,
            'etiqueta'   => $etiqueta,
            'cuerpo'     => $editor_data,
        ];

        $modelBorradores->insert($query);

        return redirect()->to('upload_form')->with('msg', ['type' => 'success', 'body' => 'Post guardado en borradores']);
    }
}
