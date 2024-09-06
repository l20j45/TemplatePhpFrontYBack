<?php
function OpenCon()
{
    $dbhost = "127.0.0.1";
    $dbuser = "laragon";
    $dbpass = "LocalTest";
    $dbname = "minisiiau";
    $conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname) or die("Connect failed: %s\n" . $conn->error);
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    return $conn;
}

function CloseCon($conn)
{
    $conn->close();
}
?>