<?php
include 'php/conexion2.php';

$id_colonia = filter_input(INPUT_POST, 'id_colonia');


$conf = new Configuracion();
$conf->conectarBD();

$consulta = "SELECT a.idareas, u.idubicaciones, u.nombre_ubicaciones FROM proyecto.relaciones r
                                LEFT JOIN proyecto.areas a ON r.idareas=a.idareas
                                LEFT JOIN proyecto.ubicaciones u ON r.idubicaciones=u.idubicaciones
                                WHERE r.idareas = $id_colonia";

$datos = $conf->consulta($consulta);




$conf->desconectarDB();

if(count($datos)==0){
    echo '<option value="0">No hay registros en esta Area</option>';
}

echo '<option value="" selected>seleccione:</option>';

for($i=0;$i<count($datos);$i++){
    
    
    echo '<option value="'.$datos[$i]["idubicaciones"].'">'.$datos[$i]["nombre_ubicaciones"].'</option>';
    
}


?>