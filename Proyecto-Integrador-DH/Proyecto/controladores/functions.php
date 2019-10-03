<?php

//VALIDACION REGISTRO

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
    if($ext==null) { //Verificacion rudimentaria por si se subio imagen o no (si no hay extension, no hay archivo, o al menos archivo considerable como imagen); devuelve null en array de usuario
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

function crearRegistro($datos,$imagen){  //Usando $_POST como primer parametro y $avatar (creado con armarAvatar()) como segundo, crea un array de usuario
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

function guardarUsuario($usuario){  //En registro, toma el output de crearRegistro()(el usuario nuevo) y lo pasa a formato .json, guardandolo como archivo plano
    $usuarioJson = json_encode($usuario);
    file_put_contents('usuarios.json',$usuarioJson.PHP_EOL,FILE_APPEND);
}



//VALIDACION LOGIN

/*function validarLogIn($datos){ //Similar a validar(), con menos pasos
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
}*/

function abrirBaseDatos(){ //gracias profe jajaj  //Esta función sirve para recuperar el array de usuarios para uso posterior, se la usa mas abajo (es como un helper)
   if(file_exists("usuarios.json")){
       $baseDatosJson= file_get_contents("usuarios.json");
       $baseDatosJson = explode(PHP_EOL,$baseDatosJson);
       //Aquí saco el ultimo registro, el cual está en blanco
       array_pop($baseDatosJson);
       //Aquí recooro el array y creo mi array con todos los usuarios
       foreach ($baseDatosJson as  $usuarios) {
           $arrayUsuarios[]= json_decode($usuarios,true);
       }
       //Aquí retorno el array de usuarios con todos sus datos
       return $arrayUsuarios;
       //var_dump($arrayUsuarios);
   }else{
       return null;
   }
}

function buscarUsuario($email){ //Toma el email guardado en $_POST (se le mete $_POST en logIn), consigue el array de usuarios, y busca el mail exacto en cada array de usuario para un match (si el usuario no esta registrado no aparece)
   $arrayUsuarios = abrirBaseDatos();
   if($arrayUsuarios!==null){
       foreach ($arrayUsuarios as $usuario =>$value) {
           if($email === $value["email"]){ //Aca es donde se matchea el usuario ingresado con la base de datos, y se lo asigna a una variable para uso posterior
             $usuarioEnDatos=$arrayUsuarios[$usuario];
             return $usuarioEnDatos;
           } /* else {
              echo "usuario no encontrado";//no se muestra, solo para testear la funcion. Aparece este mensaje por cada matcheo de usuario fallido (2 usuarios, 2 veces aparece el mensaje)
           } */
       }
       return null; //Mejor condicion de usuario no encontrado
   } else {
      echo "No hay usuarios!"; //Si el array esta vacio significa que no hay usuarios xd
   }
}

function validarContraseña($passwordPost,$usuarioEnDatos){ //Consiguiendo la contraseña ingresada en el formulario, la compara con el hash del value password del array usuario; si coincide, devuelve ese usuario para uso posterior.
 // $usuarios = abrirBaseDatos(); IMPORTANTE: ESTA LINEA NO HACE NADA!! (no usas la variable $usuarios en la función abajo; lo que pasa es que en el login te encargas de usar esta función con $usuarioEncontrado, un output de buscarUsuario(), que tambien usa abrirBaseDatos(); AHÍ ya tenes el usuario que queres, y no necesitas abrir/encontrar el array de usuarios)
 if(password_verify($passwordPost,$usuarioEnDatos['password'])){
     //echo "La contraseña es correcta";
     $usuarioSession = $usuarioEnDatos;
     return $usuarioSession;
 } else {
   // echo "El mail o la contraseña es incorrecta"; //Si llega a este paso, significa que no paso
   return null;
 }
}

function validarLogIn($datos){ //Usa las funciones previamente mencionadas para hacer la verificacion final de errores en logIn, con la misma idea que la verificacion de registro. Toma los datos de $_POST.
   $erroresLogIn=[];

   $email = trim($datos['email']);
   $password = trim($datos['password']);
   if(buscarUsuario($_POST['email'])==null) {
     $erroresLogIn['email'] = "Usuario no encontrado."; //A futuro ambos errores se reemplazaran por "El usuario o la contraseña son incorrectos", estos mensajes estan aca para visualizar
   } elseif (validarContraseña($_POST['password'],buscarUsuario($_POST['email']))==null) {
        $erroresLogIn['password'] = "Contraseña incorrecta.";
   }

   return $erroresLogIn;
}

//FUNCIONES DE SESSION Y COOKIES

function guardarSesion($variable){ // La variable en este caso es $registro, que se crea en registro.php usando la funcion crearRegistro(), y contiene los datos del array $_POST mas la imagen subida. Básicamente, copia todos los datos de $_POST a $_SESSION, para accesibilidad en todas las páginas
  session_start();
  foreach ($variable as $key => $value) {
    $_SESSION[$key]= $value;
  }
  return $_SESSION;
}

function logout(){ //Al usarse destruye la sesión y redirecciona a logIn.php. IMPORTANTE:PARA OPERAR CON SESSION, SE DEBE ESCRIBIR SESSION_START(), INCLUSO PARA DESTRUIRLA CON SESSION_DESTROY()!!!!
  session_start();
  session_destroy();
  header("location:logIn.php");
}

?>
