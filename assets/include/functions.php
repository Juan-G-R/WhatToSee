<?php 

    //PRUEBA
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

    function debug_to_console($data) {
        $output = $data;
        if (is_array($output))
            $output = implode(',', $output);
    
        echo "<script>console.log('Debug Objects: " . $output . "' );</script>";
    }

    $imgFilms = [];
    $imgTV = [];
    $f = -1;
    $t = -1;

    function getImgUrlFiml($type){

        $config = include('config.php');

        //Solo se pueden pedir 20 peliculas por pagina;
        
        global $f;
        global $t;

        if($type == "FILM"){
            $url = "https://api.themoviedb.org/3/trending/movie/week?api_key=" . $config['TMDB_KEY'];
        }elseif($type == "TV"){
            $url = "https://api.themoviedb.org/3/trending/tv/week?api_key=" . $config['TMDB_KEY'];
        }

        $urlImg = "https://image.tmdb.org/t/p/w500";

        try{
            $json = file_get_contents($url);

            if($json !== false){

                $data = json_decode($json, true);

                $i = 0;

                foreach($data["results"] as $nose){

                    foreach ($data["results"][$i] as $columnName => $columnData) {
                        if($columnName == "poster_path") {
                            //echo $columnData . '<br />';
                            if($type == "FILM"){
                                $imgFilms[] = $urlImg . $columnData;
                            }elseif($type == "TV"){
                                $imgTV[] = $urlImg . $columnData;
                            }
                        }
                        //echo 'Column name: ' . $columnName . ' Column data: ' . $columnData . '<br />';
                    }
                    $i++;
                }

            }

        }catch(Exception $e){
            echo $e->getMessage();
        }

        if($type == "FILM"){

            $f++;

            if($f == 20){
                $f = 0;
            }          

            return $imgFilms[$f];

            echo("hola");

        }elseif($type == "TV"){

            $t++;

            if($t == 20){
                $t = 0;
            } 

            return $imgTV[$t];
        }
    }

    function getRecomendUrlFilm($type){

        $config = include('config.php');

        $filmID1 = "507086";

        $url = "https://api.themoviedb.org/3/movie/507086/recommendations?api_key=" . $config['TMDB_KEY']. "language=en-US&page=1";

        $urlImg = "https://image.tmdb.org/t/p/w500";

        try{
            $json = file_get_contents($url);

            if($json !== false){

                $data = json_decode($json, true);

                $i = 0;

                foreach($data["results"] as $nose){

                    foreach ($data["results"][$i] as $columnName => $columnData) {
                        //echo $columnData . '<br />';

                        if($columnName == "poster_path") {
                            echo '<div class="grid-item"> <img loading="lazy" src="' . $urlImg . $columnData . '"> </div>';
                        }

                        //echo 'Column name: ' . $columnName . ' Column data: ' . $columnData . '<br />';
                    }
                    $i++;
                }

            }

        }catch(Exception $e){
            echo $e->getMessage();
        }

    }

?>
