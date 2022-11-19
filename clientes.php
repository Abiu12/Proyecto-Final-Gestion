<?php 
    include("conexion.php"); // conexion a bd
    $con=conectar(); // regresa la conexion holaaa mundo prueba 3

    $sql="SELECT *  FROM cliente"; // regresa a los alumnos
    $query=mysqli_query($con,$sql);
?>

<div class="container">
    <div class="row g-4">

        <div class="col-auto">
            <label for="num_registros" class="col-form-label">Mostrar: </label>
        </div>

        <div class="col-auto">
            <select name="num_registros" id="num_registros" class="form-select">
                <option value="5">5</option>
                <option value="10">10</option>
                <option value="15">15</option>
            </select>
        </div>

        <div class="col-auto">
            <label for="num_registros" class="col-form-label">registros </label>
        </div>
    </div>
</div>

<div class="container">
    <br>
    <div class="row">
        <div class="col-1">
            <label for="campo" class="col-form-label">Buscar: </label>
        </div>

        <div class="col-2">
            <input type="text" name="campo" id="campo" class="form-control">
        </div>
        <div class="col-7"></div>
        <div class="col-1">
            <a href="agregar_cliente.php?statusClienteRegistrado=0"><input class="btn btn-primary" type="button"
                    value="Agregar cliente"></a>
        </div>
    </div>
</div>



<br>
<br>

<!-- Tabla donde estan los clientes -->
<div class="col-md-12">
    <table class="table">
        <thead class="table-success table-striped">
            <tr>
                <th>Nombre</th>
                <th>Primer apellido</th>
                <th>Segundo apellido</th>
                <th>Teléfono</th>
                <th>Calle</th>
                <th>No. Interior</th>
                <th>No. Exterior</th>
                <th>Colonia</th>
                <th>Municipio</th>
                <th>Acciones</th>

            </tr>
        </thead>

        <tbody id="contenti">



        </tbody>
    </table>

    <div class="row">
        <div class="col-6">
            <label id="lbl-total"></label>
        </div>
        <div class="col-6" id="nav-paginacion">
            <label id="lbl-total"></label>
        </div>

    </div>

    <script>
    let paginaActual = 1;
    getData(paginaActual);
    /* Escuchar un evento keyup en el campo de entrada y luego llamar a la función getData. */
    document.getElementById("campo").addEventListener("keyup", function() {
        getData(1);
    }, false);
    document.getElementById("num_registros").addEventListener("change", function() {
        getData(paginaActual);
    }, false);



    num_registros

    function getData(pagina) {
        let input = document.getElementById("campo").value;

        let num_registros = document.getElementById("num_registros").value;

        let content = document.getElementById("contenti");

        if (pagina != null) {
            paginaActual = pagina;
        }

        let url = "load_clientes.php";
        let formaData = new FormData();
        /**Enviamos los datos a load */
        formaData.append('campo', input);

        formaData.append('registros', num_registros);

        formaData.append('pagina', paginaActual);

        fetch(url, {
                method: "POST",
                body: formaData
            }).then(response => response.json())
            .then(data => {
                content.innerHTML = data.data;
                document.getElementById("lbl-total").innerHTML = 'Mostrando ' + data.totalFiltro + ' de ' + data
                    .totalRegistros + ' registros';
                document.getElementById("nav-paginacion").innerHTML = data.paginacion;
            }).catch(err => console.log(err))
    }
    </script>


    <script type="text/javascript">
    function ConfirmDeleteClientes() {
        if (confirm("¿Realmente desea eliminar este cliente?")) {
            return true;
        } else {
            return false;
        }
    }
    </script>

</div>