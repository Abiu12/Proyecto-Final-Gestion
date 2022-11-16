<?php

include("conexion.php");
$con=conectar();

$idCliente=$_GET['id'];

$sql="DELETE FROM cliente  WHERE idCliente='$idCliente'";
$query=mysqli_query($con,$sql);

    if($query){
        Header("Location: home_empleado.php");
    }
?>
