<?php 
    include("conexion.php"); // conexion a bd
    $con=conectar(); // regresa la conexion
    $idCliente=$_GET['id'];
    $sql="SELECT *  FROM electrodomestico  WHERE idCliente='$idCliente'"; // regresa a los electrodomesticos del cliente
    $query=mysqli_query($con,$sql);
    $sql2="SELECT *  FROM cliente  WHERE idCliente='$idCliente'"; // regresalos datos del cliente
    $query2=mysqli_query($con,$sql2);
?>


<?php require_once "vistas/parte_superiorEmpleado.php"?>
<?php $row2=mysqli_fetch_array($query2);   ?>


<div class="container">
    <div class="row">
        <div class="col">
            <h1>Electrodomésticos</h1>
            <h3>Cliente: <?php echo $row2['nombre'] ?> <?php echo $row2['apellidoPaterno'] ?>
                <?php echo $row2['apellidoMaterno'] ?>
            </h3>
        </div>

    </div>

    <div class="row">
        <div class="col-9"></div>
        <div class="col-1">
            <a href="agregar_electrodomestico.php?id=<?php echo $idCliente?>"><input class="btn btn-primary"
                    type="button" value="Agregar electrodoméstico"></a>
        </div>
    </div>
</div>

<br>
<!-- Tabla donde estan los clientes -->
<div class="col-md-12 overflow-auto">
    <table class="table">
        <thead class="table-success table-striped">
            <!-- <tr>
                <th>Id electrodomestico</th> -->
            <th>Código de seguimiento</th>
            <th>Nombre</th>
            <th>Modelo</th>
            <th>Marca</th>
            <th>Fecha entrada</th>
            <th>Fecha salida</th>
            <th>Estado</th>
            <th>Garantía</th>
            <th>Observaciones</th>
            <th>Trabajo a realizar</th>
            <th>Acciones</th>
            </tr>
        </thead>

        <tbody>
            <?php
                    // Aqui se rellena la tabla con los datos, con un arreglo y asignando los datos a cada tabla
                                            while($row=mysqli_fetch_array($query)){ 
                                            ?>
            <tr>
                <td><?php  echo $row['codigo_seguimiento']?></td>
                <td><?php  echo $row['nombre']?></td>
                <td><?php  echo $row['modelo']?></td>
                <td><?php  echo $row['marca']?></td>
                <td><?php  echo $row['fecha_entrada']?></td>
                <td><?php  echo $row['fecha_salida']?></td>
                <td><?php  echo $row['estado']?></td>
                <td><?php  echo $row['estado_garantia']?></td>

                <td><?php  echo $row['observaciones']?></td>
                <td><?php  echo $row['trabajo_a_realizar']?></td>
                <!--Captura lo relacionado con el codigo del estudiante- -->

                <td>
                    <div class="row">
                        <div class="col">
                            <a href="actualizar_electrodomestico.php?idCliente=<?php echo $row2['idCliente'] ?> && idElectrodomestico=<?php echo $row['idElectrodomestico'] ?> "
                                class="fas	fa-pen"> </a>

                        </div>
                        <div class="col">
                            <a href="delete_electrodomestico.php?idCliente=<?php echo $row2['idCliente'] ?> && idElectrodomestico=<?php echo $row['idElectrodomestico'] ?> "
                                class="fas	fa-trash-alt" onclick="return ConfirmDeleteElectro();"></a>
                        </div>


                    </div>

                </td>


            </tr>

            <?php 

                                                }

                                            ?>

        </tbody>
    </table>


</div>
</div>
<html>
<script type="text/javascript">
function ConfirmDeleteElectro() {
    if (confirm("¿Realmente desea eliminar este electrodoméstico?")) {
        return true;
    } else {
        return false;
    }
}
</script>

</html>

<?php require_once "vistas/parte_inferior.php" ?>