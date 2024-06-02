<?php

class PartidaModel
{
    private $database;

    public function __construct($database)
    {
        $this->database = $database;
    }

    public function traerPreguntaAleatoria() {
        $query = "SELECT * FROM pregunta ORDER BY RAND() LIMIT 1";
        $pregunta = $this->database->query($query);
        return $pregunta;
    }

    public function traerRespuestasDesordenadas($idPregunta) {
        $query = "SELECT texto
                  FROM respuesta
                  WHERE id_pregunta = $idPregunta";
        $respuestas = $this->database->query($query);


        shuffle($respuestas);
        return $respuestas;
    }

    public function esRespuestaCorrecta($textoRespuesta, $idPregunta)
    {
        $query = "Select es_correcta 
                    from respuesta 
                    where texto = '$textoRespuesta' and id_pregunta = $idPregunta";

       $result = $this->database->query($query);

        if($result[0]['es_correcta'] == 1){
            return true;
        }else{
            return false;
        }

    }
    public function getCategoriaPorIdDePregunta($idPregunta) {
        $consulta = "
        SELECT c.nombre
        FROM pregunta p
        INNER JOIN categoria c ON p.id_categoria = c.id
        WHERE p.id = ?;
    ";

        $stmt = $this->database->prepare($consulta);
        if (!$stmt) {die("Error en la preparación de la consulta: " . $this->database->error);}

        $stmt->bind_param("i", $idPregunta);
        if (!$stmt->execute()) {die("Error al ejecutar la consulta: " . $stmt->error);}

        // Obtener el resultado
        $resultado = $stmt->get_result();
        if ($resultado && $resultado->num_rows > 0) {
            return $resultado->fetch_assoc();
        } else {
            return null;
        }


    }

    public function getDescripcionDeLaPreguntaPorId($idPregunta) {
        $consulta = "
        SELECT texto
        FROM pregunta p
        WHERE p.id = ?;
    ";

        $stmt = $this->database->prepare($consulta);
        if (!$stmt) {die("Error en la preparación de la consulta: " . $this->database->error);}

        $stmt->bind_param("i", $idPregunta);
        if (!$stmt->execute()) {die("Error al ejecutar la consulta: " . $stmt->error);}

        // Obtener el resultado
        $resultado = $stmt->get_result();
        if ($resultado && $resultado->num_rows > 0) {
            return $resultado->fetch_assoc();
        } else {
            return null;
        }

    }



}