<?php

class Curso{

  protected $id; //Codigo de curso
  protected $titulo; //Titulo de curso
  protected $contenido; //Resumen de contenidos
  protected $estudiantes; //Lista de estudiantes
  protected $profesorAdjunto;

  public function __construct($id, $titulo, $contenido){
    $this->id = $id;
    $this->titulo = $titulo;
    $this->contenido = $contenido;
  }


}
