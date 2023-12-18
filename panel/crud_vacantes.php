<?php
include 'conexion_panel.php';

$opcion = $_POST['opcion'];

    if($opcion=="1"){
        $id = $_POST['id'];
        
        $delete_all = $cone->prepare("delete from parrafo_empleo where id_e = '".$id."'"); 
        $delete_all->execute();
        $delete = $cone->prepare("delete from empleos where id = '".$id."'"); 
        $delete->execute();
        echo "EL REGISTRO HA SIDO ELIMINADO"; 
    }


else 
if($opcion=="2"){

    $nombre_vacante = $_POST['nombre_vacante'];
    $nombre_vacantei = isset($_POST['nombre_vacantei']) ? $_POST['nombre_vacantei']: ' ';
    $area =  $_POST['area'];
    $areai = isset($_POST['areai']) ? $_POST['areai'] : ' ';
    $descripcion =$_POST['descripcion'];
    $descripcioni = isset($_POST['descripcioni']) ? $_POST['descripcioni']: ' ';
    $fecha = $_POST['fecha'];
    $archivo =  $_FILES['file_imagen'];  
    $imagen = $_FILES['file_imagen']['name'];
    $tipo_mime = mime_content_type($_FILES['file_imagen']['tmp_name']);
   

    if (in_array($tipo_mime, ['image/jpeg', 'image/png', 'image/gif', 'image/bmp'])) {

        if (move_uploaded_file($_FILES['file_imagen']['tmp_name'], '../img/vacantes/'.$imagen)){

                    $sql = "INSERT INTO empleos (area, areai, nombre_vacante, nombre_vacantei, descripcion, descripcioni, fecha, imagen_vacante) 
                    VALUES (:area, :areai, :nombre_vacante,:nombre_vacantei, :descripcion, :descripcioni, :fecha, :imagen_vacante)";

                    $stmt = $cone->prepare($sql);

                    // Enlaza los parámetros con los valores
                    $stmt->bindParam(':area', $area);
                    $stmt->bindParam(':areai', $areai);
                    $stmt->bindParam(':nombre_vacante', $descripcion);
                    $stmt->bindParam(':nombre_vacantei', $descripcioni);
                    $stmt->bindParam(':descripcion',$descripcion);
                    $stmt->bindParam(':descripcioni',$descripcioni);
                    $stmt->bindParam(':fecha',$fecha);
                    $stmt->bindParam(':imagen_vacante',$imagen);

                    // Ejecuta la consulta
                    if ($stmt->execute()) {
                        echo "Datos insertados correctamente";
                    } else {
                        echo "Error al insertar los datos: " . $stmt->errorInfo()[2];
                    }           
                    }

                    else {
                        $respuesta = array(
                            'error' => 'Error al subir la imagen.'
                        );

                        echo $json_encode($respuesta);
                    }
    } 
        else 
        {
        echo "El archivo subido debe de ser una imagen valida.";
      }

}


