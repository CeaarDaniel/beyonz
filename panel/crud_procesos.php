<?php
include 'conexion_panel.php';


$opcion = $_POST['opcion'];

  
   if($opcion=="1"){

        $id = $_POST['id'];
        $result="Los datos se han actualizado correctamente";

        if(isset($_POST['texto']) && $_POST['texto']!="" ){
            $texto = $_POST['texto'];
            $sql = "UPDATE encabezado_procesos set texto = :texto where id ='".$id."'";
        
            $stmt = $cone->prepare($sql);
            $stmt->bindParam(':texto', $texto);

            // Ejecuta la consulta
            if (!$stmt->execute()) 
                $result="ha ocurrido un error";
        }

        if(isset($_POST['textoi']) && $_POST['textoi']!="" ){
            $textoi = $_POST['textoi'];
            $sql = "UPDATE encabezado_procesos set textoi = :textoi where id ='".$id."'";
        
            $stmt = $cone->prepare($sql);
            $stmt->bindParam(':textoi', $textoi);

            // Ejecuta la consulta
            if (!$stmt->execute()) 
                $result="ha ocurrido un error";
        }

        if(!empty($_FILES['file_imagen']['name'])){
         
            $imagen = $_FILES['file_imagen']['name'];
            $tipo_mime = mime_content_type($_FILES['file_imagen']['tmp_name']);
            
            if (in_array($tipo_mime, ['image/jpeg', 'image/png', 'image/gif', 'image/bmp'])) {

                if (move_uploaded_file($_FILES['file_imagen']['tmp_name'], '../img/equipos/'.$imagen)){
                        $sql = "UPDATE encabezado_procesos set imagen = :imagen where id ='".$id."'";
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


        if(isset($_POST['proceso_automotriz']) && $_POST['proceso_automotriz']!="" ){
            $proceso_automotriz= $_POST['proceso_automotriz'];
            $sql = "UPDATE encabezado_procesos set proceso_automotriz = :proceso_automotriz where id ='".$id."'";
        
            $stmt = $cone->prepare($sql);
            $stmt->bindParam(':proceso_automotriz', $proceso_automotriz);

            // Ejecuta la consulta
            if (!$stmt->execute()) 
                $result="ha ocurrido un error";
        }


        if(isset($_POST['proceso_automotrizi']) && $_POST['proceso_automotrizi']!="" ){
            $proceso_automotrizi= $_POST['proceso_automotrizi'];
            $sql = "UPDATE encabezado_procesos set proceso_automotrizi = :proceso_automotrizi where id ='".$id."'";
        
            $stmt = $cone->prepare($sql);
            $stmt->bindParam(':proceso_automotrizi', $proceso_automotrizi);

            // Ejecuta la consulta
            if (!$stmt->execute()) 
                $result="ha ocurrido un error";
        }


        if(!empty($_FILES['imagen_automotriz']['name'])){
         
            $imagen_automotriz = $_FILES['imagen_automotriz']['name'];
            $tipo_mime = mime_content_type($_FILES['imagen_automotriz']['tmp_name']);
            
            if (in_array($tipo_mime, ['image/jpeg', 'image/png', 'image/gif', 'image/bmp'])) {

                if (move_uploaded_file($_FILES['imagen_automotriz']['tmp_name'], '../img/imagenes/'.$imagen_automotriz)){
                        $sql = "UPDATE encabezado_procesos set imagen_automotriz = :imagen_automotriz where id ='".$id."'";
                        $stmt = $cone->prepare($sql);
                        $stmt->bindParam(':imagen_automotriz', $imagen_automotriz);
            
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


        if(isset($_POST['proceso_moldes']) && $_POST['proceso_moldes']!="" ){
            $proceso_moldes= $_POST['proceso_moldes'];
            $sql = "UPDATE encabezado_procesos set proceso_moldes = :proceso_moldes where id ='".$id."'";
        
            $stmt = $cone->prepare($sql);
            $stmt->bindParam(':proceso_moldes', $proceso_moldes);

            // Ejecuta la consulta
            if (!$stmt->execute()) 
                $result="ha ocurrido un error";
        }


        if(isset($_POST['proceso_moldesi']) && $_POST['proceso_moldesi']!="" ){
            $proceso_moldesi= $_POST['proceso_moldesi'];
            $sql = "UPDATE encabezado_procesos set proceso_moldesi = :proceso_moldesi where id ='".$id."'";
        
            $stmt = $cone->prepare($sql);
            $stmt->bindParam(':proceso_moldesi', $proceso_moldesi);

            // Ejecuta la consulta
            if (!$stmt->execute()) 
                $result="ha ocurrido un error";
        }


        if(!empty($_FILES['imagen_moldes']['name'])){
         
            $imagen_moldes = $_FILES['imagen_moldes']['name'];
            $tipo_mime = mime_content_type($_FILES['imagen_moldes']['tmp_name']);
            
            if (in_array($tipo_mime, ['image/jpeg', 'image/png', 'image/gif', 'image/bmp'])) {

                if (move_uploaded_file($_FILES['imagen_moldes']['tmp_name'], '../img/imagenes/'.$imagen_moldes)){
                        $sql = "UPDATE encabezado_procesos set imagen_moldes = :imagen_moldes where id ='".$id."'";
                        $stmt = $cone->prepare($sql);
                        $stmt->bindParam(':imagen_moldes', $imagen_moldes);
            
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


        if(isset($_POST['equipos']) && $_POST['equipos']!="" ){
            $equipos= $_POST['equipos'];
            $sql = "UPDATE encabezado_procesos set equipos = :equipos where id ='".$id."'";
        
            $stmt = $cone->prepare($sql);
            $stmt->bindParam(':equipos', $equipos);

            // Ejecuta la consulta
            if (!$stmt->execute()) 
                $result="ha ocurrido un error";
        }


        if(isset($_POST['equiposi']) && $_POST['equiposi']!="" ){
            $equiposi= $_POST['equiposi'];
            $sql = "UPDATE encabezado_procesos set equiposi = :equiposi where id ='".$id."'";
        
            $stmt = $cone->prepare($sql);
            $stmt->bindParam(':equiposi', $equiposi);

            // Ejecuta la consulta
            if (!$stmt->execute()) 
                $result="ha ocurrido un error";
        }


        if(!empty($_FILES['imagen_equipos']['name'])){
         
            $imagen_equipos = $_FILES['imagen_equipos']['name'];
            $tipo_mime = mime_content_type($_FILES['imagen_equipos']['tmp_name']);
            
            if (in_array($tipo_mime, ['image/jpeg', 'image/png', 'image/gif', 'image/bmp'])) {

                if (move_uploaded_file($_FILES['imagen_equipos']['tmp_name'], '../img/imagenes/'.$imagen_equipos)){
                        $sql = "UPDATE encabezado_procesos set imagen_equipos = :imagen_equipos where id ='".$id."'";
                        $stmt = $cone->prepare($sql);
                        $stmt->bindParam(':imagen_equipos', $imagen_equipos);
            
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


else 
 if($opcion=="2"){
    $descripcion =  isset($_POST['descripcion']) ? $_POST['descripcion'] : ' ';
    $descripcioni =  isset($_POST['descripcioni']) ? $_POST['descripcioni'] : ' ';
    $archivo =  $_FILES['file_imagen'];
    $imagen = $_FILES['file_imagen']['name'];
   
    $tipo_mime = mime_content_type($_FILES['file_imagen']['tmp_name']);
   

    if (in_array($tipo_mime, ['image/jpeg', 'image/png', 'image/gif', 'image/bmp'])) {

        if (move_uploaded_file($_FILES['file_imagen']['tmp_name'], '../img/equipos/'.$imagen)){
          

                    $sql = "INSERT INTO equipos (imagen, descripcion, descripcioni) 
                    VALUES (:imagen, :descripcion, :descripcioni)";

                    $stmt = $cone->prepare($sql);

                    // Enlaza los parámetros con los valores
                   
                    $stmt->bindParam(':imagen', $imagen);
                    $stmt->bindParam(':descripcion',$descripcion);
                    $stmt->bindParam(':descripcioni',$descripcioni);
          
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
        $delete = $cone->prepare("delete from equipos where id = '".$id."'"); 
        $delete->execute();
        echo "EL REGISTRO HA SIDO ELIMINADO"; 
    }


      
else 
    if($opcion=="4"){

        $id = $_POST['id'];
        $result="Los datos se han actualizado correctamente";

        if(isset($_POST['descripcion']) && $_POST['descripcion']!="" ){
            $descripcion = $_POST['descripcion'];
            $sql = "UPDATE equipos set descripcion = :descripcion where id ='".$id."'";

            $stmt = $cone->prepare($sql);
            $stmt->bindParam(':descripcion', $descripcion);
           
            if (!$stmt->execute()) 
                $result="ha ocurrido un error";
        }

        else{
            $sql = "UPDATE equipos set descripcion = null where id ='".$id."'";
            $stmt = $cone->prepare($sql);
            if (!$stmt->execute()) 
                $result="ha ocurrido un error";
        }

        if(isset($_POST['descripcioni']) && $_POST['descripcioni']!="" ){
            $descripcioni = $_POST['descripcioni'];
            $sql = "UPDATE equipos set descripcioni = :descripcioni where id ='".$id."'";

            $stmt = $cone->prepare($sql);
            $stmt->bindParam(':descripcioni', $descripcioni);
           
            if (!$stmt->execute()) 
                $result="ha ocurrido un error";
        }

        else {
            $sql = "UPDATE equipos set descripcioni = null where id ='".$id."'";
            $stmt = $cone->prepare($sql);
            if (!$stmt->execute()) 
                $result="ha ocurrido un error";
        }

        
        if(!empty($_FILES['file_imagen']['name'])){
            $imagen = $_FILES['file_imagen']['name'];
            $tipo_mime = mime_content_type($_FILES['file_imagen']['tmp_name']);
            
            if (in_array($tipo_mime, ['image/jpeg', 'image/png', 'image/gif', 'image/bmp'])) {
                if (move_uploaded_file($_FILES['file_imagen']['tmp_name'], '../img/equipos/'.$imagen)){
                        $sql = "UPDATE equipos set imagen = :imagen where id ='".$id."'";
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
                $result="el archivo debe debe de ser una imagen valida";
        }
         echo "<script>alert('$result'); window.history.back(); </script>";
    }


    if($opcion=="5"){

        $id = $_POST['id'];
        $result="Los datos se han actualizado correctamente";

        if(isset($_POST['editor']) && $_POST['editor']!="" ){
            $parrafo = $_POST['editor'];
            $sql = "UPDATE proceso_automotriz set parrafo = :parrafo where id ='".$id."'";
        
            $stmt = $cone->prepare($sql);
            $stmt->bindParam(':parrafo', $parrafo);

            // Ejecuta la consulta
            if (!$stmt->execute()) 
                $result="ha ocurrido un error";
        }

        if(isset($_POST['editori']) && $_POST['editori']!="" ){
            $parrafoi = $_POST['editori'];
            $sql = "UPDATE proceso_automotriz set parrafoi = :parrafoi where id ='".$id."'";
        
            $stmt = $cone->prepare($sql);
            $stmt->bindParam(':parrafoi', $parrafoi);

            // Ejecuta la consulta
            if (!$stmt->execute()) 
                $result="ha ocurrido un error";
        }

        if(isset($_POST['texto_bps']) && $_POST['texto_bps']!="" ){
            $texto_bps = $_POST['texto_bps'];
            $sql = "UPDATE proceso_automotriz set texto_bps = :texto_bps where id ='".$id."'";
        
            $stmt = $cone->prepare($sql);
            $stmt->bindParam(':texto_bps', $texto_bps);

            // Ejecuta la consulta
            if (!$stmt->execute()) 
                $result="ha ocurrido un error";
        }

        if(isset($_POST['texto_bpsi']) && $_POST['texto_bpsi']!="" ){
            $texto_bpsi = $_POST['texto_bpsi'];
            $sql = "UPDATE proceso_automotriz set texto_bpsi = :texto_bpsi where id ='".$id."'";
        
            $stmt = $cone->prepare($sql);
            $stmt->bindParam(':texto_bpsi', $texto_bpsi);

            // Ejecuta la consulta
            if (!$stmt->execute()) 
                $result="ha ocurrido un error";
        }

        if(!empty($_FILES['img_bps']['name'])){
         
            $img_bps = $_FILES['img_bps']['name'];
            $tipo_mime = mime_content_type($_FILES['img_bps']['tmp_name']);
            
            if (in_array($tipo_mime, ['image/jpeg', 'image/png', 'image/gif', 'image/bmp'])) {

                if (move_uploaded_file($_FILES['img_bps']['tmp_name'], '../img/proceso_automotriz/'.$img_bps)){
                        $sql = "UPDATE proceso_automotriz set img_bps = :img_bps where id ='".$id."'";
                        $stmt = $cone->prepare($sql);
                        $stmt->bindParam(':img_bps', $img_bps);
            
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


        if(isset($_POST['sistema_integrado']) && $_POST['sistema_integrado']!="" ){
            $sistema_integrado = $_POST['sistema_integrado'];
            $sql = "UPDATE proceso_automotriz set sistema_integrado = :sistema_integrado where id ='".$id."'";
        
            $stmt = $cone->prepare($sql);
            $stmt->bindParam(':sistema_integrado', $sistema_integrado);

            if (!$stmt->execute()) 
                $result="ha ocurrido un error";
        }
        

        if(isset($_POST['sistema_integradoi']) && $_POST['sistema_integradoi']!="" ){
            $sistema_integradoi = $_POST['sistema_integradoi'];
            $sql = "UPDATE proceso_automotriz set sistema_integradoi = :sistema_integradoi where id ='".$id."'";
        
            $stmt = $cone->prepare($sql);
            $stmt->bindParam(':sistema_integradoi', $sistema_integradoi);

            if (!$stmt->execute()) 
                $result="ha ocurrido un error";
        }

        if(!empty($_FILES['imagen_sisintegrado']['name'])){
         
            $imagen_sisintegrado = $_FILES['imagen_sisintegrado']['name'];
            $tipo_mime = mime_content_type($_FILES['imagen_sisintegrado']['tmp_name']);
            
            if (in_array($tipo_mime, ['image/jpeg', 'image/png', 'image/gif', 'image/bmp'])) {

                if (move_uploaded_file($_FILES['imagen_sisintegrado']['tmp_name'], '../img/proceso_automotriz/'.$imagen_sisintegrado)){
                        $sql = "UPDATE proceso_automotriz set imagen_sisintegrado = :imagen_sisintegrado where id ='".$id."'";
                        $stmt = $cone->prepare($sql);
                        $stmt->bindParam(':imagen_sisintegrado', $imagen_sisintegrado);
 
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



        if(isset($_POST['sistema_bps']) && $_POST['sistema_bps']!="" ){
            $sistema_bps = $_POST['sistema_bps'];
            $sql = "UPDATE proceso_automotriz set sistema_bps = :sistema_bps where id ='".$id."'";
        
            $stmt = $cone->prepare($sql);
            $stmt->bindParam(':sistema_bps', $sistema_bps);

            // Ejecuta la consulta
            if (!$stmt->execute()) 
                $result="ha ocurrido un error";
        }


        if(isset($_POST['sistema_bpsi']) && $_POST['sistema_bpsi']!="" ){
            $sistema_bpsi = $_POST['sistema_bpsi'];
            $sql = "UPDATE proceso_automotriz set sistema_bpsi = :sistema_bpsi where id ='".$id."'";
        
            $stmt = $cone->prepare($sql);
            $stmt->bindParam(':sistema_bpsi', $sistema_bpsi);

            // Ejecuta la consulta
            if (!$stmt->execute()) 
                $result="ha ocurrido un error";
        }

        if(!empty($_FILES['img_sisbps']['name'])){
         
            $img_sisbps = $_FILES['img_sisbps']['name'];
            $tipo_mime = mime_content_type($_FILES['img_sisbps']['tmp_name']);
            
            if (in_array($tipo_mime, ['image/jpeg', 'image/png', 'image/gif', 'image/bmp'])) {

                if (move_uploaded_file($_FILES['img_sisbps']['tmp_name'], '../img/proceso_automotriz/'.$img_sisbps)){
                        $sql = "UPDATE proceso_automotriz set img_sisbps = :img_sisbps where id ='".$id."'";
                        $stmt = $cone->prepare($sql);
                        $stmt->bindParam(':img_sisbps', $img_sisbps);
            
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


    if($opcion=="6"){

        $id = $_POST['id'];
        $result="Los datos se han actualizado correctamente";

        if(isset($_POST['texto']) && $_POST['texto']!="" ){
            $texto = $_POST['texto'];
            $sql = "UPDATE proceso_moldes set texto = :texto where id ='".$id."'";
        
            $stmt = $cone->prepare($sql);
            $stmt->bindParam(':texto', $texto);

            // Ejecuta la consulta
            if (!$stmt->execute()) 
                $result="ha ocurrido un error";
        }


        if(isset($_POST['textoi']) && $_POST['textoi']!="" ){
            $textoi = $_POST['textoi'];
            $sql = "UPDATE proceso_moldes set textoi = :textoi where id ='".$id."'";
        
            $stmt = $cone->prepare($sql);
            $stmt->bindParam(':textoi', $textoi);

            // Ejecuta la consulta
            if (!$stmt->execute()) 
                $result="ha ocurrido un error";
        }


        if(isset($_POST['proceso_plasticidad']) && $_POST['proceso_plasticidad']!="" ){
            $proceso_plasticidad = $_POST['proceso_plasticidad'];
            $sql = "UPDATE proceso_moldes set proceso_plasticidad = :proceso_plasticidad where id ='".$id."'";
        
            $stmt = $cone->prepare($sql);
            $stmt->bindParam(':proceso_plasticidad', $proceso_plasticidad);

            // Ejecuta la consulta
            if (!$stmt->execute()) 
                $result="ha ocurrido un error";
        }


        if(isset($_POST['proceso_plasticidadi']) && $_POST['proceso_plasticidadi']!="" ){
            $proceso_plasticidadi = $_POST['proceso_plasticidadi'];
            $sql = "UPDATE proceso_moldes set proceso_plasticidadi = :proceso_plasticidadi where id ='".$id."'";
        
            $stmt = $cone->prepare($sql);
            $stmt->bindParam(':proceso_plasticidadi', $proceso_plasticidadi);

            // Ejecuta la consulta
            if (!$stmt->execute()) 
                $result="ha ocurrido un error";
        }

        if(isset($_POST['tool_uno']) && $_POST['tool_uno']!="" ){
            $tool_uno = $_POST['tool_uno'];
            $sql = "UPDATE proceso_moldes set tool_uno = :tool_uno where id ='".$id."'";
        
            $stmt = $cone->prepare($sql);
            $stmt->bindParam(':tool_uno', $tool_uno);

            // Ejecuta la consulta
            if (!$stmt->execute()) 
            $result="ha ocurrido un error";
    }


    if(isset($_POST['tool_unoi']) && $_POST['tool_unoi']!="" ){
        $tool_unoi = $_POST['tool_unoi'];
        $sql = "UPDATE proceso_moldes set tool_unoi = :tool_unoi where id ='".$id."'";
    
        $stmt = $cone->prepare($sql);
        $stmt->bindParam(':tool_unoi', $tool_unoi);

        // Ejecuta la consulta
        if (!$stmt->execute()) 
        $result="ha ocurrido un error";
    }


    if(isset($_POST['tool_dos']) && $_POST['tool_dos']!="" ){
        $tool_dos = $_POST['tool_dos'];
        $sql = "UPDATE proceso_moldes set tool_dos = :tool_dos where id ='".$id."'";
    
        $stmt = $cone->prepare($sql);
        $stmt->bindParam(':tool_dos', $tool_dos);

        // Ejecuta la consulta
        if (!$stmt->execute()) 
        $result="ha ocurrido un error";
    }


    if(isset($_POST['tool_dosi']) && $_POST['tool_dosi']!="" ){
        $tool_dosi = $_POST['tool_dosi'];
        $sql = "UPDATE proceso_moldes set tool_dosi = :tool_dosi where id ='".$id."'";
    
        $stmt = $cone->prepare($sql);
        $stmt->bindParam(':tool_dosi', $tool_dosi);

        // Ejecuta la consulta
        if (!$stmt->execute()) 
        $result="ha ocurrido un error";
    }


        if(isset($_POST['texto_recu']) && $_POST['texto_recu']!="" ){
            $texto_recu = $_POST['texto_recu'];
            $sql = "UPDATE proceso_moldes set texto_recu = :texto_recu where id ='".$id."'";
        
            $stmt = $cone->prepare($sql);
            $stmt->bindParam(':texto_recu', $texto_recu);

            // Ejecuta la consulta
            if (!$stmt->execute()) 
                $result="ha ocurrido un error";
        }

        if(isset($_POST['texto_recui']) && $_POST['texto_recui']!="" ){
            $texto_recui = $_POST['texto_recui'];
            $sql = "UPDATE proceso_moldes set texto_recui = :texto_recui where id ='".$id."'";
        
            $stmt = $cone->prepare($sql);
            $stmt->bindParam(':texto_recui', $texto_recui);

            // Ejecuta la consulta
            if (!$stmt->execute()) 
                $result="ha ocurrido un error";
        }


        if(isset($_POST['tipos_recu']) && $_POST['tipos_recu']!="" ){
            $tipos_recu = $_POST['tipos_recu'];
            $sql = "UPDATE proceso_moldes set tipos_recu = :tipos_recu where id ='".$id."'";
        
            $stmt = $cone->prepare($sql);
            $stmt->bindParam(':tipos_recu', $tipos_recu);

            // Ejecuta la consulta
            if (!$stmt->execute()) 
                $result="ha ocurrido un error";
        }

        if(isset($_POST['tipos_recui']) && $_POST['tipos_recui']!="" ){
            $tipos_recui = $_POST['tipos_recui'];
            $sql = "UPDATE proceso_moldes set tipos_recui = :tipos_recui where id ='".$id."'";
        
            $stmt = $cone->prepare($sql);
            $stmt->bindParam(':tipos_recui', $tipos_recui);

            // Ejecuta la consulta
            if (!$stmt->execute()) 
                $result="ha ocurrido un error";
        }


        if(!empty($_FILES['img_recu']['name'])){
         
            $img_recu = $_FILES['img_recu']['name'];
            $tipo_mime = mime_content_type($_FILES['img_recu']['tmp_name']);
            
            if (in_array($tipo_mime, ['image/jpeg', 'image/png', 'image/gif', 'image/bmp'])) {

                if (move_uploaded_file($_FILES['img_recu']['tmp_name'], '../img/proceso_moldes/'.$img_recu)){
                        $sql = "UPDATE proceso_moldes set img_recu = :img_recu where id ='".$id."'";
                        $stmt = $cone->prepare($sql);
                        $stmt->bindParam(':img_recu', $img_recu);
            
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



        if(!empty($_FILES['img_tipos_recu']['name'])){
         
            $img_tipos_recu = $_FILES['img_tipos_recu']['name'];
            $tipo_mime = mime_content_type($_FILES['img_tipos_recu']['tmp_name']);
            
            if (in_array($tipo_mime, ['image/jpeg', 'image/png', 'image/gif', 'image/bmp'])) {

                if (move_uploaded_file($_FILES['img_tipos_recu']['tmp_name'], '../img/proceso_moldes/'.$img_tipos_recu)){
                        $sql = "UPDATE proceso_moldes set img_tipos_recu = :img_tipos_recu where id ='".$id."'";
                        $stmt = $cone->prepare($sql);
                        $stmt->bindParam(':img_tipos_recu', $img_tipos_recu);
            
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


        if(!empty($_FILES['video']['name'])){
         
            $video = $_FILES['video']['name'];
            $tipo_mime = mime_content_type($_FILES['video']['tmp_name']);
    
              // Lista de tipos MIME válidos para videos
                $tiposMIMEValidos = array(
                    "video/mp4",
                    "video/avi",
                    "video/x-matroska",
                    "video/quicktime",
                );

      
            if (in_array($tipo_mime,$tiposMIMEValidos)) {

                if (move_uploaded_file($_FILES['video']['tmp_name'], '../files/'.$video)){
                        $sql = "UPDATE proceso_moldes set video = :video where id ='".$id."'";
                        $stmt = $cone->prepare($sql);
                        $stmt->bindParam(':video', $video);
            
                        // Ejecuta la consulta
                        if (!$stmt->execute()) 
                            $result="ha ocurrido un error";
                        
                    }

                else {
                         $result = array(
                        'error' => 'Error al subir el video'
                    );
    
                    echo $json_encode($result);
                }
            }

            else 
                $result="el archivo debe de ser una video valido";
        }

        echo $result;
    }

    else 
    if($opcion=="7"){

        $id = $_POST['id'];
        $delete = $cone->prepare("delete from descripcion_procesosaut where id_pa = '".$id."'"); 
        $delete->execute();
        echo "EL REGISTRO HA SIDO ELIMINADO"; 
    }

    else
    if($opcion=="8"){
        $texto_r =  isset($_POST['texto_r']) ? $_POST['texto_r'] : '';
        $texto_ri =  isset($_POST['texto_ri']) ? $_POST['texto_ri'] : ' ';
        $nombre_r =  isset($_POST['nombre_r']) ? $_POST['nombre_r'] : '';
        $nombre_ri =  isset($_POST['nombre_ri']) ? $_POST['nombre_ri'] : ' ';
        $imagen_r = $_FILES['imagen_r']['name'];
       
        $tipo_mime = mime_content_type($_FILES['imagen_r']['tmp_name']);
       
    
        if (in_array($tipo_mime, ['image/jpeg', 'image/png', 'image/gif', 'image/bmp'])) {
    
            if (move_uploaded_file($_FILES['imagen_r']['tmp_name'], '../img/proceso_automotriz/procesos/'.$imagen_r)){
              
    
                        $sql = "INSERT INTO descripcion_procesosaut (nombre_pa, nombre_pai, descripcion_pa, descripcion_pai, imagen_pa) 
                        VALUES (:nombre_r, :nombre_ri, :texto_r, :texto_ri, :imagen_r)";
    
                        $stmt = $cone->prepare($sql);
                        
                        $stmt->bindParam(':nombre_r',$nombre_r);
                        $stmt->bindParam(':nombre_ri',$nombre_ri);
                        $stmt->bindParam(':texto_r', $texto_r);
                        $stmt->bindParam(':texto_ri', $texto_ri);
                        $stmt->bindParam(':imagen_r', $imagen_r);
              
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
    if($opcion=="9"){
        $id = $_POST['id_r'];
        $result="Los datos se han actualizado correctamente";

        if(isset($_POST['nombre']) && $_POST['nombre']!="" ){
            $nombre = $_POST['nombre'];
            $sql = "UPDATE descripcion_procesosaut set nombre_pa = :nombre where id_pa ='".$id."'";
        
            $stmt = $cone->prepare($sql);
            $stmt->bindParam(':nombre', $nombre);

            // Ejecuta la consulta
            if (!$stmt->execute()) 
                $result="ha ocurrido un error";
        }

        if(isset($_POST['nombrei']) && $_POST['nombrei']!="" ){
            $nombrei = $_POST['nombrei'];
            $sql = "UPDATE descripcion_procesosaut set nombre_pai = :nombrei where id_pa ='".$id."'";
        
            $stmt = $cone->prepare($sql);
            $stmt->bindParam(':nombrei', $nombrei);

            // Ejecuta la consulta
            if (!$stmt->execute()) 
                $result="ha ocurrido un error";
        }

        if(isset($_POST['texto']) && $_POST['texto']!="" ){
            $texto = $_POST['texto'];
            $sql = "UPDATE descripcion_procesosaut set descripcion_pa = :texto where id_pa ='".$id."'";
        
            $stmt = $cone->prepare($sql);
            $stmt->bindParam(':texto', $texto);

            // Ejecuta la consulta
            if (!$stmt->execute()) 
                $result="ha ocurrido un error";
        }

        if(isset($_POST['textoi']) && $_POST['textoi']!="" ){
            $textoi = $_POST['textoi'];
            $sql = "UPDATE descripcion_procesosaut set descripcion_pai = :textoi where id_pa ='".$id."'";
        
            $stmt = $cone->prepare($sql);
            $stmt->bindParam(':textoi', $textoi);

            // Ejecuta la consulta
            if (!$stmt->execute()) 
                $result="ha ocurrido un error";
        }

        if(!empty($_FILES['imagen']['name'])){
         
            $imagen = $_FILES['imagen']['name'];
            $tipo_mime = mime_content_type($_FILES['imagen']['tmp_name']);
            
            if (in_array($tipo_mime, ['image/jpeg', 'image/png', 'image/gif', 'image/bmp'])) {

                if (move_uploaded_file($_FILES['imagen']['tmp_name'], '../img/proceso_automotriz/procesos/'.$imagen)){
                        $sql = "UPDATE descripcion_procesosaut set imagen_pa = :imagen where id_pa ='".$id."'";
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


/*Panel productos fundidos */
    else 
    if($opcion=="10"){

        $id = $_POST['id'];
        $delete = $cone->prepare("delete from productos_fundidos where id = '".$id."'"); 
        $delete->execute();
        echo "EL REGISTRO HA SIDO ELIMINADO"; 
    }




else 
 if($opcion=="11"){
    $descripcion =  isset($_POST['descripcion']) ? $_POST['descripcion'] : ' ';
    $descripcioni =  isset($_POST['descripcioni']) ? $_POST['descripcioni'] : ' ';
    $archivo =  $_FILES['file_imagen'];
    $imagen = $_FILES['file_imagen']['name'];
   
    $tipo_mime = mime_content_type($_FILES['file_imagen']['tmp_name']);
   

    if (in_array($tipo_mime, ['image/jpeg', 'image/png', 'image/gif', 'image/bmp'])) {

        if (move_uploaded_file($_FILES['file_imagen']['tmp_name'], '../img/proceso_automotriz/productos_fundidos/'.$imagen)){
          

                    $sql = "INSERT INTO productos_fundidos (imagen, descripcion, descripcioni) 
                    VALUES (:imagen, :descripcion, :descripcioni)";

                    $stmt = $cone->prepare($sql);

                    // Enlaza los parámetros con los valores
                   
                    $stmt->bindParam(':imagen', $imagen);
                    $stmt->bindParam(':descripcion',$descripcion);
                    $stmt->bindParam(':descripcioni',$descripcioni);
          
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
    if($opcion=="12"){

        $id = $_POST['id'];
        $result="Los datos se han actualizado correctamente";

        if(isset($_POST['descripcion']) && $_POST['descripcion']!="" ){
            $descripcion = $_POST['descripcion'];
            $sql = "UPDATE productos_fundidos set descripcion = :descripcion where id ='".$id."'";

            $stmt = $cone->prepare($sql);
            $stmt->bindParam(':descripcion', $descripcion);
           
            if (!$stmt->execute()) 
                $result="ha ocurrido un error";
        }

        else {
            $sql = "UPDATE productos_fundidos set descripcion = null where id ='".$id."'";
            $stmt = $cone->prepare($sql);
            if (!$stmt->execute()) 
                $result="ha ocurrido un error";
        }

        if(isset($_POST['descripcioni']) && $_POST['descripcioni']!="" ){
            $descripcioni = $_POST['descripcioni'];
            $sql = "UPDATE productos_fundidos set descripcioni = :descripcioni where id ='".$id."'";

            $stmt = $cone->prepare($sql);
            $stmt->bindParam(':descripcioni', $descripcioni);
           
            if (!$stmt->execute()) 
                $result="ha ocurrido un error";
        }

        else {
            $sql = "UPDATE productos_fundidos set descripcioni = null where id ='".$id."'";
            $stmt = $cone->prepare($sql);
           
            if (!$stmt->execute()) 
                $result="ha ocurrido un error";
        }

        
        if(!empty($_FILES['file_imagen']['name'])){
         
            $imagen = $_FILES['file_imagen']['name'];
            $tipo_mime = mime_content_type($_FILES['file_imagen']['tmp_name']);
            
            if (in_array($tipo_mime, ['image/jpeg', 'image/png', 'image/gif', 'image/bmp'])) {

                if (move_uploaded_file($_FILES['file_imagen']['tmp_name'], '../img/proceso_automotriz/productos_fundidos/'.$imagen)){
                        $sql = "UPDATE productos_fundidos set imagen = :imagen where id ='".$id."'";
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
                $result="el archivo debe debe de ser una imagen valida";
          

        }

         echo "<script>alert('$result'); window.history.back(); </script>";
    }


/* Crud para seccion de ensamblaje de stabilink*/

    else 
    if($opcion=="13"){

        $id = $_POST['id'];
        $result="Los datos se han actualizado correctamente";

        if(isset($_POST['texto_soldadura']) && $_POST['texto_soldadura']!="" ){
            $texto_soldadura = $_POST['texto_soldadura'];
            $sql = "UPDATE proceso_de_ensamble set texto_soldadura = :texto_soldadura where id ='".$id."'";

            $stmt = $cone->prepare($sql);
            $stmt->bindParam(':texto_soldadura', $texto_soldadura);
           
            if (!$stmt->execute()) 
                $result="ha ocurrido un error";
        }

        if(isset($_POST['texto_soldadurai']) && $_POST['texto_soldadurai']!="" ){
            $texto_soldadurai = $_POST['texto_soldadurai'];
            $sql = "UPDATE proceso_de_ensamble set texto_soldadurai = :texto_soldadurai where id ='".$id."'";

            $stmt = $cone->prepare($sql);
            $stmt->bindParam(':texto_soldadurai', $texto_soldadurai);
           
            if (!$stmt->execute()) 
                $result="ha ocurrido un error";
        }

        if(isset($_POST['texto_co2']) && $_POST['texto_co2']!="" ){
            $texto_co2 = $_POST['texto_co2'];
            $sql = "UPDATE proceso_de_ensamble set texto_co2 = :texto_co2 where id ='".$id."'";

            $stmt = $cone->prepare($sql);
            $stmt->bindParam(':texto_co2', $texto_co2);
           
            if (!$stmt->execute()) 
                $result="ha ocurrido un error";
        }

        if(isset($_POST['texto_co2i']) && $_POST['texto_co2i']!="" ){
            $texto_co2i = $_POST['texto_co2i'];
            $sql = "UPDATE proceso_de_ensamble set texto_co2i = :texto_co2i where id ='".$id."'";

            $stmt = $cone->prepare($sql);
            $stmt->bindParam(':texto_co2i', $texto_co2i);
           
            if (!$stmt->execute()) 
                $result="ha ocurrido un error";
        }

        if(isset($_POST['texto_blast']) && $_POST['texto_blast']!="" ){
            $texto_blast = $_POST['texto_blast'];
            $sql = "UPDATE proceso_de_ensamble set texto_blast = :texto_blast where id ='".$id."'";

            $stmt = $cone->prepare($sql);
            $stmt->bindParam(':texto_blast', $texto_blast);
           
            if (!$stmt->execute()) 
                $result="ha ocurrido un error";
        }

        if(isset($_POST['texto_blasti']) && $_POST['texto_blasti']!="" ){
            $texto_blasti = $_POST['texto_blasti'];
            $sql = "UPDATE proceso_de_ensamble set texto_blasti = :texto_blasti where id ='".$id."'";

            $stmt = $cone->prepare($sql);
            $stmt->bindParam(':texto_blasti', $texto_blasti);
           
            if (!$stmt->execute()) 
                $result="ha ocurrido un error";
        }

        if(isset($_POST['texto_recubrimiento']) && $_POST['texto_recubrimiento']!="" ){
            $texto_recubrimiento = $_POST['texto_recubrimiento'];
            $sql = "UPDATE proceso_de_ensamble set texto_recubrimiento = :texto_recubrimiento where id ='".$id."'";

            $stmt = $cone->prepare($sql);
            $stmt->bindParam(':texto_recubrimiento', $texto_recubrimiento);
           
            if (!$stmt->execute()) 
                $result="ha ocurrido un error";
        }

        if(isset($_POST['texto_recubrimientoi']) && $_POST['texto_recubrimientoi']!="" ){
            $texto_recubrimientoi = $_POST['texto_recubrimientoi'];
            $sql = "UPDATE proceso_de_ensamble set texto_recubrimientoi = :texto_recubrimientoi where id ='".$id."'";

            $stmt = $cone->prepare($sql);
            $stmt->bindParam(':texto_recubrimientoi', $texto_recubrimientoi);
           
            if (!$stmt->execute()) 
                $result="ha ocurrido un error";
        }

        if(isset($_POST['texto_ensamble']) && $_POST['texto_ensamble']!="" ){
            $texto_ensamble = $_POST['texto_ensamble'];
            $sql = "UPDATE proceso_de_ensamble set texto_ensamble = :texto_ensamble where id ='".$id."'";

            $stmt = $cone->prepare($sql);
            $stmt->bindParam(':texto_ensamble', $texto_ensamble);
           
            if (!$stmt->execute()) 
                $result="ha ocurrido un error";
        }

        if(isset($_POST['texto_ensamblei']) && $_POST['texto_ensamblei']!="" ){
            $texto_ensamblei = $_POST['texto_ensamblei'];
            $sql = "UPDATE proceso_de_ensamble set texto_ensamblei = :texto_ensamblei where id ='".$id."'";

            $stmt = $cone->prepare($sql);
            $stmt->bindParam(':texto_ensamblei', $texto_ensamblei);
           
            if (!$stmt->execute()) 
                $result="ha ocurrido un error";
        }

        if(!empty($_FILES['video_soldadura']['name'])){
         
            $video_soldadura = $_FILES['video_soldadura']['name'];
            $tipo_mime = mime_content_type($_FILES['video_soldadura']['tmp_name']);
    
              // Lista de tipos MIME válidos para videos
                $tiposMIMEValidos = array(
                    "video/mp4",
                    "video/avi",
                    "video/x-matroska",
                    "video/quicktime",
                );

      
            if (in_array($tipo_mime,$tiposMIMEValidos)) {

                if (move_uploaded_file($_FILES['video_soldadura']['tmp_name'], '../videos/'.$video_soldadura)){
                        $sql = "UPDATE proceso_de_ensamble set video_soldadura = :video_soldadura where id ='".$id."'";
                        $stmt = $cone->prepare($sql);
                        $stmt->bindParam(':video_soldadura', $video_soldadura);
            
                        // Ejecuta la consulta
                        if (!$stmt->execute()) 
                            $result="ha ocurrido un error";
                        
                    }

                else {
                         $result = array(
                        'error' => 'Error al subir el video'
                    );
    
                    echo $json_encode($result);
                }
            }

            else 
                $result="el archivo debe de ser una video valido";
          
        }

        if(!empty($_FILES['video_co2']['name'])){
         
            $video_co2 = $_FILES['video_co2']['name'];
            $tipo_mime = mime_content_type($_FILES['video_co2']['tmp_name']);
    
              // Lista de tipos MIME válidos para videos
                $tiposMIMEValidos = array(
                    "video/mp4",
                    "video/avi",
                    "video/x-matroska",
                    "video/quicktime",
                );

      
            if (in_array($tipo_mime,$tiposMIMEValidos)) {

                if (move_uploaded_file($_FILES['video_co2']['tmp_name'], '../videos/'.$video_co2)){
                        $sql = "UPDATE proceso_de_ensamble set video_co2 = :video_co2 where id ='".$id."'";
                        $stmt = $cone->prepare($sql);
                        $stmt->bindParam(':video_co2', $video_co2);
            
                        // Ejecuta la consulta
                        if (!$stmt->execute()) 
                            $result="ha ocurrido un error";
                        
                    }

                else {
                         $result = array(
                        'error' => 'Error al subir el video'
                    );
    
                    echo $json_encode($result);
                }
            }

            else 
                $result="el archivo debe de ser una video valido";
          
        }

        if(!empty($_FILES['video1_blast']['name'])){
         
            $video1_blast = $_FILES['video1_blast']['name'];
            $tipo_mime = mime_content_type($_FILES['video1_blast']['tmp_name']);
    
              // Lista de tipos MIME válidos para videos
                $tiposMIMEValidos = array(
                    "video/mp4",
                    "video/avi",
                    "video/x-matroska",
                    "video/quicktime",
                );

      
            if (in_array($tipo_mime,$tiposMIMEValidos)) {

                if (move_uploaded_file($_FILES['video1_blast']['tmp_name'], '../videos/'.$video1_blast)){
                        $sql = "UPDATE proceso_de_ensamble set video1_blast = :video1_blast where id ='".$id."'";
                        $stmt = $cone->prepare($sql);
                        $stmt->bindParam(':video1_blast', $video1_blast);
            
                        // Ejecuta la consulta
                        if (!$stmt->execute()) 
                            $result="ha ocurrido un error";
                        
                    }

                else {
                         $result = array(
                        'error' => 'Error al subir el video'
                    );
    
                    echo $json_encode($result);
                }
            }

            else 
                $result="el archivo debe de ser una video valido";
          
        }

        if(!empty($_FILES['video2_blast']['name'])){
         
            $video2_blast = $_FILES['video2_blast']['name'];
            $tipo_mime = mime_content_type($_FILES['video2_blast']['tmp_name']);
    
              // Lista de tipos MIME válidos para videos
                $tiposMIMEValidos = array(
                    "video/mp4",
                    "video/avi",
                    "video/x-matroska",
                    "video/quicktime",
                );

      
            if (in_array($tipo_mime,$tiposMIMEValidos)) {

                if (move_uploaded_file($_FILES['video2_blast']['tmp_name'], '../videos/'.$video2_blast)){
                        $sql = "UPDATE proceso_de_ensamble set video2_blast = :video2_blast where id ='".$id."'";
                        $stmt = $cone->prepare($sql);
                        $stmt->bindParam(':video2_blast', $video2_blast);
            
                        // Ejecuta la consulta
                        if (!$stmt->execute()) 
                            $result="ha ocurrido un error";
                        
                    }

                else {
                         $result = array(
                        'error' => 'Error al subir el video'
                    );
    
                    echo $json_encode($result);
                }
            }

            else 
                $result="el archivo debe de ser una video valido";
          
        }

        
        if(!empty($_FILES['imagen_soldadura']['name'])){
         
            $imagen_soldadura = $_FILES['imagen_soldadura']['name'];
            $tipo_mime = mime_content_type($_FILES['imagen_soldadura']['tmp_name']);
            
            if (in_array($tipo_mime, ['image/jpeg', 'image/png', 'image/gif', 'image/bmp'])) {

                if (move_uploaded_file($_FILES['imagen_soldadura']['tmp_name'], '../img/proceso_automotriz/'.$imagen_soldadura)){
                        $sql = "UPDATE proceso_de_ensamble set imagen_soldadura = :imagen_soldadura where id ='".$id."'";
                        $stmt = $cone->prepare($sql);
                        $stmt->bindParam(':imagen_soldadura', $imagen_soldadura);
            
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
                $result="el archivo debe debe de ser una imagen valida";
        }


        if(!empty($_FILES['imagen_recubrimiento']['name'])){
         
            $imagen_recubrimiento = $_FILES['imagen_recubrimiento']['name'];
            $tipo_mime = mime_content_type($_FILES['imagen_recubrimiento']['tmp_name']);
            
            if (in_array($tipo_mime, ['image/jpeg', 'image/png', 'image/gif', 'image/bmp'])) {

                if (move_uploaded_file($_FILES['imagen_recubrimiento']['tmp_name'], '../img/proceso_automotriz/'.$imagen_recubrimiento)){
                        $sql = "UPDATE proceso_de_ensamble set 	imagen_recubrimiento = :imagen_recubrimiento where id ='".$id."'";
                        $stmt = $cone->prepare($sql);
                        $stmt->bindParam(':imagen_recubrimiento', $imagen_recubrimiento);
            
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
                $result="el archivo debe debe de ser una imagen valida";
        }


        if(!empty($_FILES['imagen_ensamble']['name'])){
         
            $imagen_ensamble= $_FILES['imagen_ensamble']['name'];
            $tipo_mime = mime_content_type($_FILES['imagen_ensamble']['tmp_name']);
            
            if (in_array($tipo_mime, ['image/jpeg', 'image/png', 'image/gif', 'image/bmp'])) {

                if (move_uploaded_file($_FILES['imagen_ensamble']['tmp_name'], '../img/proceso_automotriz/'.$imagen_ensamble)){
                        $sql = "UPDATE proceso_de_ensamble set imagen_ensamble = :imagen_ensamble where id ='".$id."'";
                        $stmt = $cone->prepare($sql);
                        $stmt->bindParam(':imagen_ensamble', $imagen_ensamble);
            
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
                $result="el archivo debe debe de ser una imagen valida";
        }

        echo $result;
    
    }




?>