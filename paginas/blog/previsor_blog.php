<?php
	session_start();
	$defecto = "../../imagenes/blog.png";
	$Ok = isset($_FILES["archivo"]);
	$url = ($Ok) ? $_FILES["archivo"]["tmp_name"] : $defecto;
	$fichero = ($Ok) ? $_FILES["archivo"]["name"] : $defecto;
	$onload = ($Ok) ? "onload='parent'": '';
	$datos_imagen = fread(fopen($url, "rb"), filesize($url));
	$_SESSION["cont"] = $datos_imagen;
?>
<html >
<head>
<style type="text/css" >
html	{
	height: 100%;
}
body	{
	height: 100%;
	overflow: hidden;
	background-color: #000;
	background-image: url(previendo_blog.php?);
    background-size: 200px 200px;
	background-repeat: no-repeat;
	background-position: center center;
}
</style>
</head>
    <body <?php $onload;?>>   
    </body>
</html>