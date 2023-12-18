<?php 

session_start();


if (!isset($_SESSION['user'])) {
   header('Location: index.php');
   exit(); 
}

else 
{
if($_SESSION['permisos']=='1'){
   include 'panel_admin.php';
}


else if($_SESSION['permisos']=='2'){
   include 'panel_automotriz.php';
}

else if($_SESSION['permisos']=='3'){
   include 'panel_moldes.php';
}

else if($_SESSION['permisos']=='4'){
   include 'panel_rh.php';
}
}
?>
