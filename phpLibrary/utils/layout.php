<?php
function headerAdmin()
{
    echo <<<EOT
    <header>
      <nav class="navbar navbar-expand-lg navbar-light bg-primary">
        <div class="container-fluid">
          <a class="navbar-brand text-white fw-bold" href="#">MiniSiiau</a>
          <button
            class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarNavDropdown"
            aria-controls="navbarNavDropdown"
            aria-expanded="false"
            aria-label="Toggle navigation"
          >
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
              <li class="nav-item dropdown">
                <a
                  class="nav-link dropdown-toggle text-white"
                  href="#"
                  id="navbarDropdownMenuLink"
                  role="button"
                  data-bs-toggle="dropdown"
                  aria-expanded="false"
                >
                  Alumno
                </a>
                <ul
                  class="dropdown-menu"
                  aria-labelledby="navbarDropdownMenuLink"
                >
                  <li><a class="dropdown-item" href="./AlumnoAdmin.php?accion=listar">Ver</a></li>
                </ul>
              </li>
              <li class="nav-item dropdown">
                <a
                  class="nav-link dropdown-toggle text-white"
                  href="#"
                  id="navbarDropdownMenuLink"
                  role="button"
                  data-bs-toggle="dropdown"
                  aria-expanded="false"
                >
                  Profesores
                </a>
                <ul
                  class="dropdown-menu"
                  aria-labelledby="navbarDropdownMenuLink"
                >
                  <li><a class="dropdown-item" href="./ProfesorAdmin.php?accion=listar">Ver</a></li>
                  <li>
                    <a class="dropdown-item" href="./ProfesorAdmin.php">Agregar</a>
                  </li>
                </ul>
              </li>
              <li class="nav-item dropdown">
                <a
                  class="nav-link dropdown-toggle text-white"
                  href="#"
                  id="navbarDropdownMenuLink"
                  role="button"
                  data-bs-toggle="dropdown"
                  aria-expanded="false"
                >
                  Materia
                </a>
                <ul
                  class="dropdown-menu"
                  aria-labelledby="navbarDropdownMenuLink"
                >
                  <li><a class="dropdown-item" href="./MateriaAdmin.php?accion=listar">Ver</a></li>
                  <li>
                    <a class="dropdown-item" href="./MateriaAdmin.php">Agregar</a>
                  </li>

                </ul>
              </li>
              <li class="nav-item dropdown">
              <a
                class="nav-link dropdown-toggle text-white"
                href="#"
                id="navbarDropdownMenuLink"
                role="button"
                data-bs-toggle="dropdown"
                aria-expanded="false"
              >
                Oferta Academica
              </a>
              <ul
                class="dropdown-menu"
                aria-labelledby="navbarDropdownMenuLink"
              >
                <li><a class="dropdown-item" href="./OfertaAdmin.php?accion=listar">Ver</a></li>
                <li>
                  <a class="dropdown-item" href="./OfertaAdmin.php">Agregar</a>
                </li>

              </ul>
            </li>
              
            </ul>
          </div>
        </div>
      </nav>
    </header>
EOT;
}

