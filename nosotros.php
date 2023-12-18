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
         if ($_SESSION['leng']==="es") echo "¿QUIENES SOMOS?";
         else echo "WHO WE ARE?";
        ?>
    </title>
    <link rel="icon" href="./img/imagenes/logo.png" type="image/x-icon"> 
</head>
<body>

<?php 
 include("header.php");
 $consulta_nosotros = $con->prepare("select * from nosotros"); 
 $consulta_instalaciones = $con->prepare("select * from banner_instalaciones"); 
 $consulta_plantas = $con->prepare("select DISTINCT pais,paisi from plantas;"); 
 $consulta_nosotros->execute();
 $consulta_instalaciones->execute();
 $consulta_plantas->execute();
 $result = $consulta_nosotros->fetch(PDO::FETCH_ASSOC);
 $indice = 0;
?>

  <div class="container-fluid p-0 mb-5 quienes-somos" >
    <div class="container-fluid p-0 text">
        <div class="text-light p-3">
             <h3 class="mt-1 mb-5 text-center" style="max-width:100%">
                <?php 
                      if ($_SESSION['leng']==="es")  echo "¿QUIENES SOMOS?";
                      else echo "WHO WE ARE?";
                  ?>
             </h3>
  
              <div class="d-flex justify-content-center">
                  <p class="text-justify" style="max-width:500px">
                  <?php 
                      if ($_SESSION['leng']==="es")  echo $result['texto_nosotros'];
                      else echo $result['texto_nosotrosi'];
                  ?>
                  </p>
              </div>
         </div>
      </div>
  </div>
