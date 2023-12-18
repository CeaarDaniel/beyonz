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
         if ($_SESSION['leng']==="es") echo "Beyonz Mexicana S.A de C.V.";
         else echo "Beyonz Mexican S.A de C.V.";
        ?>
    </title>
    <link rel="icon" href="./img/imagenes/logo.png" type="image/x-icon"> 
</head>
<body>

<?php 
 include("header.php");
 $consulta_banner = $con->prepare("select * from banner_principal"); 
 $consulta_noticias = $con->prepare("select * from noticias ORDER BY fecha DESC LIMIT 3"); 
 $consulta_banner->execute();
 $consulta_noticias->execute();
 $indice = 0;
?>

    <div id="banner" class="carousel is-draggable slide m-0 p-1" data-ride="carousel">
      
         
            <ul class="carousel-indicators">
                <?php
                  while ($fila = $consulta_banner->fetch(PDO::FETCH_ASSOC)) {
                      $activo = ($indice === 0) ? 'active' : ''; 
                      echo '<li data-target="#banner" data-slide-to="'.$indice.'" class="'.$activo.'"></li>';
                      $indice++;
                  }
                ?>
            </ul>
            
            
            <div class="carousel-inner">
                    <?php
                        $indice = 0; 
                        $consulta_banner->execute();
                        while ($fila = $consulta_banner->fetch(PDO::FETCH_ASSOC)) {
                            $activo = ($indice === 0) ? 'active' : ''; 
                            echo 
                            '<div class="carousel-item '.$activo.'">
                                <div class="container py-3">
                                    <div class="row">

                                        <div class="col-sm-12 col-md-12">
                                             <div class="d-flex flex-column flex-md-row justify-content-center align-content-center" style="height:100%">
                                                <img class="mx-5" src="./img/banner/'.$fila['imagen'].'" class="imgcar img-fluid" alt="Imagen'.$indice.'" style="height:350px; max-width:50%">
                                                  
                                                <div class="d-flex flex-wrap align-content-center" style="height:100%; max-width:350px; overflow:hidden;">
                                                    <h3 class="h2">'; 
                                                    if ($_SESSION['leng']==="es") echo $fila['titulo'];
                                                    else echo $fila['tituloi'];
                                                    
                                                  echo '</h3>
                                                    <p class="card-text text-justify">'; 
                                                    if ($_SESSION['leng']==="es") echo $fila['descripcion'];
                                                    else echo $fila['descripcioni'];
                                                  echo'
                                                    </p>
                                                </div>
                                              </div> 
                                        </div>
                                    </div> 
                                    
                                </div>
                            </div>';
                            $indice++;
                        }
                  ?>  
            </div>
                                
     
              <a class="carousel-control-prev" href="#banner" data-slide="prev" style="font-size: 30px;">
                <i class="fas fa-arrow-left" style="color: #000000;"></i>
              </a>
              <a class="carousel-control-next" href="#banner" data-slide="next" style="font-size: 30px;">
                <i class="fas fa-arrow-right" style="color: #000000;"></i>
              </a>
</div>

  
<div class="jumbotron m-0">
      <div class="container card-index-noticia">
              <div class="row">
              <?php
               $indice = 0;
                while ($fila = $consulta_noticias->fetch(PDO::FETCH_ASSOC)) { 
                 echo'
                      <div class="card col-12 col-md m-3 pt-4" style="width:400px; max-height:700px;">
                            <div class="d-flex flex-wrap align-content-center"  style="height:100%">
                                <img class="card-img-top" src="./img/noticias/'.$fila['imagen_principal'].'" alt="imagen" style="max-height:300px">
                                <div class="card-body">
                                      <h4 class="card-title text-center">';
                                      if ($_SESSION['leng']==="es") echo $fila['titulo'];
                                      else echo $fila['tituloi'];
                                      echo'</h4>
                                      <p class="card-text text-justify">
                                           ';
                                           
                                           if ($_SESSION['leng']==="es") echo $fila['resumen'];
                                            else echo $fila['resumeni'];                                          
                                      echo '        
                                      </p>
                                      <div class="d-flex justify-content-center">
                                        <a href="noticia?id='.(base64_encode($fila['id'])).'" class="btn btn-primary">'; 
                                        
                                        if ($_SESSION['leng']==="es") echo "Leer noticia";
                                            else echo "Read news";         
                                        echo '</a>
                                      </div>

                                  </div>
                            </div>  
                        </div>                    
                    ';
                    $indice++;
                }
        ?>  
      </div>
</div>
    
</div>



<div class="jumbotron bg-secondary fondo p-0 mb-0 rounded-0">
  <div class="container-fluid text">

  <div class="row p-5">
  <div class="col-12 col-md-5 text-justify text-light font-weight-bold tex-fot">
  <?php if ($_SESSION['leng']==="es") 
             echo '<p>BEYONZ MEXICANA ES UN EQUIPO.</p>
                      <p> Cada uno de los empleados es un miembro importante del equipo.</p>
                      <p> Satisfacción del Cliente, éxito del equipo, crecimiento y felicidad del integrante es el origen de la administración de la empresa.
                    </p>      
                    <img class="img-fluid mb-5" src="./img/imagenes/footer-logo.png"> 
                    <br>
                  <a href="politica_de_calidad" class="btn btn-primary" id="boton-index-politica">
                    VER NUESTRA CALIDAD
                  </a>';
                                    
                

        else echo '<p>BEYONZ MEXICANA is a team.</p>
        <p>Each of the employees is an important member of the team.</p>
        <p> Customer satisfaction, team success, growth and happiness of the member is the origin of the company is management.
        </p>      
        <img class="img-fluid mb-5" src="./img/imagenes/footer-logo.png"> 
        <br>
        <a href="politica_de_calidad" class="btn btn-primary" id="boton-index-politica">
        SEE OUR QUALITY
        </a>';?>
    
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

