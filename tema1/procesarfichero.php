<html>

<head>
  <title>Contenido del fichero seleccionado</title>
</head>

<body>
<?php
    if(isset($_FILES['myfile']))
    {
        $myfile = $_FILES['myfile'];
        //se obtiene la ruta origen
        $rutaOrigen = $myfile['tmp_name'].'/'.$myfile['name'];
        //var_dump($myfile);
        
        echo '<br>';
        //mover el fichero de la carpeta temporal a otra carpeta del servidor web
        $path = $_SERVER['DOCUMENT_ROOT'].'/hlc/TEMA1/pedidos/'.$myfile['name'];
        echo $path;
        
        move_uploaded_file($_FILES['myfile']['tmp_name'],$path) or
            die("No se pudo mover el archivo");
        
        //leer contenido del fichero
        $fp = fopen($path,"r");
        while(!feof($fp)){
            $linea = fgets($fp);
            $lineabr = nl2br($linea);
            echo $lineabr;
        }
        fclose($fp);
    }   
?>
</body>
</html>