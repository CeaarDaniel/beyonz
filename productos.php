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
         if ($_SESSION['leng']==="es") echo "PRODUCTOS";
         else echo "PRODUCTS";
        ?>
    </title>
    <link rel="icon" href="./img/imagenes/logo.png" type="image/x-icon"> 
</head>
<body>

<?php 
 include("header.php");
 $consulta_automotriz = $con->prepare("select * from categoria_automotriz"); 
 $consulta_moldes = $con->prepare("select * from categoria_moldes"); 

 $consulta_automotriz->execute();
 $consulta_moldes->execute();

?>

<div class="container-fluid p-0 productos" >
    <div class="container-fluid p-0 text">

    <div class="d-flex text-center text-light justify-content-center p-5">

             <h3 class="mt-2" style="max-width:50%">
                <?php 
                    if ($_SESSION['leng']==="es") echo "Conozca cuales son algunos de los productos que se fabrican en beyonz mexicana";
                    else echo "Find out which are some of the products that are manufactured in Mexican Beyonz";
                ?>
            </h3>

    </div>
</div>
</div>


<div id="contenedor-productos" class="container p-0 contenedor-productos">
        <h3 class="text-center">
            <?php 
                if ($_SESSION['leng']==="es") echo "PRODUCTOS AUTOMOTRICES";
                else echo "AUTOMOTIVE PRODUCTS";
            ?>
        </h3>
            <div class="row">

            <?php
                  while ($fila = $consulta_automotriz->fetch(PDO::FETCH_ASSOC)) {
                      echo '
                            <div class="col-12 col-md-4"> 
                                <div class="d-flex flex-wrap justify-content-center align-content-center"  style="height:100%">
                                    <img src="img/productos/'.$fila['imagen_aut'].'" style="width:200px"> 
                                    <p class="text-justify" style="overflow:hidden;">
                                        '; 
                                        if ($_SESSION['leng']==="es") echo $fila['descripcion_aut'];
                                        else echo $fila['descripcion_auti'];
                                echo'
                                    </p>
                                    <button type="button" class="btn m-3" data-toggle="collapse" data-target="#c'.$fila['id_aut'].'">
                                        
                                        <i class="fas fa-retweet" style="color: #000000;"></i>      
                                           '; 
                                           if ($_SESSION['leng']==="es") echo $fila['nombre_categoria'];
                                           else echo $fila['nombre_categoriai']; 
                                echo'                            
                                    </button>
                                </div>
                            </div>';
                  }
                ?>
            </div>

            <?php
                $consulta_automotriz->execute();
                 while($fila = $consulta_automotriz->fetch(PDO::FETCH_ASSOC)){
                        echo '<div id="c'.$fila['id_aut'].'" class="collapse" data-parent="#contenedor-productos">';
                        echo '<div class="row mt-3">';
                            $consulta_producto = $con->prepare("select * from producto_automotriz where id_pca= '".$fila['id_aut']."'"); 
                            $consulta_producto->execute();
                                    while ($producto = $consulta_producto->fetch(PDO::FETCH_ASSOC)) {
                                        echo '
                                            <div class="col-12 col-md-4 py-3 px-5">
                                                    <div class="row rounded contenedor-producto">

                                                            <div class="col-sm-4 col-md-12 p-0 ">
                                                                    <div class="imagen-producto">
                                                                      <div class="d-flex justify-content-center" style="width:100%">
                                                                        <img src="./img/productos/'.$producto['imagen_pa'].'">
                                                                      </div> 
                                                                    </div>
                                                                </div>

                                                                <h4>'; 
                                                                    if ($_SESSION['leng']==="es") echo $producto['nombre_pa'];
                                                                    else echo $producto['nombre_pai'];         
                                                             echo'</h4> 
                                            
                                                                <div class="col-sm-8 col-md-12 p-0">
                                                                
                                                                        <div class="descripcion-prodcto text-justify pr-2" style="overflow:hidden;">
                                                                            '; 
                                                                        if ($_SESSION['leng']==="es") echo $producto['descripcion_pa'];
                                                                        else echo $producto['descripcion_pai'];
                                                                           echo'
                                                                        </div>
                                                                </div>
                                                    </div>
                                            </div>';
                                    }
                      echo  '</div>';
                      echo '</div>';
                    } 
            ?>
