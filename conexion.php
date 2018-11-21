<?php
define("SERVER", "localhost");
define("USER", "sergioba_admin");
define("PASS", "XOoGDFRK}i3V");
define("BD", "sergioba_sergio");

$link = mysqli_connect(SERVER, USER, PASS) or die('No se pudo conectar: ' . mysqli_error($link));
    mysqli_select_db($link, BD) or die('No se pudo seleccionar la base de datos');
    mysqli_query($link,"SET NAMES 'utf8'");
?>