<?php
include "paginas/cabecera/cabecera.php";
include "./conexion.php";
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es" lang="es">
  <head>
    <meta http-equiv="Content-Type" content="text/html ; charset=utf-8" />
    <meta name="author" content="Javier Rodriguez" />
        
    <title>Sergio Barquilla</title>

      <link rel="stylesheet" type="text/css" href="slider/engine1/style.css" />
      <script type="text/javascript" src="slider/engine1/jquery.js"></script>
	   <link href="./estilos/cabecera.css" rel="stylesheet" type="text/css" />
      <link href="./estilos/index.css" rel="stylesheet" type="text/css" />
      <script type="text/javascript" src="javascript/jquery.js"></script>
      
            <script type="text/javascript">
          
          $(document).ready(function() {
              
              
                
            <?php
                $consulta= "select id_actuacion from actuaciones order by fecha desc";
                $resultado=mysqli_query($link,$consulta) or die (mysqli_error($link));
                while($line = mysqli_fetch_array($resultado, MYSQLI_ASSOC)){
                    ?>
                        $('#alternar-panel-oculto-actuacion<?php echo $line['id_actuacion']; ?>').toggle( 
 
                            function(e){ 
                                $('#panel-oculto-<?php echo $line['id_actuacion']; ?>').slideDown();
                                e.preventDefault();
                            }, 
                            function(e){ 
                                $('#panel-oculto-<?php echo $line['id_actuacion']; ?>').slideDown();
                                e.preventDefault();
                            }

                        );

                        $('#alternar-panel-oculto-actuacion<?php echo $line['id_actuacion']; ?>-2').toggle( 

                            function(e){ 
                                $('#panel-oculto-<?php echo $line['id_actuacion']; ?>').slideUp();
                                e.preventDefault();
                            },
                            function(e){ 
                                $('#panel-oculto-<?php echo $line['id_actuacion']; ?>').slideUp();
                                e.preventDefault();
                            }

                        );
                    <?php
                }
            ?>
              
            $("#enviar-btn").click(function() {

                  var name = $("input#nombre").val();
                  var comment = $("textarea#comment").val();
                  var now = new Date();
                  var date_show = now.getDate() + '-' + now.getMonth() + '-' + now.getFullYear() + ' ' + now.getHours() + ':' + + now.getMinutes() + ':' + + now.getSeconds();

                  var dataString = '&nombre=' + name+ '&comment=' + comment;

                  $.ajax({
                      type: "POST",
                      url: "addcomment.php",
                      data: dataString,
                      success: function() {
                          $('#newmessage').html(
                            '<div class="gracias">'+
                            'Gracias por su opinión.'+
                            '</div>');
                      }
                  });
                  
                  document.getElementById("comment").value = "";
                  return false;
            });
          });

      </script>
      
</head>

<body>
    <div class=cuerpo>
        <!-- Proximas actuaciones -->
        <div class="actuaciones">
            <div class="titulo1">
                Próximas actuaciones:
                <?php
                    if(isset($_SESSION['alias'])){
                        echo '<img src="./imagenes/add.png"/>';
                    }
                ?>
            </div>
            <div class="contenido1">
                
                <?php
                    $consulta= "select id_actuacion, titulo, titulo2, DATE_FORMAT(fecha, '%d/%m/%Y') as date_show, DATE_FORMAT(hora_inicio, '%h:%i') as hora_inicio, DATE_FORMAT(hora_fin, '%h:%i') as hora_fin from actuaciones order by fecha";
                    $resultado=mysqli_query($link,$consulta) or die (mysqli_error($link));
                    while($line = mysqli_fetch_array($resultado, MYSQLI_ASSOC)){
                            if(isset($_SESSION['alias'])){
                        ?>
                            <div class = borrar>
                                <img src="./imagenes/remove.png"/>
                            </div>
                        <?php } ?>
                            <div class="actuacion" id="alternar-panel-oculto-actuacion<?php echo $line['id_actuacion']; ?>">
                                <?php
                                    echo $line['date_show']."<br/>";
                                    echo "'".$line['titulo'];
                                    if(isset($line['titulo2'])){
                                        echo "<br/>".$line['titulo2']."'";
                                    } else {
                                        echo "'";
                                    }
                                    if(isset($line['hora_inicio']) and isset($line['hora_fin'])){
                                    echo "<br/> De ".$line['hora_inicio']." a ".$line['hora_fin'];
                                    }
                                ?>
                            </div>
                        <?php
                    }
                ?>
                </div>
        </div>
    
		<?php
			$consulta= "select id_actuacion, titulo, titulo2, DATE_FORMAT(fecha, '%d-%m-%Y') as date_show, direccion, mapa, DATE_FORMAT(hora_inicio, '%h:%i') as hora_inicio, DATE_FORMAT(hora_fin, '%h:%i') as hora_fin from actuaciones order by fecha desc";
            $resultado=mysqli_query($link,$consulta) or die (mysqli_error($link));
			while($line = mysqli_fetch_array($resultado, MYSQLI_ASSOC)){
				?>
                    <div id="panel-oculto-<?php echo $line['id_actuacion']; ?>" style="display:none;position: fixed; top: 0; width: 100%; height: 100%; z-index: 1000;background:url(./imagenes/bg.png);">
                        <div class="titulo">
                            '<?php echo $line['titulo'];if(isset($line['titulo2'])){echo " ".$line['titulo2'];}?>'
                            <br/>Te esperamos el día 
                            <?php
                                echo $line['date_show'];
                                if(isset($line['hora_inicio']) and isset($line['hora_fin'])){
                                    echo " desde las ".$line['hora_inicio']." hasta las ".$line['hora_fin'];
                                }
                            ?>
                        </div>
                        <div class="direccion">
                            <?php echo $line['direccion'];?>
                        </div>
                        <div class="mapa">
                            <?php echo $line['mapa'];?>
                        </div>
                        <div class="dejaopinion2">
                            <a href="#" id="alternar-panel-oculto-actuacion<?php echo $line['id_actuacion']; ?>-2">Volver atrás</a>
                        </div>
                    </div>
				<?php
			}
        ?>
    </div>
</body>
</html>