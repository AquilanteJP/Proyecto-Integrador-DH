<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top py-1 shadow-sm">
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
    <div class="px-3">
      <a class="text-decoration-none text-secondary" href="#">Logout</a>
    </div>
    <?php else :?>
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
    <div class="w-50 text-right">
      <a class="text-decoration-none text-secondary"href="./registro.php">Registrate</a>
    </div>
    <?php endif;?>

</nav>
