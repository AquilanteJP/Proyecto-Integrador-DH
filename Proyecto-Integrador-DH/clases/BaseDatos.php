<?php

abstract class BaseDatos{

  static public function conexion($dsn,$username,$password){
    $bd = new PDO($dsn,$username,$password);
  }
  

}
