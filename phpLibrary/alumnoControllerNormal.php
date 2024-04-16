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
                    }
                    ?>