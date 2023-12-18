<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
require 'PHPMailer/src/Exception.php';
include 'conexion_panel.php';

$opcion = $_POST['opcion'];

    if($opcion=="1"){

        $result="Los datos se han actualizado correctamente";

        if(isset($_POST['telefono']) && $_POST['telefono']!="" ){
            $telefono = $_POST['telefono'];
            $sql = "update footer set telefono=:telefono WHERE 1";
            
            $stmt = $cone->prepare($sql);
            $stmt->bindParam(':telefono', $telefono);
       
            if (!$stmt->execute()) 
                $result="ha ocurrido un error";
        }

        if(isset($_POST['horario']) && $_POST['horario']!="" ){
            $horario = $_POST['horario'];
            $sql = "update footer set horario=:horario WHERE 1";
            
            $stmt = $cone->prepare($sql);
            $stmt->bindParam(':horario', $horario);
       
            if (!$stmt->execute()) 
                $result="ha ocurrido un error";
        }

       if(isset($_POST['fax']) && $_POST['fax']!="" ){
            $fax = $_POST['fax'];
            $sql = "update footer set fax=:fax WHERE 1";
            
            $stmt = $cone->prepare($sql);
            $stmt->bindParam(':fax', $fax);
       
            if (!$stmt->execute()) 
                $result="ha ocurrido un error";
        }

       if(isset($_POST['enlace_facebook']) && $_POST['enlace_facebook']!="" ){
            $enlace_facebook = $_POST['enlace_facebook'];
            $sql = "update footer set enlace_facebook=:enlace_facebook WHERE 1";
            
            $stmt = $cone->prepare($sql);
            $stmt->bindParam(':enlace_facebook', $enlace_facebook);
       
            if (!$stmt->execute()) 
                $result="ha ocurrido un error";
        }

        if(isset($_POST['enlace_linkendin']) && $_POST['enlace_linkendin']!="" ){
            $enlace_linkendin = $_POST['enlace_linkendin'];
            $sql = "update footer set enlace_linkendin=:enlace_linkendin WHERE 1";
            
            $stmt = $cone->prepare($sql);
            $stmt->bindParam(':enlace_linkendin', $enlace_linkendin);
       
            if (!$stmt->execute()) 
                $result="ha ocurrido un error";
        }

        if(isset($_POST['enlace_dun']) && $_POST['enlace_dun']!="" ){
            $enlace_dun = $_POST['enlace_dun'];
            $sql = "update footer set enlace_dun=:enlace_dun WHERE 1";
            
            $stmt = $cone->prepare($sql);
            $stmt->bindParam(':enlace_dun', $enlace_dun);
       
            if (!$stmt->execute()) 
                $result="ha ocurrido un error";
        }

        if(isset($_POST['email']) && $_POST['email']!="" ){
            $email = $_POST['email'];
            $sql = "update footer set email=:email WHERE 1";
            
            $stmt = $cone->prepare($sql);
            $stmt->bindParam(':email', $email);
       
            if (!$stmt->execute()) 
                $result="ha ocurrido un error";
        }

        echo $result;
    }

    else
        if($opcion=="2"){
            $result="SE HAN REGISTRADO SUS DATOS, EN BREVE UN MIEMBRO DEL EQUIPO DE BEYONZ SE PONDRA EN CONTACTO CON USTED";  
            $nombre= isset($_POST['nombre']) ? $_POST['nombre'] : '';
            $mensage =  isset($_POST['mensage']) ? $_POST['mensage'] : '';
            $email =  isset($_POST['email']) ? $_POST['email'] : '';
            $fecha =  isset($_POST['fecha']) ? $_POST['fecha'] : '';
            $numero =  isset($_POST['numero']) ? $_POST['numero'] : '';
            $file = isset($_FILES['archivo']['name']) ? $_FILES['archivo']['name'] : 'sin.pdf';

            if(!isset($_FILES['archivo']['name']) || $_FILES['archivo']['name']=="") {
                $sql = "INSERT INTO contactanos (nombre, correo, mensaje, telefono, archivo, fecha) 
                VALUES (:nombre, :correo, :mensage, :telefono,	:archivo, :fecha)";

                $stmt = $cone->prepare($sql);

                $stmt->bindParam(':nombre', $nombre);
                $stmt->bindParam(':correo', $email);
                $stmt->bindParam(':mensage',$mensage);
                $stmt->bindParam(':telefono',$numero);
                $stmt->bindParam(':archivo',$file);
                $stmt->bindParam(':fecha',$fecha);

                if ($stmt->execute()) 
                   $respuesta = "Datos insertados correctamente";
                
                else 
                   $respuesta= "Error al insertar los datos: " . $stmt->errorInfo()[2];        
            }

        else{
            $tipo_mime = mime_content_type($_FILES['archivo']['tmp_name']);
                
            if ($tipo_mime == "application/pdf") {

                if (file_exists("../documentos/".$file)) {
                    $base=pathinfo($file, PATHINFO_FILENAME);
                    $extension = pathinfo($file, PATHINFO_EXTENSION);

                    $i = 1;
                    while (file_exists("../documentos/".$file)) {
                        $file="";
                        $file = $base.'_'. $i.'.'.$extension;
                        $i++;
                    }
                }
                
                    if (move_uploaded_file($_FILES["archivo"]["tmp_name"], "../documentos/" .$file)){

                        $sql = "INSERT INTO contactanos (nombre, correo, mensaje,	telefono,	archivo, fecha) 
                        VALUES (:nombre, :correo, :mensage, :telefono,	:archivo, :fecha)";
    
                        $stmt = $cone->prepare($sql);
    
                        $stmt->bindParam(':nombre', $nombre);
                        $stmt->bindParam(':correo', $email);
                        $stmt->bindParam(':mensage',$mensage);
                        $stmt->bindParam(':telefono',$numero);
                        $stmt->bindParam(':archivo',$file);
                        $stmt->bindParam(':fecha',$fecha);
    
                        if ($stmt->execute()) 
                           $respuesta = "Datos insertados correctamente";
                        
                        else 
                           $respuesta= "Error al insertar los datos: " . $stmt->errorInfo()[2];
                    }

                    else 
                        $result = 'Error al subir el archivo';  
            } 

            else 
                $result= "Por favor, seleccione un archivo PDF válido.";
        }
    echo $result;
    }

    else
    if($opcion=="3"){
        $result="SE HAN REGISTRADO SUS DATOS, EN BREVE UN MIEMBRO DEL EQUIPO DE BEYONZ SE PONDRA EN CONTACTO CON USTED";  
        $nombre= isset($_POST['nombre']) ? $_POST['nombre'] : '';
        $mensage =  isset($_POST['mensage']) ? $_POST['mensage'] : '';
        $email =  isset($_POST['email']) ? $_POST['email'] : '';
        $fecha =  isset($_POST['fecha']) ? $_POST['fecha'] : '';
        $numero =  isset($_POST['numero']) ? $_POST['numero'] : '';
        $file = $_FILES['archivo']['name'];
        


        if(!isset($_FILES['archivo']['name']) || $_FILES['archivo']['name']=="") 
        {
            $sql = "INSERT INTO contactanos (nombre, correo, mensaje, telefono, archivo, fecha) 
            VALUES (:nombre, :correo, :mensage, :telefono,	:archivo, :fecha)";

            $stmt = $cone->prepare($sql);

            $stmt->bindParam(':nombre', $nombre);
            $stmt->bindParam(':correo', $email);
            $stmt->bindParam(':mensage',$mensage);
            $stmt->bindParam(':telefono',$numero);
            $stmt->bindParam(':archivo',$file);
            $stmt->bindParam(':fecha',$fecha);

            if ($stmt->execute()) 
               $respuesta = "Datos insertados correctamente";
            
            else 
               $respuesta= "Error al insertar los datos: " . $stmt->errorInfo()[2];        
        }

        else{
        $tipo_mime = mime_content_type($_FILES['archivo']['tmp_name']);

        if ($tipo_mime == "application/pdf") {

            if (file_exists("../documentos/".$file)) {
                    $base=pathinfo($file, PATHINFO_FILENAME);
                    $extension = pathinfo($file, PATHINFO_EXTENSION);

                    $i = 1;
                    while (file_exists("../documentos/".$file)) {
                        $file="";
                        $file = $base.'_'. $i.'.'.$extension;
                        $i++;
                    }
            }

                if (move_uploaded_file($_FILES["archivo"]["tmp_name"], "../documentos/".$file)){

                    $sql = "INSERT INTO contactanos (nombre, correo, mensaje,	telefono,	archivo, fecha) 
                    VALUES (:nombre, :correo, :mensage, :telefono,	:archivo, :fecha)";

                    $stmt = $cone->prepare($sql);

                    $stmt->bindParam(':nombre', $nombre);
                    $stmt->bindParam(':correo', $email);
                    $stmt->bindParam(':mensage',$mensage);
                    $stmt->bindParam(':telefono',$numero);
                    $stmt->bindParam(':archivo',$file);
                    $stmt->bindParam(':fecha',$fecha);

                    if ($stmt->execute()) 
                       $respuesta = "Datos insertados correctamente";
                    
                    else 
                       $respuesta= "Error al insertar los datos: " . $stmt->errorInfo()[2];
                }

                else 
                    $result = 'Error al subir el archivo';  
        } 

        else 
        $result= "Por favor, seleccione un archivo PDF válido.";
    }

    echo $result;
}

