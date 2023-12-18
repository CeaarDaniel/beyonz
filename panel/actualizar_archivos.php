<?php
include 'conexion_panel.php';

$opcion = $_POST['opcion'];

if($opcion="1")
{

$result="Los datos se han actualizado correctamente";

        if(!empty($_FILES['politica']['name']) && $_FILES['politica']['name']!=""){
            $politica = $_FILES['politica']['name'];
            $tipo_mime = mime_content_type($_FILES['politica']['tmp_name']);

            if ($tipo_mime == "application/pdf") {
                    if (move_uploaded_file($_FILES["politica"]["tmp_name"], "../files/" .$politica)){
                            $sql = "UPDATE nuestra_calidad set archivo_politica = :politica where id = '1' ";
                            $stmt = $cone->prepare($sql);
                            $stmt->bindParam(':politica', $politica);
            
                            if (!$stmt->execute()) 
                                $result="ha ocurrido un error";
                    }

                    else 
                        $result = 'Error al subir el archivo';  
            } 

            else 
                $result= "Por favor, seleccione un archivo PDF válido.";
            
        }


        if(!empty($_FILES['aviso']['name'])){
            $aviso = $_FILES['aviso']['name'];
            $tipo_mime = mime_content_type($_FILES['aviso']['tmp_name']);

            if ($tipo_mime == "application/pdf") {
                    if (move_uploaded_file($_FILES["aviso"]["tmp_name"], "../files/" .$aviso)){
                            $sql = "UPDATE footer set archivo_privasidad = :aviso where '1'";
                            $stmt = $cone->prepare($sql);
                            $stmt->bindParam(':aviso', $aviso);
            
                            if (!$stmt->execute()) 
                                $result="ha ocurrido un error";
                    }

                    else 
                        $result = 'Error al subir el archivo';  
            } 

            else 
                $result= "Por favor, seleccione un archivo PDF válido.";
            
        }

    echo $result;
}
?>
