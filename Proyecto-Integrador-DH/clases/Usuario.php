<?php

abstract class Usuario{

  private $id;
  private $nombres;
  private $apellidos;
  private $genero;
  private $birthdate;
  private $email;
  private $password;
  private $contacto;
  private $amigos;

  abstract public function agregarseCurso();
  abstract public function eliminarseCurso();
  abstract public function agregarseToDo();
  abstract public function eliminarseToDo();
  abstract public function agregarseAlumno();
  abstract public function eliminarseAlumno();

  //probando funcion para crear Posts
  public function postear($id, $titulo, $contenido){
    //Debo instanciar un objeto Posts
    $post1 = new Post($id, $titulo, $contenido);
    var_dump($post1);
  }

  public function eliminarse(){

  }

  public function getEmail(){
    return $this->email;
  }

  public function setEmail($email){
    $this->email = $email;
  }

  public function setPassword($password){
    $this->password = $password;
  }

  public function getNombres(){
    return $this->nombres;
  }

  public function setNombres($nombres){
    $this->nombres = $nombres;
  }

  public function getApellidos(){
    return $this->apellidos;
  }

  public function setApellidos($apellidos){
    $this->apellidos = $apellidos;
  }

  public function getGenero(){
    return $this->genero;
  }

  public function setGenero($genero){
    $this->genero = $genero;
  }

  public function getEmail(){
    return $this->email;
  }

  public function setGenero($genero){
    $this->genero = $genero;
  }

  public function getEmail(){
    return $this->email;
  }

  public function setGenero($genero){
    $this->genero = $genero;
  }
  public function getEmail(){
      return $this->email;
  }

  public function setGenero($genero){
      $this->genero = $genero;
  }

}