</div>
  <div class="container-fluid filosofia mt-5 mb-5">
     <div class="row">
           <div class="col-12 col-lg-6 p-5">
                <div class="d-flex flex-column justify-content-center text-justify m-0">
                    <h3 class="text-center">
                    <?php 
                    if ($_SESSION['leng']==="es")  echo "FILOSOFIA";
                    else echo "PHILOSOPHY";
                    ?>
                    </h3>
                    <p class="my-0">
                    <?php 
                    if ($_SESSION['leng']==="es")  echo $result['filosofia'];
                    else echo $result['filosofiai'];
                    ?>
                    </p>
                </div>
           </div>
           <div class="col-12 col-lg-6 p-5">
              <div class="d-flex justify-content-center align-content-center px-5" style="height:100%">
               <img class="border-rounded img-filosofia" src="./img/nosotros/<?php echo $result['img_filosofia']?>" alt="imagen" style=" width:auto; max-height:250px;">
              </div>
           </div>
     </div>
  </div>

  <div class="jumbotron mis-vis my-0">
    <div class="row">
          <div class="col-12 col-md-6">
                <div class="d-flex flex-column justify-content-center">
                  
                     <h4 class="text-center"> 
                       <?php 
                       if ($_SESSION['leng']==="es")  echo "MISION";
                       else echo "MISSION";
                       ?>
                     </h4>
               
                     <p class="text-center">
                        <?php 
                          if ($_SESSION['leng']==="es")  echo $result['mision'];
                          else echo $result['misioni'];
                        ?>
                     </p>
                </div>
          </div>
          
          <div class="col-12 col-md-6">
                <div class="d-flex flex-column justify-content-center">
                     <h4 class="text-center">
                       <?php
                        if ($_SESSION['leng']==="es")  echo "VISION";
                        else echo "VIEW";
                       ?>
                     </h4>
                     
                      <p class="text-center">
                         <?php 
                            if ($_SESSION['leng']==="es") echo $result['vision'];
                            else echo $result['visioni'];
                         ?>
                     </p>
                </div>
          </div>
    </div>
  </div>

                                  
      <div id="plantas" class="container-fluid my-5 text-center">
            <h2>
            <?php
                    if ($_SESSION['leng']==="es") echo "PLANTAS";
                    else echo "PRODUCTION PLANTS";
                  ?>
            </h2>
                <p>
                  <?php
                    if ($_SESSION['leng']==="es") echo "CONOZCA DONDE ESTÁN UBICADAS LAS DISTINTAS PLANTAS DE BEYONZ";
                    else echo "KNOW WHERE THE DIFFERENT BEYONZ PLANTS ARE LOCATED";
                  ?>
                </p>
                <br>
             
                
                <ul class="nav nav-pills" role="tablist">

                <?php
                  while ($pais = $consulta_plantas->fetch(PDO::FETCH_ASSOC)) {
                   
                    if ($_SESSION['leng']==="es") $pai = $pais['pais'];
                    else $pai = $pais['paisi'];
              

                      $activo = ($indice === 0) ? 'active' : ''; 
                      echo '<li class="nav-item">
                      <a class="nav-link '.$activo.'" data-toggle="pill" href="#'.$pais['pais'].'">';
                         
                        if($_SESSION['leng']==="es") echo $pais['pais'];
                        else     echo $pais['paisi'];

                    echo '</a></li>';
                      $indice++;
                  }
                ?>
                </ul>
      
               
                <div class="tab-content">
                      <?php
                              $indice = 0; 
                              $consulta_plantas->execute(); 
                              while ($fila = $consulta_plantas->fetch(PDO::FETCH_ASSOC)) {
                                  $act = ($indice === 0) ? 'active' : 'fade';

                                  echo '<div id="'.$fila['pais'].'" class="container-fluid tab-pane '.$act.'"> <br>';
                                     $consulta_pais = $con->prepare("select * from plantas where pais= '".$fila['pais']."'"); 
                                     $consulta_pais->execute();

                                       while ($datos = $consulta_pais->fetch(PDO::FETCH_ASSOC)){
                                         echo '
                                         <div class="row">
                                         <div class="col-12 col-md-4">
                                             <div class="d-flex flex-column aling-content-center justify-content-center p-0" style="height:100%">
                                               <img src="./img/instalaciones/'.$datos['imagen'].'" alt="imagen de la planta" style="width:auto; max-height:320px;">
                                             </div>
                                         </div> 
               
                                         <div class="col-12 col-md-4 text-justify">
                                           <div class="d-flex flex-column aling-content-center justify-content-center p-0" style="height:100%; overflow: hidden;">
                                           <p>'.$datos['nombre'].'</p>
                                             <p><i class="fas fa-paper-plane" style="color: #000000;"></i>'; 
                                                if($_SESSION['leng']==="es") echo $datos['direccion'];
                                                else  echo $datos['direccioni'];
                                           echo'
                                           </p>
                                             <p> <i class="fas fa-phone" style="color: #000000;"></i>
                                             '.$datos['telefono'].'
                                             </p>
                                             <p>
                                             <i class="fas fa-print" style="color: #000000;"></i>
                                             '.$datos['fax'].' 
                                             </p>
                                             <p>
                                               <i class="fas fa-globe" style="color: #000000;"></i> 
                                               <a href="'.$datos['pagina'].'" target="_blank">
                                               '.$datos['pagina'].'
                                                </a>
                                             </p>
                                             </div>
               
                                           </div> 
                                           
                                           <div class="col-12 col-md-4 p-1">
                                             <iframe 
                                                 src="'.$datos['mapa'].'" 
                                                 style="width:100%; height:300px; border:0;"
                                                 loading="lazy" 
                                                 allowfullscreen=""
                                                 referrerpolicy="no-referrer-when-downgrade">
                                             </iframe>
               
                                           </div> 
                                     </div>
                                         ';

                                       }
                                    
                                  echo '</div>'; 
                                
                                  $indice++;
                              }
                        ?>          
        </div>
      </div>

    <div class="container-fluid ">
         <div class="row">

            <div class="col-12 col-md py-4">
                <div class="d-flex justify-content-center align-content-center my-5">
                    <div class="container-fluid mt-5 mb-5 p-5 instalaciones">
                    
                            <h3 class="text-center mt-3">
                            <?php
                              if ($_SESSION['leng']==="es") echo "INSTALACIONES";
                              else echo "FACILITIES";
                            ?>
                            </h3>
                            <div id="banner" class="carousel slide mt-5 p-0" data-ride="carousel">
                                <div class="container ">

                                   
                                    <ul class="carousel-indicators">
                                        <?php 
                                          while ($fila = $consulta_instalaciones->fetch(PDO::FETCH_ASSOC)) {
                                              $activo = ($indice === 0) ? 'active' : ''; 
                                              echo '<li data-target="#banner" data-slide-to="'.$indice.'" class="'.$activo.'"></li>';
                                              $indice++;
                                          }
                                        ?>
                                    </ul>
                                    
                                   
                                    <div class="carousel-inner">
                                      <?php
                                            $indice = 0; 
                                            $consulta_instalaciones->execute(); 
                                            while ($fila = $consulta_instalaciones->fetch(PDO::FETCH_ASSOC)) {
                                                $activo = ($indice === 0) ? 'active' : ''; 
                                                echo 
                                                '<div class="carousel-item '.$activo.'">
                                                      <div class="d-flex justify-content-center imagen-instalacion">
                                                        <img src="./img/instalaciones/'.$fila['imagen'].'">
                                                      </div>
                                                  </div>';
                                                $indice++;
                                            }
                                      ?>
                                    </div>

                               
                                <a class="carousel-control-prev" href="#banner" data-slide="prev" style="font-size: 50px;">
                                  <i class="fas fa-arrow-left" style="color: #000000;"></i>
                                </a>
                                <a class="carousel-control-next" href="#banner" data-slide="next" style="font-size: 50px;">
                                  <i class="fas fa-arrow-right" style="color: #000000;"></i>
                                </a>
                              </div>
                            </div>
                    </div>
                 </div>  
            </div>

            <div class="col-12 col-md-12">
                <div class="d-flex justify-content-center align-content-center my-5">
                  <video src="./files/<?php echo $result['video']?>" style="width:70%;  height:50%;" controls autoplay muted></video>
              </div>
           </div>
        </div>
  </div> 
  
<?php
include("boton-contactanos.php");
include("footer.php");
?>
  </body>
</html>