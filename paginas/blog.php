<?php
include "./cabecera/cabecera2.php";
include "../conexion.php";
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es" lang="es">
  <head>
    <meta http-equiv="Content-Type" content="text/html ; charset=utf-8" />
    <meta name="author" content="Javier Rodriguez" />
        
    <title>Sergio Barquilla | Blog</title>

      <link href="../estilos/blog.css" rel="stylesheet" type="text/css" />
      
</head>

<body>
    <div class=cuerpo>
		<?php
			
			if(isset($_GET['cod'])){
				
				    $consulta= "select * from blog where id_blog='".$_GET['cod']."'";
                    $resultado=mysqli_query($link,$consulta) or die (mysqli_error($link)); 
                
                    if(mysqli_num_rows($resultado)>0){
						while($line = mysqli_fetch_array($resultado, MYSQLI_ASSOC)){
							echo "<div class=contenedor>";
								echo "<div class=imagen_b>";
									echo "<img class = imagen2 src='../imagenes/upload/".$line['imagen']."' />";
								echo "</div>";
								echo "<div class=titulo_b>";
									echo "<a href='blog.php?cod=".$line['id_blog']."'>".$line['titulo']."</a>";
								echo "</div>";
								echo "<div class=texto_b>";
									echo nl2br($line['texto']);
								echo "</div>";
								echo "<div class=volver>";
									echo "<a href='blog.php'>Volver</a>";
								echo "</div>";
							echo "</div>";
						}
                    } else {
						echo "error";
					}
				
			} else {
					
					if(isset($_SESSION['alias'])){
						echo "<div class=entrada>";
							echo "<a href='entrada.php'>Añadir nueva entrada</a>";
						echo "</div>";
					}
					
                    $consulta= "select * from blog order by id_blog desc";
                    $resultado=mysqli_query($link,$consulta) or die (mysqli_error($link)); 
                
                    if(mysqli_num_rows($resultado)>0){
						while($line = mysqli_fetch_array($resultado, MYSQLI_ASSOC)){
							echo "<div class=contenedor>";
								echo "<div class=imagen_a>";
									echo "<img class = imagen3 src='../imagenes/upload/".$line['imagen']."' />";
								echo "</div>";
								echo "<div class=titulo_a>";
									echo "<a href='blog.php?cod=".$line['id_blog']."'>".$line['titulo']."</a>";
								echo "</div>";
								echo "<div class=texto_a>";
                                    if(strlen($line['texto'])>151){
                                        $texto = substr($line['texto'],0,151);
                                        echo $texto."...";
                                    } else {
                                        echo $line['texto'];
                                    }
								echo "</div>";
							echo "</div>";
						}
                    } else {
						echo "no hay noticias en el blog";
					}
			}
		?>
	</div>
</body>
</html>