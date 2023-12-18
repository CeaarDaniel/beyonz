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
        if ($_SESSION['leng']==="es")  echo "PROCESOS";
        else echo"PROCESS";
        ?>
    </title>
    <link rel="icon" href="./img/imagenes/logo.png" type="image/x-icon">   
</head>
<body id="body">

  <?php
     include("header.php");

     $consulta_procesos = $con->prepare("select * from proceso_automotriz"); 
     $consulta_procesos->execute();
     $automotriz = $consulta_procesos->fetch(PDO::FETCH_ASSOC);

     $consulta_ensamble = $con->prepare("select * from proceso_de_ensamble"); 
     $consulta_ensamble->execute();
     $ensamble = $consulta_ensamble->fetch(PDO::FETCH_ASSOC);

     $procesos = $con->prepare("select * from descripcion_procesosaut");
     $procesos->execute();

     $productos_fundidos = $con->prepare("select * from productos_fundidos");
     $productos_fundidos->execute();


   ?>
  
<div class="jumbotron my-0 p-0 mx-0" style=" background-image: url('./img/proceso_automotriz/procesos_automotrices2.jpg');  background-size: cover;  background-position: center center;">
<div class="container-fluid p-0 text">
        <div class="d-flex text-center text-light justify-content-center p-5">
                <h3 class="mt-2" style="max-width:50%">
                <?php
                        if ($_SESSION['leng']==="es")  echo "PROCESO AUTOMOTRIZ";
                        else echo"AUTOMOTIVE PROCESS";
                ?>
                </h3>
        </div>
    </div>

  <div class="container-fluid p-5 text mx-0" style="min-height: 500px;">
    <div class="ml-auto justify-content-justify text-white procesoauto">
       <?php 
         if($_SESSION['leng']==="es") echo $automotriz['parrafo'];
         else echo $automotriz['parrafoi'];
       ?>
    </div>
  </div>
</div>

    
<div  class="container-fluid px-5" style="width:80%;">
  <div class="row m-0">
      <div class="col-12 col-md-4 my-3">
          <div>
            <img src="img/proceso_automotriz/<?php echo $automotriz['img_bps']?>" style="width:100%; heihgt:100px;">
          </div>
      </div>
      <div class="col-12 col-md-8 p-5">
        <p class="text-justify">
            <?php 
              if($_SESSION['leng']==="es") echo $automotriz['texto_bps'];
              else echo $automotriz['texto_bpsi'];
            ?>
        </p>
      </div>
  </div>
</div>

<div class="row m-0">
  <div class="d-flex flex-wrap justify-content-center" style="width:100%">
    <div class="col-12 col-md-4 px-5 my-5">
      <div  class="d-flex justify-content-center border rounded imgcardpro" style="background-image: url('./img/proceso_automotriz/<?php echo $automotriz['imagen_sisintegrado'];?>'); ">

            <div class="d-flex align-items-center justify-content-center texto-1">
              <p class="text-center font-weight-bold px-5">
                <?php
                    if($_SESSION['leng']==="es") echo $automotriz['sistema_integrado'];
                    else echo $automotriz['sistema_integradoi'];
                ?>
              </p>
            </div>

            <p class="d-flex align-items-center justify-content-center texto-2">
              <?php
                    if($_SESSION['leng']==="es") echo "SISTEMA DE PRODUCCION INTEGRADO";
                    else echo "SYSTEM INTEGRATED PRODUCTION";
                ?>
            </p>
      </div>  
    </div>


    <div class="col-12 col-md-4 px-5 my-5">
      <div  class="d-flex justify-content-center border rounded imgcardpro" style="background-image: url('./img/proceso_automotriz/<?php echo $automotriz['img_sisbps'];?>'); ">

            <div class="d-flex align-items-center justify-content-center texto-1">
              <p class="text-center font-weight-bold px-5">
              <?php
                    if($_SESSION['leng']==="es") echo $automotriz['sistema_bps'];
                    else echo $automotriz['sistema_bpsi'];
                ?>
              </p>
            </div>

            <p class="d-flex align-items-center justify-content-center texto-2">
            
            <?php
                    if($_SESSION['leng']==="es") echo "SISTEMA DE PRODUCCIÓN BPS.";
                    else echo "SYSTEM BPS PRODUCTION";
                ?>
            </p>
      </div>  
    </div>

    

  </div>
</div>


<div class="container-fluid my-5 text-center" style="height:auto;">

<h3 class="text-center my-5">
    <b>
      <?php 
        if($_SESSION['leng']==="es") echo "PROCESO DE ENSAMBLE DE STABILINK";
        else echo "STABILINK ASSEMBLY PROCESS"
      ?>
  </b>
