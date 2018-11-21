<?php
include "./cabecera/cabecera2.php";
include "../conexion.php";
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es" lang="es">
  <head>
    <meta http-equiv="Content-Type" content="text/html ; charset=utf-8" />
    <meta name="author" content="Javier Rodriguez" />
        
    <title>Sergio Barquilla | Opiniones</title>

      <link href="../estilos/opiniones.css" rel="stylesheet" type="text/css" />
      
</head>

<body>
    <div class=cuerpo>
		<?php
			$consulta= "select id_comentario, nombre, DATE_FORMAT(date_added, '%d-%m-%Y %H:%i:%s') as date_show, texto from comentario order by date_added desc";
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
						
						<?php
							if(isset($_SESSION['alias'])){
						?>
						<div class = "eliminar">
							<a href="./borraropinion.php?cod=<?php echo $line['id_comentario']; ?>"><img width="15" height="15" src="../imagenes/error.jpg" /></a>
						</div>
						
						<?php
							}
						?>
						
                        <div class="comment-text">
                            <?php echo nl2br($line['texto']); ?>
                        </div>
                    </div>
                    </div>
				
				<?php
			}
		?>
        
                    <div class = centrado>
                        <a href="../index.php">volver</a>
                    </div>
    </div>
</body>
</html>