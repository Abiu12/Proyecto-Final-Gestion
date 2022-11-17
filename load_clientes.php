<?php
    require 'conexion.php';

    $columns = ['idCliente','nombre','apellidoPaterno','apellidoMaterno','telefono','calle','noCasaInt','noCasaExt','colonia','municipio'];

    $table = "cliente";
    $id='idCliente';

    $campo = isset($_POST['campo']) ? $conn->real_escape_string($_POST['campo']) : null;

/* Filtrado */
$where = '';

if ($campo != null) {
    $where = "WHERE (";

    $cont = count($columns);
    for ($i = 0; $i < $cont; $i++) {
        $where .= $columns[$i] . " LIKE '%" . $campo . "%' OR ";
    }
    $where = substr_replace($where, "", -3);
    $where .= ")";
}

/**Limite */

$limit=  isset($_POST['registros']) ? $conn->real_escape_string($_POST['registros']) : 10;

$pagina=  isset($_POST['pagina']) ? $conn->real_escape_string($_POST['pagina']) : 0;

if(!$pagina){
    $inicio=0;
    $pagina=1;
}
else{
    $inicio=($pagina-1) * $limit;
}

$slimit= "LIMIT $inicio , $limit";


/* Consulta */
$sql = "SELECT SQL_CALC_FOUND_ROWS " . implode(", ", $columns) . "
FROM $table
$where 
$slimit";
$resultado = $conn->query($sql);
$num_rows = $resultado->num_rows;

/**consulta para total de registros filtrados */

$sqlFiltro = "SELECT  FOUND_ROWS()";
$resFiltro = $conn->query($sqlFiltro);
$row_filtro = $resFiltro->fetch_array();
$totalFiltro = $row_filtro[0];

$sqlTotal = "SELECT count($id) FROM $table ";
$resTotal = $conn->query($sqlTotal);
$row_total = $resTotal->fetch_array();
$totalRegistros = $row_total[0];

/* Mostrado resultados */
$output = [];
$output['totalRegistros']= $totalRegistros;

$output['totalFiltro']= $totalFiltro;
$output['data']= '';
$output['paginacion']= '';



if ($num_rows > 0) {
    while ($row = $resultado->fetch_assoc()) {
        $output['data'] .= '<tr>';
        $output['data'] .= '<td>' . $row['idCliente'] . '</td>';
        $output['data'] .= '<td>' . $row['nombre'] . '</td>';
        $output['data'] .= '<td>' . $row['apellidoPaterno'] . '</td>';
        $output['data'] .= '<td>' . $row['apellidoMaterno'] . '</td>';
        $output['data'] .= '<td>' . $row['telefono'] . '</td>';
        $output['data'] .= '<td>' . $row['calle'] . '</td>';
        $output['data'] .= '<td>' . $row['noCasaInt'] . '</td>';
        $output['data'] .= '<td>' . $row['noCasaExt'] . '</td>';
        $output['data'] .= '<td>' . $row['colonia'] . '</td>';
        $output['data'] .= '<td>' . $row['municipio'] . '</td>';
        
        $idCliente= $row['idCliente'];
        $output['data'] .='<td><div class="row">';
        $output['data'] .='<div class="col-2">';
        $output['data'] .= '<a href= "actualizar_cliente.php?id='.$idCliente.'" class="fas	fa-pen"></a>';
        $output['data'] .='</div>';
        $output['data'] .='<div class="col-2">';
        $output['data'] .= '<a href= "delete_cliente.php?id='.$idCliente.'" class="fas	fa-trash-alt" onclick="return ConfirmDeleteClientes();"></a>';   
        $output['data'] .='</div>';
        $output['data'] .='<div class="col-2">';
        $output['data'] .= '<a href="electrodomesticos.php?id='.$idCliente.'" class="fas fa-wrench"></a>';
        $output['data'] .='</div>';
        $output['data'] .='</div></td>';
        $output['data'] .= '</tr>';
    }
} else {
    $output['data'] .= '<tr>';
    $output['data'] .= '<td colspan="11">Sin resultados</td>';
    $output['data'] .= '</tr>';
}

if($output['totalRegistros']>0){
    $totalPaginas = ceil($output['totalRegistros']/ $limit);
    $output['paginacion'] .= '<nav>';
    $output['paginacion'] .= '<ul class="pagination">';
    
    $numeroInicio = 1;

    if(($pagina - 1) > 1 ){
        $numeroInicio=$pagina - 1;
    }

    $numeroFin = $numeroInicio + 2;

    if(($numeroFin > $totalPaginas)){
        $numeroFin=$totalPaginas;
    }
    
    for($i=$numeroInicio; $i <= $numeroFin; $i++){
        if($pagina == $i){
            $output['paginacion'] .= '<li class="page-item active"><a class="page-link" href="#" >'.$i.'</a></li>';
        }
        else{
            $output['paginacion'] .= '<li class="page-item"><a class="page-link" href="#" onclick="getData('.$i.')">'.$i.'</a></li>';
        }
    }

    $output['paginacion'] .= '</ul>';
    $output['paginacion'] .= '</nav>';
}



echo json_encode($output, JSON_UNESCAPED_UNICODE);