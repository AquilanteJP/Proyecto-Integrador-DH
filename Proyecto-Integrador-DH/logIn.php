<?php
require_once("controladores/functions.php");
require_once("loader.php");
require_once("helpers.php");

/*$estudiante=new Estudiante;
dd($estudiante);
$post=$estudiante->postear(1,"ESTO ES UNA PRUEBA","does this work?");
dd($post);
$post->meGusta();
dd($post);
exit;*/


if($_POST){

 $erroresLogIn = $validador->validarLogIn($_POST,$db);
 if(count($erroresLogIn)==0){
  guardarSesion($_POST["email"]);
  $sesion->guardarSesion($_POST["email"],$db);
   header("location:profile.php");
 }
  //  guardarSesion($usuarioValidado);*/


  //  $usuarioEncontrado=buscarUsuario($_POST['email']);
  //  $usuarioValidado=validarContraseña($_POST['password'],$usuarioEncontrado);
  //  if ($usuarioValidado!=null){ //Verifica que el usuario haya pasado la verificacion
  //    guardarSesion($usuarioValidado);
  //    recuerdame($_POST,$usuarioValidado);
  //    header("location:profile.php");
  //   } else {
  //    echo "<br> Validacion no pasada"; //Solo para señalar mas claramente que no se paso, después esto se borra
  //   }

}

?>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>logIn</title>
  <link rel="stylesheet" href="css/master.css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat|Open+Sans|Roboto&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://kit.fontawesome.com/64db3b546b.js"></script>
</head>

<body>
  <div class="container-fluid m-0 p-0 d-flex flex-row flex-wrap -all">
    <?php include_once("partials/header2.php"); ?>
    <section class="col-9 d-none d-md-block d-lg-block vh-100 mt-5 p-auto shadow imagen fondoJuan">
      <!-- <img class="w-75 ml-4 mt-3 dh" src="img/logo-DH.png" alt=""> -->
      <article class="pl-5 pt-5 mt-5 mr-5">
        <div class="w-50 mt-5 colearning">
          <h1 class="subTitulo">Colearning at Home</h1>
        </div>
        <div class="w-75 primeraInfo">
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
            Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
        </div>
      </article>
    </section>
    <header class="col-lg-3 col-md-3 col-sm-12 p-3 mt-5 vh-100 bg-light shadow info">
      <hr>
      <h2 class="	d-md-none d-lg-none subTitulo">Colearning at Home</h2>
      <br>
      <h5>Log In</h5>
      <div class="w-100">
        <?php if(isset($erroresLogIn)):?>
                <ul class="alert alert-danger">
                  <?php foreach ($erroresLogIn as $value) :?>
                      <li><small><?=$value;?></small></li>
                  <?php endforeach;?>
                </ul>
        <?php endif;?>
      </div>
      <form class="p-3" method="POST">
        <div class="form-group">
          <label for="email">Email</label>
          <input type="email" value="" class="form-control" name="email" id="email" placeholder="Email">
        </div>
        <div class="form-group">
          <label for="password">Contraseña</label>
          <input type="password" class="form-control" name="password" id="password" placeholder="Introduce tu contraseña">
        </div>
        <div class="form-group form-check">
          <input type="checkbox" class="form-check-input" name="recuerdame" id="recuerdame">
          <label class="form-check-label" for="recuerdame">Recuerdame</label>
        </div>
        <button type="submit" class="w-75 m-auto rounded py-2 botonJuan">Entrar</button>
      </form>
      <a href="registro.php">Registrate</a>
      <hr>
      <br>
      <div>
        <li class="noPunto"><a class="opcionesfooter" href="#preguntas">Preguntas Frecuentes</a></li>
        <li class="noPunto"><a class="opcionesfooter" href="#nosotros">Nosotros</a></li>
        <li class="noPunto"><a class="opcionesfooter" href="#contacto">Contacto</a></li>
      </div>
      <br>
      <hr>
    </header>
    <section class="clearflix row p-3 m-0 border-top fAQ">
      <div class="col-lg-6 col-md-12 col-sm-12">
        <h5 id="preguntas">Preguntas Frecuentes</h5>
        <hr class="colorHr">
        <p class="colorParrafo">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
          commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
          <a href="#">Volver</a>
        </p>
      </div>
      <div class="col-lg-6 col-md-12 col-sm-12">
        <h5 id="nosotros">Nosotros</h5>
        <hr class="colorHr">
        <p class="colorParrafo">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
          commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
          <a href="#">Volver</a>
        </p>
      </div>
      <div class="col-lg-12 col-md-12 col-sm-12">
        <h5 id="contacto">Contacto</h5>
        <hr class="colorHr">
        <p class="colorParrafo">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
          commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
          <a href="#">Volver</a>
        </p>
        <form class="p-3 colorParrafo ">
          <div class="form-group px-auto d-flex flex-wrap justify-content-center">
            <label for="email" class="w-100">Email</label>
            <input type="email" class="form-control w-75" id="email" placeholder="Email">
          </div>
          <div class="d-flex flex-wrap justify-content-center">
            <label for="contact" class="w-100">Contactanos</label>
            <textarea name="contact" class="form-control w-75" rows="8" cols="80"></textarea>
          </div>
          <br>
          <button type="submit" class="w-75 m-auto botonJuan rounded py-2 d-flex flex-wrap justify-content-center">Enviar</button>
        </form>
      </div>
    </section>
    <?php include_once('partials/footer.php'); ?>
  </div>

</body>

</html>
