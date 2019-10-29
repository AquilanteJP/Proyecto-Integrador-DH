<?php

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

}
