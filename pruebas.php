<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <style>
    </style>
    <title>Document</title>
  </head>

  <body>

    <?php

        $array = array(507086,616037,453395);
        $pruebaArray = serialize($array);

        echo $pruebaArray;

        $des = unserialize($pruebaArray);

        var_dump($des);

    ?>

  </body>
</html>