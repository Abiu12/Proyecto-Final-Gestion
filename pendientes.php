<?php require_once "vistas/parte_superiorTecnico.php" ?>

<?php 
    include("conexion.php");
    $con=conectar();
    $sql="SELECT * FROM electrodomestico WHERE estado='En revisión' OR estado='En reparación';";
    $query=mysqli_query($con,$sql);

?>


<div class="container-fluid">

    <!-- Content Row -->

    <div class="row">

        <!-- Area Chart -->
        <div class="col-xl-10 col-lg-7">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Reparaciones pendientes</h6>


                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <?php
                    // Aqui se rellena la tabla con los datos, con un arreglo y asignando los datos a cada tabla
                        while($row=mysqli_fetch_array($query)){ 
                    ?>
                    <div class="card mt-4">
                        <div class="row">
                            <div class="col-md-3">
                                <h1><?php  echo $row['nombre']?></h1>
                                <h3>Marca: <?php  echo $row['marca']?></h3>
                            </div>
                            <div class="col-md-6">
                                <h3 class="card-title mt-2">
                                    <?php
                                    $idCliente=$row['idCliente'];
                                    $sql2="SELECT * FROM cliente WHERE idCliente='$idCliente';";
                                    $query2=mysqli_query($con,$sql2);
                                    $row2=mysqli_fetch_array($query2);
                                ?>


                                    Cliente: <?php echo $row2['nombre'] ?> <?php echo $row2['apellidoPaterno'] ?>
                                    <?php echo $row2['apellidoMaterno'] ?> </h3>
                                <p>Fecha entrada: <?php  echo $row['fecha_entrada']?></p>
                                <p>Fecha salida: <?php  echo $row['fecha_salida']?></p>
                                <p>Trabajo a realizar: <?php  echo $row['trabajo_a_realizar']?></p>
                                <p>Observaciones: <?php  echo $row['observaciones']?></p>
                                <p>Estado: <?php  echo $row['estado']?></p>

                            </div>
                            
                            <?php 
                                $idElectrodomestico=$row['idElectrodomestico']; 
                            ?>

                            <div class="col-md-2">
                                <br>
                                <?php if($row['estado']=="En revisión"){?>

                                <a
                                    href="update_estado_electrodomestico.php?idCliente=<?php echo $idCliente?> && idElectrodomestico=<?php echo $idElectrodomestico?> && estado=<?php echo "En reparación"?>"><input
                                        class="btn btn-primary" type="button" value="En reparación"></a>
                                <?php }?>


                                <?php if($row['estado']=="En reparación"){?>

                                <a
                                    href="update_estado_electrodomestico.php?idCliente=<?php echo $idCliente?>&&idElectrodomestico=<?php echo $idElectrodomestico?>&&estado=<?php echo "Terminado"?>"><input
                                        class="btn btn-primary" type="button" value="Terminado"></a>
                                <?php }?>
                            </div>

                        </div>
                    </div>
                    <?php }?>
                </div>
            </div>
        </div>

    </div>
</div>




<?php require_once "vistas/parte_inferior.php" ?>