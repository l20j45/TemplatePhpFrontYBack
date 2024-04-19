<?php
if (!isset($_SESSION['username'])) {
    // La variable de sesión no está definida, así que la creamos
    session_start();
}
if (isset($_POST["enviar"])) {
    if (isset($_POST["usuario"]) && isset($_POST["password"]) && $_POST["usuario"]  != "" && $_POST["password"] != "") {
        include './mysqlConnect.php';
        $conn = OpenCon();
        echo '<script>console.log("test")</script>';
        $loginNombre = $_POST["usuario"];
        $loginPassword = $_POST["password"];
        $registros = mysqli_query($conn, "SELECT * FROM usuario WHERE usuario='$loginNombre' AND password='$loginPassword' limit 1;");
        if ($registros) {

            while ($row = $registros->fetch_array()) {

                $userok = $row["usuario"];
                $passok = $row["password"];
                $codigook = $row["codigo"];
                $esAdmin = $row["esAdmin"];
            }
            $registros->close();
        } else {
            echo '<script>alert("datos Erroneos, intenta de nuevo")</script>';
            header("Location: ../index.html");
        }
        CloseCon($conn);
    }
    else{
        echo '<script>alert("Datos Insuficientes")</script>';
        echo '    <script type="text/javascript">
        window.location.href = "../index.html";
        </script>';
    }

    if (isset($loginNombre) && isset($loginPassword)) {
        echo "entre al primero";
        if ($loginNombre == $userok && $loginPassword == $passok) {


            setcookie("logueado", TRUE, time() + 3600, "/");
            setcookie("codigo", $codigook, time() + 3600, "/");
            setcookie("esAdmin", $esAdmin, time() + 3600, "/");
            $_SESSION['username'] = $_POST['usuario']; // Guarda el nombre de usuario en la sesión
            $_SESSION['password'] = $_POST['password']; // Gu


            if ($esAdmin == 1) {
                header("Location: ../Admin/AlumnoAdmin.php?accion=listar");
            } else {
                header("Location: ../normal/Alumnonormal.php?accion=ver");
            }
        } else {
            echo '<script>alert("datos Erroneos, intenta de nuevo")</script>';
            echo '    <script type="text/javascript">
            window.location.href = "../index.html";
            </script>';
        }
    } else {
        echo '<script>alert("Error revisa tu informacion")</script>';
        echo '    <script type="text/javascript">
        window.location.href = "../index.html";
        </script>';
    }
}


exit;
