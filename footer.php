<?php
$consulta = $con->prepare("select * from footer"); 
$consulta->execute();

while ($result = $consulta->fetch(PDO::FETCH_ASSOC)){
  $datos_footer[] = array (
    "direccion" => $result['direccion'],
    "telefono" =>  $result['telefono'],
    "email" =>  $result['email'],
    "fax" => $result['fax'],
    "horario" => $result['horario'],
    "enlace_facebook" => $result['enlace_facebook'],
    "enlace_linkendin" => $result['enlace_linkendin'],
    "enlace_dun" => $result['enlace_dun'],
    "archivo_privacidad" => $result['archivo_privasidad']
    );
}


?>

<footer id="footer" class="container-fluid bg-dark text-white mt-0" style="width:100%;  background-color: #000000;">
    <div class="row bg-dark pl-5 pr-0">
          
          <div class="col-12 col-md p-0">
              <div class="row">

                      <div class="d-flex flex-wrap align-content-center" style="height:200px">
                        <img src="./img/imagenes/phone.png"> 
                      </div>
    

                  <div class="col-8 text-justify m-0">
                     <div class="d-flex flex-wrap align-content-center" style="height:100%">
                          <?php 
                              if ($_SESSION['leng']==="es")  
                                    echo '<p  style=" color: rgb(223, 208, 3);">TIENE ALGUNA PREGUNTA O DESEA UN PRESUPUESTO GRATUITO?</p>
                                    <h4 class="font-weight-bold">'.$datos_footer[0]['telefono'].'</h4>';
                              else 
                                  echo '<p  style=" color: rgb(223, 208, 3);">DO YOU HAVE ANY QUESTIONS OR DO YOU WANT A FREE BUDGET?</pm>
                                  <h4 class="font-weight-bold">'.$datos_footer[0]['telefono'].'</h4>'
                          ?>                        
                      </div>
                  </div>

              </div>
          </div>

          <div class="col-12 col-md text-center ml-3">

              <div class="row">
                      <div clas="col-4">
                          <div class="d-flex flex-wrap align-content-center" style="height:200px">
                                <img src="./img/imagenes/camion.png">                          
                          </div>
                      </div>

                      <div class="col">
                          <div  class="d-flex flex-wrap align-content-center" style="height:200px">
                          <div class="col-12 text-justify">
                          <p  style=" color: rgb(223, 208, 3);">
                          <?php
                            if ($_SESSION['leng']==="es")  echo " BEYONZ EN EL MUNDO";
                            else echo"BEYONZ IN THE WORLD";
                          ?>
                               
                              </p>
                            </div>
                            <div class="col-12 text-justify">
                              <h4 class="font-weight-bold pl-1"> 
                                <a  class="p-0 text-withe" href="nosotros#plantas" style=" color: #FFFFFF;">
                                <?php
                                  if ($_SESSION['leng']==="es")  echo "NUESTRAS PLANTAS ";
                                  else echo" OUR PRODUCTION PLANTS";
                                ?>
                                  
                                </a>
                              </h4>
                            </div>
                            </div>
                      </div>

              </div>

          </div>
          
    </div>  

    <div class="d-flex flex-column flex-md-row justify-content-between">

        <div class=" text-center">
          <strong>  
            <?php
              if ($_SESSION['leng']==="es")  echo "MENÚ";
              else echo"MENU";
            ?>
          </strong>
          <hr class="fot">
             <ul class="list-group list-group-flush">
               <li class="list-group-item">
                  <a  class="p-0 text-withe" href="index" style=" color: #FFFFFF;">        
                     <?php
                        if ($_SESSION['leng']==="es")  echo "Inicio";
                        else echo "Home";
                      ?>
                  </a>
               </li>
               <li class="list-group-item">
               <a  class="p-0 text-withe" href="nosotros" style=" color: #FFFFFF;">       
                     <?php
                        if ($_SESSION['leng']==="es")  echo "Nosotros";
                        else echo"About us";
                      ?>
                  </a>
               <li class="list-group-item">
                  <a  class="p-0 text-withe" href="procesos" style=" color: #FFFFFF;">  
                     <?php
                      if ($_SESSION['leng']==="es")  echo "Procesos";
                      else echo "Process";
                    ?>
                  </a>
               </li>
               <a  class="p-0 text-withe" href="noticias" style=" color: #FFFFFF;">
                     <?php
                      if ($_SESSION['leng']==="es")  echo "Noticias";
                      else echo" News";
                    ?>
                  </a>
               <li class="list-group-item">
               <a  class="p-0 text-withe" href="nosotros#plantas" style=" color: #FFFFFF;">    
                     <?php
                      if ($_SESSION['leng']==="es")  echo "Plantas";
                      else echo "Production plants";
                    ?>
                  </a>
               </li>
               <li class="list-group-item">
                  <a  class="p-0 text-withe" href="contacto" style=" color: #FFFFFF;">            
                     <?php
                        if ($_SESSION['leng']==="es")  echo "Contacto";
                        else echo "Contact";
                      ?>
                  </a>
               </li>
            <ul>
          </div>

          <div class=" text-center">

                <strong>
                  <?php
                    if ($_SESSION['leng']==="es")  echo "PRODUCTOS";
                    else echo"PRODUCTS";
                  ?>
                </strong>
                <hr class="fot">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                      <a  class="p-0 text-withe" href="productos" style=" color: #FFFFFF;">
                          <?php
                            if ($_SESSION['leng']==="es")  echo "Automotriz";
                            else echo "Automotive";
                          ?>
                      </a>
                    </li >

                    <li class="list-group-item">
                      <a  class="p-0 text-withe" href="productos#contenedor-productos-moldes" style=" color: #FFFFFF;">
                        <?php
                          if ($_SESSION['leng']==="es")  echo "Moldes";
                          else echo "Molds";
                        ?>
                      </a>
                    </li>
                <ul>
          </div>

          <div class="text-justify mx-5 contacto">

          <strong>                             
            <?php
              if ($_SESSION['leng']==="es")  echo "INFORMACION DE CONTACTO";
              else echo "CONTACT INFORMATION";
            ?> 
          </strong>
          <hr class="fot">
              <p>
                  <i class="fas fa-paper-plane" style="color: #ffffff;"></i> 
                      <?php if ($_SESSION['leng']==="es")  echo 'Dirección: '.$datos_footer[0]['direccion'];
                               else echo 'Address: '.$datos_footer[0]['direccion'];
                      ?>
              </p>  

              <p><i class="fas fa-phone" style="color: #ffffff;"></i>       
                <?php
                  if ($_SESSION['leng']==="es")  echo 'Teléfono :';
                  else echo 'Phone : ';
                ?> 
                <?php  echo $datos_footer[0]['telefono'];?>
              </p>

              <p><i class="fas fa-envelope" style="color: #ffffff;"></i>  
              <?php
                  if ($_SESSION['leng']==="es")  echo 'Correo :';
                  else echo 'Email :';
                ?>    
               
                 <?php  echo $datos_footer[0]['email']?>
              </p>

              <p> <i class="fas fa-print" style="color: #ffffff;"></i> 
                 Fax: 
                 <?php  echo $datos_footer[0]['fax']?>
              </p>

              <p><i class="fas fa-clock" style="color: #ffffff;"></i>   
                  
                  <?php
                      if ($_SESSION['leng']==="es")  echo 'Horario :';
                      else echo 'Working Hours : ';
                  ?> 
                  <?php  echo $datos_footer[0]['horario']?>
              </p>

              <p>
                <a href="./files/<?php echo $datos_footer[0]['archivo_privacidad']?>" target="_blank"><i class="fas fa-lock"></i>  
                  <?php
                      if ($_SESSION['leng']==="es")  echo 'AVISO DE PRIVACIDAD';
                      else echo 'NOTICE OF PRIVACY';
                  ?> 
                </a>
            </p> 
          </div>
    </div>

    
    <div class="d-flex flex-column flex-md-row justify-content-center iconos-footer">
          <a class="mx-4" href="<?php  echo $datos_footer[0]['enlace_facebook']?>" target="_blank" style="font-size: 40px;">
            <i class="fab fa-facebook-f p-2 border rounded" style="color: #ffffff; background-color:blue"></i>
          </a>
          <a class="mx-4" href="<?php  echo $datos_footer[0]['enlace_linkendin']?>" target="_blank" style="font-size: 40px;">
            <i class="fab fa-linkedin-in p-2 border rounded" style="color: #ffffff; background-color:blue"></i>
          </a>    
          <a  class="mx-4" href="<?php  echo $datos_footer[0]['enlace_dun']?>" target="_blank" style="font-size: 10px;">
              <img src="./img/imagenes/duns.png" class="p-1 border rounded" alt="link duns" style="height:65px; width:65px">
          </a>
    </div> 

    <div class="row bg-dark">

          <div class="col text-center">
              <?php
                  if ($_SESSION['leng']==="es")  echo "©2023 beyonz. Todos los derechos reservados";
                  else echo"©2023 Beyonz. All rights reserved.";
              ?>
          </div>
    </div>  
</footer>

                
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

<?php
    $con = null;
?>