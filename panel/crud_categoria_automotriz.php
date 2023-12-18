<?php
include 'conexion_panel.php';


$opcion = $_POST['opcion'];


if($opcion=="1"){

    $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : '';
    $nombrei = isset($_POST['nombrei']) ? $_POST['nombrei'] : '';
    $descripcion =  isset($_POST['descripcion']) ? $_POST['descripcion'] : null;
    $descripcioni =  isset($_POST['descripcioni']) ? $_POST['descripcioni'] : null;;
    $categoria = isset($_POST['categoria']) ? $_POST['categoria'] : '';
    $imagen = $_FILES['file_imagen']['name'];
    $tipo_mime = mime_content_type($_FILES['file_imagen']['tmp_name']);
   

    if (in_array($tipo_mime, ['image/jpeg', 'image/png', 'image/gif', 'image/bmp'])) {

        if (move_uploaded_file($_FILES['file_imagen']['tmp_name'], '../img/productos/'.$imagen)){
        
                    $sql = "INSERT INTO producto_automotriz (nombre_pa, nombre_pai, imagen_pa, descripcion_pa, descripcion_pai, id_pca) 
                    VALUES (:nombre, :nombrei, :imagen, :descripcion, :descripcioni, :categoria)";

                    $stmt = $cone->prepare($sql);

                    // Enlaza los parámetros con los valores
                    $stmt->bindParam(':nombre', $nombre);
                    $stmt->bindParam(':nombrei', $nombrei);
                    $stmt->bindParam(':imagen', $imagen);
                    $stmt->bindParam(':descripcion',$descripcion);
                    $stmt->bindParam(':descripcioni',$descripcioni);
                    $stmt->bindParam(':categoria', $categoria);

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
    if($opcion=="2"){

        $id = $_POST['id_pa'];
        $delete = $cone->prepare("delete from producto_automotriz where id_pa = '".$id."'"); 
        $delete->execute();
        echo "EL REGISTRO HA SIDO ELIMINADO"; 
    }

  else  
    if($opcion=="3"){

        $id = $_POST['id_pa'];
        $result="Los datos se han actualizado correctamente";

        if(isset($_POST['nombre']) && $_POST['nombre']!="" ){
            $nombre = $_POST['nombre'];
            $sql = "UPDATE producto_automotriz  set nombre_pa = :nombre where id_pa ='".$id."'";
            
            $stmt = $cone->prepare($sql);
            $stmt->bindParam(':nombre', $nombre);
           
            if (!$stmt->execute()) 
                $result="ha ocurrido un error";
        }

        if(isset($_POST['nombrei']) && $_POST['nombrei']!="" ){
            $nombrei = $_POST['nombrei'];
            $sql = "UPDATE producto_automotriz set nombre_pai = :nombrei where id_pa ='".$id."'";
            
            $stmt = $cone->prepare($sql);
            $stmt->bindParam(':nombrei', $nombrei);
           
            if (!$stmt->execute()) 
                $result="ha ocurrido un error";
        }

        if(isset($_POST['descripcion']) && $_POST['descripcion']!="" ){
            $des = $_POST['descripcion'];
            $sql = "UPDATE producto_automotriz  set descripcion_pa = :descripcion where id_pa ='".$id."'";

            $stmt = $cone->prepare($sql);
            $stmt->bindParam(':descripcion', $des);

            if (!$stmt->execute()) 
                $result="ha ocurrido un error";
       }
       

       else {
        $sql = "UPDATE producto_automotriz set descripcion_pa = null where id_pa ='".$id."'";
        $stmt = $cone->prepare($sql);
        if (!$stmt->execute()) 
            $result="ha ocurrido un error";
       }

       if(isset($_POST['descripcioni']) && $_POST['descripcioni']!="" ){
        $desi = $_POST['descripcioni'];
        $sql = "UPDATE producto_automotriz set descripcion_pai = :descripcioni where id_pa ='".$id."'";

        $stmt = $cone->prepare($sql);
        $stmt->bindParam(':descripcioni', $desi);

        if (!$stmt->execute()) 
            $result="ha ocurrido un error";
   }


   else {
    $sql = "UPDATE producto_automotriz set descripcion_pai = null where id_pa ='".$id."'";
    $stmt = $cone->prepare($sql);
    if (!$stmt->execute()) 
        $result="ha ocurrido un error";
   }

        if(isset($_POST['categoria']) && $_POST['categoria']!="" ){
            $categoria = $_POST['categoria'];
            $sql = "UPDATE producto_automotriz  set id_pca = :categoria where id_pa ='".$id."'";

            
            $stmt = $cone->prepare($sql);
            $stmt->bindParam(':categoria', $categoria);

        
            if (!$stmt->execute()) 
                $result="ha ocurrido un error";
            

        }

        if(!empty($_FILES['file_imagen']['name'])){
         
            $imagen = $_FILES['file_imagen']['name'];
            $tipo_mime = mime_content_type($_FILES['file_imagen']['tmp_name']);
            
            if (in_array($tipo_mime, ['image/jpeg', 'image/png', 'image/gif', 'image/bmp'])) {

                if (move_uploaded_file($_FILES['file_imagen']['tmp_name'], '../img/productos/'.$imagen)){
                        $sql = "UPDATE producto_automotriz  set imagen_pa = :imagen where id_pa ='".$id."'";
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

        $id = $_POST['id_aut'];
        $result="Los datos se han actualizado correctamente";

        if(isset($_POST['nombre_categoria']) && $_POST['nombre_categoria']!="" ){
            $nombre = $_POST['nombre_categoria'];
            $sql = "UPDATE categoria_automotriz set nombre_categoria = :nombre where id_aut ='".$id."'";
            
            $stmt = $cone->prepare($sql);
            $stmt->bindParam(':nombre', $nombre);

            if (!$stmt->execute()) 
                $result="ha ocurrido un error";
        }

        if(isset($_POST['nombre_categoriai']) && $_POST['nombre_categoriai']!="" ){
            $nombrei = $_POST['nombre_categoriai'];
            $sql = "UPDATE categoria_automotriz set nombre_categoriai = :nombrei where id_aut ='".$id."'";
            
            $stmt = $cone->prepare($sql);
            $stmt->bindParam(':nombrei', $nombrei);

            if (!$stmt->execute()) 
                $result="ha ocurrido un error";
        }

        if(isset($_POST['descripcion_aut']) && $_POST['descripcion_aut']!="" ){
            $des = $_POST['descripcion_aut'];
            $sql = "UPDATE categoria_automotriz set descripcion_aut = :descripcion where id_aut ='".$id."'";

            $stmt = $cone->prepare($sql);
            $stmt->bindParam(':descripcion', $des);

            if (!$stmt->execute()) 
                $result="ha ocurrido un error";
        }

        if(isset($_POST['descripcion_auti']) && $_POST['descripcion_auti']!="" ){
            $desi = $_POST['descripcion_auti'];
            $sql = "UPDATE categoria_automotriz set descripcion_auti = :descripcioni where id_aut ='".$id."'";

            $stmt = $cone->prepare($sql);
            $stmt->bindParam(':descripcioni', $desi);

            if (!$stmt->execute()) 
                $result="ha ocurrido un error";
        }

        if(!empty($_FILES['file_imagen']['name'])){
         
            $imagen = $_FILES['file_imagen']['name'];
            $tipo_mime = mime_content_type($_FILES['file_imagen']['tmp_name']);
            
            if (in_array($tipo_mime, ['image/jpeg', 'image/png', 'image/gif', 'image/bmp'])) {

                if (move_uploaded_file($_FILES['file_imagen']['tmp_name'], '../img/productos/'.$imagen)){
                        $sql = "UPDATE categoria_automotriz set imagen_aut = :imagen where id_aut ='".$id."'";
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