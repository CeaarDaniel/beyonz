<?php
include 'conexion_panel.php';


$opcion = $_POST['opcion'];

if($opcion=="1"){

    $id = $_POST['id'];
    $delete = $cone->prepare("delete from banner_principal where id = '".$id."'"); 
    $delete->execute();
    echo "EL REGISTRO HA SIDO ELIMINADO"; 
}

else 
if($opcion=="2"){

    $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : '';
    $nombrei = isset($_POST['nombrei']) ? $_POST['nombrei'] : ' ';
    $descripcion =  isset($_POST['descripcion']) ? $_POST['descripcion'] : null;
    $descripcioni =  isset($_POST['descripcioni']) ? $_POST['descripcioni'] : null;
    $imagen = $_FILES['file_imagen']['name'];
    $tipo_mime = mime_content_type($_FILES['file_imagen']['tmp_name']);
   

    if (in_array($tipo_mime, ['image/jpeg', 'image/png', 'image/gif', 'image/bmp'])) {

        if (move_uploaded_file($_FILES['file_imagen']['tmp_name'], '../img/banner/'.$imagen)){
        
                    $sql = "INSERT INTO banner_principal (titulo, tituloi, imagen, descripcion, descripcioni) 
                    VALUES (:nombre, :nombrei, :imagen, :descripcion, :descripcioni)";

                    $stmt = $cone->prepare($sql);

                    // Enlaza los parámetros con los valores
                    $stmt->bindParam(':nombre', $nombre);
                    $stmt->bindParam(':nombrei', $nombrei);
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
        $result="Los datos se han actualizado correctamente";

        if(isset($_POST['nombre']) && $_POST['nombre']!="" ){
            $nombre = $_POST['nombre'];
            $sql = "UPDATE banner_principal  set titulo = :nombre where id ='".$id."'";

            $stmt = $cone->prepare($sql);
            $stmt->bindParam(':nombre', $nombre);

            if (!$stmt->execute()) 
                $result="ha ocurrido un error";
        }

        else {
            $sql = "UPDATE banner_principal  set titulo = null where id ='".$id."'";
            $stmt = $cone->prepare($sql);
            if (!$stmt->execute()) 
                $result="ha ocurrido un error";
        }

        if(isset($_POST['nombrei']) && $_POST['nombrei']!="" ){
            $nombrei = $_POST['nombrei'];
            $sql = "UPDATE banner_principal  set tituloi = :nombrei where id ='".$id."'";

            $stmt = $cone->prepare($sql);
            $stmt->bindParam(':nombrei', $nombrei);

            if (!$stmt->execute()) 
                $result="ha ocurrido un error";
        }

        else {
            $sql = "UPDATE banner_principal  set tituloi = null where id ='".$id."'";
            $stmt = $cone->prepare($sql);
            if (!$stmt->execute()) 
                $result="ha ocurrido un error";
        }

        if(isset($_POST['descripcion']) && $_POST['descripcion']!="" ){
            $des = $_POST['descripcion'];
            $sql = "UPDATE banner_principal  set descripcion = :descripcion where id ='".$id."'";

            $stmt = $cone->prepare($sql);
            $stmt->bindParam(':descripcion', $des);

            if (!$stmt->execute()) 
                $result="ha ocurrido un error";
        }

        else {
            $sql = "UPDATE banner_principal  set descripcion = null where id ='".$id."'";
            $stmt = $cone->prepare($sql);
            if (!$stmt->execute()) 
                $result="ha ocurrido un error";
        }

        if(isset($_POST['descripcioni']) && $_POST['descripcioni']!="" ){
            $desi = $_POST['descripcioni'];
            $sql = "UPDATE banner_principal  set descripcioni = :descripcioni where id ='".$id."'";

            $stmt = $cone->prepare($sql);
            $stmt->bindParam(':descripcioni', $desi);

            if (!$stmt->execute()) 
                $result="ha ocurrido un error";
        }

        else {
            $sql = "UPDATE banner_principal  set descripcioni = null where id ='".$id."'";
            $stmt = $cone->prepare($sql);
            if (!$stmt->execute()) 
                $result="ha ocurrido un error";
        }

        if(!empty($_FILES['file_imagen']['name'])){
         
            $imagen = $_FILES['file_imagen']['name'];
            $tipo_mime = mime_content_type($_FILES['file_imagen']['tmp_name']);
            
            if (in_array($tipo_mime, ['image/jpeg', 'image/png', 'image/gif', 'image/bmp'])) {

                if (move_uploaded_file($_FILES['file_imagen']['tmp_name'], '../img/banner/'.$imagen)){
                        $sql = "UPDATE banner_principal  set imagen = :imagen where id ='".$id."'";
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