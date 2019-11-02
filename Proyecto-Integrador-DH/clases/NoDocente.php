<?php
class NoDocente extends Usuario{

  public function agregarseToDo($titulo,$contenido){
    $toDo = new ToDo($this->id, $titulo, $contenido);
    return $toDo;
  }

  public function eliminarseToDo($titulo){
    
  }


}

?>
