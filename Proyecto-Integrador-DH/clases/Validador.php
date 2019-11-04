<?php

class Validador{
    public function validarRegistro($usuario){
        $errores = [];

        $firstName = trim($usuario->getNombres());
        if(empty($firstName)){ //Validacion nombre vacío
            $errores['firstName']="El campo nombre no lo puede dejar en blanco..";
        }

        $lastName = trim($usuario->getApellidos());
        if(empty($lastName)){ //Validacion apellido en blanco
            $errores['lastName']="Debe colocar su apellido.";
        }

        $email = trim($usuario->getEmail());
        if(!filter_var($email,FILTER_VALIDATE_EMAIL)){ //Validacion email incorrecto
            $errores['email']="Email inválido.";
        }

        $password = trim($usuario->getPassword());
        if(empty($password)){ //Validacion contraseña vacía
          $errores['password']="El password no puede estar en blanco.";
        } elseif (!preg_match('/^(?=.*\d)(?=.*[A-Za-z])(?=.*[!?@#$%&])[0-9A-Za-z!?@#$%&]{6,15}$/', $password)) { //Validacion contraseña REGEX
          $errores['password'] = "El password debe tener al menos 6 letras, un numero y un caracter especial";
        }

        $passwordRepeat = trim($usuario->getPasswordRepeat());
        if($password != $passwordRepeat){  //Validacion repetir contraseña fallada
            $errores['passwordRepeat']="Las contraseñas deben ser iguales";
        }

        $foto = $usuario->getAvatar()['name'];
        $ext = pathinfo($foto, PATHINFO_EXTENSION);

        if ($ext != "png" && $ext != "jpg" && $ext != "jpeg" && $ext != null ) { //Validacion formato de foto incorrecto
            $errores["avatar"] = "La foto debe ser de formato .jpg, .jpeg, o .png.";
        }

        return $errores;

    }

}
