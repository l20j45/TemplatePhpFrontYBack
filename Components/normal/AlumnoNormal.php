<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title></title>

  <script src="../../build/js/bootstrap.min.js"></script>
  <script src="../../build/js/bootstrap.bundle.min.js"></script>

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />

  <link rel="stylesheet" href="../../build/css/app.css" />
</head>

<body class="d-flex flex-column min-vh-100 w-100">
  <?php
  include '../phpLibrary/layout.php';
  headerControllerNormal();
  ?>
  <main class="flex-grow-1">
    <div class="container-lg">
      <div class="row d-flex flex-column">
        <div class="col-md-8 mx-auto">
          <h2 class="mt-5">Datos del Alumno</h2>

          <?php
          include '../phpLibrary/mysqlConnect.php';
          $conn = OpenCon();
          $codigo = $_COOKIE['codigo'];
          $registros = mysqli_query($conn, "select * from usuario where codigo = $codigo limit 1") or
            die("Problemas en el select:" . mysqli_error($conn));
          $resultado = $registros->fetch_assoc();
          if (isset($_GET['accion'])) {
            if ($_GET['accion']  == 'ver') {

              echo <<<EOT
              <div class="mt-5 w-25 rounded">
              <img class="img-fluid imagenesPerfil" src="../phpLibrary/uploads/{$resultado['imagen']}">
            </div>
              <p class="mt-5">Codigo: {$resultado['codigo']} </p>
              <p>Nombre: {$resultado['nombre']} {$resultado['apellidoPaterno']} {$resultado['apellidoMaterno']}</p>
              <p>Edad: {$resultado['edad']}</p>
              <p>Carrera: {$resultado['carrera']}</p>
              <p>Usuario: {$resultado['usuario']}</p>
EOT;
              CloseCon($conn);
            } else if ($_GET['accion']  == 'editar') {

              echo <<<EOT
              <form action="../phpLibrary/alumnoControllerNormal.php?accion=editar" method="post" enctype="multipart/form-data">
              <div class="form-group">
              <label for="imagen">Foto de perfil:</label>
              <input
                type="file"
                name="imagen"
                
                class="form-control"
                id="imagen"
              />
            </div>
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
            <div class="form-group">
            <label for="color">Color:</label>
            <input
              type="color"
              name="color"
              value="{$resultado['colorFondo']}"
              class="form-control"
              id="color"
            />
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

  <?php
  footerAdmin();
  ?>
</body>

</html>
<style>
        body {
            background-color: <?= $_COOKIE['colorFondo'] ?? 'white'; ?>;
        }
    </style>