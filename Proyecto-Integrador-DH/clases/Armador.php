<?php

class Armador{

  public function armarUsuario($datos,$imagen){
  //dependendiendo que tipo de usuario quiera se instancia un objeto distinto
    if($datos['tipoRegistro'] = "estudiante"){
      $usuario = new Estudiante(
        $nombres = $datos['firstName'],
        $apellidos = $datos['lastName'],
        $email = $datos['email'],
        $birthdate = $datos['bornIn'],
        $genero = $datos['gender'],
        $password = $datos['password'],
        $passwordRepeat = $datos['passwordRepeat'],
        $tipoRegistro = $datos['tipoRegistro'],
        $avatar = $imagen
      );
      return $usuario;
    }
    if($datos['tipoRegistro'] = "docente"){
      $usuario = new Docente(
        $nombres = $datos['firstName'],
        $apellidos = $datos['lastName'],
        $email = $datos['email'],
        $birthdate = $datos['bornIn'],
        $genero = $datos['gender'],
        $password = $datos['password'],
        $passwordRepeat = $datos['passwordRepeat'],
        $tipoRegistro = $datos['tipoRegistro'],
        $avatar = $imagen
      );
      return $usuario;
    }
    if($datos['tipoRegistro'] = "noDocente"){
      $usuario = new NoDocente(
        $nombres = $datos['firstName'],
        $apellidos = $datos['lastName'],
        $email = $datos['email'],
        $birthdate = $datos['bornIn'],
        $genero = $datos['gender'],
        $password = $datos['password'],
        $passwordRepeat = $datos['passwordRepeat'],
        $tipoRegistro = $datos['tipoRegistro'],
        $avatar = $imagen
      );
      return $usuario;
    }
  }

  public function armarAvatar($datos,$imagen){  //Guarda la imagen en profilePics, y devuelve el nuevo nombre de la imagen al final
      $nombre = $imagen['avatar']['name'];
      $ext = pathinfo($nombre, PATHINFO_EXTENSION);
      if($ext==null) { //Verificacion rudimentaria por si se subio imagen o no (si no hay extension, no hay archivo, o al menos archivo considerable como imagen); devuelve null en array de usuario
        return;
      } else {
        $archivoOrigen = $imagen['avatar']['tmp_name'];
        $avatar = $datos['email'].".".$ext;  //Devuelve como nombre el mail del usuario usado, si ya esta en profilePics se sobrescribe
        $archivoDestino = dirname(__DIR__)."/profilePics/".$avatar;
        move_uploaded_file($archivoOrigen, $archivoDestino);
        return $avatar;
      }
  }

}

 ?>
