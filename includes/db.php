<?php
$servername = "mysql-76119-0.cloudclusters.net";
$username = "admin";
$password = "dtR24PpR";
$dbname   = "homebusiness";
$dbServerPort = 17406;

// Create connection
$con = new mysqli($servername, $username, $password, $dbname, $dbServerPort,);

// Check connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}
?>