<?php
include("conexion.php"); //variables de la conexion
$con=conectar();

//Variables para los datos que vamos a recuperar
// $cod_estudiante=$_POST['cod_estudiante']; 
// $dni=$_POST['dni'];
// $nombres=$_POST['nombres'];
// $apellidos=$_POST['apellidos'];


$nombre=$_POST['nombre']; 
$username=$_POST['username']; 
$password=$_POST['password']; 
$rol=$_POST['rol'];




// $sql="INSERT INTO alumno VALUES('1','$Abiu','$username','$password','$norol','$calle','$noCasa','$colonia')";
$sql=" INSERT INTO usuarios VALUES(NULL,'$nombre','$username','$password','$rol')";
$query= mysqli_query($con,$sql);

if($query){
    Header("Location: home_administrador.php");
    
}else {
}
?>

<?php


