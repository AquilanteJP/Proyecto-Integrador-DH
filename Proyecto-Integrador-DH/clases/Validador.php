<?php
require_once('././loader.php');
class Validador{

//EN PROGRESO, SE NECESITAN CAMBIAR COSAS A OOP

  public function validarRegistro($datos,$imagen){ //Los datos estan en el array $_POST, la imagen en $_FILES
      $errores = [];

      $firstName = trim($datos['firstName']);
      if(empty($firstName )){ //Validacion nombre en blanco
          $errores['firstName']="Debe colocar su nombre.";
      }

      $lastName = trim($datos['lastName']);
      if(empty($lastName )){ //Validacion apellido en blanco
          $errores['lastName']="Debe colocar su apellido.";
      }

      $email = trim($datos['email']);
      if(!filter_var($email,FILTER_VALIDATE_EMAIL)){ //Validacion formato email incorrecto
          $errores['email']="Email inválido.";
      }

      $password = trim($datos['password']);
      if(empty($password)){ //Validacion contraseña vacía
        $errores['password']="El password no puede estar en blanco.";
      } elseif (!preg_match('/^(?=.*\d)(?=.*[A-Za-z])(?=.*[!?@#$%&])[0-9A-Za-z!?@#$%&]{6,15}$/', $password)) { //Validacion contraseña REGEX
        $errores['password'] = "El password debe tener al menos 6 letras, un numero y un caracter especial";
      }

      $passwordRepeat = trim($datos['passwordRepeat']);
      if($password != $passwordRepeat){ //Validacion repetir contraseña fallada
          $errores['passwordRepeat']="Las contraseñas deben ser iguales.";
      }

      $foto = $_FILES["avatar"]["name"];
      $ext = pathinfo($foto, PATHINFO_EXTENSION);

      if ($ext != "png" && $ext != "jpg" && $ext != "jpeg" && $ext != null ) { //Validacion formato de foto incorrecto
          $errores["avatar"] = "La foto debe ser de formato .jpg, .jpeg, o .png.";
      }

      return $errores;
  }

  public function crearRegistro($datos,$imagen){
//dependendiendo que tipo de usuario quiera se instancia un objeto distinto
    if($datos['tipoRegistro'] = "estudiante"){
      $usuario = new Estudiante(
        $nombres = $datos['firstName'],
        $apellidos = $datos['lastName'],
        $email = $datos['email'],
        $birthdate = $datos['bornIn'],
        $gender = $datos['gender'],
        $password = password_hash($datos['password'],PASSWORD_DEFAULT),
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
        $gender = $datos['gender'],
        $password = password_hash($datos['password'],PASSWORD_DEFAULT),
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
        $gender = $datos['gender'],
        $password = password_hash($datos['password'],PASSWORD_DEFAULT),
        $avatar = $imagen
      );
      return $usuario;
    }
  }

  public function armarAvatar($imagen){  //Guarda la imagen en profilePics, y devuelve el nuevo nombre de la imagen al final
      $nombre = $imagen['avatar']['name'];
      $ext = pathinfo($nombre, PATHINFO_EXTENSION);
      if($ext==null) { //Verificacion rudimentaria por si se subio imagen o no (si no hay extension, no hay archivo, o al menos archivo considerable como imagen); devuelve null en array de usuario
        return;
      } else {
        $archivoOrigen = $imagen['avatar']['tmp_name'];
        $avatar = uniqid().".".$ext;  //Genera un nombre randomizado para todas las fotos
        $archivoDestino = dirname(__DIR__)."/profilePics/".$avatar;
        move_uploaded_file($archivoOrigen, $archivoDestino);
        return $avatar;
      }
  }

}
