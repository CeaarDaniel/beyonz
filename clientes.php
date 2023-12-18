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
         if ($_SESSION['leng']==="es") echo "CLIENTES";
         else echo "CUSTOMERS";
        ?>
    </title>
    <link rel="icon" href="./img/imagenes/logo.png" type="image/x-icon"> 
</head>
<body> 
    
<?php
 include("header.php");
 $consulta_clientes = $con->prepare("select * from clientes"); 
 $consulta_clientes->execute();
 $indice = 0;
?>



<div class="container-fluid p-0 productos" >
    <div class="container-fluid p-0 text">
    <div class="d-flex text-center text-light aling-content-center justify-content-center p-5" style="height:100%">
             <h3 class="mt-2" style="max-width:50%">
                    <?php
                      if ($_SESSION['leng']==="es") echo "ESTOS SON ALGUNO DE NUESTROS PRINCIPALES CLIENTES";
                      else echo "THESE ARE SOME OF OUR MAIN CUSTOMERS";
                    ?>
            </h3>
    </div>
</div>
</div>


<div class="container-fluid text-cente mt-5 mb-5">
    <div class="row">
                <?php
                    $indice = 0;
                            while ($fila = $consulta_clientes->fetch(PDO::FETCH_ASSOC)) {       
                                echo' 
                                <div class="col-12 col-md-6 col-lg-4 p-5 mt-2">
                                <div class="d-flex justify-content-center border border-dark rounded proyecto">
                                    <img class="img-fluid" src="./img/clientes/'.$fila['logo'].'" alt="cliente">';

                                    if($fila['link_pagina']!=null){
                                    echo '
                                    <div class="overlay">
                                        <p>';
                                        if ($_SESSION['leng']==="es") echo "Visitar sitio";
                                        else echo "Visit website";
                                        echo' 
                                        </p>

                                        <div class="d-flex justify-content-center iconos-contenedor">
                                            <a href="'.$fila['link_pagina'].'" target="_blank">
                                            <i class="fas fa-globe" style="color: #000000;"></i> 
                                            </a>
                                        </div>
                                    </div>';
                                }

                                echo '
                                </div>
                            </div>'
                                ;
                                $indice++;
                            }
                ?>  
    </div>
</div>

<?php
include("boton-contactanos.php");
 include("footer.php")
?>
</body>
</html>