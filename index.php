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
      <link href="./estilos/index.css" rel="stylesheet" type="text/css" />
      <script type="text/javascript" src="javascript/jquery.js"></script>
      
            <script type="text/javascript">
          
          $(document).ready(function() {
              
            $('#alternar-panel-oculto').toggle( 
 
                function(e){ 
                    $('#panel-oculto').slideDown();
                    e.preventDefault();
                }, 
                function(e){ 
                    $('#panel-oculto').slideDown();
                    e.preventDefault();
                }
 
            );
              
            $('#alternar-panel-oculto2').toggle( 
  
                function(e){ 
                    $('#panel-oculto').slideUp();
                    e.preventDefault();
                },
                function(e){ 
                    $('#panel-oculto').slideUp();
                    e.preventDefault();
                }
 
            );
              
              
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
                            '<div class="gracias2"><div class="gracias">'+
                            'Gracias por su opinión.'+
                            '</div></div>');
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
        <div class="fraseinicio">
            <div class="frase">
                "Cuando la gente te diga que es imposible, sonrie y entiende que la realidad que estás a punto de crear, ellos no la pueden ni imaginar"
            </div>
            <div class="autor2">
                David Copperfield
            </div>
        </div>
        <!-- Sección arriba -->
        <div class="seccion_arriba">
        <!-- Start WOWSlider.com BODY section -->
        <div id="wowslider-container1">
            <div class="ws_images"><ul>
                <li><img src="slider/data1/images/IMG_4161C.jpg" alt="jquery slider" title="inicio1" id="wows1_0"/></li>
                <li><img src="slider/data1/images/IMG_4421C.jpg" alt="diseñopaginavieja" title="inicio2" id="wows1_1"/></li>
                <li><img src="slider/data1/images/IMG_7683.jpg" alt="diseñopaginavieja" title="inicio3" id="wows1_1"/></li>
                <li><img src="slider/data1/images/IMGP8968.jpg" alt="diseñopaginavieja" title="inicio4" id="wows1_1"/></li>
                <li><img src="slider/data1/images/IMGP9137.jpg" alt="diseñopaginavieja" title="inicio5" id="wows1_1"/></li>
                </ul>
            </div>
            
            <div class="ws_script" style="position:absolute;left:-99%"></div>
            <div class="ws_shadow"></div>
        </div>
        <script type="text/javascript" src="slider/engine1/wowslider.js"></script>
        <script type="text/javascript" src="slider/engine1/script.js"></script>
<!-- End WOWSlider.com BODY section -->


        <!-- Fin proximas actuaciones -->
        </div>
        <!-- Sección abajo -->
        <div class="seccion_abajo">
        
        <!-- Opiniones -->
        <div class="opiniones">
            <!-- Deja tu opinion -->
            <div class="dejaopinion">

                <a href="#" id="alternar-panel-oculto">Deja tu opinión</a>
            </div>
            <!-- Fin deja tu opinion -->
            
            <div class="titulo2">
                Opiniones del público:
            </div>
            
            <!-- Ver todas opiniones -->
            <div class="veropiniones">
                <a href="./paginas/opiniones.php">Ver opiniones</a>
            </div>
            <!-- Fin ver todas opiniones -->
            
            <div class="contenido2total">
                <div class="contenido2">
                <?php
                    $consulta2= "select * from comentario ORDER BY rand() LIMIT 1";
                    $resultado2=mysqli_query($link,$consulta2) or die (mysqli_error($link)); 
                    while ($line = mysqli_fetch_array($resultado2, MYSQLI_ASSOC)) {
                        echo "<div class='autor'>".$line['nombre'].": </div>";
                        echo '<div class=opinion>"'.$line['texto'].'"</div>';
                    }
                ?>
                </div>
            </div>
        </div>
        <!-- Fin opiniones -->
        
        </div>
    </div>
    
        <div id="panel-oculto" style="display:none;position: fixed; top: 0; width: 100%; height: 100%; z-index: 500;background:url(./imagenes/bg.png);">
            <div id="newmessage">
                <?php
                    $consulta1= "select * from comentario where ip = '".$_SERVER['REMOTE_ADDR']."'";
                    $resultado1=mysqli_query($link,$consulta1) or die (mysqli_error($link)); 
                
                    if(mysqli_num_rows($resultado1)>9){
                        echo "<div class='gracias2'><div class='gracias'>Gracias por su opinión.</div></div>";
                    } else {
                        
                ?>
                
                <div class="commentGlobal" style="padding-bottom: 15px;">
                    <div class="comment">
                        <form method="post" action="#">
                            <div class=fotoautor><img width="55" height="55" src="./imagenes/logo.png" /></div><div class=autor>Nombre:</div>
                            <input type=text class="text" id="nombre" name="nombre" maxlength="50" required />
                            <br/><br/>
                            <div class=comentario>Opinión:</div>
                            <textarea class="text" name="comment" id="comment" rows="5" maxlength="133" required></textarea>
                            <br/><br/>
                            <div class=centrado><input name="submit" class= "submit" type="submit" value="enviar" id="enviar-btn" /></div>
                        </form>
                        
                    </div>
                </div>
                <?php
                    }
                ?>
            </div>
                        <div class="dejaopinion2">
 
                            <a href="#" id="alternar-panel-oculto2">Volver atrás</a>
                        </div>
        </div>   
</body>
</html>
