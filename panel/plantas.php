<?php

include('validacion_usuarios.php');

if($_SESSION['permisos']!='1'){
  echo '
  <script>
  location.href ="panel_perfil.php";
  </script>';
  }

 $consulta_plantas = $cone->prepare("select DISTINCT pais from plantas"); 
 $consulta_plantas->execute();
 $indice=0;
?>
           
           <div class="container-fluid head-contenido">
                  <div class="d-flex justify-content-left">
                      <div class="p-2">
                         <h2>PLANTAS </h2>
                      </div>
                  </div>
              </div>

                <div class="d-flex justify-content-center">
                   <a class="btn btn-primary boton-plantas text-center m-5" href="agregar_planta.php">
                    <i class="fas fa-plus" style="color: #ffffff;"> AGREGAR UNA PLANTA</i>
                  </a>  
                </div>
        
            
                    <?php
                              $indice = 0;
     
                              while ($fila = $consulta_plantas->fetch(PDO::FETCH_ASSOC)) {
                                 
                                     $consulta_pais = $cone->prepare("select * from plantas where pais= '".$fila['pais']."'"); 
                                     $consulta_pais->execute();

                                       while ($datos = $consulta_pais->fetch(PDO::FETCH_ASSOC)){
                                         echo '
                                         <hr style="background-color: #000000;">
                                         <div class="row px-5" >
                                            <div class="col-12 col-md-4">
                                                <div class="d-flex flex-column aling-content-center justify-content-center p-0" style="height:100%">
                                                  <img src="../img/instalaciones/'.$datos['imagen'].'" alt="" class="img-fluid">
                                                </div>
                                            </div> 
                  
                                            <div class="col-12 col-md-4 text-justify">
                                              <div class="d-flex flex-column aling-content-center justify-content-center p-0" style="height:100%; overflow: hidden;">
                                              <p>'.$datos['nombre'].'</p>
                                                <p><i class="fas fa-paper-plane" style="color: #000000;"></i> 
                                                  '.$datos['direccion'].'
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
                                           <div class="col-12 col-md-4">

                                           <form class="m-auto" method="post" role="form" style="height:100%">
                                                <div class="d-flex flex-column justify-content-center align-content-center p-5" style="height:100%">
                                                      <a class="nav-link boton-plantas text-center" href="actualizar_planta.php?id='.(base64_encode($datos['id'])).'">
                                                        ACTUALIZAR DATOS
                                                      </a>
                                                      <input id="eliminar_planta" onclick="borrar_planta('.$datos['id'].');" class="btn btn-danger" value="ELIMINAR">
                                                </div>
                                          </form>

                                           
                                           </div>
                                        </div>
                                         ';

                                       }
                                    
                                
                                  $indice++;
                              }
                    ?>          
<script>
  
   function borrar_planta(id) {
    var resultado = confirm("¿ESTAS SEGURO QUE DESEAS ELIMINAR ESTE REGISTRO?");

if (resultado) {
  
        const data = new FormData();
        data.append('opcion', '2');
        data.append('id_p', id);
        console.log(data);

        fetch('./crud_planta.php', {
            method: 'POST',
            body: data
        })
        .then(response => response.text()) // Lee la respuesta del servidor
        .then(resultado => {
            alert(resultado);
            location.reload()
        })
        .catch(error => {
            console.error('Error:', error);
        });
    
}
    }



</script> 

<?php
 include("footer_panel.php");
?>