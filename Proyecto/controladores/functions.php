<?php
function validar($datos,$imagen){ //Los datos estan en el array $_POST, la imagen en $_FILES//
    $errores = [];

    $firstName = trim($datos['firstName']);
    if(empty($firstName )){
        $errores['firstName']="Debe colocar su nombre.";
    }

    $lastName = trim($datos['lastName']);
    if(empty($lastName )){
        $errores['lastName']="Debe colocar su apellido.";
    }

    $email = trim($datos['email']);
    if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
        $errores['email']="Email inválido.";
    }

    $password = trim($datos['password']);
    if(empty($password)){
      $errores['password']="El password no puede estar en blanco.";
    } elseif (!preg_match('/^(?=.*\d)(?=.*[A-Za-z])(?=.*[!?@#$%&])[0-9A-Za-z!?@#$%&]{6,15}$/', $password)) {
      $errores['password'] = "El password debe tener al menos 6 letras, un numero y un caracter especial";
    }

    $passwordRepeat = trim($datos['passwordRepeat']);
    if($password != $passwordRepeat){
        $errores['passwordRepeat']="Las contraseñas deben ser iguales.";
    }

    $foto = $_FILES["avatar"]["name"];
    $ext = pathinfo($foto, PATHINFO_EXTENSION);
    if($_FILES ["avatar"]["error"]!=0){
        $errores["avatar"] = "Debe subir una foto (formato .jpg, .jpeg, o .png).";
    }
    elseif ($ext != "png" && $ext != "jpg" && $ext != "jpeg") {
        $errores["avatar"] = "La foto debe ser de formato .jpg, .jpeg, o .png.";
    }

    return $errores;
}


function armarAvatar($imagen){
    $nombre = $imagen['avatar']['name'];
    $ext = pathinfo($nombre, PATHINFO_EXTENSION);
    $archivoOrigen = $imagen['avatar']['tmp_name'];
    $archivoDestino = dirname(__DIR__);
    $archivoDestino = $archivoDestino."/profilePics/";
    $avatar = uniqid();
    $archivoDestino = $archivoDestino.$avatar.".".$ext;
    move_uploaded_file($archivoOrigen, $archivoDestino);
    return $avatar;
}

function crearRegistro($datos,$imagen){
    $usuario =[
        'firstName' => $datos['firstName'],
        'lastName' => $datos['lastName'],
        'email' => $datos['email'],
        'bornIn' => $datos['bornIn'],
        'gender' => $datos['gender'],
        'password'=> password_hash($datos['password'],PASSWORD_DEFAULT),
        'avatar' => $imagen,
        'perfil' =>1
    ];
    return $usuario;
}
function guardarSesion($variable){
  session_start();
  foreach ($variable as $key => $value) {
    $_SESSION[$key]= $value;
  }
  return $_SESSION;
}
function guardarUsuario($usuario){
    $usuarioJson = json_encode($usuario);
    file_put_contents('usuario.json',$usuarioJson.PHP_EOL,FILE_APPEND);
}

 ?>
