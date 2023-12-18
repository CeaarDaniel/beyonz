<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="estilos.css">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <title>
    <?php 
         error_reporting(0);
         session_start();
         if ($_SESSION['leng']==="es") echo "EQUIPOS";
         else echo "OUR MACHINES";
        ?>
    </title>
    <link rel="icon" href="./img/imagenes/logo.png" type="image/x-icon">   

</head>
<body id="body">

  <?php
     include("header.php");
     $consulta_equipos = $con->prepare("select * from equipos"); 
     $consulta_equipos->execute();
   ?>

<div class="container-fluid p-0 proce" >
    <div class="container-fluid p-0 text">
        <div class="d-flex text-center text-light justify-content-center p-5">
                <h3 class="mt-2" style="max-width:50%">
                  <?php
                    if ($_SESSION['leng']==="es") echo "NUESTROS EQUIPOS";
                    else echo "OUR MACHINES";
                  ?>
                </h3>
        </div>
    </div>
</div>
  
<div  class="container-fluid m-3">
          <div class="row">
                <?php
                      while ($fila = $consulta_equipos->fetch(PDO::FETCH_ASSOC)) {               
                          echo' 
                            <div class="col-12 col-md-6 col-lg-4  p-5 my-2">
                                <div class="d-flex flex-wrap justify-content-center align-content-center border rounded" style="height:100%" id="equipo">
                                    <img src="./img/equipos/'.$fila['imagen'].'" style="width:100%; height:100%;" data-toggle="tooltip" title="'; 
                                    if ($_SESSION['leng']==="es") echo $fila['descripcion'];
                                    else echo $fila['descripcioni']; 
                                    echo '"  data-placement="left">
                                </div>
                            </div>'
                          ;
                      }
                ?> 
          </div>
</div>

  
<?php
include("boton-contactanos.php");
include("footer.php")
?>
  
  <script>
    $(document).ready(function(){
  $('[data-toggle="tooltip"]').tooltip();
});
  </script>
  </body>
</html>
