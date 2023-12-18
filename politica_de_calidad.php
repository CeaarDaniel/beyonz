<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link rel="stylesheet" href="estilos.css">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <title>
    <?php 
         error_reporting(0);
         session_start();
         if ($_SESSION['leng']==="es") echo "NUESTRA CALIDAD";
         else echo "OUR QUALITY";
        ?>
        </title>
    <link rel="icon" href="./img/imagenes/logo.png" type="image/x-icon"> 
</head>
<body>

<?php 
 include("header.php");
 $consulta_calidad = $con->prepare("select * from nuestra_calidad"); 
 $consulta_calidad->execute();
 $calidad = $consulta_calidad->fetch(PDO::FETCH_ASSOC);
 $consulta_inclusion = $con->prepare("select * from inclusion"); 
 $consulta_inclusion->execute(); 
 $consulta_objetivos = $con->prepare("select * from objetivos_ambientales"); 
 $consulta_objetivos->execute();
 $consulta_inclusion->execute();
?>

<div class="d-flex justify-content-center titulo-politica p-5">
<h3 class="text-center py-5 my-3" style="">
   <?php
                    if ($_SESSION['leng']==="es") echo "<b>NUESTRA CALIDAD</b>";
                    else echo "<b>OUR QUALITY</b>";
                ?>
   </h3>
</div>
 

  <div  class="container-fluid px-5" style="width:80%;">

  <div class="row m-0">
      <div class="col-12 col-md-4 my-3">
        <div class="d-flex justify-content-center align-content-center" style="height:100%; max-width:600px">
        <?php
         echo ' <img class="img-fluid img-politica" src="./img/calidad/'.$calidad['img_calidad'].'" style="width:auto; max-height:400px;">'
        ?>
         
        </div>
      </div>

      <div class="col-12 col-md-8 p-5">
                <h3 class="mb-5"> 
                    <?PHP
                        if ($_SESSION['leng']==="es") echo "POLITICA DE CALIDAD";
                        else echo "POLITICS OF QUALITY";
                    ?>
                </h3>
                <p class="text-justify">
                    <?php 
                    if ($_SESSION['leng']==="es") echo $calidad['texto_calidad'];
                    else echo $calidad['texto_calidadi'];             
                    ?>
                </p>
      </div>
  </div>

  <div class="row m-0">
      <div class="col-12 col-md-4 my-3">
          <div class="d-flex justify-content-center align-content-center" style="height:100%; max-width:600px">
           <img class="img-fluid img-politica" src="./img/calidad/<?php echo $calidad['img_politica']?>" style="width:auto; max-height:400px;">
          </div>
      </div>

      <div class="col-12 col-md-8 p-5">

                <p class="text-justify">
                    <?php 
                    if ($_SESSION['leng']==="es") echo $calidad['texto_politica'];
                    else echo $calidad['texto_politicai'];             
                    ?>
                </p>

                <div>
                    <a class="border border-primary btn enlace-noticias"  href="./files/<?php echo $calidad['archivo_politica'];?>" target="_blank">
                            <?php
                            if ($_SESSION['leng']==="es") echo "VER MÁS INFORMACIÓN";
                            else echo "SEE MORE INFORMATION"
                            ?>
                    </a>
              </div>
      </div>
  </div>



</div>





<div class="jumbotron jumbotron-fluid my-5 p-0" style="">
 <div class=" align-content-center justify-content-center p-5 text-white iatf">
 <h4 class="text-center mb-4 text-white"> <b>
        <?php
            if ($_SESSION['leng']==="es") echo "CERTIFICACIÓN IATF";
            else echo "OUR COMPANY HAS CERTIFICATION IATF"; 
        ?></b>
     </h4>

        <div class="d-flex justify-content-center" style="width:100%">
            <p class="text-center text-white my-5" style="width:40%">
            <?php 
                if ($_SESSION['leng']==="es") echo $calidad['certificacion_iso'];
                else echo $calidad['certificacion_isoi'];
            ?>
            </p>
        </div>
 </div>
