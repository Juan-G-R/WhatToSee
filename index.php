<?php 
//session_start(); 

require_once('assets/include/functions.php');

echo ($_SERVER['HTTP_ACCEPT_LANGUAGE']);


?>

<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" charset="utf-8">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous"> -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script> -->

    <style>
        /* Movil */
        @media (max-width: 600px) { 
            .esconder-movil {
                display: none;
            }
        }
        /* Desktop */
        @media (min-width: 600px) { 
            .esconder-desktop {
                display: none;
            }
        }
    </style>
    
    <title>Document</title>
  </head>


  <body class="">

    <header style="background-color: black; height: 30px; margin-bottom: 40px;">
        <div style="padding-top:5px">
            <p class="mainTitle" style="display: inline;font-size:30px;margin-left: 1%;color:white">What To Watch</p>
            <p style="display: inline;font-size:15px;margin-left: 3%;color:white">Home</p>
            <p style="display: inline;font-size:15px;margin-left: 1%;color:grey">Series</p>
            <p style="display: inline;font-size:15px;margin-left: 1%;color:grey;">My List</p>
            <ul class="navBar">
                <i  class="material-icons" style="color: white;">search</i>
                <?php 
                    if(isset($_SESSION['logged'])) { ?>
                        <li class="navBarItem" > <a style="color: rgba(255,255,255,1);" href=".php"><?php echo $_SESSION['username']; ?></a> </li>
                        <li style="color: rgba(255,255,255,1);" class="navBarItem"> | </li>
                        <li class="navBarItem"><a href="close.php">Log out</a></li>
                    <?php } else { ?>
                        <li class="navBarItem"><a href="signUp.html">Sign Up</a></li>
                        <li class="navBarItem"><a href="login.html">Log In</a></li>
                    <?php }
                ?>
            </ul> 
        </div>
    </header>


    <div>

        <div>
            <p style="color: white;margin-left: 1%;margin-bottom: 15px;font-size: 20px;">Peliculas TOP de la semana</p>
            <div class="slider">

                <div class="slider-inner">

                    <?php

                    for ($i = 0; $i < 10; $i++) {
                        
                        echo '
                        <div class="slider-img-box">
                            <img loading="lazy" class="slider-img"  src="' . getImgUrlFiml("FILM") . '">
                        </div>
                        ';
                    }

                    ?>                   

                </div>
        
            </div>

        </div>

        <div>
            <p style="color: white;margin-left: 1%;margin-bottom: 15px;font-size: 20px;">Series TOP de la semana</p>
            <div class="slider">

                <div class="slider-inner">

                    <?php

                     for ($i = 0; $i < 10; $i++) {
                        
                        echo '
                        <div class="slider-img-box">
                            <img loading="lazy" class="slider-img"  src="' . getImgUrlFiml("TV") . '">
                        </div>
                        ';

                    }

                    ?>
                
                </div>
        
            </div>

        </div>

    </div>

    
    <script src="slider.js"></script>
  </body>
</html>