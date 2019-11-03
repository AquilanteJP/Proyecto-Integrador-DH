<?php
require_once("helpers.php");
require_once("./loader.php");
if($_POST && $_FILES){
    /*$errores = validar($_POST, $_FILES);
  if(count($errores)==0){
    $avatar = armarAvatar($_FILES);
    $registro = crearRegistro($_POST, $avatar);
    guardarUsuario($registro);
    //$_SESSION = guardarSesion($registro);//Esta linea se podria borrar porque de aca vas a login y alla tambien te inicia la session
    header("location:logIn.php");
 }*/

 //Probando orientado a objetos
  $errores= Validador::validarRegistro($_POST, $_FILES);
    if(count($errores)==0){
        $avatar = Armador::armarAvatar($_POST, $_FILES); //guarda el profilePic con el email
        $registro = Armador::armarRegistro($_POST,$avatar);
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
  <div class="container-fluid py-auto d-flex fondoJuan">
    <form class="col-lg-6 col-md-6 col-sm-12 m-auto py-3 px-5 d-flex flex-wrap  bg-light" method="POST" enctype="multipart/form-data">
      <div class="w-100 border-bottom mb-3">
        <a href="logIn.php" class="text-decoration-none">
          <h5>Volver</h5>
        </a>
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
      <div class="form-group w-50 pr-3">
        <label for="firstName">Nombre <span class="text-danger">*</span></label>
        <input type="text" value="<?=isset($errores['firstName'])? "":old('firstName') ;?>" class="form-control" name="firstName" id="firstName" placeholder="Escribe tu nombre">
      </div>

      <div class="form-group w-50">
        <label for="lastName">Apellido <span class="text-danger">*</span></label>
        <input type="text" value="<?=isset($errores['lastName'])? "":old('lastName') ;?>"  class="form-control" name="lastName" id="lastName" placeholder="Escribe tu apellido">
      </div>

      <div class="form-group w-100">
        <label for="email">Email <span class="text-danger">*</span></label>
        <input type="email" value="<?=isset($errores['email'])? "":old('email') ;?>"  class="form-control" name="email" id="email" placeholder="Escribe tu mail">
      </div>

      <div class="form-group w-50 pr-3">
        <label for="bornIn">Nacimiento <span class="text-danger">*</span></label>
        <input type="date" class="form-control pr-3" name="bornIn">
      </div>

      <div class="form-group w-50">
        <label for="gender">Genero <span class="text-danger">*</span></label>
        <br>
        <input type="radio" name="gender" value="male"> Hombre
        <input type="radio" name="gender" value="female"> Mujer
        <input type="radio" name="gender" value="other"> Otro
      </div>

      <div class="form-group w-50 pr-3">
        <label for="password">Contraseña <span class="text-danger">*</span></label>
        <input type="password" class="form-control" name="password" id="password" placeholder="Contraseña">
      </div>

      <div class="form-group w-50">
        <label for="password">Repetir contraseña <span class="text-danger">*</span></label>
        <input required name="passwordRepeat" type="password" value= ""class="form-control" name="passwordRepeat" id="passwordRepeat" placeholder="Repetir contraseña">
      </div>

      <div class="form-group w-100">
        <label for="tipoRegistro">Tipo de Registro <span class="text-danger">*</span></label>
        <br>
        <input type="radio" name="tipoRegistro" value="docente"> Docente
        <input type="radio" name="tipoRegistro" value="estudiante"> Estudiante
        <input type="radio" name="tipoRegistro" value="noDocente"> No Docente
      </div>

      <div class="form-group">
        <label for="avatar">Avatar (opcional) <small class="text-muted">(.jpg,.jpeg,.png)</small></label>
        <input name="avatar" type="file" value= ""class="form-control" id="avatar">
      </div>

      <button type="submit" class="w-75 m-auto rounded botonJuan py-2">Registrarme</button>
    </form>
  </div>
  <?php include_once('partials/footer.php'); ?>
</body>

</html>
