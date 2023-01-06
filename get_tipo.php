<?php
include 'php/conexion2.php';

$id_calle = filter_input(INPUT_POST, 'id_calle');


$conf = new Configuracion();
$conf->conectarBD();

$consulta = "SELECT t.idtipo, u.idubicaciones, t.nombre_tipo FROM proyecto.relacionestipo r
                                LEFT JOIN proyecto.tipo t ON r.idtipo=t.idtipo
                                LEFT JOIN proyecto.ubicaciones u ON r.idubicaciones=u.idubicaciones
                                WHERE r.idubicaciones = $id_calle";

$datos = $conf->consulta($consulta);




$conf->desconectarDB();

if(count($datos)==0){
    echo '<option value="0">No hay registros en este Tipo</option>';
}

for($i=0;$i<count($datos);$i++){
    
    
    echo '<option value="'.$datos[$i]["idtipo"].'">'.$datos[$i]["nombre_tipo"].'</option>';
    
}


?>