<?php
require_once('../loader.php');
 class Consulta{

     static public function create(){
        "INSERT INTO ".$tabla." VALUES".
     }
     static public function read($campos,$tabla,$bd,$where=null){
        $sql="SELECT ".$campos." FROM ".$tabla." ".$where.";";
        $query = $bd->prepare( $sql);
        $query->execute();
        $actores = $query->fetchAll(PDO::FETCH_ASSOC);
        return $actores;
     }
     public function update(){

     }
     public function delete(){

     }
 }

?>
