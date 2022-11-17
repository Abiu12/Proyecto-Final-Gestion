<title>Actualizar Cliente</title>
<script type="text/javascript" src="apps.js"></script>
<?php 
    include("conexion.php");
    $con=conectar();

    $id=$_GET['id'];

    $sql="SELECT * FROM cliente WHERE idCliente='$id'";
    $query=mysqli_query($con,$sql);

    $row=mysqli_fetch_array($query);
?>

<?php require_once "vistas/parte_superiorEmpleado.php"?>

<div class="container">
    <!-- Separa los datos -->

    <h1>Actualizar cliente</h1>
    <br>
    <br>

    <!-- La accion al picar el boton es insertar -->
    <form action="update_cliente.php?idCliente=<?php echo $id ?> " method="POST">




        <br>

        <!-- El name debe ser tal cual esta en la bd, es la identificacion -->
        <div class="row">
            <div class="col-10">
                <h2>DATOS GENERALES</h2>
            </div>
            <div class="col-2">
                <h6>* Campos obligatorios</h6>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col">
                <h3>Nombre*</h3>
            </div>
            <div class="col">
                <h3>Apellido paterno*</h3>
            </div>
            <div class="col">
                <h3>Apellido Materno*</h3>
            </div>
            <div class="col">
                <h3>Teléfono*</h3>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <input type="text" onkeypress="return soloLetras(event)" class="form-control mb-3" name="nombre"
                    value="<?php echo $row['nombre']  ?>" required>
            </div>
            <div class="col">
                <input type="text" onkeypress="return soloLetras(event)" class="form-control mb-3"
                    name="apellidoPaterno" value="<?php echo $row['apellidoPaterno']  ?>" required>
            </div>
            <div class="col">
                <input type="text" onkeypress="return soloLetras(event)" class="form-control mb-3"
                    name="apellidoMaterno" value="<?php echo $row['apellidoMaterno']  ?>" required>
            </div>
            <div class="col">
                <input type="text" class="form-control mb-3" name="telefono" value="<?php echo $row['telefono']  ?>"
                    onchange="return ValidarTelefono(this)" onkeypress="return soloNumeros(event);" required
                    minlength="10" maxlength="10" required>
            </div>
        </div>
        <br>
        <br>
        <br>
        <h2 style="font-size: 30px; font-weight: bold;">Domicilio</h2>
        <br>
        <div class="row">
            
        <div class="col">
                    <h4>Calle*</h4>
                </div>
                <div class="col">
                    <h4>No. Interior</h4>
                </div>
                <div class="col">
                    <h4>No. exterior</h4>
                </div>
                <div class="col">
                    <h4>Colonia*</h4>
                </div>
                <div class="col">
                    <h4>Municipio</h4>
                </div>
        </div>

        <div class="row">
           
            <div class="col">
                <input type="text" class="form-control mb-3" name="calle" value="<?php echo $row['calle']  ?>"
                    onkeypress="return soloLetras(event)" required>
            </div>
            <div class="col">
                <input type="text" class="form-control mb-3" name="noCasaInt" value="<?php echo $row['noCasaInt']  ?>"
                    onkeypress="" required minlength="1" maxlength="4" required>
            </div>
            <div class="col">
                <input type="text" class="form-control mb-3" name="noCasaExt" value="<?php echo $row['noCasaExt']  ?>"
                    onkeypress="return soloNumeros(event);" required minlength="1" maxlength="4" required>
            </div>
            <div class="col">
                <input type="text" class="form-control mb-3" name="colonia" value="<?php echo $row['colonia']  ?>"
                    onkeypress="return soloLetras(event)" onkeypress="return soloLetras(event)" required>
            </div>
            <div class="col">
                <input type="text" class="form-control mb-3" name="municipio" value="<?php echo $row['municipio']  ?>"
                    onchange="return ValidarTelefono(this)" onkeypress="return soloNumeros(event);" required
                    minlength="10" maxlength="10" required>
            </div>

        </div>
        <br>
        <br>
        <div class="row">
            <div class="col">
                <button class="btn btn-primary" type="submit">Actualizar cliente</button>
                <!-- <input type="submit" class="btn btn-primary"> -->
            </div>

        </div>

    </form>

</div>
<?php require_once "vistas/parte_inferior.php" ?>