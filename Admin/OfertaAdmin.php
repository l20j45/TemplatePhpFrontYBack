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
                <th scope="col">NRC</th>
                <th scope="col">nombre Materia</th>
                <th scope="col">Horario</th>
                <th scope="col">Dia 1</th>
                <th scope="col">Dia 2</th>
                <th scope="col">Nombre Profesor</th>
              </tr>
            </thead>
            <tbody>
              <?php
              include '../phpLibrary/mysqlConnect.php';
              $conn = OpenCon();

              $registros = mysqli_query($conn, "SELECT m.codigoMateria,pm.nrc, m.nombreMateria,pm.nrc, pm.Horario,pm.Dia1,pm.Dia2, CONCAT(p.nombre,' ', p.apellidoPaterno,' ',p.apellidoMaterno) AS profesor
              FROM materia m 
              INNER JOIN profesormateria pm ON pm.codigoMateria = m.codigoMateria
              INNER JOIN profesor p ON p.codigo = pm.codigoProfesor;") or
                die("Problemas en el select:" . mysqli_error($conn));

              while ($reg = mysqli_fetch_array($registros)) {

                echo <<<EOT
                                    <tr>
                                    <th scope="row">{$reg['codigoMateria']}</th>
                                    <td>{$reg['nrc']}</td>
                                    <td>{$reg['nombreMateria']}</td>
                                    <td>{$reg['Horario']}</td>
                                    <td>{$reg['Dia1']}</td>
                                    <td>{$reg['Dia2']}</td>
                                    <td>{$reg['profesor']}</td>
                                    <td><a href="../phpLibrary/alumnoControllerAdmin.php?accion=editar&codigo={$reg['nrc']}" class="btn btn-warning text-white rounded">Editar</a>  </td>
                                    <td><a href="../phpLibrary/alumnoControllerAdmin.php?accion=borrar&codigo={$reg['nrc']}" class="btn btn-danger text-white rounded">Borrar</a></td>
                                  </tr>
EOT;
              }
              CloseCon($conn);
              ?>

            </tbody>
          </table>
          <?php
          }
          else {
          ?>
          <h2 class="mt-5">Registrar Materia</h2>
          <form class="mt-5" action="?" method="post">
                            <div class="form-group">
                            <label for="codigo">Codigo:</label>
                            <input type="codigo" name="codigo"  class="form-control" id="codigo" />
                        </div>
                        <div class="d-flex gap-3">
                            <div class="form-group">
                                <label for="nombre">nombre:</label>
                                <input type="nombre" name="nombre"   class="form-control" id="nombre" />
                            </div>

                            <div class="form-group">
                                <label for="ApellidoPat">Apellido Paterno:</label>
                                <input type="ApellidoPat" name="apellidoPat"  class="form-control" id="ApellidoPat" />
                            </div>
                            <div class="form-group">
                                <label for="ApellidoMat">Apellido Materno:</label>
                                <input type="ApellidoMat" name="apellidoMat"  class="form-control" id="ApellidoMat" />
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="Edad">Edad:</label>
                            <input type="Edad" name="edad"  class="form-control" id="Edad" />
                        </div>

                        <div class="form-group">
                            <label for="Usuario">Usuario:</label>
                            <input type="Usuario" name="usuario"  class="form-control" id="Usuario" />
                        </div>

                        <button type="submit" name="editarInterno" class="btn btn-primary rounded mt-5">Submit</button>
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