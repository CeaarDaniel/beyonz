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
        session_start();
        error_reporting(0);
        if ($_SESSION['leng']==="es")  echo "EMPLEOS";
        else echo"JOBS";
        ?>
    </title>
    <link rel="icon" href="./img/imagenes/logo.png" type="image/x-icon"> 
</head>
<body>

<?php 
 include("header.php");
 $empleos = $con->prepare("select * from empleos"); 
 $empleos->execute();

 $empleos_cont = $con->prepare("select * from contenido_empleos"); 
 $empleos_cont->execute();
 $contenido = $empleos_cont->fetch(PDO::FETCH_ASSOC);
?>


<div class="container-fluid p-0 titulo-empleo">
    <div class="container-fluid py-3 text">
        <div class="d-flex text-center text-light justify-content-center align-content-center p-0" style="width:100%">
                <h3 class="mt-5 mb-0" style="max-width:50%">
                     EMPLEOS
                      <hr class="mt-0">
                </h3>
        </div>

                  <p class="text-center text-white">
                    <?php
                        if ($_SESSION['leng']==="es")  echo "CONOZCA CUALES SON ALGUNAS DE NUESTRAS VACANTES";
                        else echo"KNOW WHICH ARE SOME OF OUR JOBS";
                    ?>
                  </p>
        </div>
</div>

<div class="jumbotron border border-dark mt-5 p-0 porque-beyonz">
 <div class="d-flex align-content-center justify-content-center">
   <div class="border rounded" style="margin-top:-35px; background-color: #161616; color:white; width: 500px;">
      <p class="text-center p-3"><b>
        <?php
        if ($_SESSION['leng']==="es") echo "¿POR QUÉ BEYONZ MEXICANA?";
        else echo "WHY BEYONZ MEXICANA?";
      ?> </b></p>
   </div>
 </div>

 <div class="d-flex align-items-center justify-content-center p-5" style="width:100%; height:100%">
    <p class="text-center" style="width:50%">
      <?php
        if ($_SESSION['leng']==="es") echo $contenido['texto'];
        else echo $contenido['texto_i'];
      ?>
    <br> <br>
    <b>
    <?php
        if ($_SESSION['leng']==="es") echo "¡TOMA LA DELANTERA, PROGRESA JUNTO A NOSOTROS Y ASEGURA TU PORVENIR!";
        else echo "TAKE THE LEAD, PROGRESS WITH US AND SECURE YOUR FUTURE!";
      ?>
    
    </b>
    </p>
 </div>
</div>

<div class="jumbotron jumbotron-fluid contenedor-empleo mt-0 mb-5 mx-0">
    <div class="row p-0 m-0">
            <?php
            while($empleo = $empleos->fetch(PDO::FETCH_ASSOC)){
            echo '
            <div class="col-12 col-xl-6 mb-3 px-1">
                        <div class="card empleo px-0" style="overflow:hidden; opacity:1; position: relative;">
                            <a class="link-vacante" href="puesto?id='.(base64_encode($empleo['id'])).'">
                                <div class="card-body text-center ">
                                    <p class="text-right m-0">';
                                        if ($_SESSION['leng']==="es")  echo "<b>Publicado el:";
                                        else echo"Published on: ";

                                        echo $empleo['fecha'].'</b>

                                    </p>
                                    <p class="text-left m-0"> <i class="fas fa-briefcase"></i>  ';
                                    if ($_SESSION['leng']==="es")  echo $empleo['area']; 
                                        else echo $empleo['areai'];  
                                    
                                    echo ' </p>
                                    <p class="text-center"> <b>';
                                    if ($_SESSION['leng']==="es")  echo $empleo['nombre_vacante']; 
                                    else echo $empleo['nombre_vacantei']; 
                                    echo '</b> </p>
                                    <p class="text-justify mx-0 my-3">'; 
                                        if ($_SESSION['leng']==="es")  echo $empleo['descripcion']; 
                                        else echo $empleo['descripcioni']; 
                                    echo '</p>
                                </div>
                                <img class="img-empleo" src="img/vacantes/IMG_2893.png">
                            </a> 

                        </div>
                    </div>
            ';
            }
            ?>
       
    </div>
</div>


<div class="container px-3">

  <h3 class="text-center my-5">AVISO DE RECLUTAMIENTO </h3>

      <p class="text-justify">
        <?php
          if ($_SESSION['leng']==="es") echo $contenido['aviso_reclutamiento'];
          else echo $contenido['aviso_reclutamientoi'];
        ?>
      </p>


      <?php 
        if($contenido['imagen_reclutamiento']!=null) 
          {
              echo '
                <div class="d-flex justify-content-center aling-content-center" style="width:100%">
                  <img src="./img/vacantes/'.$contenido['imagen_reclutamiento'].'" style="max-width:600px; height:auto;"> 
                </div>';
          } 
      ?>
</div>


<section class="about_section layout_padding layout_margin">
       <div class="ml-3 px-5">
       <p class="text-justify">
       <?php
        if ($_SESSION['leng']==="es") echo $contenido['texto_be'];
        else echo $contenido['texto_bei'];
      ?>
       </p>
         </div>
    <div class="row m-0">
       <div class="col-6">
   <div class="row">
      <div class="col-12">
            <div class="d-flex aling-content-center justify-content-center mt-5" style="width:100%; height:100%">
            <?php
              if ($_SESSION['leng']==="es") echo $contenido['lista_be'];
              else echo $contenido['lista_bei'];
            ?>
            </div>
      </div>
   </div>
       </div>
      <div class="col-6 p-0" style="max-height:300px;">
        <div class="d-flex aling-content-center justify-content-center" style="width:100%; height:100%">
        <img src="./img/vacantes/fondo.png"  style="max-width:100%; max-height:100%;">
      </div>
    </div>

  </section>
<?php
include("footer.php");
?>
  </body>
</html>