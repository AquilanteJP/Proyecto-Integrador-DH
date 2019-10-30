<?php

abstract class Usuario{

  protected $id;
  protected $nombres;
  protected $apellidos;
  protected $genero;
  protected $birthdate;
  protected $email;
  protected $password;
  protected $contacto;
  protected $amigos;

  //Se quitaron las funciones abstractas porque forzaban a que se especifiquen TODAS en CADA UNO DE los hijos
  
  //Constructor general, para evitar que cualquier clase hijo se cree con pocos argumentos, se extiende a todos
  public function __construct($nombres, $apellidos, $genero, $email, $password){
    //$this->id = generar una id autoincremental;
    $this->nombres = $nombres;
    $this->apellidos = $apellidos;
    $this->genero = $genero;
    $this->password = $password;
  }
  //probando funcion para crear Posts
  public function postear($id, $titulo, $contenido){
    //Debo instanciar un objeto Posts
    $post1 = new Post($id, $titulo, $contenido);
    var_dump($post1);
  }

  public function eliminarse(){
    return;
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

}