</h3>

    <div class="row p-0 mx-0">
      <div class="col-12  col-md-2 p-0">
          
          <ul class="nav nav-pills  flex-column">
            <li class="nav-item px-0 my-3">
                <a class="nav-link d-flex align-items-center justify-content-center active px-0" data-toggle="pill" href="#proc1">
                  <h4>
                    <?php 
                      if($_SESSION['leng']==="es") echo "PROCESO DE SOLDADURA";
                      else echo "WELDING PROCESS "
                    ?>
                  </h4>
                             
                </a>
              </li>
              <li class="nav-item px-0 my-3">
                <a class="nav-link d-flex align-items-center justify-content-center px-0" data-toggle="pill" href="#proc2">
                  <h4>
                    <?php 
                        if($_SESSION['leng']==="es") echo "PROCESO Co2";
                        else echo "Co2 PROCESS"
                      ?>
                  </h4>
                </a>
              </li>
              <li class="nav-item px-0 my-3">
                <a class="nav-link d-flex align-items-center justify-content-center px-0" data-toggle="pill" href="#proc3">
                 <h4> 
                  <?php 
                        if($_SESSION['leng']==="es") echo "PROCESO WET BLAST";
                        else echo "WET BLAST PROCESS"
                      ?>
                 </h4>
                </a>
              </li>
              <li class="nav-item px-0 my-3">
                <a class="nav-link d-flex align-items-center justify-content-center px-0" data-toggle="pill" href="#proc4">
                  <h4>
                   <?php 
                        if($_SESSION['leng']==="es") echo "RECUBRIMIENTO";
                        else echo "E-COAT"
                      ?>
                  </h4>
                </a>
              </li>
              <li class="nav-item px-0 my-3">
                <a class="nav-link d-flex align-items-center justify-content-center px-0" data-toggle="pill" href="#proc5">
                  <h4 class="m-0">
                      <?php 
                        if($_SESSION['leng']==="es") echo "ENSAMBLE";
                        else echo "ASSEMBLY"
                      ?>  
                  </h4>
                </a>
              </li>
          </ul>
      </div>

      <div class="col-12 col-md-10 p-0">

        <div class="tab-content">        
            <div id="proc1" class="container-fluid tab-pane active">
                    <div class="d-flex flex-column aling-content-center justify-content-center p-0" style="height:100%;">
                      
                        <p>
                          <?php 
                            if($_SESSION['leng']==="es") echo $ensamble['texto_soldadura'];
                            else echo $ensamble['texto_soldadurai'];
                          ?> 
                        </p>

                        <div class="d-flex row aling-content-center aling-items-center justify-content-center p-0">
                          <div class="aling-items-center">
                              <img src="img/proceso_automotriz/<?php echo $ensamble['imagen_soldadura']?>" style="max-width:350px;">
                          </div>

                          <div>
                              <video src="videos/<?php echo $ensamble['video_soldadura']?>" controls muted style="width:auto; max-height:400px"></video> 
                          </div>
                        </div>
                            
                        </div>
                    
            </div> 

            <div id="proc2" class="container-fluid tab-pane fade"> 
                    <div class="d-flex flex-column aling-content-center justify-content-center p-0" style="height:100%">
                      <p>
                      <?php 
                            if($_SESSION['leng']==="es") echo $ensamble['texto_co2'];
                            else echo $ensamble['texto_co2i'];
                          ?> 
                      </p>
                        <div>
                              <video src="videos/<?php echo $ensamble['video_co2']?>" controls muted style="width:auto; height:400px"></video> 
                          </div>
                    </div>
            </div> 

            <div id="proc3" class="container-fluid tab-pane fade"> 
                    <div class="d-flex flex-column aling-content-center justify-content-center p-0" style="height:100%">
                      <p>
                          <?php 
                            if($_SESSION['leng']==="es") echo $ensamble['texto_blast'];
                            else echo $ensamble['texto_blasti'];
                          ?> 
                      </p>
                        <div class="d-flex row aling-content-center justify-content-center p-0">
                              <div class="mx-3">
                                  <video src="videos/<?php echo $ensamble['video1_blast']?>" controls muted style="width:auto; height:400px"></video> 
                              </div>
                              <div class="mx-3">
                                  <video src="videos/<?php echo $ensamble['video2_blast']?>" controls muted style="width:auto; height:400px"></video> 
                              </div>
                          </div>
                    </div>
            </div> 

            
            <div id="proc4" class="container-fluid tab-pane fade">
                    <div class="d-flex flex-column aling-content-center justify-content-center p-0" style=" width:100%; height:100%">
                      <p>
                      <?php 
                            if($_SESSION['leng']==="es") echo $ensamble['texto_recubrimiento'];
                            else echo $ensamble['texto_recubrimientoi'];
                          ?> 
                      </p>

                       <img src="img/proceso_automotriz/<?php echo $ensamble['imagen_recubrimiento']?>" style="width:auto; max-height:400px">
                    </div>
            </div>
            
            
            <div id="proc5" class="container-fluid tab-pane fade"> 
                    <div class="d-flex flex-column aling-content-center justify-content-center p-0" style=" width:100%; height:100%">
                      <p>
                      <?php 
                            if($_SESSION['leng']==="es") echo $ensamble['texto_ensamble'];
                            else echo $ensamble['texto_ensamblei'];
                          ?> 
                      </p>
                      <img src="img/proceso_automotriz/<?php echo $ensamble['imagen_ensamble']?>" style="width:auto; max-height:400px">
                      
                    </div>
            </div>
        </div>

      </div>
    </div>

