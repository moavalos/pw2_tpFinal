<?php

class PreguntaController extends BaseController {

    public function __construct($model, $presenter)
    {
        session_start();
        parent::__construct($model, $presenter);
    }

    public function get()
    {
        if (isset($_SESSION)){
            $categorias = $this->model->getCategorias();
            $this->presenter->render("view/crearPregunta.mustache", ['categorias' => $categorias]);
        }else{
            header("location: login");
            exit();
        }

    }

    public function crearPreguntaSugerida()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $texto = $_POST['texto'];
            $id_categoria = $_POST['id_categoria'];
            $usuario_creador = 1;

            $resultado = $this->model->crearPreguntaSugerida($texto, $id_categoria, $usuario_creador);

            if ($resultado) {
                $this->presenter->render("view/crearRespuesta.mustache");
                exit();
            } else {
                header("location: login");
                exit();
            }

            $categorias = $this->model->obtenerCategorias();
            echo $this->mustache->render('crearPregunta', ['categorias' => $categorias]);
        } else {
            echo "error";
        }
    }

}