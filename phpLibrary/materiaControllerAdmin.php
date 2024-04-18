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
                <div class="col col-md-8 mx-auto">
                    <h2 class="mt-5">Datos del Profesor</h2>

                </div>
                <div class="col-md-8 mx-auto">

                    <?php
                    include './mysqlConnect.php';
                    $conn = OpenCon();


                    if (isset($_POST['editarInterno'])) {


                        $nombreMateria = $_POST['nombreMateria'];
                        $codigoMateria = $_POST['codigoMateria'];

                        mysqli_query($conn, "UPDATE `materia` SET  `nombreMateria`='$nombreMateria' WHERE  `codigoMateria`=$codigoMateria;") or
                            die("Problemas en el select:" . mysqli_error($conn));
                        echo '<script>alert("Registro Modificado")</script>';
                        CloseCon($conn);

                        echo '    <script type="text/javascript">
window.location.href = "../Admin/MateriaAdmin.php?accion=listar";
</script>';
                    } else if (isset($_GET['accion']) && isset($_GET['codigo']) && $_GET['accion'] == 'editar') {
                        $accion = $_GET['accion'];
                        $codigo = $_GET['codigo'];

                        $registros = mysqli_query($conn, "select * from materia where codigoMateria = $codigo limit 1") or
                            die("Problemas en el select:" . mysqli_error($conn));
                        $resultado = $registros->fetch_assoc();

                        echo <<<EOT
                            <form action="?" method="post">
                            <div class="form-group">
                            <label for="codigo">Codigo:</label>
                            <input type="codigo" name="codigoMateria" value="{$resultado['codigoMateria']}" class="form-control" readonly="readOnly" id="codigo" />
                        </div>
                        
                            <div class="form-group">
                                <label for="nombre">nombre:</label>
                                <input type="nombre" name="nombreMateria" value="{$resultado['nombreMateria']}"  class="form-control" id="nombre" />
                            </div>

                            

                        <button type="submit" name="editarInterno" class="btn btn-primary rounded mt-5">Submit</button>
                        </form>
EOT;

                        CloseCon($conn);
                    } else if (isset($_GET['accion']) && isset($_GET['codigo']) && $_GET['accion'] == 'borrar') {
                        $codigo = $_GET['codigo'];
                        mysqli_query($conn, "DELETE FROM materia WHERE codigoMateria=$codigo") or
                            die("Problemas en el select:" . mysqli_error($conn));
                        echo '<script>alert("Registro Borrado")</script>';
                        CloseCon($conn);

                        echo '    <script type="text/javascript">
window.location.href = "../Admin/MateriaAdmin.php?accion=listar";
</script>';
                    } else if (isset($_GET['accion']) && $_GET['accion'] == 'agregar') {


                        $nombreMateria = $_POST['nombreMateria'];

                        mysqli_query($conn, "insert into materia (nombreMateria) values ('$nombreMateria');") or
                            die("Problemas en el Insert:" . mysqli_error($conn));
                        echo '<script>alert("Registro Registro Insertado")</script>';
                        CloseCon($conn);

                        echo '    <script type="text/javascript">
window.location.href = "../Admin/MateriaAdmin.php?accion=listar";
</script>';
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