<?php

include("conexion.php");
$con=conectar();

//$idCliente= $_POST['idCliente']; 
$idCliente=$_GET['idCliente'];
$nombre=$_POST['nombre']; 
$apellidoPaterno=$_POST['apellidoPaterno']; 
$apellidoMaterno=$_POST['apellidoMaterno']; 
$noTelefono=$_POST['noTelefono']; 
$calle=$_POST['calle']; 
$noCasaInt=$_POST['noCasaInt']; 
$noCasaExt=$_POST['noCasaExt']; 
$colonia=$_POST['colonia']; 

$sql="UPDATE cliente SET  nombre='$nombre',apellidoPaterno='$apellidoPaterno',apellidoMaterno='$apellidoMaterno',noTelefono='$noTelefono', calle='$calle', noCasaInt='$noCasaInt' ,noCasaExt='$noCasaExt' , colonia= '$colonia'   WHERE idCliente='$idCliente'";
$query=mysqli_query($con,$sql);

    if($query){
        Header("Location: home_empleado.php");
    }
?>