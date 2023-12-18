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
         if ($_SESSION['leng']==="es") echo "NOTICIAS";
         else echo "NEWS";
        ?>
    </title>
    <link rel="icon" href="./img/imagenes/logo.png" type="image/x-icon"> 
</head>
<body>
<?php
 include("header.php");
 $consulta_noticias = $con->prepare("select * from noticias order by fecha desc"); 
 $consulta_noticias->execute();
 $indice = 0;
?>

<div class="container-fluid p-0 productos" >
    <div class="container-fluid p-0 text">

    <div class="d-flex text-center text-light justify-content-center p-5">

             <h3 class="mt-2" style="max-width:50%">
             <?php
                if ($_SESSION['leng']==="es") echo "CONOZCA ALGUNOS DE LOS EVENTOS MAS DESTACADOS EN BEYONZ MEXICANA";
                else echo "KNOW ABOUT SOME OF THE MOST OUTSTANDING EVENTS AT BEYONZ MEXICANA";
             ?>
            </h3>

    </div>
</div>
</div>


<div class="container p-0 card-noticia">
    <div class="row mt-5 p-0 ">

    <?php
        $indice = 0;
                while ($fila = $consulta_noticias->fetch(PDO::FETCH_ASSOC)) { 
                 echo'                    
                    <div class="card col-10 col-md-5 col-xl-4 p-4 card-noticia" style="max-height:720px; overflow:hidden;">
                            <div class="d-flex flex-wrap align-content-center rounded-lg"  style="height:100%">
                                <img class="card-img-top" src="./img/noticias/'.$fila['imagen_principal'].'" alt="imagen"  style="max-height:50%">
                                <div class="card-body" style="max-height:100%">
                                        <h4 class="card-title">'; 
                                         if ($_SESSION['leng']==="es") echo $fila['titulo'];  
                                         else echo $fila['tituloi']; 
                                        echo '</h4>
                                        <div class="d-flex justify-content-start">
                                            <h7 class="text-muted">
                                                '.$fila['fecha'].'
                                            </h7>
                                        </div>
                                       <div style="max-height:100%; overflow:hidden;"> 
                                        <p class="card-text text-justify">
                                         '; 
                                         if ($_SESSION['leng']==="es") echo $fila['resumen']; 
                                         else echo $fila['resumeni'];
                                         echo '           
                                        </p>
                                        </div>
                                        <div class="d-flex justify-content-end"> 
                                                    <a href="noticia?id='.(base64_encode($fila['id'])).'" class="btn stretched-link">';
                                                    if ($_SESSION['leng']==="es") echo "Leer noticia"; 
                                                    else echo "Read news"; 
                                            echo'
                                                    </a>
                                            </div> 
    
                                    </div>
                            </div>  
                    </div>';
                    $indice++;
                }
        ?>  
    </div>

           
</div>
</div>
    
</div>



<?php
include("boton-contactanos.php");
 include("footer.php")
?>
</body>
</html>
