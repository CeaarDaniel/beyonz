<?php
include 'conexion_panel.php';

$opcion = $_POST['opcion'];

if($opcion=="1"){

$nombre = isset($_POST['user']) ? $_POST['user'] : '';
$password = isset($_POST['password']) ? $_POST['password'] : ''; 

$sql = "SELECT * FROM usuarios where BINARY nombre= :nombre and BINARY password = :pass";
$stmt = $cone->prepare($sql);

$stmt->bindParam(':nombre', $nombre, PDO::PARAM_STR);
$stmt->bindParam(':pass', $password, PDO::PARAM_STR);
$stmt->execute();

$consulta= $stmt->fetch(PDO::FETCH_ASSOC);


if ($stmt->rowCount() > 0) {
    session_start();
    $_SESSION['user']=$nombre;
    $_SESSION['id']=$consulta['id'];
    $_SESSION['permisos']=$consulta['permisos'];
    $_SESSION['loggedin'] = true;
    echo json_encode(array("login"=>true, "ses"=>$_SESSION["user"]));
}

 else 

    echo json_encode(array("login"=>false));
     
}

else
if($opcion=="2"){
    session_start();
    session_destroy();
    header('Location: index.php');
    }

else
if($opcion=="3"){
    $id = $_POST['id'];
    $delete = $cone->prepare("delete from usuarios where id = '".$id."'"); 
    $delete->execute();
    echo "EL REGISTRO HA SIDO ELIMINADO"; 
}

else 
if($opcion=="4"){
   
    $nombre =  isset($_POST['nombre']) ? $_POST['nombre'] : '';
    $password =  isset($_POST['password']) ? $_POST['password'] : '';
    $rol =  isset($_POST['rol']) ? $_POST['rol'] : '';
    $puesto="";


    
    $sq = "SELECT * FROM usuarios where BINARY nombre= :nombre";
    $st = $cone->prepare($sq);

    $st->bindParam(':nombre', $nombre, PDO::PARAM_STR);
    $st->execute();

    if ($st->rowCount() <= 0) {

                if($rol=="1"){
                    $puesto="administrador";         
                }

                else 
                if($rol=="2"){
                    $puesto="automotriz";
                }

                else 
                if($rol=="3"){
                    $puesto="moldes";
                }

                else
                if($rol=="4"){
                    $puesto="recursos humanos";
                }


                $sql = "INSERT INTO usuarios (nombre, password, permisos,rol) 
                VALUES (:nombre, :password, :permisos, :rol)";

                $stmt = $cone->prepare($sql);

                // Enlaza los parámetros con los valores
                $stmt->bindParam(':nombre', $nombre);
                $stmt->bindParam(':password', $password);
                $stmt->bindParam(':permisos', $rol);
                $stmt->bindParam(':rol', $puesto);

                // Ejecuta la consulta
                if ($stmt->execute()) 
                    $result = "Datos insertados correctamente";
                else 
                    $result ="Error al insertar los datos: ".$stmt->errorInfo()[2];
            }
     else
        $result="Este nombre de usuario ya existe debe de ingresar un nombre diferente";
    
echo $result;
}


else  
if($opcion=="5"){
    $result="Los datos se han actualizado correctamente";
    $id = $_POST['id'];

    $rol =  isset($_POST['rol']) ? $_POST['rol'] : '';

    
    if(isset($_POST['nombre']) && $_POST['nombre']!="" ){
    $nombre =  $_POST['nombre'];

    $sq = "SELECT * FROM usuarios where BINARY nombre= :nombre";
    $st = $cone->prepare($sq);

    $st->bindParam(':nombre', $nombre, PDO::PARAM_STR);
    $st->execute();

    if ($st->rowCount() <= 0) {

    $sql = "UPDATE usuarios SET nombre= :nombre where id = :id";

    $stmt = $cone->prepare($sql);
    $stmt->bindParam(':nombre', $nombre);
    $stmt->bindParam(':id', $id);

    if ($stmt->execute()) 
         $result = "Datos actualizados";
     else 
        $result ="Error al actualizar los datos: ".$stmt->errorInfo()[2];
    }

    else {
        echo "Este nombre de usuario ya existe, ingresar un nombre diferente";
        exit();
    }
}

    if(isset($_POST['contraseña']) && $_POST['contraseña']!="" ){
        $password =  $_POST['contraseña'];
    
        $sql = "UPDATE usuarios SET password = :password where id = :id";
    
        $stmt = $cone->prepare($sql);
        $stmt->bindParam(':password', $password);
        $stmt->bindParam(':id', $id);
    
        if ($stmt->execute()) 
             $result = "Datos actualizados";
         else 
            $result ="Error al actualizar los datos: ".$stmt->errorInfo()[2];
        }

    if(isset($_POST['rol']) && $_POST['rol']!="" ){
            $rol =  $_POST['rol'];
            $puesto="";

            if($rol=="1"){
                $puesto="administrador";         
            }
        
            else 
            if($rol=="2"){
                $puesto="automotriz";
            }
        
            else 
            if($rol=="3"){
                $puesto="moldes";
            }
        
            else
            if($rol=="4"){
                $puesto="recursos humanos";
            }
        
            $sql = "UPDATE usuarios SET permisos = :rol, rol = :puesto where id = :id";
        
            $stmt = $cone->prepare($sql);
            $stmt->bindParam(':rol', $rol);
            $stmt->bindParam(':puesto', $puesto);
            $stmt->bindParam(':id', $id);
        
            if ($stmt->execute()) 
                 $result = "Datos actualizados";

             else 
                $result ="Error al actualizar los datos: ".$stmt->errorInfo()[2];
            }
        echo $result;
}
?>