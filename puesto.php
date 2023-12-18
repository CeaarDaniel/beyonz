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
         if ($_SESSION['leng']==="es") echo "PUESTO";
         else echo "VACANT";
        ?>
    </title>
    <link rel="icon" href="./img/imagenes/logo.png" type="image/x-icon"> 
</head>
<body>
<?php
 include("header.php");
 
 if(isset($_GET['id']))
 {  
        $id = $_GET['id'];
        $id = base64_decode($id);
}

$consulta_parrafo = $con->prepare("select * from parrafo_empleo where id_e = '".$id."'"); 
$consulta_parrafo->execute();
$consulta_empleo = $con->prepare("select * from empleos where id = '".$id."'"); 
$consulta_empleo->execute();
$empleo=$consulta_empleo->fetch(PDO::FETCH_ASSOC);
?>


<div class="jumbotron mt-5 mb-5 mx-5" style="background-color:white;">

<h1 class="text-center">
    <?php 
        if ($_SESSION['leng']==="es") echo $empleo['nombre_vacante'];
        else echo $empleo['nombre_vacantei'];
    ?>
</h1>
    <div class="row">
       <div class="col-5">
       <p class="text-justify text-muted mb-0">
       <?php echo $empleo['fecha']?>
      </p>
    
       </div>
    </div>
    <hr style=" background-color: rgb(202, 200, 189);">
        <div class="row">
            <div class="col-12 col-md-7 text-justify">
               <?php while($parrafo = $consulta_parrafo->fetch(PDO::FETCH_ASSOC)){
                    if ($_SESSION['leng']==="es") echo $parrafo['parrafo'];
                    else echo $parrafo['parrafoi'];
                }
                ?>
            </div>
            <div class="col-12 col-md-5">
                  <div class="d-flex justify-content-center">
                  <img class="img fluid my-4" src="./img/vacantes/<?php echo $empleo['imagen_vacante']?>" alt="imagen principal" style="width:100%"> 
              </div>
         </div>
</div>

 <div class="row">
    <div class="col 12">
      <a class="nav-link text-center enlace-vacantes" href="empleos">
        <?php
            if ($_SESSION['leng']==="es") echo "<b>VER MAS VACANTES</b>";
            else echo "<b>SEE MORE JOBS</b>";
        ?>
      </a>
    </div>
 </div>
    
</div>
<?php
 include("footer.php")
?>
</body>
</html>

</html>