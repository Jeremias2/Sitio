<?php
 
require 'conexion.php';


// Comprobamos si ha ocurrido un error.
	print_r($_FILES['img']);
    // Verificamos si el tipo de archivo es un tipo de imagen permitido.
    // y que el tamaño del archivo no exceda los 16MB
    $permitidos = array("image/jpg", "image/jpeg", "image/gif", "image/png");
    $limite_kb = 16384;
 
    if (in_array($_FILES['img']['type'], $permitidos) && $_FILES['img']['size'] <= $limite_kb * 1024)
    {
 
        // Archivo temporal
        $imagen_temporal = $_FILES['img']['tmp_name'];
 
        // Tipo de archivo
        $tipo = $_FILES['img']['type'];
 
        // Leemos el contenido del archivo temporal en binario.
        $fp = fopen($imagen_temporal, 'r+b');
        $data = fread($fp, filesize($imagen_temporal));
        fclose($fp);
 
        //Podríamos utilizar también la siguiente instrucción en lugar de las 3 anteriores.
        // $data=file_get_contents($imagen_temporal);
 
        // Escapamos los caracteres para que se puedan almacenar en la base de datos correctamente.
        $data = $conexion->real_escape_string($data);

		$nombre = date("d-m-Y---").uniqid();
 
        // Insertamos en la base de datos.
        $resultado = $conexion -> query("INSERT INTO imagenes (imagen, tipo_imagen, nombre_imagen) VALUES ('$data', '$tipo', '$nombre')");
 
        if ($resultado)
        {
			$_SESSION['imagen'] = $data;

            $_SESSION['nombre_imagen'] = $nombre;

            header("Location: post_enviado.php");
        }
        else
        {
            echo "Ocurrió algun error al subir la imagen.";
        }
    }
    else
    {
        echo "Formato de imagen no permitido o excede el tamaño límite de $limite_kb Kbytes.";
    }

 
?>