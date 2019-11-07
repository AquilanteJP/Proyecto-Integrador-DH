<?php
require_once("helpers.php");
require_once("./loader.php");
if($_POST && $_FILES){
  $usuario=$armador->armarUsuario($_POST,$_FILES);
  $avatar =$armador->armarAvatar($_POST, $_FILES);
  //Se instancia el usuario con datos de $_POST y $_FILES
  $errores=$validador->validarRegistro($usuario);
  // echo "Todo bien <br>";
  if(count($errores)==0){
   // echo "FUNCIONA <br>";
    $datosUser= "'".$usuario->getNombres()."','".$usuario->getApellidos()."','". $usuario->getEmail()."',hex(aes_encrypt('".$usuario->getPassword()."', 'hunter2')),'".$usuario->getGenero()."','".$usuario->getBirthdate()."','".$usuario->getTipoRegistro().($avatar != NULL ?"','".$avatar."'": "'");
    /////////////////////////////////////////////////////////////////////////////////////////////////AES encripta la contraseña y HEX lo pasa a hexadecimal porque sino es un quilombo
    $listaUsuario= "nombres, apellidos, email, password, genero, birthdate, tipo_registro, foto_usuario"; //para dejar la funcion para generalidades uso esta variable xq desde aca solo se instancian planillas de registro de usuarios
    $consulta->create($db,"usuarios", $datosUser,$listaUsuario);
    header("location:logIn.php");
  } else {
    var_dump($usuario);
    echo "<br> <br>";
    var_dump($_POST);
  }

}

?>

<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <title>Registrate</title>
  <link href="https://fonts.googleapis.com/css?family=Montserrat|Open+Sans|Roboto&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/master.css">
  <script src="https://kit.fontawesome.com/64db3b546b.js"></script>
  <meta content="width=device-width, initial-scale=1" name="viewport"/>
</head>

<body>
  <div class=" pt-5">
    <?php include_once("partials/header2.php"); ?>
    <div class="px-3 pt-5 flex-wrap">
     <form class="col-lg-12 col-md-10 col-sm-12 bg-light py-3 d-flex flex-wrap" method="POST" enctype="multipart/form-data">
       <div class="w-100 border-bottom mb-3">
         <a href="logIn.php" class="text-decoration-none"><h6>Volver</h6></a>
        </div>
        <div class="w-100">
          <?php if(isset($errores)):?>
            <ul class="alert alert-danger">
              <?php foreach ($errores as $value) :?>
                <li><?=$value;?></li>
              <?php endforeach;?>
            </ul>
          <?php endif;?>
        </div>
        <div class="col-form-label-sm w-25 px-2">
          <label for="firstName">Nombre<span class="text-danger">*</span></label>
          <input type="text" value="<?=isset($errores['firstName'])? "":old('firstName') ;?>" class="form-control" name="firstName" id="firstName" placeholder="Escribe tu nombre">
        </div>
        <div class="col-form-label-sm w-25 px-2">
          <label for="lastName">Apellido <span class="text-danger">*</span></label>
          <input type="text" value="<?=isset($errores['lastName'])? "":old('lastName') ;?>"  class="form-control" name="lastName" id="lastName" placeholder="Escribe tu apellido">
        </div>
        <div class="col-form-label-sm w-50">
          <label for="email">Email <span class="text-danger">*</span></label>
          <input type="email" value="<?=isset($errores['email'])? "":old('email') ;?>"  class="form-control" name="email" id="email" placeholder="Escribe tu mail">
        </div>
        <div class="col-form-label-sm w-25 px-2">
          <label for="bornIn">Nacimiento <span class="text-danger">*</span></label>
          <input type="date" class="form-control " name="bornIn">
        </div>
        <div class="col-form-label-sm w-25 px-2">
          <label for="gender">Genero <span class="text-danger">*</span></label>
          <br>
          <input type="radio" name="gender" value="male"> Hombre
          <input type="radio" name="gender" value="female"> Mujer
          <input type="radio" name="gender" value="other"> Otro
        </div>
        <div class="col-form-label-sm w-50">
          <label for="tipoRegistro">Tipo de Registro <span class="text-danger">*</span></label>
          <br>
          <input type="radio" name="tipoRegistro" value="docente"> Docente
          <input type="radio" name="tipoRegistro" value="estudiante"> Estudiante
          <input type="radio" name="tipoRegistro" value="no_docente"> No Docente
        </div>
        <div class="col-form-label-sm w-25 px-2">
          <label for="password">Contraseña <span class="text-danger">*</span></label>
          <input type="password" class="form-control" name="password" id="password" placeholder="Contraseña">
        </div>
        <div class="col-form-label-sm w-25 px-2">
          <label for="password">Repetir contraseña <span class="text-danger">*</span></label>
          <input required name="passwordRepeat" type="password" value= ""class="form-control" name="passwordRepeat" id="passwordRepeat" placeholder="Repetir contraseña">
        </div>
        <div class="col-form-label-sm">
          <label for="avatar">Avatar (opcional) <small class="text-muted">(.jpg,.jpeg,.png)</small></label>
          <input name="avatar" type="file" value= ""class="form-control" id="avatar">
        </div>
        <div class="pt-3 pl-2 w-100">
          <button type="submit" class="w-25 m-auto rounded botonJuan py-2">Registrarme</button>
        </div>
      </form>
    </div>
    <?php include_once('partials/footer.php'); ?>
  </div>
</body>

</html>
