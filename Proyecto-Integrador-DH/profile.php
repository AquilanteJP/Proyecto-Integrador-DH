<?php
/*session_start();
require_once("helpers.php");
if(empty($_SESSION)){ //Si no se inicio una sesión mediante guardarSesion(), se es redirigido a registro.php
  if(!isset($_COOKIE['firstName'])){//si no hay $_SESSION verifica que no exista una cookie para cargar el perfil
    header("location:logIn.php");
  }
} /*else {
  dd($_SESSION); //Para checkear errores
}*/
$_SESSION['email'] = "juangrum@gmail.com";
?>

<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Mi Perfil</title>
    <link href="https://fonts.googleapis.com/css?family=Montserrat|Open+Sans|Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/master.css">
    <script src="https://kit.fontawesome.com/64db3b546b.js"></script>
    <meta content="width=device-width, initial-scale=1" name="viewport"/>
  </head>
  <body>
    <div class="container-fluid m-0 p-0 pt-5 d-flex flex-row flex-wrap -all">
      <?php include_once("partials/header2.php"); ?>
      <div class="container-fluid d-flex flex-row">
        <div class="border border-primary rounded col-12 col-md-3 mt-5  mb-lg-3 shadow -profile">
          <img src="<?= isset($_SESSION['avatar'])?"profilePics/".$_SESSION['avatar']:(isset($_COOKIE['avatar'])?"profilePics/".$_COOKIE['avatar']:"profilePics/generic.jpg") ;?>?>" alt="fotoperfil" class="-profilePic">
          <h2 class="text-center font-weight-bold -nombre "><?=isset($_SESSION['firstName'])?$_SESSION['firstName']:$_COOKIE['firstName']?></h2>
          <hr>
          <ul>
            <li><h6 class="-fecha">Se unió en Septiembre 2019</h6></li>
            <li><h6 class="-rol">Estudiante</h6></li>
            <li><h6 class="-proyectos"><a href=#>3 proyectos</a></h6></li>
            <li><h6 class="-información"><a href=#>Mas información</a></h6></li>
          </ul>
          <hr>
          <h6 class="text-center font-weight-bold">Capacitaciones:</h6>
          <div class="-capacitaciones">
            <span title="HTML"><i class="fab fa-html5 fa-3x -caphtml5"></i></span>
            <span title="CSS"><i class="fab fa-css3-alt fa-3x -capcss3"></i></span>
            <span title="PHP"><i class="fab fa-php fa-3x -capphp"></i></span>
          </div>
          <hr>
          <h6 class="text-center font-weight-bold">Contacto:</h6>
          <div class="-contacto">
            <a href="http:facebook.com"><span title="Facebook"><i class="fab fa-facebook-square fa-3x -contfb"></i></span></a>
            <a href="http:github.com"><span title="Github"><i class="fab fa-github fa-3x -contgh"></i></span></a>
            <a href="http:stackoverflow.com"><span title="stackoverflow"><i class="fab fa-stack-overflow fa-3x -contstov"></i></span></a>
          </div>
          <hr>
          <button type="button" class="btn btn-lg btn-primary -botonAmigo" disabled name="button">(¡Este sos vos!)</button>
        </div>
        <br>
        <div class="col-12 col-md-5 mt-5 mb-lg-3 -posts">
         <div class="-enterPost shadow border border-danger rounded">
           <br>
           <h5 class="text-center font-weight-bold">¿Algo nuevo que contar?</h5>
           <form action="" method="post">
            <textarea class="-textPost" placeholder="Escribí aca..." name="comments" ></textarea>
            <input  class="btn btn-lg -postear text-white" type="submit" name="Postear" value="Postear">
           </form>
         </div>
         <br>
         <div class="-misPosts shadow border border-danger rounded">
           <br>
           <h5 class="text-center font-weight-bold">Tus ultimos posts</h5>
           <hr>
           <section class="-post">
             <article class="">
               <div class="-datosPost">
                <div class="-datosPostPic">
                  <img src="img/profilepic.jpg" alt="fotoperfil" class="-profilePicSmall">
                </div>
                <div class="-datosPostIdentidad">
                  <p class=""><span class="-identidadPosteo">Pancho Villa</span><br><span class="-fechaPosteo">20/09/19, 05:11 pm</span></p>
                </div>
               </div>
               <div class="-postContenido">
                <p>Me encanta lorem ipsum porque sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </p>
               </div>
               <div>
                <p class="-reacciones"> <a href="#">2 comentarios</a>  <a href="#">1 like</a></p>
               </div>
             </article>
             <hr>
             <article class="">
               <div class="-datosPost">
                <div class="-datosPostPic">
                  <img src="img/profilepic.jpg" alt="fotoperfil" class="-profilePicSmall">
                </div>
                <div class="-datosPostIdentidad">
                  <p class=""><span class="-identidadPosteo">Pancho Villa</span><br><span class="-fechaPosteo">10/09/19, 11:10 am</span></p>
                </div>
               </div>
               <i></i>
               <div>
                <h6 class="-newProject">Nuevo proyecto</h6>
                <i class="fas fa-code fa-5x -projectIcon"></i>
                <br>
                <h6 class="-newProjectName">Proyecto Integrador (red social)</h6>
               </div>
               <br>
               <div>
                <p class="-reacciones"> <a href="#">2 comentarios</a>  <a href="#">1 like</a></p>
               </div>
             </article>
           </section>
         </div>
        </div>
        <div class="-notificaciones border border-success col-12 col-md-4 mt-5 mb-lg-3 shadow rounded">
          <br>
          <h5 class="text-center font-weight-bold">¿Que cuentan los demás?</h5>
          <hr>
          <article class="">
            <div class="-notificacion">
             <div class="-datosNotifPic">
               <span title="Vancho Pilla | 17/09/19, 4:03 pm"><img src="img/profilepic2.jpg" alt="fotoperfil" class="-profilePicSmall"></span>
             </div>
             <div class="-notifContenido">
              <p>Me gusta mucho programar, si, si, me gusta mucho programar.</p>
             </div>
            </div>
            <div>
             <p class="-reacciones"> <a href="#">2 comentarios</a>  <a href="#">1 like</a></p>
            </div>
          </article>
          <hr>
          <article class="">
            <div class="-notificacion">
             <div class="-datosNotifPic">
               <span title="Vancho Pilla | 17/09/19, 4:03 pm"><img src="img/profilepic2.jpg" alt="fotoperfil" class="-profilePicSmall"></span>
             </div>
             <div class="-notifContenido">
              <p>Hay 10 tipos de personas en el mundo... los que saben binario, los que no, los que no se esperaban un chiste en base 4, y los que quieren alargar este parrafo para ver como queda comparado con el otro que tiene menos texto hola mama </p>
             </div>
            </div>
            <div>
             <p class="-reacciones"> <a href="#">2 comentarios</a>  <a href="#">1 like</a></p>
            </div>
          </article>
          <hr>
          <article class="-notifPrivada">
            <div class="-notificacion">
             <div class="-datosNotifPic">
               <span title="Angel Daniel Fuentes | 24/06/19, 7:50 pm"><img src="img/profilepic3.jpg" alt="fotoperfil" class="-profilePicSmall"></span>
             </div>
             <div class="-notifContenido">
              <h6 class="-newProject">Inscripción a curso aceptada</h6>
              <i class="fas fa-chalkboard fa-3x -projectIcon"></i>
              <br>
              <h6 class="-newProjectName">Curso Fullstack</h6>
             </div>
            </div>
          </article>
          <hr>
          <article class="">
            <div class="-notificacion">
             <div class="-datosNotifPic">
               <span title="Vancho Pilla | 17/09/19, 4:03 pm"><img src="img/profilepic2.jpg" alt="fotoperfil" class="-profilePicSmall"></span>
             </div>
             <div class="-notifContenido">
              <p>Me gusta mucho programar, si, si, me gusta mucho programar.</p>
             </div>
            </div>
            <div>
             <p class="-reacciones"> <a href="#">2 comentarios</a>  <a href="#">1 like</a></p>
            </div>
          </article>
        </div>
        <br>
        </div>
        <?php include_once('partials/footer.php'); ?>


    </div>
  </body>
</html>
