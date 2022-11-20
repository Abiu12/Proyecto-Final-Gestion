<?php
include("conexion.php"); 
$conexion=conectar();
$codigo_seguimiento=$_GET['codigo_seguimiento']; 

$sql = "SELECT * from electrodomestico where codigo_seguimiento='$codigo_seguimiento';";
$query = mysqli_query($conexion, $sql);
$row=mysqli_fetch_array($query);

$idCliente = $row["idCliente"];

$sqlCliente = "SELECT * from cliente where idCliente='$idCliente';";
$queryCliente = mysqli_query($conexion, $sqlCliente);
$rowCliente=mysqli_fetch_array($queryCliente);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Electrodomestico registrado a nombre de: <?php echo $rowCliente["nombre"] ?> <?php echo $rowCliente["apellidoPaterno"] ?> <?php echo $rowCliente["apellidoMaterno"] ?></h2>
    <h1>El estado de su electrodomestico es:</h1>
    <h4><?php echo $row["nombre"]?></h4>
    <h4><?php echo $row["estado"]?></h4>
    <a href="interfaz_cliente.php"><input class="btn btn-primary" type="button" value="Regresar"></a>
</body>
</html>