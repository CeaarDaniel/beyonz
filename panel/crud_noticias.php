<?php
include 'conexion_panel.php';

$opcion = $_POST['opcion'];

    if($opcion=="1"){
        $id = $_POST['id'];

        $delete_all = $cone->prepare("delete from contenido_noticia where id_n = '".$id."'"); 
        $delete_all->execute();

        $delete_all = $cone->prepare("delete from imagenes_noticia where id_n = '".$id."'"); 
        $delete_all->execute();
   

        $delete = $cone->prepare("delete from noticias where id = '".$id."'"); 
        $delete->execute();
        echo "EL REGISTRO HA SIDO ELIMINADO"; 
    }


else 
if($opcion=="2"){

    $titulo = isset($_POST['titulo']) ? $_POST['titulo'] : '';
    $tituloi = isset($_POST['tituloi']) ? $_POST['tituloi'] : ' ';
    $autor =  isset($_POST['autor']) ? $_POST['autor'] : ' ';
    $resumen =  isset($_POST['resumen']) ? $_POST['resumen'] : ' ';
    $resumeni =  isset($_POST['resumeni']) ? $_POST['resumeni'] : ' ';
    $fecha =  isset($_POST['fecha']) ? $_POST['fecha'] : ' ';
    $archivo =  $_FILES['file_imagen'];  
    $imagen = $_FILES['file_imagen']['name'];
    $tipo_mime = mime_content_type($_FILES['file_imagen']['tmp_name']);
   

    if (in_array($tipo_mime, ['image/jpeg', 'image/png', 'image/gif', 'image/bmp'])) {

        if (move_uploaded_file($_FILES['file_imagen']['tmp_name'], '../img/noticias/'.$imagen)){

                    $sql = "INSERT INTO noticias (titulo,tituloi, imagen_principal, fecha, autor, resumen, resumeni) 
                    VALUES (:titulo,:tituloi, :imagen, :fecha, :autor, :resumen, :resumeni)";

                    $stmt = $cone->prepare($sql);

                    // Enlaza los parámetros con los valores
                    $stmt->bindParam(':titulo', $titulo);
                    $stmt->bindParam(':tituloi', $tituloi);
                    $stmt->bindParam(':imagen', $imagen);
                    $stmt->bindParam(':autor',$autor);
                    $stmt->bindParam(':resumen',$resumen);
                    $stmt->bindParam(':resumeni',$resumeni);
                    $stmt->bindParam(':fecha',$fecha);

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

        if(isset($_POST['titulo']) && $_POST['titulo']!="" ){
            $titulo = $_POST['titulo'];
            $sql = "UPDATE noticias set titulo = :titulo where id ='".$id."'";

            $stmt = $cone->prepare($sql);
            $stmt->bindParam(':titulo', $titulo);

            if (!$stmt->execute()) 
                $result="ha ocurrido un error";
        }

        if(isset($_POST['tituloi']) && $_POST['tituloi']!="" ){
            $tituloi = $_POST['tituloi'];
            $sql = "UPDATE noticias set tituloi = :tituloi where id ='".$id."'";

            $stmt = $cone->prepare($sql);
            $stmt->bindParam(':tituloi', $tituloi);

            if (!$stmt->execute()) 
                $result="ha ocurrido un error";
        }

        if(isset($_POST['autor']) && $_POST['autor']!="" ){
            $autor = $_POST['autor'];
            $sql = "UPDATE noticias set autor = :autor where id ='".$id."'";

            
            $stmt = $cone->prepare($sql);
            $stmt->bindParam(':autor', $autor);

            // Ejecuta la consulta
            if (!$stmt->execute()) 
                $result="ha ocurrido un error";
            

        }

        if(isset($_POST['fecha']) && $_POST['fecha']!="" ){
            $fecha = $_POST['fecha'];
            $sql = "UPDATE noticias set fecha = :fecha where id ='".$id."'";

            
            $stmt = $cone->prepare($sql);
            $stmt->bindParam(':fecha', $fecha);

            // Ejecuta la consulta
            if (!$stmt->execute()) 
                $result="ha ocurrido un error";
            

        }

        if(isset($_POST['resumen']) && $_POST['resumen']!="" ){
            $resumen = $_POST['resumen'];
            $sql = "UPDATE noticias set resumen = :resumen where id ='".$id."'";

            $stmt = $cone->prepare($sql);
            $stmt->bindParam(':resumen', $resumen);

            if (!$stmt->execute()) 
                $result="ha ocurrido un error";
        }


        if(isset($_POST['resumeni']) && $_POST['resumeni']!="" ){
            $resumeni = $_POST['resumeni'];
            $sql = "UPDATE noticias set resumeni = :resumeni where id ='".$id."'";

            $stmt = $cone->prepare($sql);
            $stmt->bindParam(':resumeni', $resumeni);

            if (!$stmt->execute()) 
                $result="ha ocurrido un error";
        }


        if(!empty($_FILES['file_imagen']['name'])){
         
            $imagen = $_FILES['file_imagen']['name'];
            $tipo_mime = mime_content_type($_FILES['file_imagen']['tmp_name']);
            
            if (in_array($tipo_mime, ['image/jpeg', 'image/png', 'image/gif', 'image/bmp'])) {

                if (move_uploaded_file($_FILES['file_imagen']['tmp_name'], '../img/noticias/'.$imagen)){
                        $sql = "UPDATE noticias set imagen_principal = :imagen where id ='".$id."'";
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
        $id = $_POST['id_c'];
        $delete = $cone->prepare("delete from contenido_noticia where id_c = '".$id."'"); 
        $delete->execute();
        echo "EL REGISTRO HA SIDO ELIMINADO"; 
    }


else 
if($opcion=="5"){
    $id_n = $_POST['id_n'];
    $parrafo =  isset($_POST['parrafo']) ? $_POST['parrafo'] : ' ';
    $parrafoi =  isset($_POST['parrafoi']) ? $_POST['parrafoi'] : ' ';
    $sql = "INSERT INTO contenido_noticia (parrafo, parrafoi, id_n) 
    VALUES (:parrafo, :parrafoi, :id_n)";

    $stmt = $cone->prepare($sql);

    // Enlaza los parámetros con los valores
    $stmt->bindParam(':parrafo', $parrafo);
    $stmt->bindParam(':parrafoi', $parrafoi);
    $stmt->bindParam(':id_n', $id_n);

    // Ejecuta la consulta
    if ($stmt->execute()) 
         $result = "Datos insertados correctamente";
     else 
        $result ="Error al insertar los datos: ".$stmt->errorInfo()[2];
             
        echo $result;
}

else  
if($opcion=="6"){
    $result="Los datos se han actualizado correctamente";
    $id_c = $_POST['id_c'];

    if(isset($_POST['parrafo']) && $_POST['parrafo']!="" ){
    $parrafo =  $_POST['parrafo'];

    $sql = "UPDATE contenido_noticia SET parrafo =:parrafo where id_c = :id_c";

    $stmt = $cone->prepare($sql);
    $stmt->bindParam(':parrafo', $parrafo);
    $stmt->bindParam(':id_c', $id_c);

    if ($stmt->execute()) 
         $result = "Datos actualizados";
     else 
        $result ="Error al actualizar los datos: ".$stmt->errorInfo()[2];
    }


    if(isset($_POST['parrafoi']) && $_POST['parrafoi']!="" ){
        $parrafoi =  $_POST['parrafoi'];
    
        $sql = "UPDATE contenido_noticia SET parrafoi =:parrafoi where id_c = :id_c";
    
        $stmt = $cone->prepare($sql);
        $stmt->bindParam(':parrafoi', $parrafoi);
        $stmt->bindParam(':id_c', $id_c);
    
        if ($stmt->execute()) 
             $result = "Datos actualizados";
         else 
            $result ="Error al actualizar los datos: ".$stmt->errorInfo()[2];
        }

    echo "<script>alert('$result'); window.history.back(); </script>";
}



   if($opcion=="7"){
        $id = $_POST['id_i'];
        $delete = $cone->prepare("delete from imagenes_noticia where id_i = '".$id."'"); 
        $delete->execute();
        echo "EL REGISTRO HA SIDO ELIMINADO"; 
    }


     
else 
if($opcion=="8"){
    $id_n = $_POST['id_n'];
    $descripcion =  isset($_POST['descripcion']) ? $_POST['descripcion'] : ' ';
    $descripcioni =  isset($_POST['descripcioni']) ? $_POST['descripcioni'] : ' ';


    if(!empty($_FILES['file_imagen']['name'])){
         
            $imagen = $_FILES['file_imagen']['name'];
            $tipo_mime = mime_content_type($_FILES['file_imagen']['tmp_name']);
            if (in_array($tipo_mime, ['image/jpeg', 'image/png', 'image/gif', 'image/bmp'])) {

                if (move_uploaded_file($_FILES['file_imagen']['tmp_name'], '../img/noticias/'.$imagen)){
                  $sql = "INSERT INTO imagenes_noticia (imagen, descripcion, descripcioni, id_n) VALUES (:imagen,:descripcion, :descripcioni, :id_n)";
                  $stmt = $cone->prepare($sql);
                  $stmt->bindParam(':imagen', $imagen);
                  $stmt->bindParam(':id_n', $id_n);
                  $stmt->bindParam(':descripcion', $descripcion);
                  $stmt->bindParam(':descripcioni', $descripcioni);

                  // Ejecuta la consulta
                  if ($stmt->execute()) 
                       $result = "Datos insertados correctamente";
                    
                   else 
                      $result ="Error al insertar los datos: ".$stmt->errorInfo()[2];
                       
                }
                else  $result = 'Error al subir la imagen.';
                  
    
                }

              else 
                $result="el archivo debe de ser una imagen valida";
      
            } 
             
        echo $result;
}

  else  
if($opcion=="9"){
    $result="Los datos se han actualizado correctamente";
    $id_i = $_POST['id_i'];


   if(!empty($_FILES['file_imagen']['name'])){
         
            $imagen = $_FILES['file_imagen']['name'];
            $tipo_mime = mime_content_type($_FILES['file_imagen']['tmp_name']);
            if (in_array($tipo_mime, ['image/jpeg', 'image/png', 'image/gif', 'image/bmp'])) {

                if (move_uploaded_file($_FILES['file_imagen']['tmp_name'], '../img/noticias/'.$imagen)){
                  $sql = "UPDATE imagenes_noticia SET imagen =:imagen where id_i = :id_i";
                 
                  $stmt = $cone->prepare($sql);
                  $stmt->bindParam(':imagen', $imagen);
                  $stmt->bindParam(':id_i', $id_i);
               
                  if ($stmt->execute()) 
                       $result = "Datos actualizados";
                    
                   else 
                      $result ="Error al insertar los datos: ".$stmt->errorInfo()[2];
                       
                }
                  
                else  $result = 'Error al subir la imagen.';
                  
    
                }

              else 
                $result="el archivo debe de ser una imagen valida";
      
            } 


  
  
    if(isset($_POST['descripcion']) && $_POST['descripcion']!="" ){
            $descripcion =  $_POST['descripcion'];

            $sql = "UPDATE imagenes_noticia SET descripcion = :descripcion where id_i = :id_i";

            $stmt = $cone->prepare($sql);
            $stmt->bindParam(':descripcion', $descripcion);
            $stmt->bindParam(':id_i', $id_i);

            if ($stmt->execute()) 
                $result = "Datos actualizados";
            else 
                $result ="Error al actualizar los datos: ".$stmt->errorInfo()[2];
    }


    if(isset($_POST['descripcioni']) && $_POST['descripcioni']!="" ){
            $descripcioni =  $_POST['descripcioni'];
        
            $sql = "UPDATE imagenes_noticia SET descripcioni = :descripcioni where id_i = :id_i";
        
            $stmt = $cone->prepare($sql);
            $stmt->bindParam(':descripcioni', $descripcioni);
            $stmt->bindParam(':id_i', $id_i);
        
            if ($stmt->execute()) 
                $result = "Datos actualizados";
            else 
                $result ="Error al actualizar los datos: ".$stmt->errorInfo()[2];
        }

    echo "<script>alert('$result'); window.history.back(); </script>";
}
  
?>