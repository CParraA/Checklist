<?php
session_start();

include 'conexion2.php';
include_once 'conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();


$consulta = "SELECT i.fecha, a.nombre_areas, u.nombre_ubicaciones, t.nombre_tipo, i.comentarios, i.usuario FROM proyecto.incidencias i
    LEFT JOIN proyecto.areas a ON i.in_idarea=a.idareas
    LEFT JOIN proyecto.ubicaciones u ON i.in_idubicaciones=u.idubicaciones
    LEFT JOIN proyecto.tipo t ON i.in_idtipo=t.idtipo
    LEFT JOIN proyecto.login l on i.usuario = l.idlogin 
    WHERE idestado = 2";




$resultado = $conexion->prepare($consulta);
$resultado->execute();


$data=$resultado->fetchALL(PDO::FETCH_ASSOC);
date_default_timezone_set('MST');
$hoy = date("Y-m-d H:i:s");
$query = $conexion->query("SELECT * FROM proyecto.areas");
$name = $_SESSION['name'];

if (isset($_SESSION['loggedin'])) {
}
else {
    echo "<div class='alert alert-danger mt-4' role='alert'>
        <a class='titulo-sin-acceso'>Es necesario iniciar sesion para acceder a esta pagina.</a>
        <p><a href='home.php' class='boton-para-login'>Iniciar sesion aqui!!</a></p></div>";
    exit;
}
// checking the time now when check-login.php page starts
$now = time();
if ($now > $_SESSION['expire']) {
    session_destroy();
    header('Location: ../home.php');
    exit;
}


?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8" name="viewport" content="width-device-width, initial-scale-1">
	<link rel="shortcut icon" href="#">
	<title>CHECKLIST</title>
	<link rel="stylesheet" href="../css/main.css">
	<link rel="stylesheet" href="../css/bootstrap.min.css">
	
	
	<link rel="stylesheet" type="text/css" href="../DataTables/datatables.min.css">
  	<link rel="stylesheet" type="text/css" href="../DataTables/DataTables-1.12.1/css/dataTables.bootstrap4.min.css">


</head>
<body>
	<header style="background-color:green">
		<h3 class="text-center text-light">Incidencias Eliminadas</h3>
		<h4 class="text-center text-light"><span class="badge badge-danger">CHECKLIST</span></h4>
		<div style="height:5px"></div>
	</header>
	<div style="height:10px"></div>
	
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<a href="../index2.php" type="button" class="btn btn-success" data-toggles="modal">Regresar</a>
					<a href="export2.php" type="button" class="btn btn-primary" data-toggles="modal">Exportar Datos</a>
				</div>
			
			</div>
		</div>
		<br>
	<div style="height:10px"></div>
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="table-responsive">
					<table id="tablaIncidencias" class="table table-striped table-bordered table-condesed" style="width:100%">
						<thead class="text-center">
							<tr>
								<th>Fecha</th>
								<th>Area</th>
								<th>Ubicacion</th>
								<th>Tipo</th>
								<th>Comentarios</th>
								<th>usuario</th>
							</tr>	
						</thead>
						<tbody>
							<?php
							foreach($data as $dat){
							?>
							<tr>
								<td><?php echo $dat['fecha'] ?></td>
								<td><?php echo $dat['nombre_areas'] ?></td>
								<td><?php echo $dat['nombre_ubicaciones'] ?></td>
								<td><?php echo $dat['nombre_tipo'] ?></td>
								<td><?php echo $dat['comentarios'] ?></td>
								<td><?php echo $dat['usuario'] ?></td>				
							</tr>
							<?php
								}
							?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
	
	<div class="modal fade" id="modalCRUD" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel"></h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="close"><span aria-hidden="true">&times;
					</span>
					</button>
				</div>
			
			
		
		</div>
		</div>
	</div>
	
	

	<script src="../js/jquery-3.3.1.min.js"></script>
	<script src="../js/popper.min.js"></script>
	<script src="../js/bootstrap.min.js"></script>
	<script type="text/javascript" src="../DataTables/datatables.min.js"></script>
	<script type="text/javascript" src="../js/main2.js"></script>
</body>
</html>