else 
    if($opcion=="3"){

        $id = $_POST['id'];
        $result="Los datos se han actualizado correctamente";

        if(isset($_POST['nombre_vacante']) && $_POST['nombre_vacante']!="" ){
            $nombre_vacante = $_POST['nombre_vacante'];
            $sql = "UPDATE empleos set nombre_vacante = :nombre_vacante where id ='".$id."'";

            $stmt = $cone->prepare($sql);
            $stmt->bindParam(':nombre_vacante', $nombre_vacante);

            // Ejecuta la consulta
            if (!$stmt->execute()) 
                $result="ha ocurrido un error";
        }

        if(isset($_POST['nombre_vacantei']) && $_POST['nombre_vacantei']!="" ){
            $nombre_vacantei = $_POST['nombre_vacantei'];
            $sql = "UPDATE empleos set nombre_vacantei = :nombre_vacantei where id ='".$id."'";

            $stmt = $cone->prepare($sql);
            $stmt->bindParam(':nombre_vacantei', $nombre_vacantei);

            // Ejecuta la consulta
            if (!$stmt->execute()) 
                $result="ha ocurrido un error";
        }

        if(isset($_POST['area']) && $_POST['area']!="" ){
            $area = $_POST['area'];
            $sql = "UPDATE empleos set area = :area where id ='".$id."'";

            $stmt = $cone->prepare($sql);
            $stmt->bindParam(':area', $area);

            // Ejecuta la consulta
            if (!$stmt->execute()) 
                $result="ha ocurrido un error";
        }


        if(isset($_POST['areai']) && $_POST['areai']!="" ){
            $areai = $_POST['areai'];
            $sql = "UPDATE empleos set areai = :areai where id ='".$id."'";

            $stmt = $cone->prepare($sql);
            $stmt->bindParam(':areai', $areai);

            // Ejecuta la consulta
            if (!$stmt->execute()) 
                $result="ha ocurrido un error";
        }

        if(isset($_POST['fecha']) && $_POST['fecha']!="" ){
            $fecha = $_POST['fecha'];
            $sql = "UPDATE empleos set fecha = :fecha where id ='".$id."'";

            
            $stmt = $cone->prepare($sql);
            $stmt->bindParam(':fecha', $fecha);

            // Ejecuta la consulta
            if (!$stmt->execute()) 
                $result="ha ocurrido un error";
            

        }

        if(isset($_POST['descripcion']) && $_POST['descripcion']!="" ){
            $descripcion = $_POST['descripcion'];
            $sql = "UPDATE empleos set descripcion = :descripcion where id ='".$id."'";
 
            $stmt = $cone->prepare($sql);
            $stmt->bindParam(':descripcion', $descripcion);

            // Ejecuta la consulta
            if (!$stmt->execute()) 
                $result="ha ocurrido un error"; 
        }

        if(isset($_POST['descripcioni']) && $_POST['descripcioni']!="" ){
            $descripcioni = $_POST['descripcioni'];
            $sql = "UPDATE empleos set descripcioni = :descripcioni where id ='".$id."'";
 
            $stmt = $cone->prepare($sql);
            $stmt->bindParam(':descripcioni', $descripcioni);

            // Ejecuta la consulta
            if (!$stmt->execute()) 
                $result="ha ocurrido un error"; 
        }


        if(!empty($_FILES['file_imagen']['name'])){
         
            $imagen = $_FILES['file_imagen']['name'];
            $tipo_mime = mime_content_type($_FILES['file_imagen']['tmp_name']);
            
            if (in_array($tipo_mime, ['image/jpeg', 'image/png', 'image/gif', 'image/bmp'])) {

                if (move_uploaded_file($_FILES['file_imagen']['tmp_name'], '../img/vacantes/'.$imagen)){
                        $sql = "UPDATE empleos set imagen_vacante = :imagen where id ='".$id."'";
                        $stmt = $cone->prepare($sql);
                        $stmt->bindParam(':imagen', $imagen);
            
                        // Ejecuta la consulta
                        if (!$stmt->execute()) 
                            $result="ha ocurrido un error";
                        
                    }

                else {
                         $result = array(
                        'error' => 'Error al subir la imagen.'
                    );
    
                    echo $json_encode($result);
                }
            }

            else 
                $result="el archivo debe de ser una imagen valida";
          

        }

        echo $result;
    }


    else if($opcion=="4"){
        $id_e= $_POST['id_e'];
        $contenido = $_POST['editor'];
        $contenidoi  = isset($_POST['editori']) ? $_POST['editori'] : ' ';
        
        $sql = "INSERT INTO parrafo_empleo (parrafo, parrafoi, id_e) VALUES (:contenido, :contenidoi, :id_e)";
        $stmt = $cone->prepare($sql);
        $stmt->bindParam(':contenido', $contenido);
        $stmt->bindParam(':contenidoi', $contenidoi);
        $stmt->bindParam(':id_e', $id_e);

        if ($stmt->execute()) 
            $result="Datos insertados correctamente";

        else  $result ="Error al insertar los datos: ".$stmt->errorInfo()[2];

        echo $result;
    }

    if($opcion=="5"){
        $id = $_POST['id_p'];
        $delete = $cone->prepare("delete from parrafo_empleo where id_p = '".$id."'"); 
        $delete->execute();
        echo "EL REGISTRO HA SIDO ELIMINADO"; 
    }

