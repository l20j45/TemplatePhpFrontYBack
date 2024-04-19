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
  include '../phpLibrary/mysqlConnect.php';
  $conn = OpenCon();
  headerControllerNormal();
  ?>
  <main class="flex-grow-1">
    <div class="container-lg">
      <div class="row d-flex flex-column">
        <div class="col col-md-10 mx-auto " style="overflow-y: scroll;">
          <?php
          if (isset($_GET['accion']) && $_GET['accion'] == 'listar') {
          ?>
            <h2 class="mt-5">Horario</h2>
            <table class="table mt-5">
              <thead class="thead-dark">
                <tr>

                  <th scope="col">#</th>
                  <th scope="col">nombre de la materia</th>
                  <th scope="col">nombre del profesor</th>
                  <th scope="col">Dia 1</th>
                  <th scope="col">Dia 2</th>
                  <th scope="col">horario</th>
                  <th scope="col">borrar</th>
                </tr>
              </thead>
              <tbody>
                <?php



                $registros = mysqli_query($conn, "SELECT m.nombreMateria,CONCAT_WS(' ',p.nombre, p.apellidoPaterno, p.apellidoMaterno) AS nombreProfesor,pm.Dia1,pm.Dia2,pm.Horario,um.id
                FROM usuariomateria um
                INNER JOIN profesormateria pm ON pm.nrc = um.nrcMateria
                INNER JOIN materia m ON m.codigoMateria = pm.codigoMateria
                INNER JOIN profesor p ON p.codigo = pm.codigoProfesor
                WHERE um.codigoUsuario = 101;") or
                  die("Problemas en el select:" . mysqli_error($conn));
                $contador = 1;
                while ($reg = mysqli_fetch_array($registros)) {

                  echo <<<EOT
                                    <tr>
                                    <td>{$contador}</td>
                                    <td>{$reg['nombreMateria']}</td>
                                    <td>{$reg['nombreProfesor']}</td>
                                    <td>{$reg['Dia1']}</td>
                                    <td>{$reg['Dia2']}</td>
                                    <td>{$reg['Horario']}</td>
                                    <td><a href="../phpLibrary/horarioControllerNormal.php?accion=borrar&codigo={$reg['id']}" class="btn btn-danger text-white rounded">Borrar</a></td>
                                  </tr>
EOT;
                  $contador++;
                }

                CloseCon($conn);
                ?>

              </tbody>
            </table>
          <?php
          } else {
          ?>
            <h2 class="mt-5">Registrar Materia</h2>
            <?php
            $registrosCompleto = mysqli_query($conn, "SELECT pm.nrc, m.nombreMateria, CONCAT(p.nombre,' ', p.apellidoPaterno,' ',p.apellidoMaterno) AS profesor, pm.Horario,pm.Dia1,pm.Dia2
            FROM materia m 
            INNER JOIN profesormateria pm ON pm.codigoMateria = m.codigoMateria
            INNER JOIN profesor p ON p.codigo = pm.codigoProfesor;") or
              die("Problemas en el select:" . mysqli_error($conn));

            ?>
            <form action="../phpLibrary/horarioControllerNormal.php?accion=agregar" method="post">
              <div class="form-group">
                <input type="hidden" name="codigoAlumno" value="101" class="form-control" id="codigoAlumno" />
              </div>
              <div class="form-group">
                <label for="materia">Selecciona un profesor:</label>
                <select name="materia" class="form-control" id="materia">

                  <?php
                  while ($reg = mysqli_fetch_array($registrosCompleto)) {
                    echo <<<EOT
                                <option value="{$reg['nrc']}">{$reg['nombreMateria']} {$reg['profesor']} {$reg['Horario']} {$reg['Dia1']} {$reg['Dia2']}   </option>;
EOT;
                  }

                  ?>
                </select>
              </div>
              <button type="submit" name="agregar" class="btn btn-primary rounded mt-5">Inscribirte</button>

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