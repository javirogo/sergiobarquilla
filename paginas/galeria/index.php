<?php
    include "../cabecera/cabecera3.php";
    include "../../conexion.php";
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es" lang="es">
  <head>
    <meta http-equiv="Content-Type" content="text/html ; charset=utf-8" />
    <meta name="author" content="Javier Rodriguez" />
        
    <title>Sergio Barquilla | Galería</title>
      
    <link rel="icon"  type="image/x-icon"  href="../../imagenes/icono.ico">
    <link href="../../imagenes/icono.ico" rel="shortcut icon" type="image/x-icon" />
    <link href="../../estilos/cookies.css" rel="stylesheet" type="text/css">
    <link href="../../estilos/galeria.css" rel="stylesheet" type="text/css">
    <link href="../../estilos/galeria2.css" rel="stylesheet" type="text/css">
</head>
<body id="page">
    <div class="cuerpo">
    <div class='container'>
        <header>
            <h1>Galería de imagenes 
                <?php if(isset($_SESSION['alias'])){
                    echo '<div class="agregar"><a href="addgaleria.php"></a></div>';
                    }
                ?>
            </h1>
        </header>
        <section>
            <ul class="lb-album">
                <?php
                    $consulta= "select * from galeria";
                    $resultado=mysqli_query($link,$consulta) or die (mysqli_error($link)); 
                    
                    $numeroImagen = 1;
                    $numeroTotalImagenes = mysqli_num_rows($resultado);
                    if(mysqli_num_rows($resultado)>0){
						while($line = mysqli_fetch_array($resultado, MYSQLI_ASSOC)){
                            $next = $numeroImagen+1;
                            $prev = $numeroImagen-1;
                            echo "<li>";
                            	echo "<a href='#image-$numeroImagen'>";
                                    echo "<img src='../../imagenes/galeria/".$line['imagen'].".jpg' height='150px' width='150px'>";
                                    echo "<span></span>";
                                echo "</a>";
                            if(isset($_SESSION['alias'])){
                                echo "<div class='eliminar'><a href='./elimina.php?cod=".$line['id_galeria']."'></a></div>";
                            }
                                echo "<div class='lb-overlay' id='image-$numeroImagen'>";
                                    echo "<img src='../../imagenes/galeria/".$line['imagen'].".jpg'>";
                                    echo "<div>";
                                        if($numeroImagen==1){
                                            echo "<a href='#image-$numeroTotalImagenes' class='lb-prev'>Prev</a>";
                                            echo "<a href='#image-2' class='lb-next'>Next</a>";
                                        } else if($numeroImagen==$numeroTotalImagenes){
                                            echo "<a href='#image-".$prev."' class='lb-prev'>Prev</a>";
                                            echo "<a href='#image-1' class='lb-next'>Next</a>";
                                        } else {
                                            echo "<a href='#image-".$prev."' class='lb-prev'>Prev</a>";
                                            echo "<a href='#image-".$next."' class='lb-next'>Next</a>";
                                        }
                                    echo "</div>";
                                    echo "<a href='#page' class='lb-close'>X</a>";
                                echo "</div>";
                            echo "</li>";
                            $numeroImagen++;
						}
                    } else {
						echo "No hay imágenes en la galería";
					}
                ?>
            </ul>
        </section>
    </div>
    </div>
</body>
</html>