<?php
class baseDatos{

    static public function  conexion($dsn,$user,$password){
        $bd = new PDO($dsn,$user,$password);
        return $bd;
    }

}
