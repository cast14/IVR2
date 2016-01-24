<aside class="right-side">
<section class="content-header">
	<div class="row">
        <div class="col-md-12 text-center">
<?php
 	require("controlador/campagna.ctrl.php");
	echo '<p><b>INICIO DE LA OPERACION</<b><p>';
	require("funcion_validar_archivo.php");
	$phpFileUploadErrors = array(
		0 => 'There is no error, the file uploaded with success',
		1 => 'The uploaded file exceeds the upload_max_filesize directive in php.ini',
		2 => 'The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form',
		3 => 'The uploaded file was only partially uploaded',
		4 => 'No file was uploaded',
		6 => 'Missing a temporary folder',
		7 => 'Failed to write file to disk.',
		8 => 'A PHP extension stopped the file upload.',
	);
	$ubicacionDoc = "c:/ivr/docs/";
	$ubicacionAudio = "c:/ivr/audio/";
	$bdDoc='';
	$bdAudio='';
	$campagna = $_POST["txtNombre"];
	$boolSuccessAudio = true;
	$boolSuccessDoc = true;
	
	if(!empty($_FILES['fileBase']) && !empty($_FILES['fileAudio'])):
		echo '<br>NOMBRE DE LA CAMPAÑA: <b>'.$campagna.'</b>';
		$nombre_archivo = $_FILES['fileBase']['name'];
		echo '<br>DOCUMENTO: <b>'. $nombre_archivo .'</b>';
		$nombre_archivoAudio = $_FILES['fileAudio']['name'];
		echo '<br>AUDIO: <b>'.$nombre_archivoAudio .'</b>';
		$ext=explode(".",$nombre_archivo);
		echo '<br>EXSTENCION DEL DOCUMENTO: <b>'. $ext[1].'</b>';
		$ext2=explode(".",$nombre_archivoAudio); 
		echo '<br>EXSTENCION DEL AUDIO: <b>'. $ext2[1].'</b>';
		if ($_FILES['fileBase']["error"] > 0):
			$numErrorDoc = $_FILES['fileBase']['error'];
			$errorMensajeDoc = '';
			foreach($phpFileUploadErrors as $num => $mensaje)
			{
				if($num == $numErrorDoc):
					$errorMensajeDoc = $mensaje;
					break;
				endif;
			}
			echo "<font color='red'><b>ERROR EN EL DOCUMENTO: " . $errorMensaje . "</b></font><br>";
			$boolSuccessDoc = false;
		else:	
			if(validar_archivo_doc($nombre_archivo)):
				move_uploaded_file($_FILES['fileBase']['tmp_name'],$ubicacionDoc. $nombre_archivo);
				echo "<br><font color='green'><b>'DOCUMENTO CARGADO EXITOSAMENTE'</b></font><br>";
				 $bdDoc= $ubicacionDoc.$nombre_archivo;
				 
			else:
				echo "<center><br><font color='red'><b>EL FORMATO DEL DOCUMENTO ES INCORRECTO, SOLO SE PERMITEN: '.xls' '.xlsx'</b></font></center>";
				$boolSuccessDoc = false;
			endif;
		endif;
		if ($_FILES['fileAudio']["error"] > 0):
			$numError = $_FILES['fileAudio']['error'];
			$errorMensaje = '';
			foreach($phpFileUploadErrors as $num => $mensaje)
			{
				if($num == $numError):
					$errorMensaje = $mensaje;
					break;
				endif;
			}
			echo "<font color='red'><b>ERROR ARCHIVO DE AUDIO: " . $errorMensaje . "</b></font><br>";
			$boolSuccessAudio = false;
		else:	
			if(validar_archivo_audio($nombre_archivoAudio)):
				move_uploaded_file($_FILES['fileAudio']['tmp_name'],$ubicacionAudio. $nombre_archivoAudio);
				echo "<br><font color='green'><b>'AUDIO CARGADO EXITOSAMENTE'</b></font><br>";
				 $bdAudio=$ubicacionAudio.$nombre_archivoAudio;
				 
			else:
				echo "<br><center><font color='red'><b>EL FORMATO DEL ARCHIVO DE AUDIO ES INCORRECTO, SOLO SE PERMITEN: '.wav' '.mp3'</b></font></center>";
				$boolSuccessAudio = false;
			endif;
		endif;
		if($bdDoc !='' && $bdAudio!='' && $campagna != '' && $boolSuccessAudio && $boolSuccessDoc):
			$boolResult = insert_campagna($campagna,1,$bdDoc,$bdAudio);
			if($boolResult):
				echo "<br><font color='green'><b>'NUEVA CAMPAGNA ALMACENADA CORRECTAMENTE EN LA BASE DE DATOS'  <a href='?vista=list_campana'>REGRESAR</a></b></font><br>";
			else:
				"<font color='red'><b>'OCURRIO UN ERROR AL MOMENTO DE INSERTAR LA INFORMACION EN LA BASE DE DATOS FAVOR CARGAR NUEVAMENTE AUDIO Y DOCUMENTO' <a href='../?vista=list_campana'>REGRESAR</a></b></font><br>";
			endif;
		else:
			"<font color='red'><b>'FALTAN PARAMETROS OBLIGATORIOS PARA PODER REALIZAR EL INSERT A LA BD' <a href='?vista=list_campana'>REGRESAR</a></b></font><br>";
		endif;
	else:
		echo "<font color='red'><b>'DEBE SELECCIONAR AUDIO Y VIDEO O REVISAR EL TAMAÑO MAXIMO DE UPLOAD EN EL ARCHIVO PHP.INI' <a href='?vista=list_campana'>REGRESAR</a></b></font><br>";
	endif;
?>
		</div>
   </div>
</section>
</aside>