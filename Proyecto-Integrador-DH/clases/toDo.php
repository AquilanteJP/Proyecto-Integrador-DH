<?php

class ToDo{

  protected $id;
  protected $userId; //usuario que lo posteo
  protected $titulo;
  protected $contenido;

  public function __construct($usuarioId, $titulo, $contenido){
    $this->userId = $usuarioId;
    $this->titulo = $titulo;
    $this->contenido = $contenido;
  }
}
?>
