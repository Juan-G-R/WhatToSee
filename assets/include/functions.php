<?php 

    session_start();
    
    if(isset($_REQUEST['login'])){

        require_once('db.php');

        $username = $mysqli -> real_escape_string($_POST['username']);
        $password = $mysqli -> real_escape_string($_POST['password']);
        
        $stmt = $mysqli->prepare('SELECT * FROM users WHERE username = ?');
        $stmt->bind_param("s", $username);

        if (!$stmt->execute()) {
            printf("Errormessage: %s\n", $mysqli->error);
        }

        $resultData = mysqli_stmt_get_result($stmt);

        if($row = mysqli_fetch_assoc($resultData)){
            //$pwdHashed = $emailExists['password'];                      // HACER USO DE LA CONSULTA QUE VALIDA EL CORREO
            //$checkPwd = password_verify($pwd, $pwdHashed);
            if($row['pwd'] === $password) {
                $_SESSION['logged'] = 1;
                $_SESSION['username'] = $username;
                header('location: ../../index.php');
                exit();
            } else {
                exit();
            }
        } else {
            exit();
        }

        mysqli_stmt_close($stmt);

        header("location: ../../index.php");

    }

    if(isset($_REQUEST['signup'])){

        require_once('db.php');

        $username = $mysqli -> real_escape_string($_POST['username']);
        $email = $mysqli -> real_escape_string($_POST['email']);
        $password = $mysqli -> real_escape_string($_POST['password']);

        $stmt = $mysqli->prepare('INSERT INTO users (id,username,email,pwd) VALUES (NULL, ?, ?, ?)');
        $stmt->bind_param("sss", $username, $email, $password);
        
        if (!$stmt->execute()) {
            printf("Errormessage: %s\n", $mysqli->error);
        } else {
            $_SESSION['logged'] = 1;
            $_SESSION['username'] = $username;
        }

        $stmt->close();

        header("location: ../../index.php");

    }

?>