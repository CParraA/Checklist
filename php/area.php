<?php
include_once 'php/conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();

$query = $conexion->prepare("SELECT * FROM proyecto.areas");
$query->execute();
$data = $query->fetchALL();

foreach ($data as $valores):
echo "<option value='".$valores['idareas']."'>".$valores['nombre_areas']."</option>";
endforeach;

?>
