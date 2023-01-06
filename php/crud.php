<?php
    
    include_once 'conexion.php';
    $objeto = new Conexion();
    $conexion = $objeto->Conectar();
    
   
    //recibir datos
    
    $fecha = (isset($_POST['fecha'])) ? $_POST['fecha'] : '';
    $id_colonia = (isset($_POST['id_colonia'])) ? $_POST['id_colonia'] : '';
    $id_calle = (isset($_POST['id_calle'])) ? $_POST['id_calle'] : '';
    $Tipo = (isset($_POST['Tipo'])) ? $_POST['Tipo'] : '';
    $Comentarios = (isset($_POST['Comentarios'])) ? $_POST['Comentarios'] : '';
    $nombre = (isset($_POST['usuario'])) ? $_POST['usuario'] : '';
    $opcion = (isset($_POST['opcion'])) ? $_POST['opcion'] : '';
    $id = (isset($_POST['id'])) ? $_POST['id'] : '';
    $idestado = 1;
    $ideliminado = 2;
    $idsolucionado = 3;
    $NuevoComentario = (isset($_POST['vComentarios'])) ? $_POST['vComentarios'] : ''; 
    switch($opcion){
        case 1:
                
            
            $consulta = "INSERT INTO proyecto.incidencias (fecha, in_idarea, in_idubicaciones, in_idtipo,comentarios, usuario, idestado) VALUES ('$fecha', '$id_colonia', '$id_calle', '$Tipo', '$Comentarios', '$nombre','$idestado')";
            $resultado = $conexion->prepare($consulta);
            $resultado->execute();
           
            $consulta = "SELECT  idincidencias, fecha, in_idarea, in_idubicaciones, in_idtipo, comentarios, usuario FROM proyecto.incidencias ORDER BY idincidencias DESC LIMIT 1";
            $resultado = $conexion->prepare($consulta);
            $resultado->execute();
            
            $data=$resultado->fetchALL(PDO::FETCH_ASSOC);
              echo "<meta http-equiv=\"refresh\" content=\"0;URL=index2.php\">";
                
            
            break;
            
        case 2:
               $consulta = "UPDATE proyecto.incidencias SET idestado = '$ideliminado' WHERE idincidencias= '$id'";
               $resultado = $conexion->prepare($consulta);
               $resultado->execute();
       
               echo "<meta http-equiv=\"refresh\" content=\"0;URL=index2.php\">";
                   
               
               break;
               
        case 3:
            
            $consulta = "UPDATE proyecto.incidencias SET idestado = '$idsolucionado', comentarios = '$NuevoComentario' WHERE idincidencias= '$id'";
            $resultado = $conexion->prepare($consulta);
            $resultado->execute();
            
            $consulta = "SELECT  idincidencias, fecha, in_idarea, in_idubicaciones, in_idtipo, comentarios, usuario FROM proyecto.incidencias ORDER BY idincidencias DESC LIMIT 1";
            $resultado = $conexion->prepare($consulta);
            $resultado->execute();
            
            $data=$resultado->fetchALL(PDO::FETCH_ASSOC);
            
                echo "<meta http-equiv=\"refresh\" content=\"0;URL=index2.php\">";
                
            
            break;
    }
    
   
    
    print json_encode($data, JSON_UNESCAPED_UNICODE); //Enviar array Final 
    $conexion = NULL;
    
?>