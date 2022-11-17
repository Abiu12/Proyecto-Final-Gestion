<title>Agregar Electrodoméstico</title>
<script type="text/javascript" src="apps.js"></script>
<?php require_once "vistas/parte_superiorEmpleado.php"?>
<?php 
    include("conexion.php"); // conexion a bd
    $con=conectar(); // regresa la conexion
    $idCliente=$_GET['id']; /**Id del cliente a agregar electrodomestico */
    
    $sql2="SELECT *  FROM cliente  WHERE idCliente='$idCliente'"; // regresalos datos del cliente
    $query2=mysqli_query($con,$sql2);
?>

<div class="container">
    <!-- Separa los datos -->


    <h1>Agregar electrodomestico</h1>

    <br>
    <br>
    <!-- Cliente -->
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



    <br>
    <br>
    <!-- La accion al picar el boton es insertar -->

    <form action="insertar_electrodomestico.php?id=<?php echo $idCliente ?>" method="POST">
        <!-- El name debe ser tal cual esta en la bd, es la identificacion -->
        <h2 style= "font-size: 30px; font-weight: bold;">Datos del electrodoméstico</h2>
        <br>
        <div class="row">
            <div class="col">
                <h4>Nombre*</h4>
            </div>
            <div class="col">
                <h4>Modelo*</h4>
            </div>
            <div class="col">
                <h4>Marca*</h4>
            </div>
            <div class="col">
                <h4>Fecha entrada*</h4>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <input type="text" onkeypress="return soloLetras(event)" class="form-control mb-3" name="nombre"
                    required>
            </div>
            <div class="col">
                <input type="text" class="form-control mb-3" name="modelo" required>
            </div>
            <div class="col">
                <input type="text" onkeypress="return soloLetras(event)" class="form-control mb-3" name="marca"
                    required>
            </div>
            <div class="col">
                <input type="text" class="form-control mb-3" name="fecha_entrada" placeholder="" required>
            </div>
        </div>
        <br>
        <br>
        <br>
        <br>
        <div class="row">
            <div class="col">
                <h4>Fecha de salida*</h4>
            </div>
            <div class="col">
                <h4>Estado*</h4>
            </div>
            <div class="col">
                <h4>Estado de garantia*</h4>
            </div>
            <div class="col">
                <h4>Observaciones*</h4>
            </div>
            <div class="col">
                <h4>Trabajo a realizar*</h4>
            </div>

        </div>

        <div class="row">

            <div class="col">
                <input type="text" class="form-control mb-3" name="fecha_salida" placeholder="">
            </div>
            <div class="col">
                <select name="estado" id="estado" class="form-control mb-3">
                    <option value="En revisión">En revisión</option>
                    <option value="En reparación">En reparación</option>
                    <option value="Terminado">Terminado</option>
                    <option value="Entregado">Entregado</option>
                    <option value="Sin trabajar">Sin trabajar</option>
                </select>
            </div>
            <div class="col">
                <select name="estado_garantia" id="estado_garantia" class="form-control mb-3">
                    <option value="Sin aplicar">Sin aplicar</option>
                    <option value="Vigente">Vigente</option>
                    <option value="Vencida">Vencida</option>
                </select>
            </div>
            <div class="col">
                <input type="text" class="form-control mb-3" name="observaciones" placeholder="" required>
            </div>
            <div class="col">
                <input type="text" class="form-control mb-3" name="trabajo_a_realizar" placeholder="" required>
            </div>
        </div>
        <br>
        <br>
        <div class="row">
            <div class="col">
                <button class="btn btn-primary" type="submit">Registrar electrodoméstico</button>
                <!-- <input type="submit" class="btn btn-primary"> -->
            </div>

        </div>

    </form>
</div>
<?php require_once "vistas/parte_inferior.php" ?>