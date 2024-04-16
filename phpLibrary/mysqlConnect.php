<?php
function OpenCon()
{


    $dbhost = "localhost";
    $dbuser = "laragon";
    $dbpass = "LocalTest";
    $dbname = "minisiiau";
    $conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname) or die("Connect failed: %s\n" . $conn->error);
    return $conn;
}



function CloseCon($conn)
{
    $conn->close();
}
 ?>