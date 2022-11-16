<?php

include("conexion.php");
$con=conectar();

$idCliente=$_GET['idCliente']; 
$idElectrodomestico=$_GET['idElectrodomestico'];
$codigo_seguimiento= $_POST['codigo_seguimiento'];
$nombre= $_POST['nombre']; 
$modelo=$_POST['modelo']; 
$marca=$_POST['marca']; 
$fecha_entrada=$_POST['fecha_entrada']; 
$fecha_salida=$_POST['fecha_salida']; 
$estado=$_POST['estado']; 
$estado_garantia=$_POST['estado_garantia']; 
$observaciones=$_POST['observaciones'];
$trabajo_a_realizar=$_POST['trabajo_a_realizar']; 

$sql="UPDATE electrodomestico SET codigo_seguimiento='$codigo_seguimiento',nombre='$nombre', modelo='$modelo',marca='$marca',fecha_entrada='$fecha_entrada',fecha_salida='$fecha_salida', estado='$estado', estado_garantia='$estado_garantia' , observaciones= '$observaciones', trabajo_a_realizar='$trabajo_a_realizar' WHERE idCliente='$idCliente' AND idElectrodomestico='$idElectrodomestico';";
$query=mysqli_query($con,$sql);

    if($query){
        Header("Location: electrodomesticos.php?id=$idCliente");
    }
?>