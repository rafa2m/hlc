<html>
<head>
   <title>Tablas de multiplicar.</title> 
</head>
<body>
<h1>Tablas de multiplicar</h1>

<?php  
for ($tabla=2; $tabla <=9 ; $tabla++){
   echo 'Tabla del '.$tabla.'<br/>';
   for ($x=1; $x <=10 ; $x++){
      echo '[ '.$tabla.' * '.$x.' = '.$tabla*$x.' ] ';
   }
   echo '<hr/>';
}
$x=0.005;
$y=-0.01;
echo (2*$x+($y==0))==true;
echo false;
?>
</body>
</html>
