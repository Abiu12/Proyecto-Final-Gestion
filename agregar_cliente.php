<title>Agregar Cliente</title>
<script type="text/javascript" src="apps.js"></script>
<?php 
    //include("conexion.php"); // conexion a bd
    //$con=conectar(); // regresa la conexion

    //$sql="SELECT *  FROM cliente"; // regresa a los alumnos
    //$query=mysqli_query($con,$sql);
    $statusClienteRegistrado= $_GET['statusClienteRegistrado'];
?>
<?php require_once "vistas/parte_superiorEmpleado.php"?>

    <div class="container">
        <!-- Separa los datos -->

        <h1>Agregar cliente</h1>
        <br>
        <br>

        <!-- La accion al picar el boton es insertar -->
        <form action="insertar_cliente.php" method="POST">
            <!-- El name debe ser tal cual esta en la bd, es la identificacion -->
            <div class="row">
                <div class="col-10">
                    <h2 style="font-size: 30px; font-weight: bold;">Datos generales</h2>
                </div>
                <div class="col-2">
                    <h6>* Campos obligatorios</h6>
                </div>

            </div>

            <?php if($statusClienteRegistrado==1){?>
            <div class="alert alert-danger">
    <strong>Error!</strong> El cliente ya se encuentra <a href="#" class="alert-link">registrado</a>.
  </div>


        <?php 
    $statusClienteRegistrado=0;
    }?>
            
            <br>
            <div class="row">
                <div class="col">
                    <h3>Nombre*</h3>
                </div>
                <div class="col">
                    <h3>Apellido paterno*</h3>
                </div>
                <div class="col">
                    <h3>Apellido materno*</h3>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <input type="text" onkeypress="return soloLetras(event)" class="form-control mb-3" name="nombre" required>
                </div>
                <div class="col">
                    <input type="text" onkeypress="return soloLetras(event)" class="form-control mb-3" name="apellidoPaterno" required>
                </div>
                <div class="col">
                    <input type="text" onkeypress="return soloLetras(event)" class="form-control mb-3" name="apellidoMaterno" required>
                </div>
            </div>
            <br>
            <br>
            <br>
            <h2>DATOS DE CONTACTO</h2>
            <br>
            <div class="row">
                <div class="col">
                    <h3>Teléfono*</h3>
                </div>
                <div class="col">
                    <h3>Calle*</h3>
                </div>
                <div class="col">
                    <h3>Número de casa interior</h3>
                </div>
                <div class="col">
                    <h3>Número de casa exterior</h3>
                </div>
                <div class="col">
                    <h3>Colonia*</h3>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <input type="text" class="form-control mb-3" name="noTelefono" placeholder="" onchange="return ValidarTelefono(this)" onkeypress="return soloNumeros(event);" required minlength="10" maxlength="10">
                </div>
                <div class="col">
                    <input type="text" onkeypress="return soloLetras(event)" class="form-control mb-3" name="calle" placeholder="" required>
                </div>
                <div class="col">
                    <input type="text" class="form-control mb-3" name="noCasaInt" placeholder="" onkeypress="" required minlength="1" maxlength="4">
                </div>
                <div class="col">
                    <input type="text" class="form-control mb-3" name="noCasaExt" placeholder="" onkeypress="return soloNumeros(event);" required minlength="1" maxlength="4">
                </div>
                <div class="col">
                    <input type="text" onkeypress="return soloLetras(event)" class="form-control mb-3" name="colonia" placeholder="" required>
                </div>
            
            </div>
            <br>
            <br>
            <div class="row">
                <div class="col">
                    <button class="btn btn-primary" type="submit">Registrar cliente</button>
                    <!-- <input type="submit" class="btn btn-primary"> -->
                </div>
                
            </div>
            
        </form>


        <?php ?>

    </div>
<?php require_once "vistas/parte_inferior.php" ?>