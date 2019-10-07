<nav class="navbar navbar-expand-sm navbar-dark row -navbar">
  <div class="-logocontainer">
    <img src="img/logo-DH.png" alt="logo" class="dh2">
  </div>
  <div class="-linkscontainer">
    <ul class="-links">
      <?php if(isset($_SESSION["email"])) :?>
        <li class="nav-item -link">
          <button type="button" class="btn btn-link" name="button"><i class="fas fa-home"></i><a href="profile.php">Perfil</a></button>
        </li>
        <li class="nav-item -link">
          <button type="button" class="btn btn-link" name="button"><i class="fas fa-code"></i> Mis proyectos</button>
        </li>
        <li class="nav-item -link">
          <button type="button" class="btn btn-link" name="button"><i class="fas fa-user-friends"></i><a href="misAmigos.php">Mis amigos</a></button>
        </li>
        <li class="nav-item -link">
          <button type="button" class="btn btn-link" name="button"><i class="fas fa-chalkboard"></i> Mis cursos</button>
        </li>
        <li class="nav-item -link">
         <button type="button" class="btn btn-link" name="button"><i class="fas fa-cogs"></i> Opciones</button>
        </li>
        <li class="nav-item -link">
         <button type="button" class="btn btn-link" name="button"><a href="logOut.php"><i class="fas fa-sign-out-alt"></i> Logout</a></button>
        </li>
      <?php else :?>
        <li class="nav-item -link">
          <button type="button" class="btn btn-link" name="button"><i class="fas fa-code"></i><a href="#preguntas">Preguntas Frecuentes</a></button>
        </li>
        <li class="nav-item -link">
          <button type="button" class="btn btn-link" name="button"><i class="fas fa-user-friends"></i><a href="#nosotros">Nosotros</a></button>
        </li>
        <li class="nav-item -link">
          <button type="button" class="btn btn-link" name="button"><i class="fas fa-chalkboard"></i><a href="#contacto">Contacto</a></button>
        </li>
        <li class="nav-item -link">
          <button type="button" class="btn btn-link" name="button"><i class="fas fa-user"></i><a href="registro.php">Registrate</a></button>
        </li>
      </ul>
      <?php endif;?>
    </ul>
  </div>
</nav>
