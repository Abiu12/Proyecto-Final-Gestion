<?php require_once "vistas/parte_superiorEmpleado.php"?>
<?php 
    include("conexion.php"); // conexion a bd
    $con=conectar(); // regresa la conexion

    
    $idCliente=$_GET['idCliente']; /**Id del cliente a agregar electrodomestico */
    $idElectrodomestico=$_GET['idElectrodomestico'];

    $sql="SELECT *  FROM electrodomestico  WHERE idCliente='$idCliente' AND idElectrodomestico='$idElectrodomestico'"; /**Para tener los datos y pasarlos al input */
    
    $query1=mysqli_query($con,$sql); /**datos del electrodomestico para rellenar */
    
    $row=mysqli_fetch_array($query1); 


    $sql2="SELECT *  FROM cliente  WHERE idCliente='$idCliente'"; // regresalos datos del cliente
    
    $query2=mysqli_query($con,$sql2);

    
?>

<div class="container">
    <!-- Separa los datos -->

    <h1>Actualizar electrodomestico</h1>
    <br>
    <br>
    <?php $row2=mysqli_fetch_array($query2);   ?>
    <div class="row">
        <div class="col-10">
            <h1>Cliente: <?php echo $row2['nombre'] ?> <?php echo $row2['apellidoPaterno'] ?>
                <?php echo $row2['apellidoMaterno'] ?> </h1>
        </div>
        <div class="col-2">
            <h6>* Campos obligatorios</h6>
        </div>
    </div>




    <!-- La accion al picar el boton es insertar -->

    <form
        action="update_electrodomestico.php?idCliente=<?php echo $idCliente ?> && idElectrodomestico=<?php echo $idElectrodomestico ?>"
        method="POST">

        <h2>DATOS DEL ELECTRODOMESTICO</h2>
        <br>
        <div class="row">
            <div class="col">
                <h3>Codigo de seguimiento*</h3>
            </div>
            <div class="col">
                <h3>Nombre*</h3>
            </div>
            <div class="col">
                <h3>Modelo*</h3>
            </div>
            <div class="col">
                <h3>Marca*</h3>
            </div>
            <div class="col">
                <h3>Fecha entrada*</h3>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <input type="text" onkeypress="" class="form-control mb-3" name="codigo_seguimiento"
                    value="<?php echo $row['codigo_seguimiento']  ?>" required>
            </div>
            <div class="col">
                <input type="text" onkeypress="return soloLetras(event)" class="form-control mb-3" name="nombre"
                    value="<?php echo $row['nombre']  ?>" required>
            </div>
            <div class="col">
                <input type="text" class="form-control mb-3" name="modelo" value="<?php echo $row['modelo']  ?>"
                    required>
            </div>
            <div class="col">
                <input type="text" onkeypress="return soloLetras(event)" class="form-control mb-3" name="marca"
                    value="<?php echo $row['marca']  ?>" required>
            </div>
            <div class="col">
                <input type="text" class="form-control mb-3" name="fecha_entrada"
                    value="<?php echo $row['fecha_entrada']  ?>" required>
            </div>
        </div>
        <br>
        <br>
        <br>
        <br>
        <div class="row">
            <div class="col">
                <h3>Fecha de salida*</h3>
            </div>
            <div class="col">
                <h3>Estado*</h3>
            </div>
            <div class="col">
                <h3>Estado de garantia*</h3>
            </div>
            <div class="col">
                <h3>Observaciones*</h3>
            </div>
            <div class="col">
                <h3>Trabajo a realizar*</h3>
            </div>

        </div>

        <div class="row">

            <div class="col">
                <input type="text" class="form-control mb-3" name="fecha_salida"
                    value="<?php echo $row['fecha_salida']?>">
            </div>
            <div class="col">
                <select name="estado" id="estado" class="form-control mb-3">
                    <option value="En revisión" <?php if($row['estado']=="En revisión"){ echo "selected"; }?>>En revisión</option>
                    <option value="En reparación" <?php if($row['estado']=="En reparación"){ echo "selected"; }?>>En reparación</option>
                    <option value="Terminado" <?php if($row['estado']=="Terminado"){ echo "selected"; }?>>Terminado</option>
                    <option value="Entregado" <?php if($row['estado']=="Entregado"){ echo "selected"; }?>>Entregado</option>
                    <option value="Sin trabajar" <?php if($row['estado']=="Sin trabajar"){ echo "selected"; }?>>Sin trabajar</option>
                </select>
            </div>
            <div class="col">
                <select name="estado_garantia" id="estado_garantia" class="form-control mb-3"
                    value="<?php echo $row['estado_garantia']?>">
                    <option value="Sin aplicar" <?php if($row['estado_garantia']=="Sin aplicar"){ echo "selected"; }?>>Sin aplicar</option>
                    <option value="Vigente" <?php if($row['estado_garantia']=="Vigente"){ echo "selected"; }?>>Vigente</option>
                    <option value="Vencida" <?php if($row['estado_garantia']=="Vencida"){ echo "selected"; }?>>Vencida</option>
                </select>
            </div>
            <div class="col">
                <input type="text" class="form-control mb-3" name="observaciones"
                    value="<?php echo $row['observaciones']  ?>" required>
            </div>
            <div class="col">
                <input type="text" class="form-control mb-3" name="trabajo_a_realizar"
                    value="<?php echo $row['trabajo_a_realizar']  ?>" required>
            </div>

        </div>
        <br>
        <br>
        <div class="row">
            <div class="col">
                <button class="btn btn-primary" type="submit">Actualizar electrodomestico</button>
                <!-- <input type="submit" class="btn btn-primary"> -->
            </div>

        </div>

    </form>
</div>
<?php require_once "vistas/parte_inferior.php" ?>