<?php
include 'conexion_panel.php';


$opcion = $_POST['opcion'];


if($opcion=="1"){

    $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : '';
    $nombrei = isset($_POST['nombrei']) ? $_POST['nombrei'] : '';
    $descripcion =  isset($_POST['descripcion']) ? $_POST['descripcion'] : null;
    $descripcioni =  isset($_POST['descripcioni']) ? $_POST['descripcioni'] : null;    
    $categoria = isset($_POST['categoria']) ? $_POST['categoria'] : '';
    $imagen = $_FILES['file_imagen']['name'];
    $tipo_mime = mime_content_type($_FILES['file_imagen']['tmp_name']);
   

    if (in_array($tipo_mime, ['image/jpeg', 'image/png', 'image/gif', 'image/bmp'])) {

        if (move_uploaded_file($_FILES['file_imagen']['tmp_name'], '../img/productos_moldes/'.$imagen)){
        
                    $sql = "INSERT INTO producto_moldes (nombre_pm, nombre_pmi, imagen_pm, descripcion_pm, descripcion_pmi, id_pcm) 
                    VALUES (:nombre,:nombrei, :imagen, :descripcion,:descripcioni, :categoria)";

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

        $id = $_POST['id_pm'];
        $delete = $cone->prepare("delete from producto_moldes where id_pm = '".$id."'"); 
        $delete->execute();
        echo "EL REGISTRO HA SIDO ELIMINADO"; 
    }

  else  
    if($opcion=="3"){

        $id = $_POST['id_pm'];
        $result="Los datos se han actualizado correctamente";

        if(isset($_POST['nombre']) && $_POST['nombre']!="" ){
            $nombre = $_POST['nombre'];
            $sql = "UPDATE producto_moldes  set nombre_pm = :nombre where id_pm ='".$id."'";
    
            $stmt = $cone->prepare($sql);
            $stmt->bindParam(':nombre', $nombre);

            if (!$stmt->execute()) 
                $result="ha ocurrido un error"; 
        }

        if(isset($_POST['nombrei']) && $_POST['nombrei']!="" ){
            $nombrei = $_POST['nombrei'];
            $sql = "UPDATE producto_moldes  set nombre_pmi = :nombrei where id_pm ='".$id."'";
    
            $stmt = $cone->prepare($sql);
            $stmt->bindParam(':nombrei', $nombrei);

            if (!$stmt->execute()) 
                $result="ha ocurrido un error"; 
        }

        if(isset($_POST['descripcion']) && $_POST['descripcion']!="" ){
            $des = $_POST['descripcion'];
            $sql = "UPDATE producto_moldes  set descripcion_pm = :descripcion where id_pm ='".$id."'";
            
            $stmt = $cone->prepare($sql);
            $stmt->bindParam(':descripcion', $des);

            if (!$stmt->execute()) 
                $result="ha ocurrido un error";
        }

        else{
            $sql = "UPDATE producto_moldes  set descripcion_pm = null where id_pm ='".$id."'";
            $stmt = $cone->prepare($sql);
            if (!$stmt->execute()) 
                $result="ha ocurrido un error";
        }

        if(isset($_POST['descripcioni']) && $_POST['descripcioni']!="" ){
            $desi = $_POST['descripcioni'];
            $sql = "UPDATE producto_moldes  set descripcion_pmi = :descripcioni where id_pm ='".$id."'";
            
            $stmt = $cone->prepare($sql);
            $stmt->bindParam(':descripcioni', $desi);

            if (!$stmt->execute()) 
                $result="ha ocurrido un error";
        }

        else{
            $sql = "UPDATE producto_moldes  set descripcion_pmi = null where id_pm ='".$id."'";
            $stmt = $cone->prepare($sql);
            if (!$stmt->execute()) 
                $result="ha ocurrido un error";
        }

        if(isset($_POST['categoria']) && $_POST['categoria']!="" ){
            $categoria = $_POST['categoria'];
            $sql = "UPDATE producto_moldes  set id_pcm = :categoria where id_pm ='".$id."'";

            $stmt = $cone->prepare($sql);
            $stmt->bindParam(':categoria', $categoria);

            if (!$stmt->execute()) 
                $result="ha ocurrido un error";
        }

        if(!empty($_FILES['file_imagen']['name'])){
         
            $imagen = $_FILES['file_imagen']['name'];
            $tipo_mime = mime_content_type($_FILES['file_imagen']['tmp_name']);
            
            if (in_array($tipo_mime, ['image/jpeg', 'image/png', 'image/gif', 'image/bmp'])) {

                if (move_uploaded_file($_FILES['file_imagen']['tmp_name'], '../img/productos_moldes/'.$imagen)){
                        $sql = "UPDATE producto_moldes  set imagen_pm = :imagen where id_pm ='".$id."'";
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

        $id = $_POST['id_catm'];
        $result="Los datos se han actualizado correctamente";

        if(isset($_POST['nombre_categoria']) && $_POST['nombre_categoria']!="" ){
            $nombre = $_POST['nombre_categoria'];
            $sql = "UPDATE categoria_moldes set nombre_catm = :nombre where id_catm ='".$id."'";

            $stmt = $cone->prepare($sql);
            $stmt->bindParam(':nombre', $nombre);

            if (!$stmt->execute()) 
                $result="ha ocurrido un error";
        }


        if(isset($_POST['nombre_categoriai']) && $_POST['nombre_categoriai']!="" ){
            $nombrei = $_POST['nombre_categoriai'];
            $sql = "UPDATE categoria_moldes set nombre_catmi = :nombrei where id_catm ='".$id."'";

            $stmt = $cone->prepare($sql);
            $stmt->bindParam(':nombrei', $nombrei);

            if (!$stmt->execute()) 
                $result="ha ocurrido un error";
        }

        if(isset($_POST['descripcion_catm']) && $_POST['descripcion_catm']!="" ){
            $des = $_POST['descripcion_catm'];
            $sql = "UPDATE categoria_moldes set descripcion_catm = :descripcion where id_catm ='".$id."'";
            
            $stmt = $cone->prepare($sql);
            $stmt->bindParam(':descripcion', $des);

           if (!$stmt->execute()) 
                $result="ha ocurrido un error";
        }

        if(isset($_POST['descripcion_catmi']) && $_POST['descripcion_catmi']!="" ){
            $desi = $_POST['descripcion_catmi'];
            $sql = "UPDATE categoria_moldes set descripcion_catmi = :descripcioni where id_catm ='".$id."'";
            
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
                        $sql = "UPDATE categoria_moldes set imagen_catm = :imagen where id_catm ='".$id."'";
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