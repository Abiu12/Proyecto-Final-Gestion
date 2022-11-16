<?php
function conectar(){
    $host="localhost";
    $user="root";
    $pass="";

    $bd="bd_taller";

    $con=mysqli_connect($host,$user,$pass);

    mysqli_select_db($con,$bd);

    return $con;
}


?>

<?php
/*
* Script: Conexión a base de datos de MySQL con PHP
* Autor: Marco Robles
* Team: Códigos de Programación
*/


/* Creando una nueva conexión a la base de datos. */
$conn = new mysqli("127.0.0.1", "root", "", "bd_taller");

/* Comprobando si hay un error de conexión. */
if ($conn->connect_error) {
    die('Error de conexion ' . $conn->connect_error);
}