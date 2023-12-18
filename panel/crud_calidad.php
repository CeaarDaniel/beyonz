<?php
include 'conexion_panel.php';


$opcion = $_POST['opcion'];

    if($opcion=="1"){
        $id = $_POST['id'];
        $delete = $cone->prepare("delete from clientes where id = '".$id."'"); 
        $delete->execute();
        echo "EL REGISTRO HA SIDO ELIMINADO"; 
    }


else 
if($opcion=="2"){

    $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : '';
    $link =  isset($_POST['link']) ? $_POST['link'] : ' ';
    $archivo =  $_FILES['file_imagen'];  
    $imagen = $_FILES['file_imagen']['name'];
    $tipo_mime = mime_content_type($_FILES['file_imagen']['tmp_name']);
   

    if (in_array($tipo_mime, ['image/jpeg', 'image/png', 'image/gif', 'image/bmp'])) {

        if (move_uploaded_file($_FILES['file_imagen']['tmp_name'], '../img/clientes/'.$imagen)){

                    $sql = "INSERT INTO clientes (logo, link_pagina, nombre) 
                    VALUES (:imagen, :link_pagina, :nombre)";

                    $stmt = $cone->prepare($sql);

                    // Enlaza los parámetros con los valores
                    $stmt->bindParam(':nombre', $nombre);
                    $stmt->bindParam(':imagen', $imagen);
                    $stmt->bindParam(':link_pagina',$link);

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

        if(isset($_POST['nombre']) && $_POST['nombre']!="" ){
            $nombre = $_POST['nombre'];
            $sql = "UPDATE nuestra_calidad set nombre = :nombre where id ='".$id."'";
            $stmt = $cone->prepare($sql);
            $stmt->bindParam(':nombre', $nombre);

            if (!$stmt->execute()) 
                $result="ha ocurrido un error";
            

        }

        if(!empty($_FILES['file_imagen']['name'])){
         
            $imagen = $_FILES['file_imagen']['name'];
            $tipo_mime = mime_content_type($_FILES['file_imagen']['tmp_name']);
            
            if (in_array($tipo_mime, ['image/jpeg', 'image/png', 'image/gif', 'image/bmp'])) {

                if (move_uploaded_file($_FILES['file_imagen']['tmp_name'], '../img/clientes/'.$imagen)){
                        $sql = "UPDATE clientes set logo = :imagen where id ='".$id."'";
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


    else 
    if($opcion=="4"){

        $id = $_POST['id'];
        $result="Los datos se han actualizado correctamente";

        if(isset($_POST['texto_calidad']) && $_POST['texto_calidad']!="" ){
            $texto_calidad = $_POST['texto_calidad'];
            $sql = "UPDATE nuestra_calidad set texto_calidad = :texto_calidad where id = '".$id."'";
            
            $stmt = $cone->prepare($sql);
            $stmt->bindParam(':texto_calidad', $texto_calidad);

            if (!$stmt->execute()) 
                $result="ha ocurrido un error";
        }

        if(isset($_POST['texto_calidadi']) && $_POST['texto_calidadi']!="" ){
            $texto_calidadi = $_POST['texto_calidadi'];
            $sql = "UPDATE nuestra_calidad set texto_calidadi = :texto_calidadi where id = '".$id."'";
            
            $stmt = $cone->prepare($sql);
            $stmt->bindParam(':texto_calidadi', $texto_calidadi);

            if (!$stmt->execute()) 
                $result="ha ocurrido un error";
        }


        if(!empty($_FILES['imagen_calidad']['name'])){
         
            $imagen_calidad = $_FILES['imagen_calidad']['name'];
            $tipo_mime = mime_content_type($_FILES['imagen_calidad']['tmp_name']);
            
            if (in_array($tipo_mime, ['image/jpeg', 'image/png', 'image/gif', 'image/bmp'])) {

                if (move_uploaded_file($_FILES['imagen_calidad']['tmp_name'], '../img/calidad/'.$imagen_calidad)){
                        $sql = "UPDATE nuestra_calidad set img_calidad = :imagen_calidad where id ='".$id."'";
                        $stmt = $cone->prepare($sql);
                        $stmt->bindParam(':imagen_calidad', $imagen_calidad);
            
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



        if(isset($_POST['texto_politica']) && $_POST['texto_politica']!="" ){
            $texto_politica = $_POST['texto_politica'];
            $sql = "UPDATE nuestra_calidad set texto_politica = :texto_politica where id ='".$id."'";
            $stmt = $cone->prepare($sql);
            $stmt->bindParam(':texto_politica', $texto_politica);

            if (!$stmt->execute()) 
                $result="ha ocurrido un error";
        }

        if(isset($_POST['texto_politicai']) && $_POST['texto_politicai']!="" ){
            $texto_politicai = $_POST['texto_politicai'];
            $sql = "UPDATE nuestra_calidad set texto_politicai = :texto_politicai where id ='".$id."'";
            $stmt = $cone->prepare($sql);
            $stmt->bindParam(':texto_politicai', $texto_politicai);

            if (!$stmt->execute()) 
                $result="ha ocurrido un error";
        }

        if(!empty($_FILES['imagen_politica']['name'])){
         
            $imagen_politica = $_FILES['imagen_politica']['name'];
            $tipo_mime = mime_content_type($_FILES['imagen_politica']['tmp_name']);
            
            if (in_array($tipo_mime, ['image/jpeg', 'image/png', 'image/gif', 'image/bmp'])) {

                if (move_uploaded_file($_FILES['imagen_politica']['tmp_name'], '../img/calidad/'.$imagen_politica)){
                        $sql = "UPDATE nuestra_calidad set img_politica = :imagen_politica where id ='".$id."'";
                        $stmt = $cone->prepare($sql);
                        $stmt->bindParam(':imagen_politica', $imagen_politica);
            
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


    if(isset($_POST['texto_certificacion']) && $_POST['texto_certificacion']!="" ){
            $texto_certificacion = $_POST['texto_certificacion'];
            $sql = "UPDATE nuestra_calidad set certificacion_iso = :texto_certificacion where id ='".$id."'";
            $stmt = $cone->prepare($sql);
            $stmt->bindParam(':texto_certificacion', $texto_certificacion);

            if (!$stmt->execute()) 
                $result="ha ocurrido un error";
        }

        if(isset($_POST['texto_certificacioni']) && $_POST['texto_certificacioni']!="" ){
            $texto_certificacioni = $_POST['texto_certificacioni'];
            $sql = "UPDATE nuestra_calidad set certificacion_isoi = :texto_certificacioni where id ='".$id."'";
            $stmt = $cone->prepare($sql);
            $stmt->bindParam(':texto_certificacioni', $texto_certificacioni);

            if (!$stmt->execute()) 
                $result="ha ocurrido un error";
        }



        if(isset($_POST['texto_9001']) && $_POST['texto_9001']!="" ){
            $texto_9001 = $_POST['texto_9001'];
            $sql = "UPDATE nuestra_calidad set texto_9001 = :texto_9001 where id = '".$id."'";
            
            $stmt = $cone->prepare($sql);
            $stmt->bindParam(':texto_9001', $texto_9001);


            if (!$stmt->execute()) 
                $result="ha ocurrido un error";
        }

        if(isset($_POST['texto_9001i']) && $_POST['texto_9001i']!="" ){
            $texto_9001i = $_POST['texto_9001i'];
            $sql = "UPDATE nuestra_calidad set texto_9001i = :texto_9001i where id = '".$id."'";
            
            $stmt = $cone->prepare($sql);
            $stmt->bindParam(':texto_9001i', $texto_9001i);


            if (!$stmt->execute()) 
                $result="ha ocurrido un error";
        }



        echo $result;
    }


    else 
    if($opcion=="5"){

        $id = $_POST['id'];
        $result="Los datos se han actualizado correctamente";

        if(isset($_POST['texto_objetivo']) && $_POST['texto_objetivo']!="" ){
            $texto_objetivo = $_POST['texto_objetivo'];
            $sql = "UPDATE objetivos_ambientales set texto_objetivo = :texto_objetivo where id ='".$id."'";

            $stmt = $cone->prepare($sql);
            $stmt->bindParam(':texto_objetivo', $texto_objetivo);
           
            if (!$stmt->execute()) 
                $result="ha ocurrido un error";
        }

        if(isset($_POST['texto_objetivoi']) && $_POST['texto_objetivoi']!="" ){
            $texto_objetivoi = $_POST['texto_objetivoi'];
            $sql = "UPDATE objetivos_ambientales set texto_objetivoi = :texto_objetivoi where id ='".$id."'";

            $stmt = $cone->prepare($sql);
            $stmt->bindParam(':texto_objetivoi', $texto_objetivoi);
           
            if (!$stmt->execute()) 
                $result="ha ocurrido un error";
        }

        
        if(!empty($_FILES['img_objetivo']['name'])){
         
            $img_objetivo = $_FILES['img_objetivo']['name'];
            $tipo_mime = mime_content_type($_FILES['img_objetivo']['tmp_name']);
            
            if (in_array($tipo_mime, ['image/jpeg', 'image/png', 'image/gif', 'image/bmp'])) {

                if (move_uploaded_file($_FILES['img_objetivo']['tmp_name'], '../img/equipos/'.$img_objetivo)){
                        $sql = "UPDATE objetivos_ambientales set img_objetivo = :img_objetivo where id ='".$id."'";
                        $stmt = $cone->prepare($sql);
                        $stmt->bindParam(':img_objetivo', $img_objetivo);
            
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



    else
    if($opcion=="6"){

    $img_reconocimiento = $_FILES['img_reconocimiento']['name'];
    $tipo_mime = mime_content_type($_FILES['img_reconocimiento']['tmp_name']);
   

    if (in_array($tipo_mime, ['image/jpeg', 'image/png', 'image/gif', 'image/bmp'])) {

        if (move_uploaded_file($_FILES['img_reconocimiento']['tmp_name'], '../img/banner_calidad/'.$img_reconocimiento)){
        
                    $sql = "INSERT INTO banner_reconocimiento (img_reconocimiento) VALUES (:img_reconocimiento)";

                    $stmt = $cone->prepare($sql);
                    $stmt->bindParam(':img_reconocimiento', $img_reconocimiento);
   

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


if($opcion=="7"){

    $id = $_POST['id'];
    $delete = $cone->prepare("delete from banner_reconocimiento where id = '".$id."'"); 
    $delete->execute();
    echo "EL REGISTRO HA SIDO ELIMINADO"; 
}




else  
if($opcion=="8"){

    $id = $_POST['id'];
    $result="";


    if(!empty($_FILES['img_reconocimiento']['name'])){
        
        $img_reconocimiento= $_FILES['img_reconocimiento']['name'];
        $tipo_mime = mime_content_type($_FILES['img_reconocimiento']['tmp_name']);
        
        if (in_array($tipo_mime, ['image/jpeg', 'image/png', 'image/gif', 'image/bmp'])) {

            if (move_uploaded_file($_FILES['img_reconocimiento']['tmp_name'], '../img/banner_calidad/'.$img_reconocimiento)){
                    $sql = "UPDATE banner_reconocimiento  set img_reconocimiento= :img_reconocimiento where id ='".$id."'";
                    $stmt = $cone->prepare($sql);
                    $stmt->bindParam(':img_reconocimiento', $img_reconocimiento);
        
                    // Ejecuta la consulta
                    if (!$stmt->execute()) 
                        $result="ha ocurrido un error";
                    else $result="Los datos se han actualizado correctamente";
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

    echo "<script>alert('$result'); window.history.back(); </script>";
}


?>