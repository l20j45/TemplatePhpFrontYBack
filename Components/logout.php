<?php
var_dump ($_COOKIE);
setcookie("logueado", "", time() - 3600, "/");
setcookie("codigo", "", time() - 3600, "/");
setcookie("esAdmin", "", time() - 3600, "/");
$_SESSION = array();
session_unset();
session_destroy();
echo '<script>alert("Saliendo del sistema")</script>';
echo '    <script type="text/javascript">
window.location.href = "../index.html";
</script>';
?>