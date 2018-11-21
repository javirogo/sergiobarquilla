<?php
session_start();
include "./conexion.php";
    $referer= "./index.php";
if (isset($_SESSION['alias'])){
      header("location: ./index.php");
}
?>
<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es" lang="es">
  <head>
    <meta http-equiv="Content-Type" content="text/html ; charset=utf-8" />
    <meta name="author" content="Javier Rodriguez" />
        
    <title>Sergio Barquilla | Inicio de sesión</title>
    <link href="./estilos/barqui.css" rel="stylesheet" type="text/css" />
</head>
    
    
<body>
    <div class=cuerpo>
        
        
        <?php
    if( isset($_POST["iniciar"]) )  {
   $alias = $_POST["alias"];
   $clave = $_POST["clave"];
   if(validarUsuario($alias,$clave) == true){
      $consulta1 = "select alias from usuario where alias = '$alias' and clave = MD5('$clave');";
      $result1 = mysqli_query($link, $consulta1) or die('Consulta fallida: ' . mysqli_error($link));
        while ($line = mysqli_fetch_array($result1, MYSQLI_ASSOC)) {
            foreach ($line as $col_value) {
                $_SESSION['alias']=$col_value;
            }
        }
		
        echo "<script> location.replace('./index.php');</script>";
   } else {
?>
        <form class="centrado" action="barqui.php" method="post"><div class=textoinicio>
                <div class="imagenLogo" >
                <img src="./imagenes/logo.png" height = "200px" width = "200px" />
                </div>
                <p class="textoTitulo">INICIAR SESIÓN</p>
                <h5 style='text-align:center; color:red;'>Nombre de usuario o contrase&ntilde;a incorrectos</h5>
                <br>Alias:<br>
                <input class="text" type="text" name="alias" maxlength="20" /><br /><br />
                Contrase&ntilde;a:<br>
                <input class="text" type="password" name="clave" maxlength="40" /><br /><br />
                <input type="hidden" name="referencia" value="<?php echo $_POST["referencia"];?>">
                <input class="submit" type="submit" name="iniciar" value="Conectar" />
        </div></form>
<?php
   }
} else {
?> 
        <form class="centrado" action="barqui.php" method="post"><div class=textoinicio>
                <div class="imagenLogo" >
                <img src="./imagenes/logo.png" height = "200px" width = "200px" />
                </div>
                <p class="textoTitulo">INICIAR SESI&Oacute;N</p>
                <br>Alias:<br>
                <input class="text" type="text" name="alias" maxlength="20" /><br /><br />
                Contrase&ntilde;a:<br>
                <input class="text" type="password" name="clave" maxlength="40" /><br /><br />
                <input type="hidden" name="referencia" value="<?php echo $referer;?>">
                <input class="submit" type="submit" name="iniciar" value="Conectar" />
        </div></form>
<?php
}
function validarUsuario($a, $b)    {
    $link = mysqli_connect(SERVER, USER, PASS)or die('No se pudo conectar: ' . mysqli_error($link));
    mysqli_select_db($link, BD) or die('No se pudo seleccionar la base de datos');
    mysqli_query($link,"SET NAMES 'utf8'");
   $consulta = "select clave from usuario where alias = '".$a."' and clave = MD5('".$b."');";
   $result = mysqli_query($link, $consulta) or die('Consulta fallida: ' . mysqli_error($link));
   if(mysqli_num_rows($result) == 1)  {
      $line = mysqli_fetch_array($result, MYSQLI_ASSOC);
         return true;
   } else
         return false;
  
}

    ?>

    </div>
</body>
</html>
