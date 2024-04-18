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
  headerAdmin();
  ?>
  <main class="flex-grow-1">
    <div class="container-lg">
      <div class="row d-flex flex-column">
        <div class="col col-md-8 mx-auto " style="overflow-y: scroll;">
          <?php
          if (isset($_GET['accion']) && $_GET['accion'] == 'listar') {
          ?>
            <h2 class="mt-5">Horario</h2>
            <table class="table mt-5">
              <thead class="thead-dark">
                <tr>

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



                $registros = mysqli_query($conn, "SELECT m.codigoMateria,pm.nrc, m.nombreMateria,pm.nrc, pm.Horario,pm.Dia1,pm.Dia2, CONCAT(p.nombre,' ', p.apellidoPaterno,' ',p.apellidoMaterno) AS profesor
              FROM materia m 
              INNER JOIN profesormateria pm ON pm.codigoMateria = m.codigoMateria
              INNER JOIN profesor p ON p.codigo = pm.codigoProfesor;") or
                  die("Problemas en el select:" . mysqli_error($conn));

                while ($reg = mysqli_fetch_array($registros)) {

                  echo <<<EOT
                                    <tr>
                                    
                                    <td>{$reg['nrc']}</td>
                                    <td>{$reg['nombreMateria']}</td>
                                    <td>{$reg['Horario']}</td>
                                    <td>{$reg['Dia1']}</td>
                                    <td>{$reg['Dia2']}</td>
                                    <td>{$reg['profesor']}</td>
                                    <td><a href="../phpLibrary/ofertaControllerAdmin.php?accion=editar&codigo={$reg['nrc']}" class="btn btn-warning text-white rounded">Editar</a>  </td>
                                    <td><a href="../phpLibrary/ofertaControllerAdmin.php?accion=borrar&codigo={$reg['nrc']}" class="btn btn-danger text-white rounded">Borrar</a></td>
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
            <h2 class="mt-5">Registrar Oferta</h2>
            <?php
            $registrosMaterias = mysqli_query($conn, "SELECT * from materia;") or
              die("Problemas en el select:" . mysqli_error($conn));

            $registrosProfesores = mysqli_query($conn, "SELECT * from profesor;") or
              die("Problemas en el select:" . mysqli_error($conn));

            ?>
            <form action="../phpLibrary/ofertaControllerAdmin.php?accion=agregar" method="post">
              <div class="form-group">
                <label for="Nrc">Nrc:</label>
                <input type="text" name="Nrc" class="form-control" id="Nrc" />
              </div>
              <div class="form-group">
                <label for="materia">Selecciona una materia:</label>
                <select name="materia" class="form-control" id="materia">

                  <?php
                  while ($reg = mysqli_fetch_array($registrosMaterias)) {
                    echo <<<EOT
                                <option value="{$reg['codigoMateria']}">{$reg['nombreMateria']}</option>;
EOT;
                  }
                  ?>
                </select>
              </div>
              <div class="form-group">
                <label for="horario">Horario:</label>
                <input type="text" name="horario" class="form-control" id="horario" />
              </div>

              <div class="form-group">
                <label for="dia1">Dia 1:</label>
                <input type="text" name="dia1" class="form-control" id="dia1" />
              </div>
              <div class="form-group">
                <label for="dia2">Dia 2:</label>
                <input type="text" name="dia2" class="form-control" id="dia2" />
              </div>
              <div class="form-group">
                <label for="profesor">Selecciona un profesor:</label>
                <select name="profesor" class="form-control" id="profesor">

                  <?php
                  while ($reg = mysqli_fetch_array($registrosProfesores)) {
                    echo <<<EOT
                                <option value="{$reg['codigo']}">{$reg['nombre']} {$reg['apellidoPaterno']} {$reg['apellidoMaterno']}  </option>;
EOT;
                  }

                  ?>
                </select>
              </div>
              <button type="submit" name="agregar" class="btn btn-primary rounded mt-5">Enviar</button>

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