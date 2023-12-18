<?php
include 'conexion_panel.php';


$opcion = $_POST['opcion'];


if($opcion=="1"){

    $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : '';
    $telefono = isset($_POST['telefono']) ? $_POST['telefono'] : '';
    $fax = isset($_POST['fax']) ? $_POST['fax'] : null;
    $mapa = isset($_POST['ubicacion']) ? $_POST['ubicacion'] : '';
    $pagina = isset($_POST['pagina']) ? $_POST['pagina'] : null;
    $pais = isset($_POST['pais']) ? $_POST['pais'] : '';
    $direccion =  isset($_POST['descripcion']) ? $_POST['descripcion'] : '';
    $direccioni =  isset($_POST['descripcioni']) ? $_POST['descripcioni'] : ' ';
    $archivo =  $_FILES['file_imagen'];
    $dir_subida = "../img/instalaciones";  
    $imagen = $_FILES['file_imagen']['name'];
    $tipo_mime = mime_content_type($_FILES['file_imagen']['tmp_name']);
   

    if (in_array($tipo_mime, ['image/jpeg', 'image/png', 'image/gif', 'image/bmp'])) {

        if (move_uploaded_file($_FILES['file_imagen']['tmp_name'], '../img/instalaciones/'.$imagen)){
            if($pais=="1"){ $pais="MÉXICO"; $paisi="MEXICO";}
                 else if($pais=="2") {$pais="JÁPON"; $paisi="JAPAN";}
                    else if($pais=="3"){ $pais="CHINA"; $paisi="CHINA";}
                      else if($pais=="4"){ $pais="TAILANDIA"; $paisi="THAILAND";}

                    $sql = "INSERT INTO plantas (nombre, imagen, direccion, direccioni, telefono, fax, pagina, mapa, pais, paisi) 
                    VALUES (:nombre, :imagen, :direccion, :direccioni, :telefono, :fax, :pagina, :mapa, :pais, :paisi)";

                    $stmt = $cone->prepare($sql);

                    // Enlaza los parámetros con los valores
                    $stmt->bindParam(':nombre', $nombre);
                    $stmt->bindParam(':imagen', $imagen);
                    $stmt->bindParam(':direccion',$direccion);
                    $stmt->bindParam(':telefono', $telefono);
                    $stmt->bindParam(':fax', $fax);
                    $stmt->bindParam(':pagina', $pagina);
                    $stmt->bindParam(':mapa', $mapa);
                    $stmt->bindParam(':pais', $pais);
                    $stmt->bindParam(':paisi', $paisi);
                    $stmt->bindParam(':direccioni', $direccioni);

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
        $id = $_POST['id_p'];
        $delete = $cone->prepare("delete from plantas where id = '".$id."'"); 
        $delete->execute();
        echo "EL REGISTRO HA SIDO ELIMINADO"; 
    }


else 
    if($opcion=="3"){

        $id = $_POST['id_p'];
        $result="Los datos se han actualizado correctamente";

        if(isset($_POST['nombre']) && $_POST['nombre']!="" ){
            $nombre = $_POST['nombre'];
            $sql = "UPDATE plantas set nombre = :nombre where id ='".$id."'";

            
            $stmt = $cone->prepare($sql);
            $stmt->bindParam(':nombre', $nombre);

            // Ejecuta la consulta
            if (!$stmt->execute()) 
                $result="ha ocurrido un error";
            

        }

        if(isset($_POST['ubicacion']) && $_POST['ubicacion']!="" ){
            $mapa = $_POST['ubicacion'];
            $sql = "UPDATE plantas set mapa = :mapa where id ='".$id."'";

            
            $stmt = $cone->prepare($sql);
            $stmt->bindParam(':mapa', $mapa);

            // Ejecuta la consulta
            if (!$stmt->execute()) 
                $result="ha ocurrido un error";
            

        }

        if(isset($_POST['telefono']) && $_POST['telefono']!="" ){
            $telefono = $_POST['telefono'];
            $sql = "UPDATE plantas set telefono = :telefono where id ='".$id."'";

            
            $stmt = $cone->prepare($sql);
            $stmt->bindParam(':telefono', $telefono);

            // Ejecuta la consulta
            if (!$stmt->execute()) 
                   $result="ha ocurrido un error";
            

        }

        if(isset($_POST['fax']) && $_POST['fax']!="" ){
            $nombre = $_POST['fax'];
            $sql = "UPDATE plantas set fax = :fax where id ='".$id."'";

            
            $stmt = $cone->prepare($sql);
            $stmt->bindParam(':fax', $fax);

            // Ejecuta la consulta
            if (!$stmt->execute()) 
                $result="ha ocurrido un error";
        }

        else {
            $sql = "UPDATE plantas set fax = null where id ='".$id."'";
            $stmt = $cone->prepare($sql);
            if (!$stmt->execute()) 
                $result="ha ocurrido un error";
        }

        if(isset($_POST['pagina']) && $_POST['pagina']!="" ){
            $pagina = $_POST['pagina'];
            $sql = "UPDATE plantas set pagina = :pagina where id ='".$id."'";
            
            $stmt = $cone->prepare($sql);
            $stmt->bindParam(':pagina', $pagina);

            // Ejecuta la consulta
            if (!$stmt->execute()) 
                $result="ha ocurrido un error";
        }

        else{
            $sql = "UPDATE plantas set pagina = null where id ='".$id."'";    
            $stmt = $cone->prepare($sql);
            if (!$stmt->execute()) 
                $result="ha ocurrido un error";
        }

        if(isset($_POST['pais']) && $_POST['pais']!="" ){

            $pais = $_POST['pais'];

                    if($pais=="1"){ $pais="MÉXICO";  $paisi="MEXICO";}
                        else if($pais=="2") {$pais="JÁPON"; $paisi="JAPAN";}
                            else if($pais=="3") {$pais="CHINA"; $paisi="CHINA";}
                                 else if($pais=="4") {$pais="TAILANDIA"; $paisi="THAILAND";}

            $sql = "UPDATE plantas set pais = :pais where id ='".$id."'";
            $sql2 = "UPDATE plantas set paisi = :paisi where id ='".$id."'";

            
            $stmt = $cone->prepare($sql);
            $stmt->bindParam(':pais', $pais);

            $stmt2 = $cone->prepare($sql2);
            $stmt2->bindParam(':paisi', $paisi);

            // Ejecuta la consulta
            if (!$stmt->execute() || !$stmt2->execute()) 
                $result="ha ocurrido un error";

        }

        if(isset($_POST['descripcion']) && $_POST['descripcion']!="" ){
            $direccion = $_POST['descripcion'];
            $sql = "UPDATE plantas set direccion = :direccion where id ='".$id."'";

            
            $stmt = $cone->prepare($sql);
            $stmt->bindParam(':direccion', $direccion);

            if (!$stmt->execute()) 
                $result="ha ocurrido un error";
        }

        
        if(isset($_POST['descripcioni']) && $_POST['descripcioni']!="" ){
            $direccioni = $_POST['descripcioni'];
            $sql = "UPDATE plantas set direccioni = :direccioni where id ='".$id."'";

            $stmt = $cone->prepare($sql);
            $stmt->bindParam(':direccioni', $direccioni);

            if (!$stmt->execute()) 
                $result="ha ocurrido un error";
        }

        if(!empty($_FILES['file_imagen']['name'])){
         
            $imagen = $_FILES['file_imagen']['name'];
            $tipo_mime = mime_content_type($_FILES['file_imagen']['tmp_name']);
            
            if (in_array($tipo_mime, ['image/jpeg', 'image/png', 'image/gif', 'image/bmp'])) {

                if (move_uploaded_file($_FILES['file_imagen']['tmp_name'], '../img/instalaciones/'.$imagen)){
                        $sql = "UPDATE plantas set imagen = :imagen where id ='".$id."'";
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