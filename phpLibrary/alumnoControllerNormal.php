                    <?php
                    include './mysqlConnect.php';
                    $conn = OpenCon();
                    if (isset($_GET['accion']) && $_GET['accion'] == 'editar') {
                        var_dump($_POST);

                        $nombre = $_POST['nombre'];
                        $codigo = $_POST['codigo'];
                        $apellidoPaterno = $_POST['apellidoPat'];
                        $apellidoMaterno = $_POST['apellidoMat'];
                        $usuario = $_POST['usuario'];
                        $edad = $_POST['edad'];
                        mysqli_query($conn, "UPDATE `minisiiau`.`usuario` SET  `nombre`='$nombre',`apellidoPaterno`='$apellidoPaterno',`apellidoMaterno`='$apellidoMaterno',`edad`=$edad,`usuario`='$usuario'  WHERE  `codigo`=$codigo;") or
                            die("Problemas en el select:" . mysqli_error($conn));
                        echo '<script>alert("Registro Modificado")</script>';
                        CloseCon($conn);

                        echo '    <script type="text/javascript">
window.location.href = "../normal/AlumnoNormal.php?accion=ver";
</script>';
                    } else {
                        if (isset($_GET['accion']) && $_GET['accion'] == 'agregar' || ($_GET['nombre'] != '' && $_GET['password'] != '' && $_GET['usuario'] != '')) {
                            var_dump($_POST);

                            $nombre = $_POST['nombre'];
                            $apellidoPaterno = $_POST['apellidoPat'];
                            $apellidoMaterno = $_POST['apellidoMat'];
                            $edad = $_POST['edad'];
                            $carrera = $_POST['carerra'];
                            $color = $_POST['color'];
                            $password = $_POST['password'];
                            $usuario = $_POST['usuario'];

                            mysqli_query($conn, "INSERT INTO `usuario` (`nombre`, `apellidoPaterno`, `apellidoMaterno`, `edad`, `carrera`, `colorFondo`, `usuario`, `password`, `esAdmin`) VALUES ('$nombre ', '$apellidoPaterno', '$apellidoMaterno', '$edad', '$carrera', '$color', '$usuario', '$password', b'0');") or
                                die("Problemas en el Insert:" . mysqli_error($conn));
                            echo '<script>alert("Registro Registro Insertado")</script>';
                            CloseCon($conn);

                            echo '    <script type="text/javascript">
                            window.location.href = "../index.html";
                            </script>';
                        } else {
                            echo '<script>alert("Datos Insuficientes")</script>';
                            echo '    <script type="text/javascript">
                            window.location.href = "../index.html";
                            </script>';
                        }
                    }
                    ?>