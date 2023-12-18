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
 error_reporting(0);

 if(isset($_GET['id']))
 {  
        $id = $_GET['id'];
        $id = base64_decode($id);

        $consulta_noticia = $con->prepare("select * from noticias where id = '".$id."'"); 
        $consulta_noticia->execute();
        $numFilas = $consulta_noticia->rowCount();

        $consulta_contenido = $con->prepare("select * from contenido_noticia where id_n = '".$id."'"); 
        $consulta_contenido->execute();

        $consulta_imagen = $con->prepare("select * from imagenes_noticia where id_n = '".$id."'"); 
        $consulta_imagen->execute();
}




if($numFilas>0){
  $noticia = $consulta_noticia->fetch(PDO::FETCH_ASSOC);
}

else {
  $consulta_noticia = $con->prepare("select * from noticias where id = '1'"); 
 $consulta_noticia->execute();
 $noticia = $consulta_noticia->fetch(PDO::FETCH_ASSOC);
}

?>


<div class="container mt-5 mb-5">

<h1 class="text-justify">
 <?php
       if ($_SESSION['leng']==="es") echo $noticia['titulo'];
       else echo $noticia['tituloi'];
 ?>
</h1>
    <div class="row">
       <div class="col-5">
       <p class="text-justify text-muted mb-0">
       <?php echo $noticia['fecha']?>
      </p>
      <p class="text-justify text-muted mt-0">
        <?php
            if ($_SESSION['leng']==="es") echo "Editado por:";
            else echo "Edited by:";
        echo $noticia['autor']
        ?>
      </p>
    
       </div>
    </div>
    <hr style=" background-color: rgb(202, 200, 189);">
        <div class="row">
            <div class="col-12 col-md-8 text-justify">
                 <div class="">
                  <img class="img fluid my-4" src="./img/noticias/<?php echo $noticia['imagen_principal']?>" alt="imagen principal" style="width:70%"> 
                  </div>
                   <?php
                     while( $parrafo = $consulta_contenido->fetch(PDO::FETCH_ASSOC)){

                      if ($_SESSION['leng']==="es") echo '<p>'.$parrafo['parrafo'].'</p>';
                      else    echo '<p>'.$parrafo['parrafoi'].'</p>';
                           
                     }
                  ?>

            </div>
            <div class="col-12 col-md-4">
              <?php
                while( $imagen = $consulta_imagen->fetch(PDO::FETCH_ASSOC)){
                     echo '<div>
                        <img class="img-fluid mb-0" src="./img/noticias/'.$imagen['imagen'].'" alt="Chania">
                        <p class="text-muted mt-0">
                          '; 
                          if ($_SESSION['leng']==="es") echo $imagen['descripcion'];
                          else echo $imagen['descripcioni'];         
                          echo'
                        </p>
                      </div>';
                    }
              ?>
            <hr class="fot mb-0">
            <div class="d-flex justify-content-end mt-0">
              <h6>
                <a class="btn enlace-noticias" href="noticias">
                  <?php
                    if ($_SESSION['leng']==="es") echo "VER MÁS NOTICIAS";
                    else echo "SEE MORE NEWS"     
                  ?>
                </a>
              </h6>
            </div>
         </div>
        </div>

</div>
    
</div>
<?php
 include("footer.php")
?>
</body>
</html>

