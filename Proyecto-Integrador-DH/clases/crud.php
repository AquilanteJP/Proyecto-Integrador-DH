<?php
require_once('../loader.php');
 class Consulta{

     static public function create($bd,$tabla,$campos=null,$valores){ //Crea nuevas hileras de datos; toma la base de datos y la tabla en las cuales se quiere crear una nueva hilera, opcionalmente los campos (si no se especifica son todos los campos) y los valores por los cuales se quiere cambiar; así como esta, se tendría que colocar los campos y valores como strings de "fubar,sadasd,...",una coma y sin espacio
        if($campos){
          $sql="INSERT INTO ".$tabla." (".$campos.") VALUES (".$valores.");";
          $query = $bd->prepare($sql);
          $query->execute();
        }
        else {
          $sql="INSERT INTO ".$tabla." VALUES (".$valores.");";
          $query = $bd->prepare($sql);
          $query->execute();
        }
     }
     static public function read($campos,$tabla,$bd,$where=null){ //Muestra los campos de la tabla de la base de datos elegida
        $sql="SELECT ".$campos." FROM ".$tabla." ".$where.";";
        $query = $bd->prepare( $sql);
        $query->execute();
        $actores = $query->fetchAll(PDO::FETCH_ASSOC);
        return $actores;
     }
     static public function update($tabla,$campos,$valores,$where=null){ //Actualiza la tabla elegida en los campos elegidos que cumplan una condición where; el where puede ir null, pero eso hara que todos los campos elegidos se actualizen sin excepción. Campos y valores deben ser strings de palabras separadas por una coma, sin espacio (i.e., "pelicula,actor" )
        $arrayCampos = explode(',',$campos);
        $arrayValores = explode(',',$valores);
        /*foreach ($arrayCampos as $campo) {
         $sql="UPDATE ".$tabla." SET ".$campo."=".$where.";";
       } EN PROGRESO*/

     }
     public function delete(){
     
     }
 }

?>