else  
if($opcion=="6"){
    $result="Los datos se han actualizado correctamente";
    $id_p = $_POST['id_p'];

    if(isset($_POST['editor']) && $_POST['editor']!="" ){
    $parrafo =  $_POST['editor'];

    $sql = "UPDATE parrafo_empleo SET parrafo =:parrafo where id_p = :id_p";

    $stmt = $cone->prepare($sql);
    $stmt->bindParam(':parrafo', $parrafo);
    $stmt->bindParam(':id_p', $id_p);

    if ($stmt->execute()) 
         $result = "Datos actualizados";
     else 
        $result ="Error al actualizar los datos: ".$stmt->errorInfo()[2];
    }


    if(isset($_POST['editori']) && $_POST['editori']!="" ){
        $parrafoi =  $_POST['editori'];
    
        $sql = "UPDATE parrafo_empleo SET parrafoi =:parrafoi where id_p = :id_p";
    
        $stmt = $cone->prepare($sql);
        $stmt->bindParam(':parrafoi', $parrafoi);
        $stmt->bindParam(':id_p', $id_p);
    
        if ($stmt->execute()) 
             $result = "Datos actualizados";
         else 
            $result ="Error al actualizar los datos: ".$stmt->errorInfo()[2];
        }

    echo $result;
}



else  
if($opcion=="7"){
    $result="Los datos se han actualizado correctamente";
    $id = $_POST['id'];

    if(isset($_POST['texto']) && $_POST['texto']!="" ){
    $texto =  $_POST['texto'];

    $sql = "UPDATE contenido_empleos SET texto =:texto where id = :id";

    $stmt = $cone->prepare($sql);
    $stmt->bindParam(':texto', $texto);
    $stmt->bindParam(':id', $id);

    if ($stmt->execute()) 
         $result = "Datos actualizados";
     else 
        $result ="Error al actualizar los datos: ".$stmt->errorInfo()[2];
    }

    if(isset($_POST['texto']) && $_POST['texto']!="" ){
        $texto =  $_POST['texto'];
    
        $sql = "UPDATE contenido_empleos SET texto =:texto where id = :id";
    
        $stmt = $cone->prepare($sql);
        $stmt->bindParam(':texto', $texto);
        $stmt->bindParam(':id', $id);
    
        if ($stmt->execute()) 
             $result = "Datos actualizados";
         else 
            $result ="Error al actualizar los datos: ".$stmt->errorInfo()[2];
        }

    if(isset($_POST['texto_i']) && $_POST['texto_i']!="" ){
        $textoi =  $_POST['texto_i'];
    
        $sql = "UPDATE contenido_empleos SET texto_i =:texto_i where id = :id";
    
        $stmt = $cone->prepare($sql);
        $stmt->bindParam(':texto_i', $textoi);
        $stmt->bindParam(':id', $id);
    
        if ($stmt->execute()) 
            $result = "Datos actualizados";
        else 
            $result ="Error al actualizar los datos: ".$stmt->errorInfo()[2];
        }

    if(isset($_POST['texto_be']) && $_POST['texto_be']!="" ){
        $texto_be =  $_POST['texto_be'];
    
        $sql = "UPDATE contenido_empleos SET texto_be =:texto_be where id = :id";
    
        $stmt = $cone->prepare($sql);
        $stmt->bindParam(':texto_be', $texto_be);
        $stmt->bindParam(':id', $id);
    
        if ($stmt->execute()) 
                $result = "Datos actualizados";
            else 
            $result ="Error al actualizar los datos: ".$stmt->errorInfo()[2];
        }
        
    if(isset($_POST['texto_bei']) && $_POST['texto_bei']!="" ){
        $texto_bei =  $_POST['texto_bei'];
    
        $sql = "UPDATE contenido_empleos SET texto_bei =:texto_bei where id = :id";
    
        $stmt = $cone->prepare($sql);
        $stmt->bindParam(':texto_bei', $texto_bei);
        $stmt->bindParam(':id', $id);
    
        if ($stmt->execute()) 
                $result = "Datos actualizados";
            else 
            $result ="Error al actualizar los datos: ".$stmt->errorInfo()[2];
        }

    if(isset($_POST['lista_be']) && $_POST['lista_be']!="" ){
        $lista_be =  $_POST['lista_be'];
    
        $sql = "UPDATE contenido_empleos SET lista_be =:lista_be where id = :id";
    
        $stmt = $cone->prepare($sql);
        $stmt->bindParam(':lista_be', $lista_be);
        $stmt->bindParam(':id', $id);
    
        if ($stmt->execute()) 
                $result = "Datos actualizados";
            else 
            $result ="Error al actualizar los datos: ".$stmt->errorInfo()[2];
        }

    if(isset($_POST['lista_bei']) && $_POST['lista_bei']!="" ){
        $lista_bei =  $_POST['lista_bei'];
    
        $sql = "UPDATE contenido_empleos SET lista_bei =:lista_bei where id = :id";
    
        $stmt = $cone->prepare($sql);
        $stmt->bindParam(':lista_bei', $lista_bei);
        $stmt->bindParam(':id', $id);
    
        if ($stmt->execute()) 
                $result = "Datos actualizados";
            else 
            $result ="Error al actualizar los datos: ".$stmt->errorInfo()[2];
        }


    echo $result;
}