</div>


<div id="contenedor-productos-moldes" class="container pt-5 p-0 contenedor-productos">
        <h3 class="text-center">
        <?php 
            if ($_SESSION['leng']==="es") echo "MOLDES";
            else echo "MOLDS";
         ?>
        </h3>
            <div class="row">

                    <?php
                        while ($result = $consulta_moldes->fetch(PDO::FETCH_ASSOC)) {
                            echo '
                                    <div class="col-12 col-md-4"> 
                                        <div class="d-flex flex-wrap justify-content-center align-content-center"  style="height:100%">
                                            <img class="rounded-circle" src="img/productos/'.$result['imagen_catm'].'" style="width:200px;"> 
                                            <p class="text-justify" style="overflow:hidden;">
                                                '; 
                                                if ($_SESSION['leng']==="es") echo $result['descripcion_catm'];
                                                else echo $result['descripcion_catmi'];
                                         echo'
                                            </p>
                                            <button type="button" class="btn m-3" data-toggle="collapse" data-target="#m'.$result['id_catm'].'">
                                                
                                                <i class="fas fa-retweet" style="color: #000000;"></i>      
                                                '; 
                                                if ($_SESSION['leng']==="es") echo $result['nombre_catm'];
                                                else echo $result['nombre_catmi'];
                                            echo'                        
                                            </button>
                                        </div>
                                    </div>';
                        }
                    ?>
            </div>

            <?php
                $consulta_moldes->execute();
                 while($fila = $consulta_moldes->fetch(PDO::FETCH_ASSOC)){
                        echo '<div id="m'.$fila['id_catm'].'" class="collapse" data-parent="#contenedor-productos-moldes">';
                        echo '<div class="row mt-3">';
                            $consulta_producto = $con->prepare("select * from producto_moldes where id_pcm= '".$fila['id_catm']."'"); 
                            $consulta_producto->execute();
                                    while ($producto = $consulta_producto->fetch(PDO::FETCH_ASSOC)) {
                                        echo '
                                            <div class="col-12 col-md-4 py-3 px-5">
                                                    <div class="row rounded contenedor-producto">
                                                            <div class="col-sm-4 col-md-12 p-0 ">
                                                                    <div class="imagen-producto">
                                                                      <div class="d-flex justify-content-center" style="width:100%">
                                                                        <img src="./img/productos_moldes/'.$producto['imagen_pm'].'"> 
                                                                      </div>
                                                                    </div>
                                                                </div>
                                                                <h4>'; 
                                                                    if ($_SESSION['leng']==="es") echo $producto['nombre_pm'];
                                                                    else echo $producto['nombre_pmi'];
                                                              echo '</h4> 
                                                                <div class="col-sm-8 col-md-12 p-0">
                                                                
                                                                        <div class="descripcion-prodcto text-justify pr-2" style="overflow:hidden;">
                                                                            '; 
                                                                            if ($_SESSION['leng']==="es") echo $producto['descripcion_pm'];
                                                                            else echo $producto['descripcion_pmi'];
                                                                            
                                                                    echo'
                                                                        </div>
                                                                </div>
                                                    </div>
                                            </div>';
                                    }
                      echo  '</div>';
                      echo '</div>';
                    } 
            ?>
</div>


  <div class="container-fluid p-0 productos-foot" >
    <div class="container-fluid p-0 text">

    <div class="d-flex text-center text-light justify-content-center p-5">

    </div>
</div>
</div>

  
<?php
include("boton-contactanos.php");
include("footer.php");
?>
</body>
</html>
