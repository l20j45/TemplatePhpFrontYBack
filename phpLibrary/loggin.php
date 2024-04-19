<?php
session_start();
if (isset($_POST["enviar"])) {
    include './mysqlConnect.php';
    $conn = OpenCon();
    $loginNombre = $_POST["usuario"];
    $loginPassword = $_POST["password"];
    $registros = mysqli_query($conn, "SELECT * FROM usuario WHERE usuario='$loginNombre' AND password='$loginPassword' limit 1;");
    if ($registros) {

        while ($row = $resultado->fetch_array()) {

            $userok = $row["usuario"];
            $passok = $row["password"];
            $codigook = $row["codigo"];
            $esAdmin = $row["esAdmin"];
        }
        $resultado->close();
    }
    CloseCon($conn);

    if (isset($loginNombre) && isset($loginPassword)) {

        if ($loginNombre == $userok && $loginPassword == $passok) {

            session_start();
            $_SESSION["logueado"] = TRUE;
            $_SESSION['username'] = $_POST['usuario']; // Guarda el nombre de usuario en la sesión
            $_SESSION['password'] = $_POST['password']; // Gu
            $_SESSION['codigo'] = $codigook;
            $_SESSION['esAdmin'] = $esAdmin;
            if ($esAdmin == 'si') {
                header("Location: ./Admin/AlumnoAdmin.php ");
            } else {
                header("Location: ./normal/Alumnonormal.php ");
            }
        } else {
            Header("Location: index.php?error=login");
        }
    }
}

echo $_SESSION['username'];
echo $_SESSION['password'];
echo "Entre";

exit;
