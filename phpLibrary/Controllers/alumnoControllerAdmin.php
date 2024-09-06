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
    headerControllerAdmin();
    ?>
    <main class="flex-grow-1">
        <div class="container-lg">
            <div class="row d-flex flex-column">
                <div class="col col-md-8 mx-auto">
                    <h2 class="mt-5">Datos del Alumnos</h2>

                </div>
                <div class="col-md-8 mx-auto">

                    <?php
                    include './mysqlConnect.php';
                    $conn = OpenCon();


                    if (isset($_POST['editarInterno'])) {
                        var_dump($_POST);
                        $codigo = $_POST['codigo'];
                        $nombre = $_POST['nombre'];
                        $apellidoPaterno = $_POST['apellidoPat'];
                        $apellidoMaterno = $_POST['apellidoMat'];
                        $usuario = $_POST['usuario'];
                        $admin = $_POST['admin'];
                        $admin = $admin == "si" ? 1 : 0;
                        mysqli_query($conn, "UPDATE `minisiiau`.`usuario` SET `codigo`='$codigo' , `nombre`='$nombre',`apellidoPaterno`='$apellidoPaterno',`esAdmin`=b'$admin',`apellidoMaterno`='$apellidoMaterno',`edad`='2',`usuario`='$usuario'  WHERE  `codigo`=$codigo;") or
                            die("Problemas en el select:" . mysqli_error($conn));
                        echo '<script>alert("Registro Modificado")</script>';
                        CloseCon($conn);

                        echo '    <script type="text/javascript">
window.location.href = "../../Components/Admin/AlumnoAdmin.php";
</script>';
                    } else if (isset($_GET['accion']) && isset($_GET['codigo']) && $_GET['accion'] == 'editar') {
                        $accion = $_GET['accion'];
                        $codigo = $_GET['codigo'];

                        $registros = mysqli_query($conn, "select * from usuario where codigo = $codigo limit 1") or
                            die("Problemas en el select:" . mysqli_error($conn));
                        $resultado = $registros->fetch_assoc();
                        $admin = $resultado['esAdmin'] == 1 ? "si" : "no";

                        echo <<<EOT
                            <form action="?" method="post">
                            <div class="form-group">
                            <label for="codigo">Codigo:</label>
                            <input type="number" name="codigo" value="{$resultado['codigo']}" class="form-control" id="codigo" />
                        </div>
                        <div class="d-flex gap-3">
                            <div class="form-group">
                                <label for="nombre">nombre:</label>
                                <input type="text" name="nombre" value="{$resultado['nombre']}"  class="form-control" id="nombre" />
                            </div>

                            <div class="form-group">
                                <label for="ApellidoPat">Apellido Paterno:</label>
                                <input type="text" name="apellidoPat" value="{$resultado['apellidoPaterno']}" class="form-control" id="ApellidoPat" />
                            </div>
                            <div class="form-group">
                                <label for="ApellidoMat">Apellido Materno:</label>
                                <input type="text" name="apellidoMat" value="{$resultado['apellidoMaterno']}" class="form-control" id="ApellidoMat" />
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="Edad">Edad:</label>
                            <input type="number" name="edad" value="{$resultado['edad']}" class="form-control" id="Edad" />
                        </div>

                        <div class="form-group">
                            <label for="Usuario">Usuario:</label>
                            <input type="text" name="usuario" value="{$resultado['usuario']}" class="form-control" id="Usuario" />
                        </div>
                        <div class="form-group">
                            <label for="admin">Es admin:</label>
                            <input type="text" name="admin" value="{$admin}" class="form-control" id="admin" />
                        </div>

                        <button type="submit" name="editarInterno" class="btn btn-primary rounded mt-5">Submit</button>
                        </form>
EOT;

                        CloseCon($conn);
                    } else if (isset($_GET['accion']) && isset($_GET['codigo']) && $_GET['accion'] == 'borrar') {
                        $codigo = $_GET['codigo'];
                        mysqli_query($conn, "DELETE FROM usuario WHERE codigo=$codigo") or
                            die("Problemas en el select:" . mysqli_error($conn));
                        echo '<script>alert("Registro Borrado")</script>';
                        CloseCon($conn);

                        echo '    <script type="text/javascript">
window.location.href = "../../Components/Admin/AlumnoAdmin.php";
</script>';
                        echo "Se imprimio esto";
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