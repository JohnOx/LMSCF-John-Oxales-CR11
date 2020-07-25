<?php
// this will avoid mysql_connect() deprecation error.
error_reporting( ~E_DEPRECATED & ~E_NOTICE );

    $localhost= "localhost";
    $username = "root";
    $password = "";
    $dbname = "cr11_oxales_petadoption";

    $con = mysqli_connect($localhost, $username, $password, $dbname);

    // check connection
if($con->connect_error) {
    die("connection failed: " . $con->connect_error);
} /* else {
    echo "Successfully Connected, Senior";
} */

?>