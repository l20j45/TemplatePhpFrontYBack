<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title></title>

  <script src="../build/js/bootstrap.min.js"></script>
  <script src="../build/js/bootstrap.bundle.min.js"></script>

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />

  <link rel="stylesheet" href="../build/css/app.css" />
</head>

<body class="d-flex flex-column min-vh-100 w-100">
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
                <li><a class="dropdown-item" href="#">Ver</a></li>
                <li>
                  <a class="dropdown-item" href="#">Editar</a>
                </li>
                <li><a class="dropdown-item" href="#">Borrar</a></li>

              </ul>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Dar de alta materias
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                <li><a class="dropdown-item" href="#">Ver</a></li>
                <li>
                  <a class="dropdown-item" href="#">Editar</a>
                </li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </header>
  <main class="flex-grow-1">
    <div class="container-lg">
      <div class="row d-flex flex-column">
        <div class="col-md-8 mx-auto">
          <h2 class="mt-5">Datos del Alumno</h2>

          <?php
          include '../phpLibrary/mysqlConnect.php';
          $conn = OpenCon();
          $codigo = 101;
          $registros = mysqli_query($conn, "select * from usuario where codigo = $codigo limit 1") or
            die("Problemas en el select:" . mysqli_error($conn));
          $resultado = $registros->fetch_assoc();
          if (isset($_GET['accion'])) {
            if ($_GET['accion']  == 'ver') {


              echo <<<EOT
              
              <p class="mt-5">Codigo: {$resultado['codigo']} </p>
              <p>Nombre: {$resultado['nombre']} {$resultado['apellidoPaterno']} {$resultado['apellidoMaterno']}</p>
              <p>Edad: {$resultado['edad']}</p>
              <p>Carrera: {$resultado['carrera']}</p>
              <p>Usuario: {$resultado['usuario']}</p>
EOT;
              CloseCon($conn);
            } else if ($_GET['accion']  == 'editar') {

              echo <<<EOT
              <form action="../phpLibrary/alumnoControllerNormal.php?accion=editar" method="post">
            <div class="form-group">
              <label for="codigo">Codigo:</label>
              <input type="codigo" name="codigo" value="{$resultado['codigo']}"  readonly="readonly" class="form-control" id="codigo" />
            </div>
            <div class="d-flex gap-3">
              <div class="form-group">
                <label for="nombre">nombre:</label>
                <input type="nombre" name="nombre" value="{$resultado['nombre']}" class="form-control" id="nombre" />
              </div>

              <div class="form-group">
                <label for="ApellidoPat">Apellido Paterno:</label>
                <input type="ApellidoPat" name="apellidoPat" value="{$resultado['apellidoPaterno']}" class="form-control" id="ApellidoPat" />
              </div>
              <div class="form-group">
                <label for="ApellidoMat">Apellido Materno:</label>
                <input type="ApellidoMat" name="apellidoMat" value="{$resultado['apellidoMaterno']}" class="form-control" id="ApellidoMat" />
              </div>
            </div>

            <div class="form-group">
              <label for="Edad">Edad:</label>
              <input type="Edad" name="edad" value="{$resultado['edad']}" class="form-control" id="Edad" />
            </div>
            <div class="form-group">
              <label for="Carrera">Carrera:</label>
              <input type="Carrera" name="carrera" disabled="disabled"  value="{$resultado['carrera']}" class="form-control" id="Carrera" />
            </div>
            <div class="form-group">
              <label for="Usuario">Usuario:</label>
              <input type="Usuario" name="usuario" value="{$resultado['usuario']}" class="form-control" id="Usuario" />
            </div>

            <button type="submit" class="btn btn-primary rounded mt-5">Enviar</button>
          </form>

          
EOT;
            }
          }

          ?>



        </div>


      </div>
    </div>
  </main>

  <footer class="footer mt-auto bg-primary d-flex flex-column align-items-center">
    <div class="container-xl h-auto">
      <div class="row">
        <div class="col-6 mx-auto text-center">
          <span class="fs-5 text-white fw-bold">Sistemas Mimika</span>
        </div>
      </div>
    </div>
  </footer>
</body>

</html>