</div>

<div class="jumbotron mb-0 p-0 iso">
<div class="container-fluid text-white p-5">

                        <div class="d-flex flex-wrap flex-column justify-content-center align-content-center m-0" style="height:100%">
                            <h3 class="text-center my-5">
                                <?php
                                  if($_SESSION['leng']==="es") echo "CERTIFICACÓN ISO 14001";
                                  else echo "BEYONZ IS CERTIFIED BY ISO 14001";
                                ?>

                            </h3>
                                <p class="text-justify">
                                    <?php 
                                        if($_SESSION['leng']==="es") echo $calidad['texto_9001'];
                                        else echo $calidad['texto_9001i'];
                                    ?>
                                </p>

                        </div>
     
   <p class="text-center">
        <b>
            <?php 
              if($_SESSION['leng']==="es") echo "OBJETIVOS AMBIENTALES";
              else echo "ENVIRONMENTAL OBJECTIVES"
            ?>
        </b>
    </p>

  <div class="row my-5 mx-0">

            <?php

            while ($objetivo = $consulta_objetivos->fetch(PDO::FETCH_ASSOC)){
            echo '
                    <div class="col-6 col-md-4">
                        <div class="d-flex justify-content-center" style="width=100%"> 
                            <img src="img/calidad/'.$objetivo['img_objetivo'].'" style="max-width=150px; max-height:150px">
                        </div>

                        <div class="d-flex align-content-center justify-content-center" style="width:100%">
                        <p class="text-justify">
                            ';
                                if($_SESSION['leng']==="es") echo $objetivo['texto_objetivo'];
                                else echo $objetivo['texto_objetivoi'];
                                
                            echo '
                        </p>
                    </div>
                        <hr style="background-color: white;">       
                    </div>
            ';
            }

            ?>
    </div>
  </div>
</div>


<div class="row my-0 mx-0 p-0">
    <div class="col-12 mx-0 my-0 p-0">
            <div class="d-flex flex-wrap justify-content-center align-content-center p-1" style="height:100%; width:100%;">
                <h3 class="text-center my-5 py-2 px-4 font-italic">
                    <?php
                        if ($_SESSION['leng']==="es") echo "RECONOCIMIENTO A NUESTRA CALIDAD";
                        else echo "RECOGNITION OF OUR QUALITY";     
                    ?>
                </h3>
            </div>
    </div>
    
    <div class="container-banner-calidad">
            <div class="swiper mySwiper">
                <div class="swiper-wrapper">
                    
                <?php
               $consulta_imagenes_reconocimiento = $con->prepare("select * from banner_reconocimiento"); 
               $consulta_imagenes_reconocimiento->execute();
            while ($imagen = $consulta_imagenes_reconocimiento->fetch(PDO::FETCH_ASSOC)){
            echo '
            <div class="swiper-slide"><img class="img-banner-calidad" src="img/banner_calidad/'.$imagen['img_reconocimiento'].'" ></div>
            ';
            }

            ?>
                    
                </div>
                <div class="swiper-pagination"></div>
            </div>
    </div> 
</div>



<div class="container-fluid gif mt-5 mb-0">

        <div class="row">
                <?php
                    while( $result = $consulta_inclusion->fetch(PDO::FETCH_ASSOC)){
                        echo '<div class="col-12 col-md-6 p-5">
                            <div class="d-flex justify-content-center align-content-center" style="width:100%">
                                <p class="text-justify" style="max-width:70%">
                                ';
                                   if($_SESSION['leng']==="es") echo $result['parrafo_inc']; 
                                   else echo $result['parrafo_inci']; 
                                echo'  
                                </p>  
                            </div>
                            <hr class="fot" style="max-width:70%">
                    </div>';}
                ?>         
        </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script>
    var swiper = new Swiper(".mySwiper", {
      slidesPerView: 3,
      spaceBetween: 30,
      pagination: {
        el: ".swiper-pagination",
        clickable: true,
      },
    });
  </script>

<?php
include("footer.php");
?>


  </body>
</html>