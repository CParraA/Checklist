<?php
// Envíe un encabezado Refresh al navegador preferido.

session_start();

include 'php/conexion2.php';
include_once 'php/conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();


    $consulta = "SELECT i.idincidencias, i.fecha, a.nombre_areas, u.nombre_ubicaciones, t.nombre_tipo, i.comentarios, i.usuario FROM proyecto.incidencias i
    LEFT JOIN proyecto.areas a ON i.in_idarea=a.idareas
    LEFT JOIN proyecto.ubicaciones u ON i.in_idubicaciones=u.idubicaciones
    LEFT JOIN proyecto.tipo t ON i.in_idtipo=t.idtipo
    LEFT JOIN proyecto.login l on i.usuario = l.idlogin 
    WHERE i.idestado = 1";
    
    
    
    
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
    header('Location: home.php');
    exit;
}


?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8" name="viewport" content="width-device-width, initial-scale-1">
	<link rel="shortcut icon" href="#">
	<title>CHECKLIST</title>
	<link rel="stylesheet" href="css/main.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	
	
	<link rel="stylesheet" type="text/css" href="DataTables/datatables.min.css">
  	<link rel="stylesheet" type="text/css" href="DataTables/DataTables-1.12.1/css/dataTables.bootstrap4.min.css">


</head>
<body>
	<header style="background-color:green ">
		<center><img src="Imagenes/GAP.png" width="255" height="90"></center>
		<h4 class="text-center text-light"><span class="badge badge-danger">CHECKLIST</span></h4>
		<div style="height:5px"></div>
	</header>
	<div style="height:10px"></div>
	
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<button id="btnNuevo" type="button" class="btn btn-success" data-toggles="modal">Nueva Incidencia</button>
					<a href="php/solucionados.php" type="button" class="btn btn-primary" data-toggles="modal">Solucionados</a>
					<a href="php/eliminados.php" type="button" class="btn btn-danger" data-toggles="modal">Eliminados</a>
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
								<th>ID</th>
								<th>Fecha</th>
								<th>Area</th>
								<th>Ubicacion</th>
								<th>Tipo</th>
								<th>Comentarios</th>
								<th>usuario</th>
								<th>Acciones</th>
							</tr>	
						</thead>
						<tbody>
							<?php
							foreach($data as $dat){
							?>
							<tr>
								<td><?php echo $dat['idincidencias'] ?></td>
								<td><?php echo $dat['fecha'] ?></td>
								<td><?php echo $dat['nombre_areas'] ?></td>
								<td><?php echo $dat['nombre_ubicaciones'] ?></td>
								<td><?php echo $dat['nombre_tipo'] ?></td>
								<td><?php echo $dat['comentarios'] ?></td>
								<td><?php echo $dat['usuario'] ?></td>
								<td></td>								
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
			
			
		<form id="formIncidencias">
			<div class="modal-body">
				<div class="form-group">
					<label for="fecha" class="col-form-label">Fecha:</label>
					<input type="text" disabled class="form-control" id="fecha" name ="fecha" value="<?php echo $hoy?>">
				</div>
				
<div class="form-group">
	<label for="id_colonia" class="col-form-label">Area:</label>
  <select class="form-control" id="id_colonia" name="id_colonia" aria-label="Floating label select example " required>

<option value="" selected>seleccione:</option>
  	  <?php  
             
            $conf = new Configuracion();
			$conf->conectarBD();                                                                             
            $consulta = "SELECT * FROM proyecto.areas";
            $rst1 = $conf->consulta($consulta);
            for($i = 0; $i < count($rst1); $i++)
            {                                                   
                echo '<option value="'.$rst1[$i]["idareas"].'">'.$rst1[$i]["nombre_areas"].'</option>';                                                    
            }
             $conf->desconectarDB();
        ?>
  </select>
 
</div>

				<div class="form-group">
					<label for="id_calle" class="col-form-label">Ubicacion:</label>
					<select class="form-control" id="id_calle" name="id_calle" aria-label="Floating label select example" required>
  						<option value="" disabled selected>seleccione:</option>
 					 </select>
				</div>
				
				
				<div class="form-group">
					<label for="Tipo" class="col-form-label">Tipo:</label>
					<select class="form-control" id="Tipo" name="Tipo" aria-label="Floating label select example" required>
  	<option value="" selected>seleccione:</option>
  </select>
				</div>
				
				<div class="form-group">
					<label for="Comentarios" class="col-form-label">Comentarios:</label>
					<input type="text" class="form-control" name="Comentarios" id="Comentarios" required>
				</div>
					
					<div class="form-group">
					<label for="usuario" class="col-form-label">nombre:</label>
					<input type="text" disabled class="form-control" id="usuario" name ="usuario" value="<?php echo $name?>">
				</div>
				
				</div>
				
			
				
				
				<div class="modal-footer">
					<button type="button" class="btn btn-light" data-dismiss="modal">Cancelar</button>
					<button type="submit" id="btnGuardar" class="btn btn-dark" onclick="location.reload()">Guardar</button>
				</div>
				
				
				
				
		</form>
		</div>
		</div>
	</div>

<div class="modal fade" id="modalCRUD2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel"></h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="close"><span aria-hidden="true">&times;
					</span>
					</button>
				</div>
			
			
		<form id="formIncidencias2">
			<div class="modal-body">
				
				<div class="form-group">
					<label for="vComentarios" class="col-form-label">Comentarios:</label>
					<input type="text" class="form-control" name="vComentarios" id="vComentarios" required>
				</div>
					
					<div class="form-group">
					<label for="usuario" class="col-form-label">nombre:</label>
					<input type="text" disabled class="form-control" id="usuario" name ="usuario" value="<?php echo $name?>">
				</div>
				
				</div>
				
			
				
				
				<div class="modal-footer">
					<button type="button" class="btn btn-light" data-dismiss="modal">Cancelar</button>
					<button type="submit" id="btnGuardar" class="btn btn-dark" onclick="location.reload()">Guardar</button>
				</div>
				
				
				
				
		</form>
		</div>
		</div>
	</div>
		
	

	<script src="js/jquery-3.3.1.min.js"></script>
	<script src="js/popper.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="DataTables/datatables.min.js"></script>
	<script type="text/javascript" src="js/main.js"></script>
</body>
<div style="height:100px"></div>
</html>

<script>
    
    $(document).ready(function(){
    
    	var calle = $('#id_calle');
		var Tipo = $('#Tipo');
       	
        $('#id_colonia').change(function(){
          var id_colonia = $(this).val();        

            $.ajax({
              data: {id_colonia:id_colonia}, 
              dataType: 'html', 
              type: 'POST', 
              url: 'get_ubicaciones.php', 

              }).done(function(data){   
            	  calle.html(data);      
              });      
            
        });

        $('#id_calle').change(function(){
            var id_calle = $(this).val();        

              $.ajax({
                data: {id_calle:id_calle}, 
                dataType: 'html', 
                type: 'POST', 
                url: 'get_tipo.php', 

                }).done(function(data){   
              	  Tipo.html(data);      
                });      
              
          });

    });
</script>