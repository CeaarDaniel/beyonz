<?php
include 'conexion_panel.php';


$opcion = $_POST['opcion'];

if($opcion=="1"){

    $id = $_POST['id'];
    $delete = $cone->prepare("delete from banner_instalaciones where id = '".$id."'"); 
    $delete->execute();
    echo "EL REGISTRO HA SIDO ELIMINADO"; 
}

else
    if($opcion=="2"){

    $imagen = $_FILES['file_imagen']['name'];
    $tipo_mime = mime_content_type($_FILES['file_imagen']['tmp_name']);
   

    if (in_array($tipo_mime, ['image/jpeg', 'image/png', 'image/gif', 'image/bmp'])) {

        if (move_uploaded_file($_FILES['file_imagen']['tmp_name'], '../img/instalaciones/'.$imagen)){
        
                    $sql = "INSERT INTO banner_instalaciones (imagen) VALUES (:imagen)";

                    $stmt = $cone->prepare($sql);
                    $stmt->bindParam(':imagen', $imagen);
   

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
        $result="";


        if(!empty($_FILES['file_imagen']['name'])){
            
            $imagen = $_FILES['file_imagen']['name'];
            $tipo_mime = mime_content_type($_FILES['file_imagen']['tmp_name']);
            
            if (in_array($tipo_mime, ['image/jpeg', 'image/png', 'image/gif', 'image/bmp'])) {

                if (move_uploaded_file($_FILES['file_imagen']['tmp_name'], '../img/instalaciones/'.$imagen)){
                        $sql = "UPDATE banner_instalaciones  set imagen = :imagen where id ='".$id."'";
                        $stmt = $cone->prepare($sql);
                        $stmt->bindParam(':imagen', $imagen);
            
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


else  
    if($opcion=="4") {
        
        
        $msg = "First line of text\nSecond line of text";
        $msg = wordwrap($msg,70);
        
        $enviado =  mail("cedave_vega@hotmail.com","My subject",$msg);
 
        if ($enviado) {
        echo "Correo enviado con éxito.";
    } else {
        echo "Error al enviar el correo.";
    }
} else {
    echo "Acceso no autorizado.";
}

?>