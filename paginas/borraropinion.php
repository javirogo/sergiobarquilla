<?php
include "cabecera/cabecera2.php";
include "../conexion.php";
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es" lang="es">
  <head>
    <meta http-equiv="Content-Type" content="text/html ; charset=utf-8" />
    <meta name="author" content="Javier Rodriguez" />
        
    <title>Sergio Barquilla</title>

      <link href="../estilos/borraropinion.css" rel="stylesheet" type="text/css" />
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
				$query = "DELETE FROM comentario WHERE id_comentario='".$_POST['valor']."';";
				$result = mysqli_query($link, $query); //or die('Consulta fallida: ' . mysqli_error($link));
				if ($result) {
				echo "<script> location.replace('./opiniones.php');</script>";   
				} else {
				echo "Tiene dependencias";    
				}
			} else {
				?>
				
                        <form method="post" action="">
                            <div class=centrado><label>¿Estás seguro que deseas borrar esta opinión?</label></div>
							<input type="hidden" id="valor" name="valor" value="<?php echo $_GET['cod']; ?>" />
                            

                            <?php
                                //mostramos el comentario que se va a borrar
                                $consulta= "select id_comentario, nombre, DATE_FORMAT(date_added, '%d-%m-%Y %H:%i:%s') as date_show, texto from comentario where id_comentario='".$_GET['cod']."' order by date_added";
                                $resultado=mysqli_query($link,$consulta) or die (mysqli_error($link));
                                while($line = mysqli_fetch_array($resultado, MYSQLI_ASSOC)){
                                    ?>
                                        <div class="commentGlobal">
                                        <div class="comment">
                                            <div class="comment-avatar">
                                                <img width="55" height="55" src="../imagenes/logo.png" />	
                                            </div>

                                            <div class="comment-autor">
                                                <strong><?php echo $line['nombre']; ?></strong> dice:<br/>
                                                <small><?php echo $line['date_show']; ?></small>
                                            </div>
                                            <div class="comment-text">
                                                <?php echo nl2br($line['texto']); ?>
                                            </div>
                                        </div>
                                        </div>

                                    <?php
                                }
                            ?>
                            
                            
                            <div class="centrado"><input name="borrar" class= "submit" type="submit" value="borrar" id="borrar" />  <a class="volver" href="./opiniones.php"> Volver </a></div>
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