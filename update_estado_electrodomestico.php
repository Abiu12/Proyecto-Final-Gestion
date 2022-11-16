<?php

include("conexion.php");
$con=conectar();

$idCliente=$_GET['idCliente']; 
$idElectrodomestico=$_GET['idElectrodomestico'];
$estado=$_GET['estado']; 
$sql="UPDATE electrodomestico SET estado='$estado' WHERE idCliente='$idCliente' AND idElectrodomestico='$idElectrodomestico';";
$query=mysqli_query($con,$sql);

    if($query){
        Header("Location: home_tecnico.php");
    }
?>