</div>    



<?php
    while ($descripcion = $procesos->fetch(PDO::FETCH_ASSOC)) { 

      echo ' <hr style="background-color:black;">
    <div class="row m-0 p-5 row justify-content-center align-items-center">
        <div class="col-12 col-md-7">
            <h3 class="my-2">';     
           
            if($_SESSION['leng']==="es") echo $descripcion['nombre_pa'];
            else echo $descripcion['nombre_pai'];
            
            echo '</h3>
              <p class="text-justify my-3">'; 
              

              if($_SESSION['leng']==="es") echo $descripcion['descripcion_pa'];
              else echo $descripcion['descripcion_pai'];
              
            echo '
              </p>

        </div>
        <div class="col-12 col-md-5 p-0">
           <div class="d-flex align-items-center justify-content-center" style="width:100%; max-height:100%">
                 <img src="img/proceso_automotriz/procesos/'.$descripcion['imagen_pa'].'" style="max-width:100%; max-height:300px">
           </div>
        
        </div>
    </div>'; 
    }   
    ?>
<hr style="background-color:black;">
  


<div class="jumbotron my-0 p-0">
  <div class="container-fluid p-5">

      <div class="text-center">
      <b> TODOSO LOS MATERIALES DE NUESTROS PROVEDORES SON ADQUIRIDOS CON UN ALTO CONTROL DE QCD</b>
      <p><b>ALUMINIO Y HIERRO FUNDIDO EN MAQUINARIA</b></p>
      </div>




    <div class="row my-5 mx-0">


    <?php
      while ($productos = $productos_fundidos->fetch(PDO::FETCH_ASSOC)) { 
echo '<div class="col-6 col-md-4 my-3">
          <div class="d-flex align-content-center justify-content-center" style="width:100%">
            <img src="img/proceso_automotriz/productos_fundidos/'.$productos['imagen'].'" style="max-width:200px; max-height:200px;">
          </div>
           <div>
               <p class="text-center">
                 '; 

                 if($_SESSION['leng']==="es") echo $productos['descripcion'];
                 else echo $productos['descripcioni'];
        
                 echo '
               </p>
            </div>
      </div>'; 
    }
 ?>