else 
    if($opcion=="4"){

        $id = $_POST['id'];
        $delete = $cone->prepare("delete from contactanos where id = '".$id."'"); 
        $delete->execute();
        echo "EL REGISTRO HA SIDO ELIMINADO"; 
    }

else 
    if($opcion=="5"){
    
    $id =  $_POST['id'];
    $asunto =  "contactanos";

    $correoRemitente = 'informacion@beyonz.com.mx';
    $contrasena = 'FuvqDWu9Z_p8';
    $correoDestinatario = $_POST['correo']; 

    $consulta = $cone->prepare("select * from contactanos where id= '".$id."'"); 
    $consulta->execute();
    $fila = $consulta->fetch(PDO::FETCH_ASSOC);

    $mail = new PHPMailer(true);
    try {
        //Configuración del servidor
        $mail->SMTPDebug = SMTP::DEBUG_OFF; 
        $mail->isSMTP();
        $mail->Host = '168.0.223.26';
        $mail->SMTPAuth = true;
        $mail->Username = $correoRemitente;
        $mail->Password = $contrasena;
        $mail->SMTPSecure = "TLS"; // TLS
        $mail->Port = 587; // Puerto SMTP de Gmail
        $mail->SMTPOptions = array( 
                                    'ssl' => array( 
                                        'verify_peer' => false, 
                                        'verify_peer_name' => false, 
                                        'allow_self_signed' => true )
                                    ); 

        // Configuración del correo
        $mail->setFrom($correoRemitente, 'BEYONZ');
        $mail->addAddress($correoDestinatario);
        $mail->isHTML(true);
        $mail->Subject = $asunto;

        $mail->isHTML(true);

        // Cuerpo del correo HTML
        $htmlContent = '
        <html>
        <head>
            <title></title>
        </head>
        <body>
                    <p>
                        <b>NOMBRE:</b>
                    '.$fila['nombre'].'
                    </p>
                
                    <p>
                        <b>CORREO:</b>
                        '.$fila['correo'].'
                    </p>

                    <p>
                        <b>TELEFONO:</b>
                        '.$fila['telefono'].'
                    </p>

                    <p>
                        <b>TEXTO</b>
                        <p class="text-justify">
                        '.$fila['mensaje'].'</p>
                    </p>
        </body>
        </html>
        ';
    
        $mail->Body = $htmlContent;
    
        if(isset($fila['archivo']) && $fila['archivo']!=""){
        
            $archivo = '../documentos/'.$fila['archivo']; 
        
        if (file_exists($archivo)) {
            $mail->addAttachment($archivo);
        } 
    }
        
        if ($mail->send()){
        $result = "Correo enviado";
        }

        
    } catch (Exception $e) {
       $result =  "Error al enviar el correo: {$mail->ErrorInfo}";
    }

    echo "<script>alert('$result');
            location.href ='./panel_contactanos.php'; 
          </script>";
    }
?>

