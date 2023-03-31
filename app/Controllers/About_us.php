<?php

namespace App\Controllers;

use App\Models\AutoresModel;
use App\Models\EtiquetasModel;
use App\Models\PostsModel;
use App\Models\RevistasModel;

class About_us extends BaseController
{

    public function about_us()
    {

        $modelAutores = new AutoresModel();
        $autores = $modelAutores->findAll();

        return view('about_us/about_us', ['autores' => $autores]);
    }

    public function about_author($slug)
    {
        $modelAutores = new AutoresModel();
        $modelPosts = new PostsModel();

        $autor = $modelAutores->where('slug', $slug)->first();
        $idAutor = $autor['id'];
        $posts = $modelPosts->where('autor', $idAutor)->findAll();

        return view('about_us/about_author', ['autor' => $autor, 'posts' => $posts]);
    }

    public function return_dowloads()
    {

        $modelRevistas = new RevistasModel();
        $revistas = $modelRevistas->findAll();

        return view('about_us/downloads', ['revistas' => $revistas]);
    }

    public function download_window($id)
    {
        $modelRevistas = new RevistasModel();
        $revista = $modelRevistas->where('id', $id)->first();

        return view('about_us/revista', ['revista' => $revista]);
    }


    public function return_contact()
    {
        return view('about_us/contact');
    }

    // public function msg_contact()
    // {
    //     $nombre = $_POST['nombre'];
    //     $mail = $_POST['mail'];
    //     $mensaje_web = $_POST['msg'];
    //     $asunto = $_POST['asunto'];

    //     $email = \Config\Services::email();
    //     $email->setFrom($mail);
    //     $email->setTo('edicionesrocamadourmp@gmail.com');
    //     $email->setSubject($asunto);
    //     $email->setMessage($mensaje_web);

    //     dd($email->send());

    //     if (!empty($nombre && $mail && $mensaje_web && $asunto)) {
    //         if ($email->send()) {
    //             return redirect()->to('contact')->with('msg', ['type' => 'success', 'body' => '¡Mensaje enviado con éxito!']);
    //         } else {
    //             return redirect()->to('contact')->with('msg', ['type' => 'danger', 'body' => 'Ocurrió un error, vuelva a intentar']);
    //         }
    //     } else {
    //         return redirect()->to('contact')->with('msg', ['type' => 'danger', 'body' => 'Debe completar todos los campos']);
    //     };
    // }

    public function msg_contact()
    {
        if ($_POST['mail']) {

            $email_to = "edicionesrocamadourmp@gmail.com";
            $email_subject = $_POST['asunto'];;
            $email = "E-mail: " . $_POST['mail'] . "\n";

            if (
                empty($_POST['nombre']) &&
                empty($_POST['msg']) &&
                empty($_POST['asunto'])
            ) {
                return redirect()->to('contact')->with('msg', ['type' => 'danger', 'body' => 'Debe completar todos los campos']);
            }

            $email_message = "Detalles del formulario de contacto:\n\n";
            $email_message .= "Nombre: " . $_POST['nombre'] . "\n";
            $email_message .= "E-mail: " . $_POST['mail'] . "\n";
            $email_message .= "Asunto: " . $_POST['asunto'] . "\n";
            $email_message .= "Mensaje: " . $_POST['msg'] . "\n\n";

            $headers = 'From: ' . $email . "\r\n";
            @mail($email_to, $email_subject, $email_message, $headers);

            return redirect()->to('contact')->with('msg', ['type' => 'success', 'body' => '¡Mensaje enviado con éxito!']);
        }
    }
    // public function msg_contact()
    // {
    //     ini_set('display_errors', 1);
    //     error_reporting(E_ALL);

    //     $nombre = $_POST['nombre'];
    //     $mail = $_POST['mail'];
    //     $mensaje_web = $_POST['msg'];
    //     $asunto = $_POST['asunto'];
    //     $headers = "MIME-Version: 1.0 \r\n ";
    //     $headers .= "Content-type: text/plane";
    //     $headers .= "charset=utf-8 \r\n";
    //     $headers .= "From: $nombre <$mail> \r\n";
    //     $headers .= "To: edicionesrocamadourmp@gmail.com \r\n";

    //     $mensaje_completo = $nombre . " | " .  $mail . " ha enviado el siguiente mensaje: " . $mensaje_web;

    //     if (!empty($nombre && $mail && $mensaje_web && $asunto)) {
    //         if (mail('edicionesrocamadourmp@gmail.com', $asunto, $mensaje_completo, $headers)) {
    //             return redirect()->to('contact')->with('msg', ['type' => 'success', 'body' => '¡Mensaje enviado con éxito!']);
    //         } else {
    //             return redirect()->to('contact')->with('msg', ['type' => 'danger', 'body' => 'Ocurrió un error, vuelva a intentar']);
    //         }
    //     } else {
    //         return redirect()->to('contact')->with('msg', ['type' => 'danger', 'body' => 'Debe completar todos los campos']);
    //     };
    // }
}
