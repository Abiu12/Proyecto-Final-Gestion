<?php 
    //include("conexion.php"); // conexion a bd
    //$con=conectar(); // regresa la conexion

    //$sql="SELECT *  FROM cliente"; // regresa a los alumnos
    //$query=mysqli_query($con,$sql);
?>
<?php require_once "vistas/parte_superiorAdministrador.php"?>

<div class="container">
    <!-- Separa los datos -->

    <h1>Agregar usuario</h1>
    <br>
    <br>

    <!-- La accion al picar el boton es insertar -->
    <form action="insertar_usuario.php" method="POST">
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
                <h3>Nombre de usuario*</h3>
            </div>
            <div class="col">
                <h3>Contraseña*</h3>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <input type="text" class="form-control mb-3" name="nombre" required>
            </div>
            <div class="col">
                <input type="text" class="form-control mb-3" name="username" required>
            </div>
            <div class="col">
                <input type="text" class="form-control mb-3" name="password" required>
            </div>
        </div>
        <br>
        <br>
        <br>
        <br>
        <div class="row">
            <div class="col">
                <h3>Rol</h3>
            </div>
        </div>

        <div class="row">
            <div class="col-4">
                <select name="rol" id="rol" class="form-control mb-3">
                    <option value="Empleado">Empleado</option>
                    <option value="Tecnico">Tecnico</option>
                </select>

            </div>
        </div>

        <br>
        <br>
        <div class="row">
            <div class="col">
                <button class="btn btn-primary" type="submit">Registrar usuario</button>

            </div>

        </div>

    </form>

</div>
<?php require_once "vistas/parte_inferior.php" ?>