else  
if($opcion=="8"){
    $result="Los datos se han actualizado correctamente";
    $id = $_POST['id'];

    if(isset($_POST['aviso_reclutamiento']) && $_POST['aviso_reclutamiento']!="" ){
        $aviso_reclutamiento =  $_POST['aviso_reclutamiento'];

        $sql = "UPDATE contenido_empleos SET aviso_reclutamiento =:aviso_reclutamiento where id = :id";

        $stmt = $cone->prepare($sql);
        $stmt->bindParam(':aviso_reclutamiento', $aviso_reclutamiento);
        $stmt->bindParam(':id', $id);

        if ($stmt->execute()) 
            $result = "Datos actualizados";
        else 
            $result ="Error al actualizar los datos: ".$stmt->errorInfo()[2];
     }

     else {
        $sql = "UPDATE contenido_empleos SET aviso_reclutamiento = null where id = :id";
        $stmt = $cone->prepare($sql);
        $stmt->bindParam(':id', $id);

        if ($stmt->execute()) 
            $result = "Datos actualizados";
        else 
            $result ="Error al actualizar los datos: ".$stmt->errorInfo()[2];
     }



     if(isset($_POST['aviso_reclutamientoi']) && $_POST['aviso_reclutamientoi']!="" ){
        $aviso_reclutamientoi =  $_POST['aviso_reclutamientoi'];

        $sql = "UPDATE contenido_empleos SET aviso_reclutamientoi =:aviso_reclutamientoi where id = :id";

        $stmt = $cone->prepare($sql);
        $stmt->bindParam(':aviso_reclutamientoi', $aviso_reclutamientoi);
        $stmt->bindParam(':id', $id);

        if ($stmt->execute()) 
            $result = "Datos actualizados";
        else 
            $result ="Error al actualizar los datos: ".$stmt->errorInfo()[2];
     }

     else {
        $sql = "UPDATE contenido_empleos SET aviso_reclutamientoi = null where id = :id";
        $stmt = $cone->prepare($sql);
        $stmt->bindParam(':id', $id);

        if ($stmt->execute()) 
            $result = "Datos actualizados";
        else 
            $result ="Error al actualizar los datos: ".$stmt->errorInfo()[2];
     }



     if(!empty($_FILES['imagen_reclutamiento']['name'])){
        $imagen_reclutamiento = $_FILES['imagen_reclutamiento']['name'];
        $tipo_mime = mime_content_type($_FILES['imagen_reclutamiento']['tmp_name']);
        
        if (in_array($tipo_mime, ['image/jpeg', 'image/png', 'image/gif', 'image/bmp'])) {

            if (move_uploaded_file($_FILES['imagen_reclutamiento']['tmp_name'], '../img/vacantes/'.$imagen_reclutamiento)){
                    $sql = "UPDATE contenido_empleos set imagen_reclutamiento = :imagen_reclutamiento where id ='".$id."'";
                    $stmt = $cone->prepare($sql);
                    $stmt->bindParam(':imagen_reclutamiento', $imagen_reclutamiento);
        
                    // Ejecuta la consulta
                    if (!$stmt->execute()) 
                        $result="ha ocurrido un error";
                    
                }

            else {
                     $result = array(
                    'error' => 'Error al subir la imagen.'
                );

                echo $json_encode($result);
            }
        }

        else 
            $result="el archivo debe de ser una imagen valida";
    }

    else {
        $sql = "UPDATE contenido_empleos set imagen_reclutamiento = null where id ='".$id."'";
        $stmt = $cone->prepare($sql);

        // Ejecuta la consulta
        if (!$stmt->execute()) 
            $result="ha ocurrido un error";
    }

    echo $result;
}


?>