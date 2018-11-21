<?php
	session_start();
include "../conexion.php";
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es" lang="es">
  <head>
    <meta http-equiv="Content-Type" content="text/html ; charset=utf-8" />
    <meta name="author" content="Javier Rodriguez" />
        
    <title>Sergio Barquilla | Nueva entrada</title>

      <link href="../estilos/entrada.css" rel="stylesheet" type="text/css" />
      
	<script type="text/javascript" src="../javascript/jquery.js"></script>
      
      
		<script type="text/javascript">

			function ini()	{
				window.frames.ver.location.href = "./blog/previsor_blog.php";

			}

			function validar(f)	{
				enviar = /\.(gif|jpg|png|ico|bmp)$/i.test(f.archivo.value);
				return enviar;
			}

			function limpiar()	{
				f = document.getElementById("archivo");
				nuevoFile = document.createElement("input");
				nuevoFile.id = f.id;
				nuevoFile.type = "file";
				nuevoFile.name = "archivo";
				nuevoFile.value = "";
				nuevoFile.onchange = f.onchange;
				nodoPadre = f.parentNode;
				nodoSiguiente = f.nextSibling;
				nodoPadre.removeChild(f);
				(nodoSiguiente == null) ? nodoPadre.appendChild(nuevoFile):
					nodoPadre.insertBefore(nuevoFile, nodoSiguiente);
			}

			function checkear(f)	{
				function no_prever() {
					alert("El fichero seleccionado no es válido.");
					limpiar();
				}
				function prever() {

					actionActual = f.form.action;
					targetActual = f.form.target;
					f.form.action = "./blog/previsor_blog.php";
					f.form.target = "ver";
					f.form.submit();
					f.form.action = actionActual;
					f.form.target = targetActual;

				}

				(/\.(gif|jpg|png|ico|bmp)$/i.test(f.value)) ? prever() : no_prever();
			}

		</script>
      
      
	  
	  
</head>

<body onload="ini()">
    <div class=cuerpo>
		<?php
        if(isset($_SESSION['alias'])){
			if(isset($_POST['iniciar'])){
				
				$query = "SELECT id_blog FROM blog order by id_blog desc limit 1";
				$result = mysqli_query($link, $query) or die('Consulta fallida: ' . mysqli_error($link));
				$contados = mysqli_fetch_array($result);
				$imagenultima = $contados['id_blog']+1;
				$archivo = $_SESSION['alias']."_".$imagenultima.".jpg";
				$_FILES['archivo']['name']=$_SESSION['alias']."_".$imagenultima.".jpg";
				$target_path = "../imagenes/upload/";
				$target_path = $target_path . basename( $_FILES['archivo']['name']); 
				if(move_uploaded_file($_FILES['archivo']['tmp_name'], $target_path)) { 
					$query = "INSERT INTO blog VALUES (NULL, '".$_POST['titulo']."','".$_POST['texto']."','".$archivo."',null)";
					$result = mysqli_query($link, $query) or die('Consulta fallida: ' . mysqli_error($link));
					echo "<br><br><h3 style='color:green;'>Ya dispone de la nueva entrada en su blog.</h3>";
					echo "<h3 style='color:green;'>Ver ahora.</h3>";
				} else {
					echo "<p>Ha ocurrido un error al intentar subir la imagen.</p>";
					echo "<p>Vuelva a intentarlo, si el error persiste póngase en contacto con el administrador.</p>";
					echo "<p>Gracias.</p>";
					
					?>
					
					  <form name=buscador enctype='multipart/form-data' class="centrado" action="" method="post">
      
            
						<div class=titulo>
						<p>Título:</p>
						</div>
						<div class="a">
							<input class="text" name='titulo' type='text'  id="titulo" value ="<?php echo $_POST['titulo']; ?>" required />
						</div>	
						
						<div class=titulo>
							<p>Escriba el texto de la noticia:</p>
						</div>
					 
						<div class="b">
							<textarea class="text" name='texto' id="texto" value ="<?php echo $_POST['texto']; ?>" required></textarea>
						</div>

						<div class=dibujo>
							<p>Agregue una foto a la noticia:</p>
						</div>
						<input class="file" name='archivo' type='file'  id="archivo" onchange="checkear(this)" required />
						<iframe  src='blog/previsor_blog.php' id='ver' name='ver' style='display: block; margin: auto; border: 0px; width: 200px; height: 200px;'>
						</iframe>
						<input class="submit" type="submit" name="iniciar" id="enviar-btn" value="Insertar entrada" />
					  </form>
					  <div class=volver>
						<a href='blog.php'>Volver</a>
					  </div>
					
					<?php
				}							
			} else {
		?>
		  <form name=buscador enctype='multipart/form-data' class="centrado" action="" method="post">
      
            
			<div class=titulo>
			<p>Título:</p>
			</div>
			<div class="a">
				<input class="text" name='titulo' type='text'  id="titulo" required />
			</div>	
			
			<div class=titulo>
				<p>Escriba el texto de la noticia:</p>
			</div>
		 
			<div class="b">
				<textarea class="text" name='texto' id="texto" required></textarea>
			</div>

			<div class=titulo>
				<p>Agregue una foto a la noticia:</p>
			</div>
			<input class="file" name='archivo' type='file'  id="archivo" onchange="checkear(this)" required />
			<iframe  src='blog/previsor_blog.php' id='ver' name='ver' style='display: block; margin: auto; border: 0px; width: 200px; height: 200px;'>
			</iframe>
			<input class="submit" type="submit" name="iniciar" id="enviar-btn" value="Insertar entrada" />
		  </form>
		  <div class=volver>
			<a href='blog.php'>Volver</a>
		  </div>
		<?php
			}
        } else {
		  echo "<h2 class='centrado'>Debes ser administrador para acceder a esta sección.</h2>";   
        }
		?>
	</div>
</body>
</html>