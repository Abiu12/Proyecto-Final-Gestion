<?php
include("conexion.php"); 
$conexion=conectar();

$codigo_seguimiento=$_POST['codigo_seguimiento']; 
$sqli = "SELECT * from electrodomestico where codigo_seguimiento='$codigo_seguimiento';";
$result = mysqli_query($conexion, $sqli);

if (mysqli_num_rows($result)>0) {
    Header("Location: status_electrodomestico.php?codigo_seguimiento=$codigo_seguimiento");    
    }else{
        Header("Location: interfaz_cliente_no_encontrado.php");  
    }
?>