<?php

include("conexion.php");
$con=conectar();

$idCliente=$_GET['idCliente'];
$idElectrodomestico=$_GET['idElectrodomestico'];

$sql="DELETE FROM electrodomestico  WHERE idCliente='$idCliente' AND idElectrodomestico='$idElectrodomestico';";
$query=mysqli_query($con,$sql);

    if($query){
        Header("Location: electrodomesticos.php?id=$idCliente");
    }
?>
