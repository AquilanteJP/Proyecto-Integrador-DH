<?php
//RECORDAR QUE TODOS LOS USUARIOS MENOS LOS ADMIN INSTANCIAN ESTE OBJETO//
class Post {

  protected $id;
  protected $userId; //usuario que lo posteo
  protected $titulo;
  protected $contenido;
  protected $like;

  public function __construct($usuarioId, $titulo, $contenido){
    $this->userId = $usuarioId;
    $this->titulo = $titulo;
    $this->contenido = $contenido;
    $this->like = 0;
  }
  public function meGusta(){
    $this->like++;
  }

}
/* ------TEST------ se crea un post y se prueba la funcion de sumar megustas
$post = new Post ("prueba","contenido");
var_dump($post);
echo "<br>";
$post->meGusta();
var_dump($post);
*/
