<?php
include "../cabecera/cabecera3.php";
include "../../conexion.php";
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es" lang="es">
  <head>
    <meta http-equiv="Content-Type" content="text/html ; charset=utf-8" />
    <meta name="author" content="Javier Rodriguez" />
        
    <title>Sergio Barquilla | Borrar imagen</title>

      <link href="../../estilos/borraropinion.css" rel="stylesheet" type="text/css" />
      <script type="text/javascript" src="../javascript/jquery.js"></script>
</head>

<body>
    <div class=cuerpo>
    
    <?php
     if(isset($_SESSION['alias'])){ 
        //Compruebo que he recibido el parámetro por la query.
        if (isset($_GET['cod'])) {
			if(isset($_POST['borrar'])){
				// Realizar una consulta MySQL
				$query = "DELETE FROM galeria WHERE id_galeria='".$_POST['valor']."';";
				$result = mysqli_query($link, $query); //or die('Consulta fallida: ' . mysqli_error($link));
				if ($result) {
				echo "<script> location.replace('../galeria/');</script>";   
				} else {
				echo "Tiene dependencias";    
				}
			} else {
				?>
				
                        <form method="post" action="">
                            <div class=centrado><label>¿Estás seguro que deseas borrar esta imagen?</label></div>
							<input type="hidden" id="valor" name="valor" value="<?php echo $_GET['cod']; ?>" />
                            

                            <?php
                                //mostramos el comentario que se va a borrar
                                $consulta= "select id_galeria, imagen from galeria where id_galeria='".$_GET['cod']."'";
                                $resultado=mysqli_query($link,$consulta) or die (mysqli_error($link));
                                while($line = mysqli_fetch_array($resultado, MYSQLI_ASSOC)){
                                    echo "<div class=centrado>";
                                    echo "<img src='../../imagenes/galeria/".$line['imagen'].".jpg' height='150px' width='150px'>";
                                    echo "</div>";
                                }
                            ?>
                            
                            
                            <div class="centrado"><input name="borrar" class= "submit" type="submit" value="borrar" id="borrar" />  <a class="volver" href="../galeria/"> Volver </a></div>
                        </form>
				
				<?php
			}
			
            // Cerrar la conexión
            mysqli_close($link);
              
        }
    } else {
		echo "<h2>Debes ser administrador para acceder a esta sección.</h2>";   
    }
    ?>
    </div>
</body>
</html>