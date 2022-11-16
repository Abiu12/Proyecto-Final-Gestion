<?php
include("conexion.php");
$con=conectar();
$idUsuario=$_GET['idUsuario'];
$nombre=$_POST['nombre']; 
$username=$_POST['username']; 
$password=$_POST['password']; 
$rol=$_POST['rol']; 


$sql="UPDATE usuarios SET  nombre='$nombre',username='$username',password='$password',rol='$rol' WHERE idUsuario='$idUsuario'";
$query=mysqli_query($con,$sql);

    if($query){
        Header("Location: usuarios.php");
    }
?>