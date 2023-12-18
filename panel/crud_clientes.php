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
    $link =  isset($_POST['link']) ? $_POST['link'] : null;
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
            $sql = "UPDATE clientes set nombre = :nombre where id ='".$id."'";

            
            $stmt = $cone->prepare($sql);
            $stmt->bindParam(':nombre', $nombre);

            // Ejecuta la consulta
            if (!$stmt->execute()) 
                $result="ha ocurrido un error";
            

        }

        if(isset($_POST['link']) && $_POST['link']!="" ){
            $link = $_POST['link'];
            $sql = "UPDATE clientes set link_pagina = :link where id ='".$id."'";

            $stmt = $cone->prepare($sql);
            $stmt->bindParam(':link', $link);

            // Ejecuta la consulta
            if (!$stmt->execute()) 
                $result="ha ocurrido un error";
        }

        else {
            $sql = "UPDATE clientes set link_pagina = null where id ='".$id."'";
            $stmt = $cone->prepare($sql);

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


?>