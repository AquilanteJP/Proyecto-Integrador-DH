<?php

 class Consulta{

     static public function create($bd,$tabla,$valores,$campos=null){ //Crea una nueva hilera de datos en los $campos de la $tabla de la base de datos $bd elegida, con los $valores ingresados; $campos es opcional, sin embargo al dejarse vacío se deben meter todos los tipos de valores
        if($campos !== null){
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

     static public function read($campos,$tabla,$bd,$where=null){ //Muestra los $campos de la $tabla de la base de datos $bd elegida, que cumplan la condición del $where
        $sql="SELECT ".$campos." FROM ".$tabla." ".$where.";";
        $query = $bd->prepare($sql);
        $query->execute();
        $arrayDatos = $query->fetchAll(PDO::FETCH_ASSOC);
        return $arrayDatos;
     }

     static public function update($tabla,$campo,$valor,$idSeleccionado){ //Modifica el $valor de un $campo de una $tabla, identificando lo que se debe modificar mediante la comparación de su id (PK) y el $idSeleccionado; para simplicidad, update() solo actualiza un dato por vez
        $sql="UPDATE ".$tabla." SET ".$campo."=".$valor." WHERE id =".$idSeleccionado;
        $query = $bd->prepare($sql);
        $query->execute();
     }

     static public function delete($tabla,$idSeleccionado){ //Borra columnas de una $tabla, identificando lo que se debe borrar mediante la comparación de su id (PK) y el $idSeleccionado
       $sql = "DELETE FROM ".$tabla." WHERE id =".$idSeleccionado;
       $query = $bd->prepare($sql);
       $query->execute();
     }
 }

?>
