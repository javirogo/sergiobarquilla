<?php
include "./conexion.php";
$name = $_POST['nombre'];
$comment = $_POST['comment'];

$link = mysqli_connect(SERVER, USER, PASS) or die('No se pudo conectar: ' . mysqli_error($link));
    mysqli_select_db($link, BD) or die('No se pudo seleccionar la base de datos');
    mysqli_query($link,"SET NAMES 'utf8'");
$insert = mysqli_query($link, "INSERT INTO comentario (id_comentario, nombre, texto, date_added, ip) VALUES (null, '$name', '$comment', now(), '".$_SERVER['REMOTE_ADDR']."')");
?>