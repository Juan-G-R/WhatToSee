<?php

require_once('assets/include/db.php'); //Incluye el archivo db.php para usarse aqui

$usuario = "UsuarioDePrueba"; //El usuario el cual quieres coger datos de la BD

$stmt = $mysqli->prepare('SELECT * FROM users WHERE username = ? '); //Haces la consulta SQL
$stmt->bind_param("s", $usuario); //Para pasar el usuario como parametro pones ? en la consulta y luego le dices con esta linea que esa ? es el usuario

if (!$stmt->execute()) {
    printf("Errormessage: %s\n", $mysqli->error); //Error Handler
}

$resultData = mysqli_stmt_get_result($stmt); //Recoges los datos de vuelta
$row = mysqli_fetch_assoc($resultData); //Pasas los datos de vuelta a un array asociativo 

//[ "username" => "UsuarioDePrueba", "email" => prueba@gmail.com, "pwd" => 1234 ]       ASI QUEDARIO EL ARRAY ASOCIATIVO O CLAVE VALOR TAMBIEN SE LLAMA

//Imprimes cada elemento del array asocitivo llamando a su clave como puesto del array;

echo "Usuario: " . $row['username'] . '<br />'; 
echo "Email: " . $row['email'] . '<br />';
echo "Contraseña: " . $row['pwd'] . '<br />';

?>