</div>

  <!--
      <div class="row my-5 mx-0">

            <div class="col-6 col-md-4 my-3">
              <div class="d-flex align-content-center justify-content-center" style="width:100%">
              <img src="img/proceso_automotriz/motores/m2.png" style="max-width:200px; max-height:200px;">
              </div>
              <div>
                    <p class="text-center">
                    BRKT PS OIL PUMP 7,000 pcs/month

                    </p>
                  </div>
            </div>

            <div class="col-6 col-md-4 my-3">
              <div class="d-flex align-content-center justify-content-center" style="width:100%">
                <img src="img/proceso_automotriz/motores/m3.png" style="max-width:200px; max-height:200px;">
              </div>
              <div>
                    <p class="text-center">
                    BRKT CABLE 5,200 pcs/month
                    </p>
                  </div>
            </div>

              <div class="col-6 col-md-4 my-3">
                <div class="d-flex align-content-center justify-content-center" style="width:100%">
                  <img src="img/proceso_automotriz/motores/m4.png" style="max-width:200px; max-height:200px;">
                </div>
                <div>
                    <p class="text-center">
                    BEARING CAP ZV9 32k pcs/month
                    </p>
                  </div>
              </div>

              <div class="col-6 col-md-4 my-3">
                <div class="d-flex align-content-center justify-content-center" style="width:100%">
                <img src="img/proceso_automotriz/motores/m5.png" style="max-width:200px; max-height:200px;">
                </div>
                <div>
                    <p class="text-center">
                    OUTLET WATER 16,083 pcs/month
                    </p>
                  </div>
              </div>

            <div class="col-6 col-md-4 my-3">
                <div class="d-flex align-content-center justify-content-center" style="width:100%">
                  <img src="img/proceso_automotriz/transmisiones/t1.png" style="max-width:200px; max-height:200px;">
                </div>
                  <div>
                    <p class="text-center">
                    PISTON AXO 26K pcs/month
                    </p>
                  </div>
            </div>

            <div class="col-6 col-md-4 my-3">
              <div class="d-flex align-content-center justify-content-center" style="width:100%">
              <img src="img/proceso_automotriz/transmisiones/t2.png"  style="max-width:200px; max-height:200px;">
              </div>
              <div>
                    <p class="text-center">
                    COVER OIL PUMP 28K pcs/month
                    </p>
                  </div>
            </div>

            <div class="col-6 col-md-4 my-3">
              <div class="d-flex align-content-center justify-content-center" style="width:100%">
                <img src="img/proceso_automotriz/transmisiones/t3.png"  style="max-width:200px; max-height:200px;">
              </div>
              <div>
                    <p class="text-center">
                    PLUNGER SCND 14k pcs/month
                    </p>
                  </div>
            </div>

              <div class="col-6 col-md-4 my-3">
                <div class="d-flex align-content-center justify-content-center" style="width:100%">
                  <img src="img/proceso_automotriz/transmisiones/t4.png"  style="max-width:200px; max-height:200px;">
                </div>
                <div>
                    <p class="text-center">
                    SLEEVE 40k pcs/month
                    </p>
                  </div>
              </div>

              <div class="col-6 col-md-4 my-3">
                <div class="d-flex align-content-center justify-content-center" style="width:100%">
                <img src="img/proceso_automotriz/transmisiones/t5.png"  style="max-width:200px; max-height:200px;">
                </div>
                <div>
                    <p class="text-center">
                    PLUNGER AVO 28K pcs/month
                    </p>
                  </div>
              </div>

                <div class="col-6 col-md-4 my-3">
                  <div class="d-flex align-content-center justify-content-center" style="width:100%">
                    <img src="img/proceso_automotriz/transmisiones//t6.png"  style="max-width:200px; max-height:200px;">
                  </div>
                  <div>
                    <p class="text-center">
                    PUMP HUB 23K pcs/month
                    </p>
                  </div>
                </div>

                <div class="col-6 col-md-4 my-3">
                  <div class="d-flex align-content-center justify-content-center" style="width:100%">
                    <img src="img/proceso_automotriz/transmisiones//t7.png"  style="max-width:200px; max-height:200px;">
                  </div>
                  <div>
                    <p class="text-center">
                    COVER HUB 17K pcs/month
                    </p>
                  </div>
                </div>

                <div class="col-6 col-md-4 my-3">
                  <div class="d-flex align-content-center justify-content-center" style="width:100%">
                    <img src="img/proceso_automotriz/transmisiones//t9.png"  style="max-width:200px; max-height:200px;">
                  </div>
                  <div>
                    <p class="text-center">
                    HOUSING 37K pcs/month
                    </p>
                  </div>
                </div>

                <div class="col-6 col-md-4 my-3">
                  <div class="d-flex align-content-center justify-content-center" style="width:100%">
                    <img src="img/proceso_automotriz/transmisiones//t10.png"  style="max-width:200px; max-height:200px;">
                  </div>
                  <div>
                    <p class="text-center">
                    HUB TWO WAY 45k pcs/month
                    </p>
                  </div>
                </div>

                <div class="col-6 col-md-4 my-3">
                  <div class="d-flex align-content-center justify-content-center" style="width:100%">
                    <img src="img/proceso_automotriz/suspensiones/s2.png"  style="max-width:200px; max-height:200px;">
                  </div>
                  <div>
                    <p class="text-center">
                      suspension
                    </p>
                  </div>
                </div>


                <div class="col-6 col-md-4 my-3">
                  <div class="d-flex align-content-center justify-content-center" style="width:100%">
                    <img src="img/proceso_automotriz/suspensiones/s1.png"  style="max-width:200px; max-height:200px;">
                  </div>
                  <div>
                    <p class="text-center">
                      suspension
                    </p>
                  </div>
                </div>
          </div> 
  -->
  </div>
</div>



<?php
include("footer.php")
?>
  
  </body>
</html>