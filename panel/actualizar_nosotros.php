<?php
include 'conexion_panel.php';


$opcion = $_POST['opcion'];

 
    if($opcion=="1"){

        $id = $_POST['id'];
        $result="Los datos se han actualizado correctamente";
 
        if(isset($_POST['nosotros']) && $_POST['nosotros']!="" ){
            $nosotros = $_POST['nosotros'];
            $sql = "UPDATE nosotros set texto_nosotros = :nosotros where id ='".$id."'";

            
            $stmt = $cone->prepare($sql);
            $stmt->bindParam(':nosotros', $nosotros);

           
            if (!$stmt->execute()) 
                $result="ha ocurrido un error";
        }


        if(isset($_POST['nosotrosi']) && $_POST['nosotrosi']!="" ){
            $nosotrosi = $_POST['nosotrosi'];
            $sql = "UPDATE nosotros set texto_nosotrosi = :nosotrosi where id ='".$id."'";

            
            $stmt = $cone->prepare($sql);
            $stmt->bindParam(':nosotrosi', $nosotrosi);

           
            if (!$stmt->execute()) 
                $result="ha ocurrido un error";
        }


    if(isset($_POST['filosofia']) && $_POST['filosofia']!="" ){
            $filosofia = $_POST['filosofia'];
            $sql = "UPDATE nosotros set filosofia = :filosofia where id ='".$id."'";

            
            $stmt = $cone->prepare($sql);
            $stmt->bindParam(':filosofia', $filosofia);

        
            if (!$stmt->execute()) 
                $result="ha ocurrido un error";
       }


       if(isset($_POST['filosofiai']) && $_POST['filosofiai']!="" ){
        $filosofiai = $_POST['filosofiai'];
        $sql = "UPDATE nosotros set filosofiai = :filosofiai where id ='".$id."'";

        
        $stmt = $cone->prepare($sql);
        $stmt->bindParam(':filosofiai', $filosofiai);

    
        if (!$stmt->execute()) 
            $result="ha ocurrido un error";
    }


    if(isset($_POST['mision']) && $_POST['mision']!="" ){
            $mision = $_POST['mision'];
            $sql = "UPDATE nosotros set mision = :mision where id ='".$id."'";

            
            $stmt = $cone->prepare($sql);
            $stmt->bindParam(':mision', $mision);

        
            if (!$stmt->execute()) 
                $result="ha ocurrido un error";
        }


        if(isset($_POST['misioni']) && $_POST['misioni']!="" ){
            $misioni = $_POST['misioni'];
            $sql = "UPDATE nosotros set misioni = :misioni where id ='".$id."'";

            
            $stmt = $cone->prepare($sql);
            $stmt->bindParam(':misioni', $misioni);

        
            if (!$stmt->execute()) 
                $result="ha ocurrido un error";
        }



    if(isset($_POST['vision']) && $_POST['vision']!="" ){
            $vision = $_POST['vision'];
            $sql = "UPDATE nosotros set vision = :vision where id ='".$id."'";
   
            $stmt = $cone->prepare($sql);
            $stmt->bindParam(':vision', $vision);

        
            if (!$stmt->execute()) 
                $result="ha ocurrido un error";
        }

        if(isset($_POST['visioni']) && $_POST['visioni']!="" ){
            $visioni = $_POST['visioni'];
            $sql = "UPDATE nosotros set visioni = :visioni where id ='".$id."'";
   
            $stmt = $cone->prepare($sql);
            $stmt->bindParam(':visioni', $visioni);

        
            if (!$stmt->execute()) 
                $result="ha ocurrido un error";
        }

        if(!empty($_FILES['file_video']['name'])){
         
            $video = $_FILES['file_video']['name'];
            $tipo_mime = mime_content_type($_FILES['file_video']['tmp_name']);
    
              // Lista de tipos MIME válidos para videos
                $tiposMIMEValidos = array(
                    "video/mp4",
                    "video/avi",
                    "video/x-matroska",
                    "video/quicktime",
                );

      
            if (in_array($tipo_mime,$tiposMIMEValidos)) {

                if (move_uploaded_file($_FILES['file_video']['tmp_name'], '../files/'.$video)){
                        $sql = "UPDATE nosotros set video = :video where id ='".$id."'";
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

    if(!empty($_FILES['file_imagen']['name'])){
         
            $imagen = $_FILES['file_imagen']['name'];
            $tipo_mime = mime_content_type($_FILES['file_imagen']['tmp_name']);
            
            if (in_array($tipo_mime, ['image/jpeg', 'image/png', 'image/gif', 'image/bmp'])) {

                if (move_uploaded_file($_FILES['file_imagen']['tmp_name'], '../img/nosotros/'.$imagen)){
                        $sql = "UPDATE nosotros set img_filosofia = :imagen where id ='".$id."'";
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