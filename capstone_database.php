<?php
// creating variables for the username, password, host, and database name.
    $host = "localhost";
    $username = "root";
    $password = "";
    $db_name = "capstone_database";

    // We create a variable and used the mysqli_connect() function to attempts to open a connection to the MySQL Server running on host which can be either a host name or an IP address.
    $mysqli = mysqli_connect($host, $username, $password, $db_name);
?>