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

                        var_dump($_POST);
                        $codigo = $_POST['Codigo'];
                        $materia = $_POST['materia'];
                        $horario = $_POST['horario'];
                        $dia1 = $_POST['dia1'];
                        $dia2 = $_POST['dia2'];
                        $profesor = $_POST['profesor'];

                        mysqli_query($conn, "UPDATE `profesormateria` SET `codigoMateria`='$materia' ,`codigoProfesor`='$profesor' ,`Horario`='$horario' ,`Dia1`='$dia1' ,`Dia2`='$dia2' WHERE  `nrc`=$codigo;") or
                            die("Problemas en el select:" . mysqli_error($conn));
                        echo '<script>alert("Registro Modificado")</script>';
                        CloseCon($conn);

                        echo '    <script type="text/javascript">
window.location.href = "../Admin/OfertaAdmin.php?accion=listar";
</script>';
                    } else if (isset($_GET['accion']) && isset($_GET['codigo']) && $_GET['accion'] == 'editar') {
                        $accion = $_GET['accion'];
                        $codigo = $_GET['codigo'];

                        $registros = mysqli_query($conn, "SELECT * 
                        From profesormateria pm
                        INNER JOIN profesor p ON p.codigo = pm.codigoProfesor
                        INNER JOIN materia m ON m.codigoMateria = pm.codigoMateria
                                                 where nrc = $codigo limit 1") or
                            die("Problemas en el select:" . mysqli_error($conn));
                        $resultado = $registros->fetch_assoc();
                        $registrosMaterias = mysqli_query($conn, "SELECT * from materia;") or
                            die("Problemas en el select:" . mysqli_error($conn));

                        $registrosProfesores = mysqli_query($conn, "SELECT * from profesor;") or
                            die("Problemas en el select:" . mysqli_error($conn));

                    ?>
                        <form action="?" method="post">
                            <div class="form-group">
                                <label for="Codigo">Codigo:</label>
                                <input type="text" name="Codigo" readonly="readonly" value="<?php echo $resultado['nrc']; ?>" class="form-control" readonly="readOnly" id="codigo" />
                            </div>
                            <div class="form-group">
                                <label for="materia">Selecciona una materia:</label>
                                <select name="materia" class="form-control" id="materia">
                                    <option selected value="<?php echo $resultado['codigoMateria']; ?>"><?php echo $resultado['nombreMateria']; ?></option>;
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
                                <input type="text" name="horario" value="<?php echo $resultado['Horario']; ?>" class="form-control" id="horario" />
                            </div>

                            <div class="form-group">
                                <label for="dia1">Dia 1:</label>
                                <input type="text" name="dia1" value="<?php echo $resultado['Dia1']; ?>" class="form-control" id="dia1" />
                            </div>
                            <div class="form-group">
                                <label for="dia2">Dia 2:</label>
                                <input type="text" name="dia2" value="<?php echo $resultado['Dia2']; ?>" class="form-control" id="dia2" />
                            </div>
                            <div class="form-group">
                                <label for="profesor">Selecciona un profesor:</label>
                                <select name="profesor" class="form-control" id="profesor">
                                    <option selected value="<?php echo $resultado['codigo']; ?>"><?php echo $resultado['nombre'] . " " . $resultado['apellidoPaterno'] . " " . $resultado['apellidoMaterno']; ?></option>;
                                    <?php
                                    while ($reg = mysqli_fetch_array($registrosProfesores)) {
                                        echo <<<EOT
                                <option value="{$reg['codigo']}">{$reg['nombre']} {$reg['apellidoPaterno']} {$reg['apellidoMaterno']}  </option>;
EOT;
                                    }

                                    ?>
                                </select>
                            </div>
                            <button type="submit" name="editarInterno" class="btn btn-primary rounded mt-5">Enviar</button>

                        </form>

                    <?php
                        CloseCon($conn);
                    } else if (isset($_GET['accion']) && isset($_GET['codigo']) && $_GET['accion'] == 'borrar') {
                        echo"Aqui estoy";
                        $codigo = $_GET['codigo'];
                        mysqli_query($conn, "DELETE FROM usuariomateria WHERE id=$codigo") or
                            die("Problemas en el delete:" . mysqli_error($conn));
                        echo '<script>alert("Registro Borrado")</script>';
                        CloseCon($conn);

                        echo '    <script type="text/javascript">
window.location.href = "../normal/horarioNormal.php?accion=listar";
</script>';
                    } else if (isset($_GET['accion']) && $_GET['accion'] == 'agregar') {

                        var_dump($_POST);
                        $nrc = $_POST['Nrc'];
                        $materia = $_POST['materia'];
                        $horario = $_POST['horario'];
                        $dia1 = $_POST['dia1'];
                        $dia2 = $_POST['dia2'];
                        $profesor = $_POST['profesor'];

                        mysqli_query($conn, "INSERT INTO `profesormateria` (`nrc`, `codigoMateria`, `codigoProfesor`, `Horario`, `Dia1`, `Dia2`) VALUES ($nrc, $materia, $profesor, '$horario', '$dia1', '$dia2');") or
                            die("Problemas en el Insert:" . mysqli_error($conn));
                        echo '<script>alert("Registro Insertado")</script>';
                        CloseCon($conn);

                        echo '    <script type="text/javascript">
window.location.href = "../Admin/OfertaAdmin.php?accion=listar";
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