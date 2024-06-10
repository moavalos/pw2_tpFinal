<?php

class PreguntaModel {

    private $database;
    private $preguntaFacil;
    private $preguntaMedia;
    private $preguntaDificil;

    public function __construct($database)
    {
        $this->database = $database;
    }

    public function obtenerPregunta(){
        $pregunta = $this->database->query("SELECT * FROM Pregunta");
        return $pregunta;
    }

    public function crearPreguntaSugerida($texto, $id_categoria, $usuario_creador)
    {
        $query = "INSERT INTO Pregunta_Sugerida (texto, id_categoria, nivel, usuario_creador, revisada, valida) 
              VALUES (?, ?, 0.0, ?, false, true)";

        $stmt = $this->database->prepare($query);
        $stmt->bind_param('sii', $texto, $id_categoria, $usuario_creador);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function getCategorias()
    {
        $categorias = $this->database->query("SELECT id, nombre FROM Categoria");

        return $categorias;
    }

}