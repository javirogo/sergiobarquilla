<?php
include "./cabecera/cabecera2.php";
include "../conexion.php";
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es" lang="es">
  <head>
    <meta http-equiv="Content-Type" content="text/html ; charset=utf-8" />
    <meta name="author" content="Javier Rodriguez" />
        
    <title>Sergio Barquilla | Espectáculos</title>

      <link href="../estilos/espectaculo.css" rel="stylesheet" type="text/css" />
      
</head>

<body>
    <div class=cuerpo>
        <div class=espectaculos>
            <div class=primero>
		<?php
            $paridad = 0;
			$consulta= "select * from espectaculo where extra='no'";
            $resultado=mysqli_query($link,$consulta) or die (mysqli_error($link));
            $numeroespectaculos = mysqli_num_rows($resultado);
            while($line = mysqli_fetch_array($resultado, MYSQLI_ASSOC)){
                if($paridad==$numeroespectaculos-1 and $paridad%2==0){
                    ?>
                        <div class=espectaculo_2>
                            <div class=no_extra>
                                <div class=titulo_b><?php echo $line['titulo']; ?></div>
                                <div class="imagendescripcion_a">
                                    <div class=imagen_b><img src="../imagenes/espectaculo/<?php echo $line['imagen']; ?>" height="200px" width="140px" /></div>
                                    <div class=descripcion_b><?php echo $line['descripcion']; ?></div>
                                    <?php if (isset($line['imagen2'])){ ?>
                                            <div class=imagen_c><img src="../imagenes/espectaculo/<?php echo $line['imagen2']; ?>" height="200px" width="140px" /></div>
                                    <?php } ?>
                                </div>
                                <div class="duraciondosier_b">
                                    <div class=duracion_b>Duración: <?php echo $line['duracion']; ?></div>
                                    <div class=dosier_b><p>Descargar dossier: </p><a href='../dosier/<?php echo $line['dosier']; ?>.pdf' target="_blank"></a></div>
                                </div>
                            </div>
                        </div>
                    <?php
                } else {
                    if($paridad % 2 == 0){
                        ?>
                            <div class=espectaculo_1>
                                <div class=no_extra>
                                    <div class=titulo_a><?php echo $line['titulo']; ?></div>
                                    <div class="imagendescripcion_a">
                                        <div class=imagen_a><img src="../imagenes/espectaculo/<?php echo $line['imagen']; ?>" height="200px" width="140px" /></div>
                                        <div class=descripcion_a><?php echo $line['descripcion']; ?></div>
                                        <?php if (isset($line['imagen2'])){ ?>
                                                <div class=imagen_d><img src="../imagenes/espectaculo/<?php echo $line['imagen2']; ?>" height="200px" width="140px" /></div>
                                        <?php } ?>
                                    </div>
                                    <div class="duraciondosier_a">
                                        <div class=duracion_a>Duración: <?php echo $line['duracion']; ?></div>
                                        <div class=dosier_a><p>Descargar dossier: </p><a href='../dosier/<?php echo $line['dosier']; ?>.pdf' target="_blank"></a></div>
                                    </div>
                                </div>
                            </div>
                        <?php
                    } else {
                        ?>
                            <div class=espectaculo_1>
                                <div class=no_extra>
                                    <div class=titulo_b><?php echo $line['titulo']; ?></div>
                                    <div class="imagendescripcion_b">
                                        <div class=imagen_b><img src="../imagenes/espectaculo/<?php echo $line['imagen']; ?>" height="200px" width="140px" /></div>
                                        <div class=descripcion_b><?php echo $line['descripcion']; ?></div>
                                        <?php if (isset($line['imagen2'])){ ?>
                                                <div class=imagen_d><img src="../imagenes/espectaculo/<?php echo $line['imagen2']; ?>" height="200px" width="140px" /></div>
                                        <?php } ?>
                                    </div>
                                    <div class="duraciondosier_b">
                                        <div class=duracion_b>Duración: <?php echo $line['duracion']; ?></div>
                                        <div class=dosier_b><p>Descargar dossier: </p><a href='../dosier/<?php echo $line['dosier']; ?>.pdf' target="_blank"></a></div>
                                    </div>
                                </div>
                            </div>
                        <?php
                    }
                    $paridad++; 
                }
            }
        ?>
            
            </div>
            <hr size=2px width=90% align=center color=#e4e1cd>
            <div class=segundo>
		<?php
            $paridad2 = 0;
			$consulta= "select * from espectaculo where extra='si'";
            $resultado=mysqli_query($link,$consulta) or die (mysqli_error($link));
			while($line = mysqli_fetch_array($resultado, MYSQLI_ASSOC)){
                if($paridad2 % 2 == 0){
                    ?>
                        <div class=espectaculo_2>
                            <div class=extra>
                                <div class=titulo_b><?php echo $line['titulo']; ?></div>
                                <div class=descripcion_b><?php echo $line['descripcion']; ?></div>
                            </div>
                        </div>
                    <?php
                } else {
                    ?>
                        <div class=espectaculo_2>
                            <div class=extra>
                                <div class=titulo_a><?php echo $line['titulo']; ?></div>
                                <div class=descripcion_a><?php echo $line['descripcion']; ?></div>
                            </div>
                        </div>
                    <?php
                }
                $paridad2++;
            }
        ?>
            </div>
        </div>
	</div>
</body>
</html>