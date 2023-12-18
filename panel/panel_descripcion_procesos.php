<?php

include('validacion_usuarios.php');
 
if($_SESSION['permisos']!='1' && $_SESSION['permisos']!='2' ){
    echo '
    <script>
    location.href ="panel_perfil.php";
    </script>';
    }
    
 $consulta_automotriz = $cone->prepare("select * from descripcion_procesosaut"); 
 $consulta_automotriz->execute();
 $indice=0;
?>
           
              <div class="container-fluid head-contenido">
                  <div class="d-flex justify-content-left">
                      <div class="p-2">
                         <h2>PROCESO AUTOMOTRIZ</h2>
                      </div>
                  </div>
              </div>
        
              
            <div class="d-flex justify-content-center">
                   <a class="btn btn-success text-center m-5" href="agregar_procesoaut.php">
                    <i class="fas fa-plus" style="color: #ffffff;"> AGREGAR UN PROCESO</i>
                  </a>  
            </div>

              <div class="row justify-content-center mx-0">

                <?php
                    while ($fila = $consulta_automotriz->fetch(PDO::FETCH_ASSOC)) {
                        echo '
                                <div class="col-12 col-md-5 px-1 my-3 mx-0"> 
                                    <div class="d-flex flex-wrap justify-content-center align-content-center px-2 border border-dark"  style="max-height:750px;">
                                        <img class=" mt-2" src="../img/proceso_automotriz/procesos/'.$fila['imagen_pa'].'" style="max-width:100%; max-height:350px;"> 
                                        <div class="d-flex flex-column my-3" style="width:100%">
                                            <h3 class="text-center" style="overflow:hidden;"> '.$fila['nombre_pa'].'</h3> 
                                        </div>
                                        <p class="text-center" style="overflow:hidden;">
                                            '.$fila['descripcion_pa'].'
                                        </p>
                                        <div class="d-flex justify-content-center my-2">
                                            <a class="btn btn-primary mx-3" href="actualizar_descripcion_proceso.php?id='.(base64_encode($fila['id_pa'])).'">
                                                ACTUALIZAR
                                            </a> 
                                            <a id="eliminar_banner" onclick="borrar('.$fila['id_pa'].');" href="#" class="btn btn-danger">
                                                ELIMINAR
                                            </a>   
                                        </div>
                                       
                                    </div>
                                </div>';
                    }
                    ?>
            </div>   

<script>
  

  function borrar(id) {
    var resultado = confirm("¿ESTAS SEGURO QUE DESEAS ELIMINAR ESTE REGISTRO?");

if (resultado) {
  
        const data = new FormData();
        data.append('opcion', '7');
        data.append('id', id);
        console.log(data);

        fetch('crud_procesos.php', {
            method: 'POST',
            body: data
        })
        .then(response => response.text()) // Lee la respuesta del servidor
        .then(resultado => {
            alert(resultado);
            location.reload();
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