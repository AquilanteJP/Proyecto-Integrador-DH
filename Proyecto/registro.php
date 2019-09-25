<?php
require_once("controladores/functions.php");
if($_POST && $_FILES){
  $errores = validar($_POST, $_FILES);
 if(count($errores)==0){
   $avatar = armarAvatar($_FILES);
   $registro = crearRegistro($_POST, $avatar);
   guardarUsuario($registro);
   header("location:profile.php");
 }
}
 ?>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/master.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <title>registro</title>
</head>

<body>
  <div class="container-fluid py-auto d-flex fondoJuan">

    <form class="col-lg-6 col-md-6 col-sm-12 m-auto py-3 px-5 d-flex flex-wrap  bg-light" method="POST" enctype="multipart/form-data">
      <div class="w-100 border-bottom mb-3">
        <a href="logIn.php" class="text-decoration-none">
          <h5>Volver</h5>
        </a>
      </div>
      <?php if(isset($errores)):?>
              <ul class="alert alert-danger">
                <?php foreach ($errores as $value) :?>
                    <li><?=$value;?></li>
                <?php endforeach;?>
              </ul>
            <?php endif;?>
      <div class="form-group w-50 pr-3">
        <label for="userName">Nombre</label>
        <input type="text" class="form-control" name="userName" id="userName" placeholder="Escribe tu nombre">
      </div>
      <div class="form-group w-50">
        <label for="lastName">Apellido</label>
        <input type="text" class="form-control" name="lastName" id="lastName" placeholder="Escribe tu apellido">
      </div>
      <div class="form-group w-100">
        <label for="email">Email</label>
        <input type="email" class="form-control" name="email" id="email" placeholder="Escribe tu mail">
      </div>

      <div class="form-group w-50 pr-3">
        <label for="bornIn">Nacimiento</label>
        <input type="date" class="form-control pr-3" name="bornIn">
      </div>
      <div class="form-group w-50">
        <label for="gender">Genero</label>
        <br>
        <input type="radio" name="gender" value="male"> Hombre
        <input type="radio" name="gender" value="female"> Mujer
        <input type="radio" name="gender" value="other"> Otro
      </div>
      <div class="form-group w-100">
        <label for="password">Contraseña</label>
        <input type="password" class="form-control" name="password" id="password" placeholder="Al menos 6 letras, un numero y un caracter especial">
      </div>
      <div class="form-group">
        <label for="password">Repetir contraseña</label>
        <input required name="passwordRepeat" type="password" value= ""class="form-control" name="passwordRepeat" id="passwordRepeat" placeholder="Repetir contraseña">              </div>
              <div class="form-group">
                <label for="avatar">Avatar</label>
                <input required name="avatar" type="file" value= ""class="form-control" id="avatar">
              </div>
      <button type="submit" class="w-75 m-auto rounded botonJuan py-2">Registrarme</button>
    </form>
  </div>
  <footer>
    <h5 class="subTitulo">Nuestras Redes</h5>
    <div class="redes pt-2 pb-2">
      <i><img class="icons" src="img/icons/logoFacebook.png" alt=""></i>
      <i><img class="icons" src="img/icons/logoTwitter.png" alt=""></i>
      <i><img class="icons" src="img/icons/logoInstagram.png" alt=""></i>
      <i><img class="icons" src="img/icons/logoLinkedin.png" alt=""></i>
    </div>
    <br>
    <p>todos los derechos reservados</p>
  </footer>
</body>

</html>
