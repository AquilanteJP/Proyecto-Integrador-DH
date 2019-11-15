<?php require_once('loader.php');
require_once('./helpers.php');
$sesion->verifSesion();
if(isset($_POST["id"])){
  $sesion->guardarSesionManual("idPost",$_POST["id"]);
}
/*if(isset($_POST["contenido"])){
  $contenido = $_POST["contenido"]; //Verifica que venga el contenido del post seleccionado desde el formulario en inicio mediante $_POST, lo asigna a $contenido
}*/
if (isset($_POST['editAceptado'])) { //Edición de post in-page
  $id = $_SESSION["idPost"];
  if (isset($_POST['titulo']) || $_POST['titulo'] !== "") {
    $consulta->update("posts","titulo",$_POST['titulo'],$id,$db);
  }
  if (isset($_POST['contenido']) || $_POST['contenido'] !== "") {
    $consulta->update("posts","contenido",$_POST['contenido'],$id,$db);
  }
  if (!isset($_POST['titulo'])||!isset($_POST['post'])){ //Condición por sí se ingresa Editar sin ingresar nada
    header("location:inicio.php");
  }
  $sesion->guardarSesionManual('editarPost',true); //Marcado en $_SESSION para que figure notificacion de edición exitosa al volver a inicio.php
  /*$_POST['editAceptado']=[]; //Limpieza de $_POST
  $_POST['id']=[];
  $_POST['contenido']=[];*/
  header("location:inicio.php");
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Editar post</title>
    <link href="https://fonts.googleapis.com/css?family=Montserrat|Open+Sans|Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/master.css">
    <script src="https://kit.fontawesome.com/64db3b546b.js"></script>
  </head>
  <body>
    <div class="container-fluid m-0 p-0 pt-3 d-flex flex-row flex-wrap -all">

        <?php include_once("partials/header2.php");?>
        <div class="mt-4 w-100 d-flex justify-content-center">
          <div class="col-lg-6 p-0 mt-5 m-3 w-100 bg-light shadow">

            <form class="p-3 d-flex flex-column" action="" method="post">
              <h5>Cambia el titulo de tu post aquí:</h5>
              <input type="text" name="titulo" value="" placeholder="Nuevo título (no más de 30 caracteres)">
              <hr>
              <h5>Cambia el contenido de tu post aquí:</h5>
              <textarea name="contenido" rows="5" cols="" placeholder="Nuevo contenido (no mas de 800 caracteres)"></textarea>
              <input type="hidden" id="editAceptado" name="editAceptado" value="true">
              <button type="submit" name="editAceptado" class="btn w-25 mt-2 btn-outline-warning">Editar</button>
              <button type="button" class="btn w-25 mt-2  btn-danger" name="editCancelado"><a href="inicio.php" class="text-decoration-none text-reset">Volver</a></button>

            </form>
          </div>
        </div>

      <?php include_once('partials/footer.php'); ?>
    </div>
  </body>
</html>
