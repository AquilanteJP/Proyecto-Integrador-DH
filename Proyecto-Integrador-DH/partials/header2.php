<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top py-1 shadow">
  <a class="navbar-brand py-0" href="#">
    <img src="./img/logo-DH.png" width="225" height="70" alt="">
  </a>
  <div class="d-flex flex-row justify-content-end">
    <?php if(isset($_SESSION["email"])) :?>
    <div class="px-3">
      <a class="opcionesNav" href="#">Inicio</a>
    </div>
    <div class="px-3">
      <a class="opcionesNav" href="#">Mi Perfil</a>
    </div>
    <div class="px-3">
      <a class="opcionesNav" href="#">Mis Cursos</a>
    </div>
    <div class="px-3">
      <a class="opcionesNav" href="#">Mis Amigos</a>
    </div>
    <div class="px-3">
      <a class="opcionesNav" href="#">Logout</a>
    </div>
    <?php else :?>
      <div class="px-3">
        <a class="opcionesNav" href="#">Preguntas</a>
      </div>
      <div class="px-3">
        <a class="opcionesNav" href="#">Nosotros</a>
      </div>
      <div class="px-3">
        <a class="opcionesNav" href="#">Contacto</a>
      </div>
      <?php endif;?>
  </div>
</nav>
