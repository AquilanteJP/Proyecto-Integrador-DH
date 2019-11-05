<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top py-0 shadow-sm">
  <a class="navbar-brand py-0" href="./logIn.php">
    <img src="./img/logo-DH.png" width="225" height="70" alt="">
  </a>
  <div class="d-flex flex-row justify-content-end">
    <?php if(isset($_SESSION["email"])) :?>
    <div class="px-3">
      <a class="text-decoration-none text-secondary" href="#">Inicio</a>
    </div>
    <div class="px-3">
      <a class="text-decoration-none text-secondary" href="#">Mi Perfil</a>
    </div>
    <div class="px-3">
      <a class="text-decoration-none text-secondary" href="#">Mis Cursos</a>
    </div>
    <div class="px-3">
      <a class="text-decoration-none text-secondary" href="#">Mis Amigos</a>
    </div>
  </div>
  <div class="px-3  d-flex flex-row justify-content-end flex-grow-1">
    <div class="pl-5">
      <form class="form-inline mb-0">
        <input class="col-form-label-sm form-control mr-sm-2" type="text" placeholder="Usuario,Curso..." aria-label="">
        <button type="submit" class="m-auto botonJuan rounded py-1 d-flex flex-wrap justify-content-center">Buscar</button>
      </form>
    </div>
    <div class="pl-3 pt-1">
      <a class="text-decoration-none text-secondary" href="logOut.php">Logout</a>
    </div>
  </div>
  <?php else :?>
  <div class="d-flex flex-row justify-content-end">
    <div class="px-3">
      <a class="text-decoration-none text-secondary" href="#">Preguntas</a>
    </div>
    <div class="px-3">
      <a class="text-decoration-none text-secondary" href="#">Nosotros</a>
    </div>
    <div class="px-3">
      <a class="text-decoration-none text-secondary" href="#">Contacto</a>
    </div>
  </div>
  <div class="w-75">
    <div class="w-50 text-right">
      <a class="text-decoration-none text-secondary"href="./registro.php">Registrate</a>
    </div>
  </div>

    <?php endif;?>

</nav>
