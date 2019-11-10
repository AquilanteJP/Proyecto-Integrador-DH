<?php
require_once('loader.php');
$sesion->verifSesion();
/*
require_once("helpers.php");
if(empty($_SESSION)){ //Si no se inicio una sesión mediante guardarSesion(), se es redirigido a registro.php
  if(!isset($_COOKIE['firstName'])){//si no hay $_SESSION verifica que no exista una cookie para cargar el perfil

  }
} /*else {
  dd($_SESSION); //Para checkear errores
}*/
//$_SESSION['email'] = "juangrum@gmail.com";
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
          <img src="<?= isset($_SESSION['foto_usuario'])?"profilePics/".$_SESSION['foto_usuario']:(isset($_COOKIE['foto_usuario'])?"profilePics/".$_COOKIE['foto_usuario']:"profilePics/generic.jpg") ;?>" alt="fotoperfil" class="-profilePic">
          <h2 class="text-center font-weight-bold -nombre "><?=isset($_SESSION['nombres'])?$_SESSION['nombres']:$_COOKIE['nombres']?></h2>
          <hr>
          <ul>
            <li><h6 class="-fecha">Se unió en Septiembre 2019</h6></li>
            <li><h6 class="-rol"><?=isset($_SESSION['tipo_registro'])?$_SESSION['tipo_registro']:$_COOKIE['tipo_registro']?></h6></li>
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

         <div class="-misPosts shadow border border-danger rounded">
           <br>
           <h5 class="text-center font-weight-bold">Tus ultimos posts</h5>
           <hr>
           <?php //$losPosts=$consulta->read("posts.titulo, posts.like, posts.contenido, usuarios.nombres","posts, usuarios",$db,"user_id = ".$_SESSION['id']." order by posts.id desc"); ?>
           <?php $losPosts=$consulta->read("posts.titulo, posts.like, posts.contenido, usuarios.nombres","posts, usuarios",$db,"user_id = usuarios.id order by posts.id desc"); ?>
           <?php if ($losPosts==null): ?>
           <section class="w-100 bg-light p-3 border-bottom border-secondary">
             <p class="text-center">Todavia nadie publico nada! Se el primero.</p>
           </section>
           <?php else: ?>
           <?php foreach ($losPosts as $post):?>
           <section class="w-100 bg-light p-3 border-bottom border-secondary">
             <h6><strong><?=$post['nombres']?></strong></h6>
             <em><?=$post['titulo'];?></em>
             <article class=""><p class="text-break"><?= $post['contenido'];?></p></article>
             <hr>
             <form class="" action="" method="post">
               <button type="button" class="bg-light" name="meGusta">Me Gusta!</button>
             </form>
             <form class="" action="" method="post">
               <button type="button" class="bg-light" name="Editar"></button>
             </form>
           </section>
           <?php endforeach; ?>
           <?php endif; ?>
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
