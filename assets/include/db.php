<?php 

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$db = "whattowatch";

$mysqli = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Error al conectar la BD: %s\n". $conn -> error);

// Check connection
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
}

?>