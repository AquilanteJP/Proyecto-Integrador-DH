<?php require_once('loader.php');
require_once('./helpers.php');
$sesion->verifSesion();
  if ($_POST) {
    $id = $consulta->read("id","usuarios",$db,"email = '".$_SESSION["email"]."'");
    $newPost=Usuario::postear($id[0]['id'],$_POST["titulo"],$_POST["post"]);
    $datosPost = "'".$newPost->getTitulo()."','".$newPost->getContenido()."','". $newPost->getUserId()."'";
    $datosTabla = "titulo,contenido,user_id";
    $consulta->create($db,"posts",$datosPost, $datosTabla);
    //limpia el array $_POST ya que sino al recargar la pagina para mostrar el post en inicio se vuelve a crear el posteo
    header("location:inicio.php");
    //RUDIMENTARIO PERO FUNCIONAL

  }


?>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Inicio</title>
    <link href="https://fonts.googleapis.com/css?family=Montserrat|Open+Sans|Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/master.css">
    <script src="https://kit.fontawesome.com/64db3b546b.js"></script>
    <meta content="width=device-width, initial-scale=1" name="viewport"/>
  </head>
  <body>
    <div class="container-fluid m-0 p-0 pt-3 d-flex flex-row flex-wrap -all">
      <?php include_once("partials/header2.php"); ?>
      <div class="w-100 pt-5 d-flex flex-row flex-wrap">
        <div class="col-lg-3 m-3 mt-1 p-0">
          <div class="position-fixed align-self-start col-lg-3 p-2 mt-2  d-flex flex-row border bg-light">
            <div class="w-25 p-1">
              <img class="w-100 rounded-circle border border-secondary" src="<?= isset($_SESSION['foto_usuario'])?"profilePics/".$_SESSION['foto_usuario']:(isset($_COOKIE['foto_usuario'])?"profilePics/".$_COOKIE['foto_usuario']:"profilePics/generic.jpg") ;?>" alt="">
            </div>
            <div class="w-75 p-4">
              <h5><?=isset($_SESSION['nombres'])?$_SESSION['nombres']:$_COOKIE['nombres']?></h5>
            </div>
          </div>
        </div>
        <div class="position-static col-lg-6 p-0 mt-4 m-3 w-75 shadow">
          <form class="p-3 bg-light d-flex flex-column" action="" method="post">
              <h5>Comparte con nosotros</h5>
              <input type="text" name="titulo" value="" placeholder="Titulo del post">
              <textarea name="post" rows="5" cols=""></textarea>
              <button type="submit" class="w-25 mt-2 rounded py-2 botonJuan">Publicar</button>
          </form>
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
          </section>
          <?php endforeach; ?>
          <?php endif; ?>
        </div>
      </div>
      <?php include_once('partials/footer.php'); ?>
    </div>
  </body>
</html>
