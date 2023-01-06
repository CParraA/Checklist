<html lang="es">
	<head>
		<title>Inicio de Sesion</title>
		<!-- Required meta tags -->
<meta charset="utf-8">


 <link rel="stylesheet" href="style.css">		
<link rel="stylesheet" href="css/bootstrap.min.css" crossorigin="anonymous">
<link rel="stylesheet" href="css/bootstrap-theme.min.css" crossorigin="anonymous">
<script src="js/bootstrap.min.js" crossorigin="anonymous"></script>

<link href="data:image/x-icon;base64,AAABAAEAEBAAAAEACABoBQAAFgAAACgAAAAQAAAAIAAAAAEACAAAAAAAAAEAAAAAAAAAAAAAAAEAAAAAAABMLSwAVzIuANTIxgBVMTEAVTQxAFc0MQBDJCUAVTEpAIZ2dgBRQkQASisqAFUwLAD9+/wAUy8vADMREQA7JSMAVTIvADMTFABIKSgATy8wAEAgIQBLKysAVTY1ADEREgBWNjUARicmAPz49QD58fAAVTMtAEsuKwA3GBcAVzMtAP/+/QD07+4AQB4fAEQlJAD98/MA/fn7ADwaGgA1FhUA+/z7AFU0KwD7/v4AWDY2APz+/gA1ERMA/f7+AFs2NgD+/v4AJxIRAEsqJwBMKicAOhobAFYyKQBMKSoAVjQ0AFg0NAA3FhYA/Pz8AEknKABNLi0AVDIyAFgzLwD//v8AVjIyAFgyMgBWNTIAVjIqADUWFwBLLCsA7eHeAFcxLQBWMzAA8/fzAEkqKQBzX2EA9vb2AEQoJwD9/P4ARygnAPz//gBYNC4AXTEuAEkrJwBNLi8AMhEOAFQ1NABWMykARSYlAFQyLAA2FxYAVjIsAEUoKABXMS8A+///AFk3NwBCJCMAQyQjAP///wBVMzIA6+bjAFc1NQD//voAWTU1AP39/QD//f0A7OHhAEkoKQA5GRoAVTMzAFk0MABBLSwAVzMzAPv7+wCCcnAAVTYzAFYwKwAwERAATjExAFk2MwAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAEkpKSkoASlg8SmEZGRJPEhJFEgpKEjMZMkoKCkpPT0pPT0VKShIgGTZiIwoSCk8KEkoKCkpTYhVcYgpKEkoKChJKCk8ZIWJrb2IGGWAZSk05LXIqMGJiImRiOnEoCUQXJh1iYmJiYnYMYmJiYmI7NGwRExpiYmIPLExiYjEUVABZWU4vFlBiGz9iZgQIJFZWWVlIYl4LUiVeUUZiOnVaNxhAZUswMC5BSWJiOh9VHhxfPRBoYmJ3N0I1YmICDj5uN2UrYmplZWVAN0BpYicFZ2UraHMWZTc3N2U9bUpiASk4AwNwbWNwQEBAbQNdAVsHH10fARxDW3QNcAMDR1dDEAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA=" rel="icon" type="image/x-icon" />
	


<!-- NOBORRAR 
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">	
 -->	
   
    </head>



	
    <body bgcolor="#000000" background="" >
		<!-- LOGIN -->
		<body >
		
		<div class="container-fluid">
			<div class="row">
			     <div class="col-lg-12">
                        <br><br><br><br><br>
				<center>
				
			
	
				
				
				         <div class="card" align="center" style="width:550px;height: 550px; background:#FFF" >
						    <div class="loginBox">
                            
							  <p><img src="Imagenes/GAP.png" width="367" height="143" ></p>
                               
						  
							   <p><font face="Superscript" SIZE=6 COLOR="black">Checklist de incidencias TI <br> </font>
                              
							    <form action="php/check-login.php" method="post"> 
								<div class="form-group">
									<br>								
										<input type="text" class="form-control input-lg" name="usuario_empleado" placeholder="Usuario"  class="form-control input-lg" required style="width:200px;height:30px;">      
															
									<br>
										<input type="password" class="form-control input-lg" name="password" placeholder="Contraseña"  class="form-control input-lg" required  style="width:200px;height:30px;">       
											
									<br>		    
										<button type="submit" class="btn btn-success btn-block" style="width:200px;height:35px;">INGRESAR</button>
									<br>
								</div>	
							   </form>
							    <br>
		  <?php 
             if(isset($_GET['mensaje']) and $_GET['mensaje']=='error'){
            ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
				<strong>Usuario o contraseña incorrecta !</strong> Vuelve a intentar.
				
            </div>
            <?php 
		
                }
            ?>  
					   
							   		   
				<b>
						       <font face="Superscript" SIZE=2 COLOR="black">Si olvidaste tu usuario o contraseña contacta al departamento de sistemas de tu aeropuerto. </font>
                               </b>			   
                               <br><br>
				</center>
           
					</div><!-- /.card -->
				</div><!-- /.col -->
			</div><!--/.row-->
		</div><!-- /.container -->	



    </body>
    
</html>