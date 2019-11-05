<?php
class baseDatos{

    static public function  conexion($dsn,$user,$password){
      $opt = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];
      try{
        $db = new PDO($dsn,$user,$password,$opt);
      }catch(PDOException $exception){
        echo "No se pudo conectar a la base de datos.<br>Error: ".$exception->getMessage();
        exit;
      }
        return $db;
    }

}
