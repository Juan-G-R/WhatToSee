<?php 
//session_start(); 
require_once('assets/include/functions.php');
//            grid-template-columns: 1fr 1fr 1fr 1fr;

?>

<!DOCTYPE html>
<html>
  <head>
    
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

    <title>WTWRecomends</title>

    <style>
        .grid-container {
            display: grid;
            grid-template-columns: auto auto auto auto auto auto auto;
            padding: 10px;
        }
        .grid-item {
            border: 1px solid rgba(0, 0, 0, 0.8);
            padding: 20px;
            text-align: center;
        }
        .grid-item img{
            border-radius: 1.5%;
            width: 100%;
        }
    </style>

  </head>

  <body>

  <header>
        <form action="index.php">
            <button type="submit" style="background-color:transparent;border: none;transform:scaleX(-1) translate(-4px, -45px) scale(1.5);position:absolute;"><i class="material-icons" style="color:white;">redo</i></button>
        </form>
        <p class="mainTitle" style="font-size:75px;color:white;text-align: center;margin-bottom: 50px;margin-top: 50px;">What To Watch</p>
    </header>

    <div>

        <hr>

        <div>

             <header>
                <p style="color: white;font-size: 20px; text-align:center">Peliculas Seleccionadas</p>
            </header>

            <div class="grid-container">

                <?php 
                ?>

            </div>

        </div>

        <hr>

        <div>

            <header>
                <p style="color: white;font-size: 20px; text-align:center">Series Seleccionadas</p>
            </header>

            <div class="grid-container">
                    
                <?php 
                    getRecomendUrlFilm("");
                ?>

            </div>

        </div>




    </div>


  </body>

</html>