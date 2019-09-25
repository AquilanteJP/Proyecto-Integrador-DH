<?php
function validar($datos, $imagen){
    $errores = [];
    $userName = trim($datos['userName']);
    if(empty($userName )){
        $errores['userName']="El campo nombre no lo puede dejar en blanco";
    }
    $lastName = trim($datos['lastName']);
    if(empty($lastName )){
        $errores['lastName']="El campo apellido no lo puede dejar en blanco";
    }
    $email = trim($datos['email']);
    if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
        $errores['email']="Email inválido";
    }
    $password = trim($datos['password']);
    if(empty($password)){
        $errores['password']="El password no puede ser blanco";
    }elseif (!preg_match('/^(?=.*\d)(?=.*[A-Za-z])(?=.*[!?@#$%&])[0-9A-Za-z!?@#$%&]{6,15}$/', $password)) {
      $errores['password'] = "El password debe tener al menos 6 letras, un numero y un caracter especial";
    }
    $passwordRepeat = trim($datos['passwordRepeat']);
    if($password != $passwordRepeat){
        $errores['passwordRepeat']="Las contraseñas deben ser iguales";
    }
    $foto = $_FILES["avatar"]["name"];
    $ext = pathinfo($foto, PATHINFO_EXTENSION);
    if($_FILES ["avatar"]["error"]!=0){
        $errores["avatar"] = "subi una foto";
    }
    elseif ($ext != "png" && $ext != "jpg" && $ext != "jpeg") {
      echo "subi una imagen como la gente";
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
        'userName' => $datos['userName'],
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
