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
                        if ($_FILES['imagen'] != "") {
                            $img_name = $_FILES['imagen']['name'];
                            $img_size = $_FILES['imagen']['size'];
                            $tmp_name = $_FILES['imagen']['tmp_name'];
                            $error = $_FILES['imagen']['error'];

                            if ($error === 0) {
                                if ($img_size > 12500000) {
                                    echo '<script>alert("Tu archivo es muy grande")</script>';
                                    echo '    <script type="text/javascript">
                                window.location.href = "../normal/AlumnoNormal.php?accion=ver";
                                </script>';
                                } else {
                                    $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
                                    $img_ex_lc = strtolower($img_ex);

                                    $allowed_exs = array("jpg", "jpeg", "png");

                                    if (in_array($img_ex_lc, $allowed_exs)) {
                                        $new_img_name = uniqid("IMG-", true) . '.' . $img_ex_lc;
                                        $img_upload_path = 'uploads/' . $new_img_name;
                                        move_uploaded_file($tmp_name, $img_upload_path);


                                        mysqli_query($conn, "UPDATE `minisiiau`.`usuario` SET  `nombre`='$nombre',`apellidoPaterno`='$apellidoPaterno',`apellidoMaterno`='$apellidoMaterno',`edad`=$edad,`usuario`='$usuario',`imagen`='$new_img_name'  WHERE  `codigo`=$codigo;");

                                        echo '<script>alert("Registro Registro Insertado")</script>';
                                        CloseCon($conn);

                                        echo '    <script type="text/javascript">
                                window.location.href = "../normal/AlumnoNormal.php?accion=ver";
                                </script>';
                                    } else {
                                        echo '<script>alert("solo se aceptan jpg, png y jpeg")</script>';
                                        echo '    <script type="text/javascript">
                                    window.location.href = "../normal/AlumnoNormal.php?accion=ver";
                                    </script>';
                                    }
                                }
                            }
                        } else {




                            mysqli_query($conn, "UPDATE `minisiiau`.`usuario` SET  `nombre`='$nombre',`apellidoPaterno`='$apellidoPaterno',`apellidoMaterno`='$apellidoMaterno',`edad`=$edad,`usuario`='$usuario'  WHERE  `codigo`=$codigo;") or
                                die("Problemas en el select:" . mysqli_error($conn));
                            echo '<script>alert("Registro Modificado")</script>';
                            CloseCon($conn);
                        }
                    } else {
                        if (isset($_GET['accion']) && $_GET['accion'] == 'agregar' || ($_GET['nombre'] != '' && $_GET['password'] != '' && $_GET['usuario'] != '')) {
                            var_dump($_POST);

                            $nombre = $_POST['nombre'];
                            $apellidoPaterno = $_POST['apellidoPat'];
                            $apellidoMaterno = $_POST['apellidoMat'];
                            $edad = $_POST['edad'];
                            $carrera = $_POST['carrera'];
                            $color = $_POST['color'];
                            $password = $_POST['password'];
                            $usuario = $_POST['usuario'];
                            // Leer la imagen
                            $img_name = $_FILES['imagen']['name'];
                            $img_size = $_FILES['imagen']['size'];
                            $tmp_name = $_FILES['imagen']['tmp_name'];
                            $error = $_FILES['imagen']['error'];

                            if ($error === 0) {
                                if ($img_size > 12500000) {
                                    echo '<script>alert("Tu archivo es muy grande")</script>';
                                    echo '    <script type="text/javascript">
                                    window.location.href = "../index.html";
                                    </script>';
                                } else {
                                    $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
                                    $img_ex_lc = strtolower($img_ex);

                                    $allowed_exs = array("jpg", "jpeg", "png");

                                    if (in_array($img_ex_lc, $allowed_exs)) {
                                        $new_img_name = uniqid("IMG-", true) . '.' . $img_ex_lc;
                                        $img_upload_path = 'uploads/' . $new_img_name;
                                        move_uploaded_file($tmp_name, $img_upload_path);


                                        mysqli_query($conn, "INSERT INTO `usuario` (`nombre`, `apellidoPaterno`, `apellidoMaterno`, `edad`, `carrera`, `colorFondo`, `usuario`, `password`, `esAdmin`, `imagen`) VALUES ('$nombre ', '$apellidoPaterno', '$apellidoMaterno', '$edad', '$carrera', '$color', '$usuario', '$password', b'0' ,'$new_img_name');");

                                        echo '<script>alert("Registro Registro Insertado")</script>';
                                        CloseCon($conn);

                                        echo '    <script type="text/javascript">
                                    window.location.href = "../index.html";
                                    </script>';
                                    } else {
                                        echo '<script>alert("solo se aceptan jpg, png y jpeg")</script>';
                                        echo '    <script type="text/javascript">
                                        window.location.href = "../index.html";
                                        </script>';
                                    }
                                }
                            } else {
                                echo '<script>alert("error raro")</script>';
                                echo '    <script type="text/javascript">
                                window.location.href = "../index.html";
                                </script>';
                            }
                        } else {
                            echo '<script>alert("Datos Insuficientes")</script>';
                            echo '    <script type="text/javascript">
                            window.location.href = "../index.html";
                            </script>';
                        }
                    }
                    ?>