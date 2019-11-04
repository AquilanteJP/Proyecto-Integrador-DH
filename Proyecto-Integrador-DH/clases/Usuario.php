<?php

abstract class Usuario{

  public $id;
  public $nombres;
  public $apellidos;
  public $email;
  public $birthdate;
  public $genero;
  public $password;
  public $passwordRepeat;
  public $tipoRegistro;
  public $avatar;
  public $contacto;
  public $amigos;
  //crear un atributo para determinar que numero de usuario es?
  //Atributo creado.

  //Se quitaron las funciones abstractas porque forzaban a que se especifiquen TODAS en CADA UNO DE los hijos

  //Constructor general, para evitar que cualquier clase hijo se cree con pocos argumentos, se extiende a todos
  public function __construct($nombres, $apellidos, $email, $birthdate, $genero, $password, $passwordRepeat, $tipoRegistro, $avatar = null){
    //$this->id = generar una id autoincremental;
    $this->nombres = $nombres;
    $this->apellidos = $apellidos;
    $this->email = $email;
    $this->birthdate = $birthdate;
    $this->genero = $genero;
    $this->password = $password;
    $this->passwordRepeat = $passwordRepeat;
    $this->tipoRegistro = $tipoRegistro;
    $this->avatar = $avatar;
  }
  //probando funcion para crear Posts
  public function postear($titulo, $contenido){
    //Debo instanciar un objeto Posts
    $post = new Post($this->id, $titulo, $contenido);
    return $post;
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

  public function getPassword(){
      return $this->password;
    }

  public function setPassword($password){
    $this->password = $password;
  }

  public function getPasswordRepeat(){
    return $this->passwordRepeat;
  }

  public function setPasswordRepeat($passwordRepeat){
    $this->passwordRepeat = $passwordRepeat;
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

  public function getTipoRegistro(){
    return $this->tipoRegistro;
  }

  public function getAvatar(){
    return $this->avatar;
  }

  public function setAvatar(){
    $this->avatar = $avatar;
  }
}
