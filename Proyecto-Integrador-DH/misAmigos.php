<?php
session_start();
require_once("helpers.php");
if(empty($_SESSION)){
  header("location:logIn.php");
}
//EN PROCESO

//   if(!isset($_COOKIE['firstName'])){//si no hay $_SESSION verifica que no exista una cookie para cargar el perfil
//     if(empty($_SESSION)){ //Si no se inicio una sesión mediante guardarSesion(), se es redirigido a registro.php
//       dd($_SESSION);
//       header("location:logIn.php");
// }/* else {
// }
// }*/
?>

<html lang="en" dir="ltr">

  <head>
    <meta charset="utf-8">
    <title>Mis Amigos</title>
    <link href="https://fonts.googleapis.com/css?family=Montserrat|Open+Sans|Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/master.css">
    <script src="https://kit.fontawesome.com/64db3b546b.js"></script>
    <meta content="width=device-width, initial-scale=1" name="viewport"/>
  </head>
  <body>
      <?php include_once("partials/header2.php"); ?>
      <div class="vh-50 w-100">
        <br>
        <br>
        <br><br><br>
      </div>
      <nav class="navbar navbar-light bg-light w-100 mb-2">
        <a class="navbar-brand pl-5">Buscar Amigo:</a>
        <form class="form-inline">
          <input class="form-control mr-sm-2" type="search" placeholder="Nombre" aria-label="Search">
          <button class="btn btn-outline-secondary my-2 my-sm-0" type="submit">Buscar</button>
        </form>
      </nav>
      <div class="d-flex flex-row flex-wrap w-100 justify-content-around">
        <div class="card mb-3" style="max-width: 540px;">
          <div class="row no-gutters">
            <div class="col-md-4">
              <img src="img/profilepic3.jpg" class="card-img" alt="...">
            </div>
            <div class="col-md-8">
              <div class="card-body">
                <h5 class="card-title">Amigo</h5>
                <p class="card-text">Curso:</p>
                <button type="button" class="btn btn-dark">Ver Amigo</button>
              </div>
            </div>
          </div>
        </div>
        <div class="card mb-3" style="max-width: 540px;">
          <div class="row no-gutters">
            <div class="col-md-4">
              <img src="img/profilepic2.jpg" class="card-img" alt="...">
            </div>
            <div class="col-md-8">
              <div class="card-body">
                <h5 class="card-title">Amigo</h5>
                <p class="card-text">Curso:</p>
                <button type="button" class="btn btn-dark">Ver Amigo</button>
              </div>
            </div>
          </div>
        </div>
        <div class="card mb-3" style="max-width: 540px;">
          <div class="row no-gutters">
            <div class="col-md-4">
              <img src="img/profilepic3.jpg" class="card-img" alt="...">
            </div>
            <div class="col-md-8">
              <div class="card-body">
                <h5 class="card-title">Amigo</h5>
                <p class="card-text">Curso:</p>
                <button type="button" class="btn btn-dark">Ver Amigo</button>
              </div>
            </div>
          </div>
        </div>
        <div class="card mb-3" style="max-width: 540px;">
          <div class="row no-gutters">
            <div class="col-md-4">
              <img src="img/profilepic2.jpg" class="card-img" alt="...">
            </div>
            <div class="col-md-8">
              <div class="card-body">
                <h5 class="card-title">Amigo</h5>
                <p class="card-text">Curso:</p>
                <button type="button" class="btn btn-dark">Ver Amigo</button>
              </div>
            </div>
          </div>
        </div>
        <div class="card mb-3" style="max-width: 540px;">
          <div class="row no-gutters">
            <div class="col-md-4">
              <img src="img/profilepic3.jpg" class="card-img" alt="...">
            </div>
            <div class="col-md-8">
              <div class="card-body">
                <h5 class="card-title">Amigo</h5>
                <p class="card-text">Curso:</p>
                <button type="button" class="btn btn-dark">Ver Amigo</button>
              </div>
            </div>
          </div>
        </div>
        <div class="card mb-3" style="max-width: 540px;">
          <div class="row no-gutters">
            <div class="col-md-4">
              <img src="img/profilepic2.jpg" class="card-img" alt="...">
            </div>
            <div class="col-md-8">
              <div class="card-body">
                <h5 class="card-title">Amigo</h5>
                <p class="card-text">Curso:</p>
                <button type="button" class="btn btn-dark">Ver Amigo</button>
              </div>
            </div>
          </div>
        </div>
      </div>
      <footer class="col-12 -footer">
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
    </div>
  </body>
</html>
