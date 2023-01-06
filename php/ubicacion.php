<?php
include_once 'php/conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();


    $areasid=$_GET['c'];

$query2 = $conexion->prepare("SELECT a.idareas, u.idubicaciones, u.nombre_ubicaciones FROM proyecto.relaciones r
                                LEFT JOIN proyecto.areas a ON r.idareas=a.idareas
                                LEFT JOIN proyecto.ubicaciones u ON r.idubicaciones=u.idubicaciones
                                WHERE r.idareas = '$areasid' ");
$query2->execute();
$data2 = $query2->fetchALL();

foreach ($data2 as $valores2):
echo "<option value='".$valores2['idareas']."'>".$valores2['nombre_ubicaciones']."</option>";
endforeach;

?>