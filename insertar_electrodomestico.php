<?php
include("conexion.php"); //variables de la conexion
$con=conectar();

date_default_timezone_set('America/Mexico_City');
$Año= date('Y');  //Año en 4 digitos
$MesNumero = date('n'); // Número del mes en curso
$DiasMes= date('d'); // Dias del mes en curso
$Hora=date('his A'); // Hora actual con formato AM



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
$codigo_seguimiento= "ELEC".$MesNumero.$DiasMes.substr($Año,2,3).$idCliente."_".substr($Hora,0,6);
//echo $codigo_seguimiento;
//exit;



// $sql="INSERT INTO alumno VALUES('1','$Abiu','$apellidoPaterno','$apellidoMaterno','$noTelefono','$calle','$noCasa','$colonia')";
$sql="INSERT INTO electrodomestico VALUES (NULL, '$codigo_seguimiento','$nombre', '$modelo', '$marca', '$fecha_entrada', '$fecha_salida', '$estado', '$estado_garantia', '$observaciones','$trabajo_a_realizar', '$idCliente');";
$query= mysqli_query($con,$sql);

if($query){
    Header("Location: electrodomesticos.php?id=$idCliente");
    
}else {
}
?>

<?php


