<?php
require_once('loader.php');
$sesion->verifSesion();
if (isset($_POST["idPost"])) {
  Usuario::darMg($_POST["idPost"],$db);
  header("location:profile.php");
}

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
        <div class="border border-primary col-12 col-md-3 mt-5 vh-25 mb-lg-3 shadow -profile">
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
           <?php $listaPosts=$consulta->read("posts.id, posts.titulo, posts.like, posts.contenido, user_id","posts",$db,"user_id = '".$_SESSION['id']."' order by posts.id desc");?>
           <?php if ($listaPosts==null): ?>
           <section class="w-100 bg-light p-3 border-bottom border-secondary">
             <p class="text-center">Todavia nadie publico nada! Se el primero.</p>
           </section>
           <?php else: ?>
           <?php foreach ($listaPosts as $post):?>
           <section class="w-100 bg-light p-3 border-bottom border-secondary">
             <h6><strong><?=$_SESSION['nombres']?></strong></h6>
             <em><?=$post['titulo'];?></em>
             <article class=""><p class="text-break"><?= $post['contenido'];?></p></article>
             <hr>
             <article class="mb-1"><small>
               <?php if ($post['like']== "0"){
                       echo "A nadie le gusta esto";
                     } elseif ($post['like']== "1"){
                       echo "A ".$post['like']." persona le gusta esto";
                     } else{
                       echo "A ".$post['like']." personas le gusta esto";
                     }
               ?>
             </small></article>
             <div class="row no-gutters">
               <div class="col-sm-3">
                 <form class="" action="" method="post">
                   <input type="hidden" name="idPost" value="<?=$post['id']?>">
                   <button type="submit" class="btn btn-outline-primary" name="">Me Gusta!</button>
                 </form>
               </div>
               <?php if ($post['user_id']==$_SESSION['id']): ?>
                 <div class="col-sm-2">
                   <form class="" action="editarPost.php" method="post">
                     <input type="hidden" id="id" name="id" value="<?=$post['id']?>">
                     <button type="submit" class="btn btn-outline-warning" name="editar=<?=$post['id']?>"><i class="fas fa-pen"></i></button>
                   </form>
                 </div>
                 <div class="col-sm-2">
                   <form class="" action="eliminarPost.php" method="post">
                     <input type="hidden" id="id" name="id" value="<?=$post['id']?>">
                     <button type="submit" class="btn btn-outline-danger" name="borrar=<?=$post['id']?>"><i class="fas fa-trash-alt"></i></button>
                   </form>
                 </div>
               <?php endif; ?>
             </div>
           </section>
           <?php endforeach; ?>
           <?php endif; ?>
         </div>
        </div>
        <div class="-notificaciones border border-success col-12 col-md-4 mt-5 mb-lg-3 shadow rounded">
          <br>
          <h5 class="text-center font-weight-bold">Lo que cuentan los demas</h5>
          <hr>
          <?php $listaPosts=$consulta->read("posts.id, posts.titulo, posts.like, posts.contenido, user_id, usuarios.nombres","posts, usuarios",$db,"user_id = usuarios.id and user_id !='".$_SESSION['id']."'");?>
          <?php if ($listaPosts==null): ?>
          <section class="w-100 bg-light p-3 border-bottom border-secondary">
            <p class="text-center">Todavia nadie publico nada! Se el primero.</p>
          </section>
          <?php else: ?>
          <?php foreach ($listaPosts as $post):?>
          <section class="w-100 bg-light p-3 border-bottom border-secondary">
            <h6><strong><?=$post['nombres']?></strong></h6>
            <em><?=$post['titulo'];?></em>
            <article class=""><p class="text-break"><?= $post['contenido'];?></p></article>
            <hr>
            <article class="mb-1"><small>
              <?php if ($post['like']== "0"){
                      echo "A nadie le gusta esto";
                    } elseif ($post['like']== "1"){
                      echo "A ".$post['like']." persona le gusta esto";
                    } else{
                      echo "A ".$post['like']." personas le gusta esto";
                    }
              ?>
            </small></article>
            <div class="row no-gutters">
              <div class="col-sm-3">
                <form class="" action="" method="post">
                  <input type="hidden"  name="idPost" value="<?=$post['id']?>">
                  <button type="submit" class="btn btn-outline-primary" name="">Me Gusta!</button>
                </form>
              </div>
            </div>
          </section>
          <?php endforeach; ?>
          <?php endif; ?>
        </div>
        <br>
        </div>
        <?php include_once('partials/footer.php'); ?>


    </div>
  </body>
</html>
