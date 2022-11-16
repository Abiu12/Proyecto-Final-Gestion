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
            <div class="alert alert-success">
     El cliente ya <a href="#" class="alert-link">existe</a>.
  </div>


        <?php 
    $statusClienteRegistrado=0;
    }?>
            
            <br>
            <div class="row">
                <div class="col">
                    <h4>Nombre*</h4>
                </div>
                <div class="col">
                    <h4>Apellido paterno*</h4>
                </div>
                <div class="col">
                    <h4>Apellido materno*</h4>
                </div>
                <div class="col-2">
                    <h4>Teléfono*</h4>
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
                <div class="col-2">
                    <input type="text" class="form-control mb-3" name="noTelefono" placeholder="" onchange="return ValidarTelefono(this)" onkeypress="return soloNumeros(event);" required minlength="10" maxlength="10">
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
                <div class="col">
                    <input type="text" onkeypress="return soloLetras(event)" class="form-control mb-3" name="municipio" placeholder="" required>
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