<?php require_once('loader.php');
  if ($_POST["titulo"]&&$_POST["post"]) {
    $id = $consulta->read("id","usuarios",$db,'WHERE email = '."'".$userTest->getEmail()."'");
    $newPost=$userTest->postear($id[0]['id'],$_POST["titulo"],$_POST["post"]);
    $datosPost = "'".$newPost->getTitulo()."','".$newPost->getContenido()."','". $newPost->getUserId()."'";
    $datosTabla = "titulo,contenido,user_id";
    $consulta->create($db,"posts",$datosPost, $datosTabla);
    //limpia el array $_POST ya que sino al recargar la pagina para mostrar el post en inicio se vuelve a crear el posteo
    $_POST = array();
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
    <div class="container-fluid m-0 p-0 pt-5 d-flex flex-row flex-wrap -all">
      <?php include_once("partials/header2.php"); ?>
      <div class=" pt-4 d-flex flex-row flex-wrap">
        <div class="col-lg-3 m-3  p-0">
          <div class="position-fixed align-self-start col-lg-3 p-2 mt-2  d-flex flex-row border bg-light">
          <div class="w-25 p-1">
            <img class="w-100 rounded-circle border border-secondary" src="img/profilepic.jpg" alt="">
          </div>
          <div class="w-75 p-4">
            <h5>juan stroman</h5>
          </div>
        </div>
      </div>
        <div class="position-static col-lg-6 p-0 mt-4 m-3 bg-warning shadow">
          <form class="p-3 bg-light d-flex flex-column" action="" method="post">
              <h5>Comparte con nosotros</h5>
              <input type="text" name="titulo" value="" placeholder="Titulo del post">
              <textarea name="post" rows="5" cols=""></textarea>
              <button type="submit" class="w-25 mt-2 rounded py-2 botonJuan">Publicar</button>
          </form>
          <?php $losPosts=$consulta->read("*","posts",$db); ?>
          <?php foreach ($losPosts as $post):?>
            <section class="w-100 bg-light p-3 border-bottom border-secondary">
              <h6><?= $post['titulo'];?></h6>
              <article class="text-start"><?= $post['contenido'];?></article>
              <hr>
              <form class="" action="" method="post">
                <button type="button" class="bg-light" name="meGusta">Me Gusta!</button>
              </form>
            </section>
          <?php endforeach; ?>
        </div>
      </div>
      <?php include_once('partials/footer.php'); ?>
  </div>
  </body>
</html>
