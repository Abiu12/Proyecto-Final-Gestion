<?php
include("conexion.php"); //variables de la conexion
$con=conectar();

//Variables para los datos que vamos a recuperar
// $cod_estudiante=$_POST['cod_estudiante']; 
// $dni=$_POST['dni'];
// $nombres=$_POST['nombres'];
// $apellidos=$_POST['apellidos'];

$codigo_seguimiento=$_POST['codigo_seguimiento']; 
$nombre=$_POST['nombre']; 
$modelo=$_POST['modelo']; 
$marca=$_POST['marca']; 
$fecha_entrada=$_POST['fecha_entrada'];
$fecha_salida=$_POST['fecha_salida'];
$estado=$_POST['estado']; 
$estado_garantia=$_POST['estado_garantia']; 
$observaciones=$_POST['observaciones'];  
$trabajo_a_realizar=$_POST['trabajo_a_realizar'];  
$idCliente=$_GET['id']; /**Lo pasamos con la url */




// $sql="INSERT INTO alumno VALUES('1','$Abiu','$apellidoPaterno','$apellidoMaterno','$noTelefono','$calle','$noCasa','$colonia')";
$sql="INSERT INTO electrodomestico VALUES (NULL, '$codigo_seguimiento','$nombre', '$modelo', '$marca', '$fecha_entrada', '$fecha_salida', '$estado', '$estado_garantia', '$observaciones','$trabajo_a_realizar', '$idCliente');";
$query= mysqli_query($con,$sql);

if($query){
    Header("Location: electrodomesticos.php?id=$idCliente");
    
}else {
}
?>

<?php


