<?php
require 'conexion3.php';

$query = mysqli_query($con,"SELECT i.fecha, a.nombre_areas, u.nombre_ubicaciones, t.nombre_tipo, i.comentarios, i.usuario FROM proyecto.incidencias i
    LEFT JOIN proyecto.areas a ON i.in_idarea=a.idareas
    LEFT JOIN proyecto.ubicaciones u ON i.in_idubicaciones=u.idubicaciones
    LEFT JOIN proyecto.tipo t ON i.in_idtipo=t.idtipo
    LEFT JOIN proyecto.login l on i.usuario = l.idlogin
    WHERE idestado = 2");

$docu="detalles.xls";
header('Content-type: application/vnd.ms-excel');
header('Content-Disposition: attachment; filename='.$docu);
header('Pragma: no-cache');
header('Expires: 0');
echo '<table border=1>';
echo '<tr>';
echo '<th colspan=4> Reporte de Incidencias Eliminadas</th>';
echo '</tr>';
echo '<tr><th>Fecha</th><th>Area</th><th>Ubicacion</th><th>Tipo</th><th>Comentarios</th><th>usuario</th></tr>';

while($row=mysqli_fetch_array($query)){
    
    echo '<tr>';
    echo '<td>'.$row['fecha'].'</td>';
    echo '<td>'.$row['nombre_areas'].'</td>';
    echo '<td>'.$row['nombre_ubicaciones'].'</td>';
    echo '<td>'.$row['nombre_tipo'].'</td>';
    echo '<td>'.$row['comentarios'].'</td>';
    echo '<td>'.$row['usuario'].'</td>';
    echo '</tr>';
}

echo '</table>';
