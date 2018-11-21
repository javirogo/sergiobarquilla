<?php 
	session_start();
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es" lang="es">
  <head>
    <meta http-equiv="Content-Type" content="text/html ; charset=utf-8" />
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta name="author" content="Javier Rodriguez" />
        
    <link rel="icon"  type="image/x-icon"  href="../imagenes/icono.ico">
    <link href="../imagenes/icono.ico" rel="shortcut icon" type="image/x-icon" />
    <link href="../estilos/cookies.css" rel="stylesheet" type="text/css">
    <link href="../estilos/cabecera.css" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="../estilos/font-awesome.min.css">
    <script src="../javascript/jquery.min.js"></script>
    <script src="../javascript/headroom.min.js"></script>
    <script src="../javascript/prefixfree.min.js" type="text/javascript"></script>
</head>
    
    <body>
        <header>
            <!--//BLOQUE COOKIES-->
            <div id="barraaceptacion">
                <div class="inner">
                    En esta web usamos cookies para mejorar la experiencia del usario. Si contin&uacute;a navegando consideramos que acepta el uso de cookies.
                    <a href="javascript:void(0);" class="ok" onclick="PonerCookie();"><b>OK</b></a> | 
                    <a href="http://politicadecookies.com" target="_blank" class="info">M&aacute;s informaci&oacute;n</a>
                </div>
            </div>

            <script>
            function getCookie(c_name){
                var c_value = document.cookie;
                var c_start = c_value.indexOf(" " + c_name + "=");
                if (c_start == -1){
                    c_start = c_value.indexOf(c_name + "=");
                }
                if (c_start == -1){
                    c_value = null;
                }else{
                    c_start = c_value.indexOf("=", c_start) + 1;
                    var c_end = c_value.indexOf(";", c_start);
                    if (c_end == -1){
                        c_end = c_value.length;
                    }
                    c_value = unescape(c_value.substring(c_start,c_end));
                }
                return c_value;
            }

            function setCookie(c_name,value,exdays){
                var exdate=new Date();
                exdate.setDate(exdate.getDate() + exdays);
                var c_value=escape(value) + ((exdays==null) ? "" : "; expires="+exdate.toUTCString());
                document.cookie=c_name + "=" + c_value;
            }

            if(getCookie('tiendaaviso')!="1"){
                document.getElementById("barraaceptacion").style.display="block";
            }
            function PonerCookie(){
                setCookie('tiendaaviso','1',365);
                document.getElementById("barraaceptacion").style.display="none";
            }
            </script>
            <!--//FIN BLOQUE COOKIES-->
        
        
            <?php
                if (isset($_SESSION['alias'])){
                    echo "<div class = 'iniciosesion'>";
                    echo "<div class = 'izquierda_sesion'>";
                    echo "Bienvenido ".$_SESSION['alias'];
                    echo "</div>";
                    echo "<div class = 'derecha_sesion'>";
                    echo "<a href='./cerrarsesion.php'>Cerrar sesión</a>";
                    echo "</div>";
                    echo "</div>";
                } 
            ?>
            <div id="banner_out"> 
        
            <!--BANNER-->
                <div id="banner">
                    <div class="izquierda">
                        <div class="logo_banner">
                        <a href="../index.php" ><img src="../imagenes/logo3.png" height="150px" width="130px" /></a></div>
                    </div>
                    <div class="derecha">

                        <!--LOGO--> 
                    <div id="panel_logos">    
                    <div id="facebook">
                        <div id="derecha_facebook">
                            <a href="https://www.facebook.com/Sergio-Barquilla-183979348604998/?ref=aymt_homepage_panel" target="_blank"></a>
                        </div>
                    </div>
                    <div id="numero"><p>+34 677 190 333</p></div>
                    <div id="email"><p>sbqmagia@gmail.com</p></div>
                    </div>

                    <!-- fin banner -->
                    </div>
                </div>
                
                <div class="indice_defecto">
                    <div class="menu_defecto">
                        <nav class=menu id="header">
                            <div class=logo>
                                <a href="#" class="btn-menu" id="btn-menu"><i class="icono fa fa-bars" aria-hidden="true"></i></a>
                            </div>
                            <div class="enlaces" id="enlaces">
                                <a href="../index.php">Inicio</a>
                                <a href="./quien_es.php" >¿Quién es?</a>
                                <a href="./espectaculo.php" >Espectáculos</a>
                                <a href="./galeria/" >Imágenes</a>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </header>
        <script src="../javascript/jquery.min.js"></script>
        <script src="../javascript/menu.js"></script>
	</body>
</html>