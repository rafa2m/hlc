<?php
//propiedades de conexión

$host = 'localhost';
$usuario = 'root';
$db = 'world';
echo 'antes de conectar';
//conexión
$conn = mysqli_connect($host,$usuario,'',$db);

//preparar una consulta con parámetros
$sql = "DELETE FROM city WHERE CountryCode=?";
$nombre_usuario = 'rafa';
$correo_usuario = 'aaaaaaaa@aaa.com';
$telefono_usuario = '+34567890123';
$id='ESP';

//preparar la consulta
$pre = mysqli_prepare($conn,$sql);
var_dump($pre);
//se enlazan los parámetros con las variables
mysqli_stmt_bind_param($pre,"i",$id);
//se ejecuta la consulta
mysqli_stmt_execute($pre);
//cerrar la consulta
mysqli_stmt_close($pre);
//cierro la conexión
mysqli_close($conn);
?>
