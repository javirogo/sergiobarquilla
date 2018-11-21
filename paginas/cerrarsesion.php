<?php
include "cabecera/cabecera2.php";
if (isset($_SERVER['HTTP_REFERER'])){ 
    $referer= $_SERVER['HTTP_REFERER'];
} else {
    $referer= "../index.php";
}
?>
<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es" lang="es">
  <head>
    <meta http-equiv="Content-Type" content="text/html ; charset=utf-8" />
    <meta name="author" content="Javier Rodriguez" />
    <link href="../estilos/cerrarsesion.css" rel="stylesheet" type="text/css" />
    <title>Sergio Barquilla</title>
</head>

<body>
    <div class=cuerpo>
    <?php
    if(isset($_SESSION['alias'])){
    session_destroy();
    }    
        echo "<script> location.replace('$referer');</script>";   
    ?>

    </div>
</body>
</html>