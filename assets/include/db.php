<?php 

$config = include('config.php');


$dbhost = $configs['dbhost'];
$dbuser = $configs['dbusername'];
$dbpass = $configs['dbpass'];
$db = $configs['db'];

$mysqli = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Error al conectar la BD: %s\n". $conn -> error);

// Check connection
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
}

?>