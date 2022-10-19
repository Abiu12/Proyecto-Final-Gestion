<?php
include("conexion.php"); //variables de la conexion
$con=conectar();

//Variables para los datos que vamos a recuperar
// $cod_estudiante=$_POST['cod_estudiante']; 
// $dni=$_POST['dni'];
// $nombres=$_POST['nombres'];
// $apellidos=$_POST['apellidos'];


$nombre=$_POST['nombre']; 
$apellidoPaterno=$_POST['apellidoPaterno']; 
$apellidoMaterno=$_POST['apellidoMaterno']; 
$noTelefono=$_POST['noTelefono']; 
$calle=$_POST['calle']; 
$noCasa=$_POST['noCasa']; 
$colonia=$_POST['colonia']; 


// $sql="INSERT INTO alumno VALUES('1','$Abiu','$apellidoPaterno','$apellidoMaterno','$noTelefono','$calle','$noCasa','$colonia')";
$sql=" INSERT INTO cliente VALUES(NULL,'$nombre','$apellidoPaterno','$apellidoMaterno','$noTelefono','$calle','$noCasa','$colonia')";
$query= mysqli_query($con,$sql);

if($query){
    Header("Location: alumno.php");
    
}else {
}
?>