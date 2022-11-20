<?php 
    $statusElectrodomestico=1;
    $presionBoton=0;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script type="text/javascript" src="apps.js"></script>
</head>

<body>

    <form action="buscar_codigo_seguimiento.php" method="post">
        <h2>Ingresa el # de seguimiento de su electrodoméstico</h2>
        <input type="text" name="codigo_seguimiento" id="" required>
        <input type="submit" name="button_elec" value="Buscar electrodoméstico" >
    </form>
  



</body>

</html>