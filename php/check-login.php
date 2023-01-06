<?php
session_start();
?>

<!doctype html>
<html lang="en">
	<head>
		<title>Verificar Inicio de Sesion</title>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<!-- Bootstrap CSS
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
		-->
	</head>
	<body>
		<div class="container">
				<?php
				// Connection info. file
				include 'conn.php';
				// Connection variables
			    $conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
				
				// Check connection
			    if (!$conn) {
				    die("Connection failed: " . mysqli_connect_error());
				}
				
				// data sent from form index.html
				$usuario_empleadoB= $_POST['usuario_empleado'];
				$password= $_POST['password'];
				
				// Query sent to database
				$result = mysqli_query($conn, "SELECT nombre, usuario_empleado, password FROM login WHERE usuario_empleado = '$usuario_empleadoB'");
			
				// Variable $row hold the result of the query
				$row = mysqli_fetch_assoc($result);
				// Variable $hash hold the password hash on database
				$hash = $row['password'];
				$row["usuario_empleado"];
				/*
				if($row == null){
				    $hash=""; }
				    else {
				        $hash = $row['password'];
				    }
				    */
				/* 
				password_Verify() function verify if the password entered by the user
				match the password hash on the database. If everything is OK the session
				is created for one minute. Change 1 on $_SESSION[start] to 5 for a 5 minutes session.
				*/
				if (password_verify($_POST['password'], $hash)) {
				    
				    $_SESSION['loggedin'] = true;
				    $_SESSION['name'] = $row['usuario_empleado'];
				    $_SESSION['start'] = time();
				    $_SESSION['expire'] = $_SESSION['start'] + (60 * 60) ;// despues de 10 min la sesion de cierra sola
				    
				    //redirecciona al menu principal
				    header("Status: 301 Moved Permanently");
				    header("Location: ../index2.php");
				    exit;
				    
				} else {
				    
				    header('Location: ../home.php?mensaje=error');
				}
				?>
		
			
		</div>
		<!-- Optional JavaScript -->
		<!-- jQuery first, then Popper.js, then Bootstrap JS -->
		<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>

	</body>
</html>