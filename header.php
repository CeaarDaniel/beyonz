<?php
include 'conexion.php';

if (!isset($_SESSION['leng'])) {
  $_SESSION['leng']="es";
} 
?>

<header id ="header" class="container-fluid p-0" >
    <div class="d-flex text-center text-light justify-content-center p-5">
          <div class="pt-5" >
             <h1 class="my-0 encabezado"> 
              <?php 
                  if ($_SESSION['leng']==="es")  echo "Beyonz Mexicana S.A de C.V.";
                  else echo "Beyonz Mexican S.A de C.V.";
                ?>
             </h1>
             <h3 class="mt-2 encabezado"> 
                <?php 
                  if($_SESSION['leng']==="es") echo "Trabajamos siempre con calidad y disciplina";
                  else echo "We always work with quality and discipline.";
                ?>
              </h3>
          </div>
    </div>
</header>

<div class="sticky-top" id="navbar">
		<nav class="navbar navbar-expand-md navbar-dark py-0 pr-1 pl-0 ml-0">

        <a class="navbar-brand mx-0" href="#" style="background-color:white; height:100%">
          <img src="img/imagenes/logo.png" alt="Logo" style="width:150px;">
        </a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" >
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav"> 
              <ul class="navbar-nav">
                          <li class="nav-item">
                              <a class="nav-link active" href="index"><?php 
                                if ($_SESSION['leng']==="es")  echo "INICIO";
                                else echo "HOME";
                              ?></a>
                          </li>
                          <li class="nav-item dropdown">
                              <a class="nav-link active dropdown-toggle text-center" href="nosotros" data-toggle="dropdown" id="drop1">
                                <?php 
                                if ($_SESSION['leng']==="es")  echo "NOSOTROS";
                                else echo "ABOUT US";
                              ?>
                              </a>
                              <div class="dropdown-menu">
                                    <a class="dropdown-item" href="nosotros"> 
                                      <?php 
                                        if ($_SESSION['leng']==="es")  echo "¿QUIENES SOMOS?";
                                        else echo "WHO WE ARE?";
                                      ?>
                                    </a>
                                    <a class="dropdown-item" href="politica_de_calidad">
                                      <?php 
                                        if ($_SESSION['leng']==="es")  echo "NUESTRA CALIDAD";
                                        else echo "OUR QUALITY";
                                      ?>
                                    </a>
                                    <a class="dropdown-item" href="nosotros#plantas">
                                      <?php 
                                        if ($_SESSION['leng']==="es")  echo "PLANTAS";
                                        else echo "PRODUCTION PLANTS";
                                      ?>
                                    </a>
                            </div>
                          </li>
                          <li class="nav-item dropdown">
                              <a class="nav-link active dropdown-toggle text-center" href="procesos2" data-toggle="dropdown" id="drop2">
                                 <?php
                                        if ($_SESSION['leng']==="es")  echo"PROCESO";
                                        else echo"PROCESS";
                                  ?>
                              </a>
                              <div class="dropdown-menu">
                                    <a class="dropdown-item" href="proceso_automotriz">
                                    <?php
                                        if ($_SESSION['leng']==="es")  echo"PROCESO AUTOMOTRÍZ";
                                        else echo"AUTOMOTIVE PROCESS";
                                  ?>
                                    </a>
                                    <a class="dropdown-item" href="proceso_moldes">
                                    <?php
                                        if ($_SESSION['leng']==="es")  echo"PROCESO MOLDES";
                                        else echo"MOLD PROCESS";
                                  ?>
                                    </a>
                                    <a class="dropdown-item" href="equipos">
                                    <?php
                                        if ($_SESSION['leng']==="es")  echo"NUESTROS EQUIPOS";
                                        else echo"OUR MACHINES";
                                  ?>
                                    </a>
                            </div>
                          </li>
                          <li class="nav-item dropdown">
                              <a class="nav-link active dropdown-toggle text-center" href="productos" data-toggle="dropdown" id="drop3">
                                
                                <?php
                                        if ($_SESSION['leng']==="es")  echo "PRODUCTOS";
                                        else echo"PRODUCTS";
                                  ?>
                              </a>                     
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="productos#">
                                <?php
                                        if ($_SESSION['leng']==="es")  echo "AUTOMOTRÍZ";
                                        else echo"AUTOMOTIVE";
                                  ?>
                                </a>
                                <a class="dropdown-item" href="productos#contenedor-productos-moldes">
                                <?php
                                        if ($_SESSION['leng']==="es")  echo "MOLDES";
                                        else echo"MOLDS";
                                  ?>
                                </a>
                            </div>

                          </li>
                          <li class="nav-item">
                              <a class="nav-link active" href="noticias">
                              <?php
                                        if ($_SESSION['leng']==="es")  echo "NOTICIAS";
                                        else echo"NEWS";
                                  ?>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a class="nav-link active" href='clientes'>
                              <?php
                                        if ($_SESSION['leng']==="es")  echo "CLIENTES";
                                        else echo"CUSTOMERS";
                                  ?>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a class="nav-link active" href='empleos'>
                              <?php
                                        if ($_SESSION['leng']==="es")  echo "EMPLEOS";
                                        else echo"JOBS";
                                  ?>
                              </a>
                          </li>
                          </li>
                          <li class="nav-item">
                              <a class="btn nav-link active" href='contacto' >
                              <?php
                                        if ($_SESSION['leng']==="es")  echo "CONTACTO";
                                        else echo"CONTACT";
                                  ?>
                              </a>
                          </li>
                          <li class="nav-item mx-3 py-1">
                              <a class="btn nav-link active btn-idioma" href='#' onclick="cambiarIdioma()">
                                  <?php if ($_SESSION['leng']==="es")  echo "INGLÉS";
                                    else echo "SPANISH";
                                  ?>
                                </a>
                          </li>
              </ul>
        </div>
		</nav>
</div>

<script>

function habilitar() {
    var drop1 = document.getElementById("drop1");
    var drop2 = document.getElementById("drop2");
    var drop3 = document.getElementById("drop3");
    var windowWidth = window.innerWidth;

    if (windowWidth <= 768) 
    {
      drop1.classList.remove("disabled");
      drop2.classList.remove("disabled");
      drop3.classList.remove("disabled");
    } 
    
    else {
      drop1.classList.add("disabled");
      drop2.classList.add("disabled");
      drop3.classList.add("disabled");
    }

  }

  habilitar();
  window.addEventListener("resize", habilitar);


function cambiarIdioma() {
          
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "cambiar_idioma.php", true);
            xhr.send();
            location. reload();

            
        }


</script>