function headerControllerAdmin()
{
    echo <<<EOT
    <header>
      <nav class="navbar navbar-expand-lg navbar-light bg-primary">
        <div class="container-fluid">
          <a class="navbar-brand text-white fw-bold" href="#">MiniSiiau</a>
          <button
            class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarNavDropdown"
            aria-controls="navbarNavDropdown"
            aria-expanded="false"
            aria-label="Toggle navigation"
          >
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
              <li class="nav-item dropdown">
                <a
                  class="nav-link dropdown-toggle text-white"
                  href="#"
                  id="navbarDropdownMenuLink"
                  role="button"
                  data-bs-toggle="dropdown"
                  aria-expanded="false"
                >
                  Alumno
                </a>
                <ul
                  class="dropdown-menu"
                  aria-labelledby="navbarDropdownMenuLink"
                >
                  <li><a class="dropdown-item" href="../../Components/Admin/AlumnoAdmin.php?accion=listar">Ver</a></li>
                </ul>
              </li>
              <li class="nav-item dropdown">
                <a
                  class="nav-link dropdown-toggle text-white"
                  href="#"
                  id="navbarDropdownMenuLink"
                  role="button"
                  data-bs-toggle="dropdown"
                  aria-expanded="false"
                >
                  Profesores
                </a>
                <ul
                  class="dropdown-menu"
                  aria-labelledby="navbarDropdownMenuLink"
                >
                  <li><a class="dropdown-item" href="../../Components/Admin/ProfesorAdmin.php?accion=listar">Ver</a></li>
                  <li>
                    <a class="dropdown-item" href="../../Components/Admin/ProfesorAdmin.php">Agregar</a>
                  </li>
                </ul>
              </li>
              <li class="nav-item dropdown">
                <a
                  class="nav-link dropdown-toggle text-white"
                  href="#"
                  id="navbarDropdownMenuLink"
                  role="button"
                  data-bs-toggle="dropdown"
                  aria-expanded="false"
                >
                  Materia
                </a>
                <ul
                  class="dropdown-menu"
                  aria-labelledby="navbarDropdownMenuLink"
                >
                  <li><a class="dropdown-item" href="../../Components/Admin/MateriaAdmin.php?accion=listar">Ver</a></li>
                  <li>
                    <a class="dropdown-item" href="../../Components/Admin/MateriaAdmin.php">Agregar</a>
                  </li>

                </ul>
              </li>
              <li class="nav-item dropdown">
              <a
                class="nav-link dropdown-toggle text-white"
                href="#"
                id="navbarDropdownMenuLink"
                role="button"
                data-bs-toggle="dropdown"
                aria-expanded="false"
              >
                Oferta Academica
              </a>
              <ul
                class="dropdown-menu"
                aria-labelledby="navbarDropdownMenuLink"
              >
                <li><a class="dropdown-item" href="../../Components/Admin/OfertaAdmin.php?accion=listar">Ver</a></li>
                <li>
                  <a class="dropdown-item" href="../../Components/Admin/OfertaAdmin.php">Agregar</a>
                </li>

              </ul>
            </li>
              
            </ul>
            <a href="../../Components/logout.php" class="text white ms-3 btn btn-primary">Cerrar sesion</a>
          </div>
        </div>
      </nav>
    </header>
EOT;
}


function headerControllerNormal()
{
    echo <<<EOT
    <header>
    <nav class="navbar navbar-expand-lg navbar-light bg-primary">
      <div class="container-fluid">
        <a class="navbar-brand text-white fw-bold" href="#">MiniSiiau</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
          <ul class="navbar-nav">
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Alumno
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                <li><a class="dropdown-item" href="./AlumnoNormal.php?accion=ver">Ver</a></li>
                <li>
                  <a class="dropdown-item" href="./AlumnoNormal.php?accion=editar">Editar</a>
                </li>
                

              </ul>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Dar de alta materias
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                <li><a class="dropdown-item" href="./horarioNormal.php?accion=listar">Ver</a></li>
                <li>
                  <a class="dropdown-item" href="./horarioNormal.php">Editar</a>
                </li>
              </ul>
            </li>
          </ul>
          <a href="../../Components/logout.php" class="text white ms-3 btn btn-primary">Cerrar sesion</a>
        </div>
      </div>
    </nav>
  </header>
EOT;
}

function footerAdmin()
{
    echo <<<EOT
    <footer class="footer mt-auto bg-primary d-flex flex-column align-items-center">
    <div class="container-xl h-auto">
      <div class="row">
        <div class="col-6 mx-auto text-center">
          <span class="fs-5 text-white fw-bold">Sistemas Mimika</span>
        </div>
      </div>
    </div>
  </footer>
EOT;
}
?>