<?php
   $host = "127.0.0.1";
   $db = "beyonz";      //base de datos de mysql
   $user = "root";       // usuario de mysql
   $password = "";       //contraseña de mysql

try{
        $cone = new PDO("mysql:host=$host;dbname=$db;", $user, $password);
        $cone->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    } catch(PDOException $e){
         echo "Error de conexión: " . $e->getMessage();
        
        }
?>