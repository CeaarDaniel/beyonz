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
 $consulta_moldes = $con->prepare("select * from proceso_moldes"); 
 $consulta_moldes->execute();
 $moldes = $consulta_moldes->fetch(PDO::FETCH_ASSOC);
?>


<div id="top-moldes" class="bgimg-1">
  <div class="caption">
  <span class="border" style="background-color: rgba(245, 245, 245, 0.7);font-size:25px;color:black;">
  <?php
        if ($_SESSION['leng']==="es")  echo "PROCESO DE MOLDES";
        else echo "MOLD PROCESS";
     ?> 
 </span>
  </div>
</div>

<div style="background-color: rgba(245, 245, 245, 0.473); text-align:center; padding:50px 80px; text-align: justify;">
  <p> 
    <?php
        if ($_SESSION['leng']==="es")  echo $moldes['texto'];
        else echo $moldes['textoi'];
     ?> 
  </p>
</div>


<div class="bgimg-2">
    <div class="caption">
      <span class="border" style="background-color:transparent;font-size:25px;color: #f7f7f7;">
        <?php
              if ($_SESSION['leng']==="es")  echo "HERRAMIENTAS DE ACERO";
              else echo "TOOL STEEL";
          ?> 
      </span>
    </div>
</div>

<div class="bgimg-2 my-0">
    <div class="row">

      <div class="col-12 col-md-6 px-5">
        <div class="d-flex flex-wrap justify-content-center mb-2" style="background-color:rgba(245, 245, 245, 0.7)"> 
          <div class="text-justify px-2">
          <?php
              if ($_SESSION['leng']==="es")  echo  $moldes['tool_uno'];
              else echo  $moldes['tool_unoi'];          
              ?> 

            <!--  <p class="text-center">     
                <b> H13 / SKD61/1.2344</b>
              </p> 
      
                Se utiliza principalmente como acero para herramientas de trabajo en caliente con un buen equilibrio entre resistencia, 
                tenacidad y resistencia al calor. Con la tecnología de isotropía, este material de acero para herramientas se ha vuelto más 
                resistente e isotrópico para ayudar a prolongar la vida útil de los troqueles y estabilizar.
              <br> <br>

              <b>Caracteristicas</b>

              <ul>
                <li>Buen equilibrio entre resistencia a alta temperatura y tenacidad</li>
                <li>Buena maquinabilidad con menos deformación después del calentamiento.</li>
              </ul>

            <b>Dureza endurecida</b>

              <ul>
                <li>45-48HRC Troqueles de tamaño general</li>
                <li>43-46HRC Troqueles de gran tamaño 43-46HRC</li>
              </ul>
              
              <b>Templado</b> 
              <ul>
                <li>1020°C aceite frío HTT 30 min</li>
              </ul> -->
          </div>    
          
        </div>
      </div>

      <div class="col-12 col-md-6 px-5">
        <div class="d-flex flex-wrap justify-content-center mb-2" style="background-color:rgba(245, 245, 245, 0.7)">

          <div class="text-justify px-2">
          <?php
              if ($_SESSION['leng']==="es")  echo  $moldes['tool_dos'];
              else echo  $moldes['tool_dosi'];          
              ?> 
          <!--
              <p class="text-center">
                <b>YXR33</b>
              </p>

            <p> 
              Es un acero de alta velocidad con mayor tenacidad, que resuelve el problema de la rotura. Adecuado para pasadores 
              insertables u otros insertos expuestos al desgaste crítico debido a la erosión. Acero para matrices de forja de
              precisión en caliente y cálido, y pasadores insertables para fundición a presión. 
            </p>  
           
            <b>Caracteristicas</b>
              <ul>
                <li>Mayor resistencia a temperaturas elevadas entre HSS y acero para herramientas de aleación.</li>
                <li>Excelente nitruración</li>
              </ul>

            <b>Dureza endurecida</b>
              <ul>
                <li>52-58 HRC TEMPLADO 550°C-600°C</li>
              </ul>

            <b>Templado</b> 
              <ul>
                <li>1080°c-1140°C ENFRIAMIENTO DE ACEITE HTT 30 MIN</li>
              </ul> -->
          </div>

          
        </div>

      </div>
    </div>
</div>

<div style="position:relative;">
    <div style="color:#ddd;background-color:#282E34;text-align:center;padding:50px 80px;text-align: justify;">
      <p>
          <?php
              if ($_SESSION['leng']==="es")  echo $moldes['proceso_plasticidad'];
              else echo $moldes['proceso_plasticidadi'];
          ?> 
      </p>
    </div>
</div>

<div class="bgimg-3">
  <div class="caption">
      <span class="border" style="background-color:transparent;font-size:25px;color: #f7f7f7;">
        <?php
            if ($_SESSION['leng']==="es")  echo "RECUBRIMIENTOS";
            else echo "COATING";
        ?> 
      </span>
  </div>
</div>

<div class="bgimg-3">
  <div class="d-flex flex-wrap justify-content-center">
    <img src="./img/proceso_moldes/<?php echo $moldes['img_recu']?>" class="img-fluid my-3">
  </div>
</div>

<div style="background-color: rgba(245, 245, 245, 0.473); text-align:center; padding:50px 80px; text-align: justify;">
  <p>
  <?php
        if ($_SESSION['leng']==="es")  echo $moldes['texto_recu'];
        else echo $moldes['texto_recui'];
     ?> 
  </p>
</div>

<div class="bgimg-4">
  <div class="caption">
  <span class="border" style="background-color:transparent;font-size:25px;color: #f7f7f7;">
  <?php
        if ($_SESSION['leng']==="es")  echo "TIPOS DE RECUBRIMIENTOS";
        else echo "TYPES OF COATING";
     ?> 
</span>
  </div>
</div>
  

<div class="bgimg-4">
  <div class="d-flex flex-wrap justify-content-center">
    <img src="./img/proceso_moldes/<?php echo $moldes['img_tipos_recu']?>" class="img-fluid my-3">
  </div>
</div>

<div style="position:relative;">
  <div style="color:#ddd;background-color:#282E34;text-align:center;padding:50px 80px;text-align: justify;">
  <p>
     <?php
        if ($_SESSION['leng']==="es")  echo $moldes['tipos_recu'];
        else echo $moldes['tipos_recui'];
     ?> 
</p>


            <div class="d-flex justify-content-center align-content-center my-5">
                  <video src="./videos/<?php echo $moldes['video'];?>" style="width:70%;  height:50%;" controls autoplay muted></video>
              </div>


  </div>
</div>

<?php
include("footer.php");
?>


<script>
var elemento = document.getElementById("navbar");
var hed = document.getElementById("top-moldes");
var fot = document.getElementById("footer"); 
function mostrarOcultarElemento() {

 console.log(window.scrollY);
 console.log("posicion del footer" + (fot.offsetTop - 100));

  if (window.scrollY < hed.offsetTop || window.scrollY > (fot.offsetTop - 200)) { 
    elemento.style.opacity = "1"; 
  } else {
    elemento.style.opacity = "0"; 
  }
}

window.addEventListener("scroll", mostrarOcultarElemento);
</script>


  </body>
</html>