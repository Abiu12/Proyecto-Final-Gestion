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
$noCasaInt=$_POST['noCasaInt']; 
$noCasaExt=$_POST['noCasaExt']; 
$colonia=$_POST['colonia']; 

if (buscarRepetido($con ,$nombre, $apellidoPaterno, $apellidoMaterno, $noTelefono) == 1) {
    // echo "ya esta registrado";
    // echo '<script language="javascript">alert("Usuario Registrado");</script>';
    Header("Location: agregar_cliente.php?statusClienteRegistrado=1");

}else{
    $sql=" INSERT INTO cliente VALUES(NULL,'$nombre','$apellidoPaterno','$apellidoMaterno','$noTelefono','$calle','$noCasaInt','$noCasaExt','$colonia')";
    $query= mysqli_query($con,$sql);
    Header("Location: home_empleado.php");
}


// $sql="INSERT INTO alumno VALUES('1','$Abiu','$apellidoPaterno','$apellidoMaterno','$noTelefono','$calle','$noCasaInt','$colonia')";
 


function buscarRepetido($conexion,$name,$apellidoP,$apellidoM,$telefono){
    $sqli = "SELECT * from cliente where nombre='$name' and apellidoPaterno='$apellidoP' and apellidoMaterno='$apellidoM' and noTelefono ='$telefono'";
    
    $result = mysqli_query($conexion, $sqli);
    
    if (mysqli_num_rows($result)>0) {
        return 1;
    }else{
        return 0;
    }
    
    }

?>






<script type="text/javascript">
    function alertaUsuarioRegistrado() {
    alert("Este usuario ya esta registrado");
    }
</script>