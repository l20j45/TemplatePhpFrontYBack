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
  <?php
  include '../phpLibrary/layout.php';
  headerControllerAdmin();
  ?>
  <main class="flex-grow-1">
    <div class="container-lg">
      <div class="row d-flex flex-column">
        <div class="col col-md-8 mx-auto " style="overflow-y: scroll; overflow-x: auto;">
          <h2 class="mt-5">Datos del Alumnos</h2>
          <table class="table mt-5">
            <thead class="thead-dark">
              <tr>
                <th scope="col">#</th>
                <th scope="col">Nombre</th>
                <th scope="col">Carrera</th>
                <th scope="col">Usuario</th>
                <th scope="col">Editar</th>
                <th scope="col">Borrar</th>
              </tr>
            </thead>
            <tbody>
              <?php
              include '../phpLibrary/mysqlConnect.php';
              $conn = OpenCon();

              $registros = mysqli_query($conn, "select * from usuario;") or
                die("Problemas en el select:" . mysqli_error($conn));
              while ($reg = mysqli_fetch_array($registros)) {

                echo <<<EOT
                                    <tr>
                                    <th scope="row">{$reg['codigo']}</th>
                                    <td>{$reg['nombre']} {$reg['apellidoPaterno']} {$reg['apellidoMaterno']}</td>
                                    <td>{$reg['carrera']}</td>
                                    <td>@{$reg['usuario']}</td>
                                    <td><a href="../phpLibrary/alumnoControllerAdmin.php?accion=editar&codigo={$reg['codigo']}" class="btn btn-warning text-white rounded">Editar</a>  </td>
                                    <td><a href="../phpLibrary/alumnoControllerAdmin.php?accion=borrar&codigo={$reg['codigo']}" class="btn btn-danger text-white rounded">Borrar</a></td>
                                  </tr>
EOT;
              }
              CloseCon($conn);
              ?>
            </tbody>
          </table>
        </div>

      </div>
    </div>
  </main>
  <?php
  footerAdmin();
  ?>


</body>

</html>