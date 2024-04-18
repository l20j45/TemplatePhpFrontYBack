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
  headerAdmin();
  ?>
  <main class="flex-grow-1">
    <div class="container-lg">
      <div class="row d-flex flex-column">
        <div class="col col-md-8 mx-auto overflow-scroll">
          <?php
          if (isset($_GET['accion']) && $_GET['accion'] == 'listar') {
          ?>
            <h2 class="mt-5">Horario</h2>
            <table class="table mt-5">
              <thead class="thead-dark">
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">nombre Materia</th>
                  <th scope="col">Editar</th>
                <th scope="col">Borrar</th>
                </tr>
              </thead>
              <tbody>
                <?php
                include '../phpLibrary/mysqlConnect.php';
                $conn = OpenCon();

                $registros = mysqli_query($conn, "SELECT *
              FROM materia") or
                  die("Problemas en el select:" . mysqli_error($conn));

                while ($reg = mysqli_fetch_array($registros)) {

                  echo <<<EOT
                                    <tr>
                                    <th scope="row">{$reg['codigoMateria']}</th>
                                    <td>{$reg['nombreMateria']}</td>
                                    <td><a href="../phpLibrary/materiaControllerAdmin.php?accion=editar&codigo={$reg['codigoMateria']}" class="btn btn-warning text-white rounded">Editar</a>  </td>
                                    <td><a href="../phpLibrary/materiaControllerAdmin.php?accion=borrar&codigo={$reg['codigoMateria']}" class="btn btn-danger text-white rounded">Borrar</a></td>
                                  </tr>
EOT;
                }
                CloseCon($conn);
                ?>

              </tbody>
            </table>
          <?php
          } else {
          ?>
            <h2 class="mt-5">Registrar Materia</h2>
            <form class="mt-5" action="../phpLibrary/materiaControllerAdmin.php?accion=agregar" method="post">
              <div class="form-group">
                <label for="nombreMateria">Nombre de la materia:</label>
                <input type="nombreMateria" name="nombreMateria" class="form-control" id="nombreMateria" />
              </div>
 


              <button type="submit" name="agregar" class="btn btn-primary rounded mt-5">Submit</button>
            </form>
          <?php
          }
          ?>
        </div>

      </div>
    </div>
  </main>

  <?php
  footerAdmin();
  ?>
</body>

</html>