<?php
function validar($datos,$imagen){ //Los datos estan en el array $_POST, la imagen en $_FILES
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

    //Ahora se esta probando subida de avatar opcional, para subida de avatar obligatoria sacar tags de comentario

    /* if($_FILES ["avatar"]["error"]!=0){ //Validacion foto no subida
        $errores["avatar"] = "Debe subir una foto (formato .jpg, .jpeg, o .png).";
    }
    elseif ($ext != "png" && $ext != "jpg" && $ext != "jpeg") { //Validacion formato de foto incorrecto
        $errores["avatar"] = "La foto debe ser de formato .jpg, .jpeg, o .png.";
    } */

    if ($ext != "png" && $ext != "jpg" && $ext != "jpeg" && $ext != null ) { //Validacion formato de foto incorrecto
        $errores["avatar"] = "La foto debe ser de formato .jpg, .jpeg, o .png.";
    }

    return $errores;
}


function armarAvatar($imagen){  //Guarda la imagen en profilePics, y devuelve el nuevo nombre de la imagen al final
    $nombre = $imagen['avatar']['name'];
    $ext = pathinfo($nombre, PATHINFO_EXTENSION);
    if($ext==null) { //Verificacion rudimentaria por si se subio imagen o no (si no hay extension, no hay archivo);devuelve null en array de usuario
      return;
    } else {
      $archivoOrigen = $imagen['avatar']['tmp_name'];
      $archivoDestino = dirname(__DIR__)."/profilePics/";
      $avatar = uniqid().".".$ext;  //Genera un nombre randomizado para todas las fotos
      $archivoDestino = $archivoDestino.$avatar;
      move_uploaded_file($archivoOrigen, $archivoDestino);
      return $avatar;
    }
}

function crearRegistro($datos,$imagen){  //Usando $_POST como primer parametro y $avatar (creado con crearAvatar()) como segundo, crea un array de usuario
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
/* PROBANDO FUNCIONES DE VALIDACION DE LOG IN
function validarLogIn($datos){
    $errores = [];

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
    return $errores;
}
function crearLogIn($datos){
    $usuario =[
        'email' => $datos['email'],
        'password'=> password_hash($datos['password'],PASSWORD_DEFAULT),
    ];
    return $usuario;
}
function buscarUsuario($usuario){
    $arrayJson = file_get_contents('Proyecto/usuario.json');
    $jsonencode = utf8_encode($arrayJson);
    $recorrerUsuarios= json_decode($jsonencode,true);
    foreach($recorrerUsuariosn->usuarios as $item)
{
    if($item->email == $usuario['email']&& password_verify()){
        header("location:profile.php");
    }
}*/
function guardarUsuario($usuario){  //Pasa $usuario a formato .json y lo guarda en usuarios.json como archivo plano
    $usuarioJson = json_encode($usuario);
    file_put_contents('usuarios.json',$usuarioJson.PHP_EOL,FILE_APPEND);
}


}
function guardarSesion($variable){ // La variable en este caso es $registro, que se crea en registro.php usando la funcion crearRegistro(), y contiene los datos del array $_POST mas la imagen subida. Básicamente, copia todos los datos de $_POST a $_SESSION, para accesibilidad en todas las páginas
  session_start();
  foreach ($variable as $key => $value) {
    $_SESSION[$key]= $value;
  }
  return $_SESSION;
}

function logout(){ //Al usarse destruye la sesión y redirecciona a logIn.php
  session_destroy();
  header("location:logIn.php");
}

?>
