<?php require_once('loader.php');
require_once('./helpers.php');
$sesion->verifSesion();
if (isset($_POST['crearPost'])) { //Creacion de post in-page
  $id = $consulta->read("id","usuarios",$db,"email = '".$_SESSION["email"]."'");
  $newPost=Usuario::postear($id[0]['id'],$_POST["titulo"],$_POST["post"]);
  $datosPost = "'".$newPost->getTitulo()."','".$newPost->getContenido()."','". $newPost->getUserId()."','"."0"."'";
  $datosTabla = "titulo,contenido,user_id,posts.like";
  $consulta->create($db,"posts",$datosPost, $datosTabla);
  $sesion->guardarSesionManual('crearPost',true); //Marcado en $_SESSION para que figure notificacion de creación exitosa al volver a cargar inicio.php
  $_POST['crearPost']=[]; //Limpieza de $_POST
  //limpia el array $_POST ya que sino al recargar la pagina para mostrar el post en inicio se vuelve a crear el posteo
  header("location:inicio.php");
  //RUDIMENTARIO PERO FUNCIONAL
  }
if (isset($_POST["idPost"])) {
  Usuario::darMg($_POST["idPost"],$db);
  header("location:inicio.php");
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
            <input type="text" name="titulo" value="" placeholder="Titulo del post (no más de 30 caracteres)">
            <hr>
            <textarea name="post" rows="5" cols="" placeholder="Contenido (no mas de 800 caracteres)"></textarea>
            <button type="submit" name="crearPost" class="w-25 mt-2 rounded py-2 botonJuan">Publicar</button>
          </form>
          <?php if (isset($_SESSION["crearPost"]) && $_SESSION["crearPost"]===true):?>
          <div class="w-80 alert alert-primary">
            <p class="text-center">Post creado exitosamente.</p>
          </div>
          <?php $_SESSION["crearPost"]=false; //Flag creación post uncheckeada?>
          <?php endif; ?>

          <?php if (isset($_SESSION["editarPost"]) && $_SESSION["editarPost"]===true):?>
          <div class="w-50 m-3 center-block alert alert-primary">
            <p class="text-center">Post editado exitosamente.</p>
          </div>
          <?php $_SESSION["editarPost"]=false; //Flag edición post uncheckeada?>
          <?php endif; ?>

          <?php if (isset($_SESSION["borrarPost"]) && $_SESSION["borrarPost"]===true):?>
          <div class="w-80 alert alert-primary">
            <p class="text-center">Post borrado exitosamente.</p>
          </div>
          <?php $_SESSION["borrarPost"]=false; //Flag borrado post uncheckeada?>
          <?php endif; ?>

          <?php $listaPosts=$consulta->read("posts.id, posts.titulo, posts.like, posts.contenido, user_id, usuarios.nombres","posts, usuarios",$db,"user_id = usuarios.id order by posts.id desc");?>
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
      <?php include_once('partials/footer.php'); ?>
    </div>
  </body>
</html>
