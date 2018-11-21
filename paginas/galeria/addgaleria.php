<?php
    include "../cabecera/cabecera3.php";
    include "../../conexion.php";
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es" lang="es">
  <head>
    <meta name="author" content="Javier Rodriguez" />
        
    <title>Sergio Barquilla | Añadir imagen</title>
      
    <link rel="icon"  type="image/x-icon"  href="../../imagenes/icono.ico">
    <link href="../../imagenes/icono.ico" rel="shortcut icon" type="image/x-icon" />
    <link href="../../estilos/cookies.css" rel="stylesheet" type="text/css">
    <link href="../../estilos/addgaleria.css" rel="stylesheet" type="text/css">
</head>
<body id="page">
    <div class="cuerpo">
        <?php
 if(isset($_SESSION['alias'])){
?>
<?php 
if( isset($_POST["enviar"]) )  {
    $query = "SELECT id_galeria FROM galeria order by id_galeria desc limit 1";
    $result = mysqli_query($link, $query) or die('Consulta fallida: ' . mysqli_error($link));
    //$contados = mysqli_num_rows($result)+1;
    $contados = mysqli_fetch_array($result);
    $imagenultima = $contados['id_galeria']+1;
    
    $_FILES['archivo']['name']="barqui_".$imagenultima.".jpg";
    $target_path = "../../imagenes/galeria/";
    $target_path = $target_path . basename( $_FILES['archivo']['name']); 
    if(move_uploaded_file($_FILES['archivo']['tmp_name'], $target_path)) {  
        $update = "INSERT into galeria values (null,'barqui_".$imagenultima."');";
        $result = mysqli_query($link, $update);
        if ($result) {
            echo "<br><p style='text-align:center;color:white;'>Imagen subida correctamente</p>";
            echo "<br><p style='text-align:center;color:white;'>Puede tardar unos minutos en actualizarse, si no se actualiza prueba pulsando <u>Crtl+F5</u></p>";
            echo "<br><br/><p style='text-align:center;'><a href='../galeria/'>Volver a la galeria</a></p><br/><br/><br/><br/>";
        }  else {
            echo "<br><p style='color:red;'>Ha ocurrido un error en la base de datos, trate de intentarlo de nuevo.</p>";  
            //Formulario para imagen
            echo "<form action='' method='post' enctype='multipart/form-data' name='formu'  class='centrado'>";
            
                echo "<div class=dibujo>";
                    echo "<p>Elija una foto para añadirla a la galería</p>";
                echo "</div>";
                echo "<input  class='file'  name='archivo' id='archivo' type='file' required><br/>";
                echo "<input  class='submit' type='submit' value='Añadir imagen' name='enviar'>";
            echo "</form>";
            echo '<div class = "volver"><a href="../galeria/">Volver</a></div>';
            echo "<br/><br/><br/>";
        }
    }
} else {
    
   
?> 

        <!--Formulario para imagen-->
        <form action="" method="post" enctype="multipart/form-data" name="formu"  class="centrado">
            
            <div class=dibujo>
                <p>Elija una foto para añadirla a la galería</p>
            </div>
            <input  class="file"  name="archivo" id="archivo" type='file' required><br/>
            <input  class="submit" type='submit' value='Añadir imagen' name='enviar'>
        </form>
        <div class = "volver"><a href="../galeria/">Volver</a></div>
        <br/><br/><br/>
   
<?php 
        }
}else {
                    echo "<br/><br/><br/><p style='text-align:center; color:white;'>Esta zona está reservada para administradores.</p>";    
}
?>
    </div>
</body>
</html>